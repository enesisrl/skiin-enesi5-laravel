<?php

namespace App\Console\Commands\Utility;

use Master\Foundation\Modules\Commands\Command;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

class RimuoviMacFiles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'utility:remove-mac-files';

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
        echo public_path()."\n";
        foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator(public_path())) as $filename){
            $f = substr($filename, strrpos($filename,"/") + 1);
            if (!is_dir($filename)){

                $pathinfo = pathinfo($filename);
                //print_r($pathinfo);
                if (isset($pathinfo["extension"])) {
                    if (substr($f, 0, 2) == "._" || $pathinfo["extension"] == "DS_Store") {
                        unlink($filename);
                        echo $filename."\n";
                    }
                }
            }
        }

        return 0;
    }
}
