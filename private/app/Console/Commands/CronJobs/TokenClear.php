<?php

namespace App\Console\Commands\CronJobs;

use Exception;
use Illuminate\Support\Facades\Log;
use Master\Foundation\GDPR;
use Master\Foundation\Modules\Commands\Command;
use Master\Modules\Websites\Facades\Websites;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;

class TokenClear extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ene:tokens-clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Ripulisce i file dei token vecchi nella cartella storage/enesi/tokens';

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

        $gdpr = new GDPR();
        try {
            $auth = $gdpr->auth();
            if ($auth){
                $this->info("Autenticazione GDPR avvenuta con successo.");
            }
        } catch (Exception $e) {
            $this->error("Errore di autenticazione GDPR: " . $e->getMessage());
        }
        return self::SUCCESS;
    }
}
