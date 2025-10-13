<?php

namespace App\Console\Commands\Utility;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Master\Foundation\Modules\Commands\Command;



class ExportPermissionsSeeder extends Command
{

    protected $template = '';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'export:permission-seeder';

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

        $this->setTemplate();

        $statements = [];
        $statements[] = "DB::statement('SET FOREIGN_KEY_CHECKS=0;');";
        $tables = ['admin_modules','permissions','roles','model_has_permissions','model_has_roles','role_has_permissions'];
        foreach ($tables as $tableName) {

            $statements[] = 'DB::table("'.$tableName.'")->delete();';
            //DB::table($tableName)->delete();

            // Ottieni i dati dalla tabella
            $records = DB::table($tableName)->get();

            // Ottieni i nomi dei campi della tabella
            $columns = Schema::getColumnListing($tableName);

            // Genera il codice per l'insert massivo
            $insertStatements = [];
            foreach ($records as $record) {
                $row = [];
                foreach ($columns as $column) {
                    $row[$column] = $record->$column;
                }
                $insertStatements[] = $row;
            }

            foreach ($insertStatements as $insertStatement) {
                $statements[] = "DB::table(\"".$tableName."\")->insert(".var_export($insertStatement, true).");";
            }
        }
        $statements[] = "DB::statement('SET FOREIGN_KEY_CHECKS=1');";


        $seeder_dir = database_path()."/seeders/";
        $content = str_replace("__STATEMENTS__", implode("\n",$statements), $this->template);
        file_put_contents($seeder_dir."PermissionTableSeeder.php",$content);

        return self::SUCCESS;
    }

    private function setTemplate(){
        $this->template = '<?php

        namespace Database\Seeders;
        
        use Illuminate\Database\Seeder;
        use Ramsey\Uuid\Uuid;
        use Illuminate\Support\Facades\DB;
        use Master\Modules\AdminModules\Models\AdminModule;
        use Master\Modules\Roles\Models\Permission;
        use Master\Modules\Roles\Models\Role;

        class PermissionTableSeeder extends Seeder {
        
            /**
             * Auto generated seed file
             *
             * @return void
             */
            public function run() {
                __STATEMENTS__                
            }
        }';
    }
}
