<?php

namespace App\Console\Commands\Utility;


use Illuminate\Support\Str;
use Master\Foundation\Modules\Commands\Command;



class DispatchJob extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'job:dispatch {job}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Dispatch job';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $class = '\\App\\Jobs\\' . Str::replace("/","\\",$this->argument('job'));
        dispatch(new $class());
        return self::SUCCESS;
    }
}

