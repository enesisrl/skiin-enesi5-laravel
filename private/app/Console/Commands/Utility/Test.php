<?php

namespace App\Console\Commands\Utility;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use Master\Foundation\GDPR;
use Master\Foundation\Modules\Commands\Command;
use Master\Modules\Acceptances\Models\Acceptance;
use Master\Modules\ResourcesLang\Models\ResourceLang;
use Master\Modules\Statistics\Facades\Statistics;
use Master\Modules\Websites\Facades\Websites;
use Master\Modules\Websites\Models\Website;

class Test extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'utility:test';

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
        $data = Statistics::getCategoriesForSelect();
        dd($data);
        return 0;
    }
}
