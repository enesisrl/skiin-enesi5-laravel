<?php

namespace App\Console\Commands\Closure\Classes;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Master\Modules\Acceptances\Models\Acceptance;
use Master\Modules\Acceptances\Models\AcceptanceMaterial;
use Master\Modules\Acceptances\Models\AcceptanceProfit;
use Master\Modules\Acceptances\Models\Receipt;
use Master\Modules\IsoReceipts\Models\IsoReceipt;
use Master\Modules\IsoRentReceipts\Models\IsoRentReceipt;

class Cloud{

    private $wsCloudUrl;
    public $dataWs = [];
    public $website;
    public $date;

    private $logFileIso;

    public function __construct($website){
        $this->website = $website;
        $this->logFileIso = Storage::disk('isoReceipts')->path('sync_ricevute_iso_last_run.txt');
        if (!Storage::disk('isoReceipts')->exists('sync_ricevute_iso_last_run.txt')) {
            Storage::disk('isoReceipts')->put('sync_ricevute_iso_last_run.txt', '');
        }
        if (config('app.env') == 'local'){
            $this->wsCloudUrl = 'https://gestionale.skiin.test/';
        }else{
            $this->wsCloudUrl = 'https://gestionale.skiincourmayeur.it/';
        }
    }

    public function log($message, $data=[],$type=null): void
    {
        switch($type){
            case 'error':
                Log::channel('closure')->error($message, $data);
                break;
            case 'emergency':
                Log::channel('closure')->emergency($message, $data);
                break;
            case 'notice':
                Log::channel('closure')->notice($message, $data);
                break;
            case 'alert':
                Log::channel('closure')->alert($message, $data);
                break;
            case 'warning':
                Log::channel('closure')->warning($message, $data);
                break;
            case 'debug':
                Log::channel('closure')->debug($message, $data);
                break;
            default:
                Log::channel('closure')->info($message, $data);
                break;
        }
    }
    public function setDate($date): void
    {
        $this->date = $date;
    }

    public function getCurrentSeason(): array
    {
        return $this->callWsCloud("ws/2.0.0/current-season",'get', [
            'sede'=>$this->website
        ]);
    }

    public function getClosureData(): void
    {
        $this->dataWs = $this->callWsCloud("ws/2.0.0/chiusura",'get', [
            'sede'=>$this->website
        ]);
    }

    public function endClosure(): void
    {
        $this->dataWs = $this->callWsCloud("ws/2.0.0/fine-chiusura",'get', [
            'sede'=>$this->website
        ]);
    }

    public function callWsCloud($url, $method, $data = [])
    {
        $post = array_merge([
            'username' => 'enesi5',
            'password' => '66e81a26cc61e8',
            'method'   => $method,
        ], $data);

        $response = Http::asForm()->post($this->wsCloudUrl . $url, $post);

        if ($response->successful()) {
            return $response->json();
        }

        // Log errore o gestisci come preferisci
        $this->log('Errore chiamata wsCloud', ['url' => $url, 'status' => $response->status()], 'error');
        return null;
    }

    public function getDates(): array
    {
        if (isset($this->dataWs['data'])){
            return array_keys($this->dataWs['data']);
        }
        return [];
    }

    public function getDataWs($data_type){
        if (isset($this->dataWs['data'][$this->date][$data_type])) {
            return $this->dataWs['data'][$this->date][$data_type];
        }
        return [];
    }

    public function getIsoReceipts($date_from=null){

        if (!$date_from){
            $content = trim(file_get_contents($this->logFileIso));
            if ($content === '') {
                $content = date('Y-m-d H:i:s');
            }
            $date_from = $content;
        }
        return $this->callWsCloud("ws/2.0.0/ricevute-iso",'get', [
            'sede'=>$this->website,
            'date_from'=>$date_from
        ]);
    }

    public function syncIsoReceipts($date_from=null){

        $records = $this->getIsoReceipts($date_from);
        if (isset($records['privati'])){
            if (count($records['privati'])){

                foreach($records['privati'] as $record){
                    $isoReceipt = IsoReceipt::find($record['id_ricevuta_iso']);
                    if (!$isoReceipt){
                        $isoReceipt = new IsoReceipt();
                        $isoReceipt->id = $record['id_ricevuta_iso'];
                    }
                    $isoReceipt->fillRecord($record);
                    $this->log('Ricevuta ISO importata', ['id' => $isoReceipt->id] );
                }
            }
        }
        if (isset($records['noleggio'])){
            if (count($records['noleggio'])){
                foreach($records['noleggio'] as $record){

                    $isoRentReceipt = IsoRentReceipt::find($record['id_ricevuta_iso_noleggio']);
                    if (!$isoRentReceipt){
                        $isoRentReceipt = new IsoRentReceipt();
                        $isoRentReceipt->id = $record['id_ricevuta_iso_noleggio'];
                    }
                    $isoRentReceipt->fillRecord($record);
                    $this->log('Ricevuta ISO noleggio importata', ['id' => $isoRentReceipt->id] );
                }
            }
        }
        file_put_contents($this->logFileIso,date('Y-m-d H:i:s'));
    }

    public function syncAcceptances(){
        $records = $this->getDataWs('acceptances');
        if (count($records)){
            $this->copyData('acceptances',$records, Acceptance::class);
        }
    }
    public function syncAcceptanceMaterials(){
        $records = $this->getDataWs('acceptance_materials');
        if (count($records)){
            $this->copyData('acceptance_materials',$records, AcceptanceMaterial::class);
        }
    }
    public function syncReceipts(){
        $records = $this->getDataWs('receipts');
        if (count($records)){
            $this->copyData('receipts',$records,Receipt::class);
        }
    }

    public function copyData($table,$records,$modelClass): void
    {
        $this->log('Aggiornamento tabella '.$table);
        foreach($records as $record){
            $data = [];
            $model = (new $modelClass())->find($record['id']);
            if (!$model) {
                $model = new $modelClass();
            }
            $arr_fields = $model->getFillable();
            foreach($record as $key=>$value){
                if (in_array($key, $arr_fields)){
                    $data[$key] = $value;
                }
            }
            if (count($data)){
                $model->id = $record['id'];
                $model->fill($data);
                $model->save();
            }
        }
        $this->log('Aggiornamento tabella '.$table.' completato');
    }

    public static function calculateAcceptancesProfit($forced=false, $output=false): void
    {
        if ($forced){
            DB::table('acceptance_profits')->delete();
        }

        $query = Acceptance::select([
            'acceptances.*',
            DB::raw('SUM(receipts.price) as acceptance_total')
        ])->leftJoin('receipts', function($join) {
            $join->on('receipts.acceptance_id', '=', 'acceptances.id')->whereNull('receipts.deleted_at');
        })->where('acceptances.date_in','>=','2024-11-29')
            ->where(function($where){
                $where->whereNull('acceptances.typology_1')
                    ->orWhere('acceptances.typology_1','!=',config('constants.typologies.only_deposit'));
            })
            ->where(function($where){
                $where->whereNull('acceptances.typology_2')
                    ->orWhere('acceptances.typology_2','!=',config('constants.typologies.only_deposit'));
            })
            ->where(function($where){
                $where->whereNull('acceptances.typology_3')
                    ->orWhere('acceptances.typology_3','!=',config('constants.typologies.only_deposit'));
            });
        if (!$forced){
            $query->whereNotIn('acceptances.id',function($subquery){
                $subquery->select('acceptance_id')->from('acceptance_profits');
            });
        }
        $query->groupBy('acceptances.id')->orderBy('acceptances.created_at','asc');

        if ($output){
            $query->ddRawSql();
        }

        foreach($query->get() as $record){
            self::calculateProfit($record,$output);
        }
    }

    public static function calculateProfit($acceptance, $output=false): void
    {
        $partial_profit = 0;
        $profits = [];
        $total_profit = $acceptance->acceptance_total + $acceptance->insurance_price;
        for($i = 1; $i <= 3; $i++){
            if ($acceptance->{'category_'.$i} && $acceptance->{'article_'.$i}){
                $profits[] = [
                    'acceptance_id' => $acceptance->id,
                    'category' => $acceptance->{'category_'.$i},
                    'category_description' => $acceptance->{'category_description_'.$i},
                    'article' => '',
                    'article_description' => '',
                    'profit' => 0,
                    'days' => $acceptance->total_days
                ];
            }
        }

        $query = AcceptanceMaterial::select([
            'acceptance_materials.*',
        ])->where('acceptance_materials.acceptance_id',$acceptance->id);

        foreach($query->get() as $material){
            $partial_profit += $material->profit;
            $profits[] = [
                'acceptance_id' => $acceptance->id,
                'category' => $material->category,
                'category_description' => $material->category_description,
                'article' => $material->article_code,
                'article_description' => $material->article_description,
                'profit' => $material->profit,
                'days' => $material->days
            ];
        }


        foreach ($profits as $j=>$r){
            if ($r['article'] == ''){
                $profits[$j]['profit'] = $total_profit - $partial_profit;
            }
        }

        if ($output){
            print_r($profits);
        }

        foreach ($profits as $r){
            $acceptanceProfit = new AcceptanceProfit();
            $acceptanceProfit->acceptance_id = $r['acceptance_id'];
            $acceptanceProfit->category = $r['category'];
            $acceptanceProfit->category_description = $r['category_description'];
            $acceptanceProfit->article_code = $r['article'];
            $acceptanceProfit->article_description = $r['article_description'];
            $acceptanceProfit->profit = $r['profit'];
            $acceptanceProfit->days = $r['days'];
            $acceptanceProfit->save();
        }
    }
}
