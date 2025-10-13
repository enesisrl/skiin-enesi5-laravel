<?php

namespace App\Console\Commands\CronJobs;

use Carbon\Carbon;
use Master\Foundation\Modules\Commands\Command;
use Master\Facades\Tool;
use Master\Modules\Notifications\Facades\Notifications;
use Master\Modules\Notifications\Models\Notification;
use Master\Modules\Websites\Facades\Websites;

class BatchNotifications extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cron:batch-notifications';

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
     * @throws \Exception
     */
    public function handle()
    {

        Websites::setCurrentWebsite($this->website_id, $this->website_domain);
        Notifications::sendNotifications();
        return 0;
    }
}