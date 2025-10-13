<?php

namespace App\Console\Commands\Backup;

use App\Jobs\Utilities\BackupClean;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Bus;
use Master\Foundation\Modules\Commands\Command;
use Master\Modules\AppUsers\Models\AppUser;
use Master\Modules\Websites\Facades\Websites;

class BackupDB extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'backup:db';

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

        Websites::setCurrentWebsite($this->website_id, $this->website_domain);

        Bus::chain([
            new BackupClean(),
            new \App\Jobs\Utilities\BackupDB()
        ])->dispatch();

        return self::SUCCESS;
    }
}
