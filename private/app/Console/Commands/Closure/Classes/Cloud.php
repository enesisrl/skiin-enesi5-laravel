<?php

namespace App\Console\Commands\Closure\Classes;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Master\Facades\Tool;
use Master\Modules\IsoReceipts\Models\IsoReceipt;
use Master\Modules\IsoRentReceipts\Models\IsoRentReceipt;

class Cloud{

    private $wsCloudUrl;
    public $dataWs = [];
    public $sede;
    public $date;

    private $logFileIso;

    public function __construct($sede){
        $this->sede = $sede;
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
            case 'info':
                Log::channel('closure')->info($message, $data);
                break;
            default:
                Log::channel('closure')->debug($message, $data);
                break;
        }
    }
    public function setDate($date): void
    {
        $this->date = $date;
    }
    public function getClosureData(): void
    {
        $this->dataWs = $this->callWsCloud("ws/1.0.0/chiusura",'get', [
            'sede'=>$this->sede
        ]);
    }

    public function endClosure(): void
    {
        $this->dataWs = $this->callWsCloud("ws/1.0.0/fine-chiusura",'get', [
            'sede'=>$this->sede
        ]);
    }

    public function callWsCloud($url,$method,$data=[]){
        $post = [
            'username' => 'enesi5',
            'password' => '66e81a26cc61e8',
            'method' => $method
        ];

        if (count($data)){
            foreach ($data as $key=>$value){
                $post[$key] = $value;
            }
        }

        //print_r($post);

        $ch = curl_init($this->wsCloudUrl.$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        // execute!
        $response = json_decode(curl_exec($ch), true);
        // close the connection, release resources used
        curl_close($ch);
        return $response;
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
        return $this->callWsCloud("ws/1.0.0/ricevute-iso",'get', [
            'sede'=>$this->sede,
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
                }
            }
        }
        file_put_contents($this->logFileIso,date('Y-m-d H:i:s'));
    }
}
