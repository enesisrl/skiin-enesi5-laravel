<?php

namespace App\Console\Commands\Utility;

use Master\Foundation\Modules\Commands\Command;
use Master\Modules\ResourcesLang\Models\ResourceLang;
use Master\Modules\Websites\Facades\Websites;

class generate_resources_lang_seeder extends Command
{

    protected $template = '<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\DB;
use Master\Modules\ResourcesLang\Models\ResourceLang;

class ResourcesLangTableSeeder extends Seeder {

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run() {
           ResourceLang::where("type","front")->forceDelete();

__INSERT_LANG__
        $model = new ResourceLang;
        $model->generateLanguageFiles();
    }

    protected function insertLang($type, $section, $label, $values) {

        $resource_lang_id = Uuid::uuid4()->toString();

        DB::table(\'resources_lang\')->insert([[
            \'id\' => $resource_lang_id,
            \'type\' => $type,
            \'section\' => $section,
            \'label\' => $label,
            \'created_at\' => date(\'Y-m-d H:i:s\')
        ]]);

        foreach($values as $lang => $value){
            DB::table(\'resources_lang_translations\')->insert([[
                \'id\' => Uuid::uuid4()->toString(),
                \'resource_lang_id\' => $resource_lang_id,
                \'lang\' => $lang,
                \'value\' => $value,
                \'created_at\' => date(\'Y-m-d H:i:s\')
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
    protected $signature = 'generate:resourceslangseeder';

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
        $languages = ResourceLang::where("type","front")->orderBy('section')->orderBy('label')->get();

        $commands = "";
        foreach($languages as $language){

            $values = [];
            foreach($language->translations as $translation){
                $values[$translation->lang] = $translation->value;
            }

            //$commands .= "        \$this->insertLang('{$language->type}', '{$language->section}', '{$language->label}', unserialize(stripslashes('" . addslashes(serialize($values)) . "')));\n";
            $commands .= "        \$this->insertLang('{$language->type}', '{$language->section}', '{$language->label}', unserialize(base64_decode('".base64_encode(serialize($values))."')));\n";

        }

        $seeder_dir = database_path()."/seeders/";
        $content = str_replace("__INSERT_LANG__", $commands, $this->template);
        file_put_contents($seeder_dir."ResourcesLangTableSeeder.php",$content);
        return 0;
    }
}
