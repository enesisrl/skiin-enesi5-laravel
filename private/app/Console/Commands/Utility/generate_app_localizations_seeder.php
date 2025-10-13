<?php

namespace App\Console\Commands\Utility;

use Master\Foundation\Modules\Commands\Command;
use Master\Modules\AppLocalizations\Models\AppLocalization;
use Master\Modules\ResourcesLang\Models\ResourceLang;
use Master\Modules\Websites\Facades\Websites;

class generate_app_localizations_seeder extends Command
{

    protected $template = '<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\DB;
use Master\Modules\AppLocalizations\Models\AppLocalization;

class AppLocalizationsSeeder extends Seeder {

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run() {
           DB::table("app_localizations")->delete();

__INSERT_LANG__
        $model = new AppLocalization();
        $model->generateLanguageFiles();
    }

    protected function insertLang($section, $label, $values) {

        $app_localization_id = Uuid::uuid4()->toString();

        DB::table(\'app_localizations\')->insert([[
            \'id\' => $app_localization_id,
            \'section\' => $section,
            \'label\' => $label
        ]]);

        foreach($values as $lang => $value){
            DB::table(\'app_localization_translations\')->insert([[
                \'id\' => Uuid::uuid4()->toString(),
                \'app_localization_id\' => $app_localization_id,
                \'lang\' => $lang,
                \'value\' => $value
            ]]);
        }

    }
}
';



    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:app-localizations-seeder';

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
    public function __construct(){
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(){
        $languages = AppLocalization::orderBy('section')->orderBy('label')->get();

        $commands = "";
        foreach($languages as $language){

            $values = [];
            foreach($language->translations as $translation){
                $values[$translation->lang] = $translation->value;
            }

            //$commands .= "        \$this->insertLang('{$language->type}', '{$language->section}', '{$language->label}', unserialize(stripslashes('" . addslashes(serialize($values)) . "')));\n";
            $commands .= "        \$this->insertLang('{$language->section}', '{$language->label}', unserialize(base64_decode('".base64_encode(serialize($values))."')));\n";

        }

        $seeder_dir = database_path()."/seeders/";
        $content = str_replace("__INSERT_LANG__", $commands, $this->template);
        file_put_contents($seeder_dir."AppLocalizationsSeeder.php",$content);
        return 0;
    }
}
