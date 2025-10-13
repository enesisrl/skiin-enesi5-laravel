<?php

namespace App\Console\Commands\Utility;

use Master\Foundation\Modules\Commands\Command;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class clean_media_library extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'media:clean';

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
        $medias = Media::all();
        $tot = $medias->count();
        $i = 0;
        foreach($medias as $media){
            $i++;
            echo "Elaborazione ".$i." di ".$tot."\n";

                echo $media->getPath()." ";
                if (!file_exists($media->getPath())) {
                    echo " - file non esistente: " . $media->getPath();
                    $media->delete();
                }
                echo "\n";


        }
        return 0;
    }
}
