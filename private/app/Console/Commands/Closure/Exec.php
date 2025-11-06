<?php

namespace App\Console\Commands\Closure;

use App\Console\Commands\Closure\Classes\Cloud;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Master\Foundation\Modules\Commands\Command;
use Master\Modules\Statistics\Facades\Statistics;
use Master\Modules\Websites\Facades\Websites;

class Exec extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'closure:exec';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        Websites::setCurrentWebsite($this->website_id, $this->website_domain);
        $websites = ['checrouit','regionale'];
        foreach($websites as $website){
            $cloud = new Cloud($website);
            $current_season = $cloud->getCurrentSeason();

            if (!Arr::get($current_season,'is_season_opened')){
                $cloud->log($website." - Al di fuori della stagione: ".date("Y-m-d H:i")." rispetto a ".Arr::get($current_season,'season_start_date')." -> ".Arr::get($current_season,'season_end_date'),[],'error');
            }else{
                $cloud->log('Inizio procedura di chiusura ' . $website);

                $cloud->log('Sincronizzazione ricevute ISO ' . $website);
                $cloud->syncIsoReceipts();
                $cloud->log('Fine sincronizzazione ricevute ISO ' . $website);

                $cloud->getClosureData();

                if (is_array($cloud->dataWs) && count($cloud->dataWs)) {
                    foreach ($cloud->getDates() as $date) {
                        $cloud->setDate($date);
                        $cloud->syncAcceptances();
                        $cloud->syncAcceptanceMaterials();
                        $cloud->syncReceipts();

                    }
                    $cloud->log('Chiusura completata');
                    $cloud->endClosure();
                }
                $cloud->calculateAcceptancesProfit(false);
            }

        }

        /* Aggiorna le cache delle statistiche usate nei filtri di ricerca */
        Cache::store(config('master.website.cache_driver'))->forget('categories');
        Cache::store(config('master.website.cache_driver'))->forget('measures');
        Cache::store(config('master.website.cache_driver'))->forget('brands');
        Cache::store(config('master.website.cache_driver'))->forget('years');
        Statistics::getCategoriesForSelect();
        Statistics::getMeasuresForSelect();
        Statistics::getBrandsForSelect();
        Statistics::getYearsForSelect();

        return self::SUCCESS;
    }
}
