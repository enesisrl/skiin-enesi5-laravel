<?php

namespace App\Console\Commands\Utility;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Master\Foundation\Modules\Commands\Command;
use Master\Modules\Categories\Models\Category;
use Master\Modules\Users\Models\User;
use Master\Modules\Users\Models\UserData;
use Master\Modules\Websites\Facades\Websites;
use Master\Modules\Websites\Models\Website;

class seed_generator extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'utility:seed_generator';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mostra a video il comando per generare i seed dell\'intero DB';

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
    public function handle(){
        $this->line("Generazione seeders in corso...\n");
        Artisan::call('generate:app-localizations-seeder',[],$this->output);
        Artisan::call('generate:resourceslangseeder',[],$this->output);
        Artisan::call('generate:adminresourceslangseeder',[],$this->output);

        $exclude = [
            "bans",
            "cache",
            //"comune",
            //"countries",
            //"country_translations",
            "failed_jobs",
            "jobs",
            "migrations",
            "password_resets",
            //"provincia",
            //"regione",
            "app_localizations",
            "app_localization_translations",
            "logs",
            "resources_lang",
            "resources_lang_translations",
            //"model_has_permissions",
            //"model_has_roles",
            //"permissions",
            //"roles",
            //"role_has_permissions",
            "telescope_entries",
            "telescope_entries_tags",
            "telescope_monitoring"
        ];

        $results = DB::select('SHOW TABLES');
        $p = $this->output->createProgressBar(count($results));
        $p->setFormat('very_verbose');
        $p->start();
        foreach($results as $res){
            $p->advance();
            $table = $res->{'Tables_in_'.config("database.connections.mysql.database")};
            if (!in_array($table,$exclude)) {
                $command = "iseed --force ".$table;
                Artisan::call($command);
            }
        }
        $p->finish();
        return 0;
    }
}
