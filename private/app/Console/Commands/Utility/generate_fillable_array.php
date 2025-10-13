<?php

namespace App\Console\Commands\Utility;

use Illuminate\Support\Facades\DB;
use Master\Foundation\Modules\Commands\Command;

class generate_fillable_array extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'utility:fillable {table}';

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

        $exclusion_fields = ['id','updated_at','created_at','deleted_at'];

        $table = $this->argument('table');
        $results = DB::select( DB::raw("DESCRIBE ".$table)->getValue(DB::connection()->getQueryGrammar()));

        $response = 'protected $fillable = ['."\n";

        foreach($results as $r){
            if (!in_array($r->Field,$exclusion_fields)) {
                $response .= "'" . $r->Field . "',\n";
            }
        }

        $response .= "];"."\n"."\n";
        echo $response;

        return 0;
    }
}
