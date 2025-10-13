<?php

namespace App\Console\Commands\Utility;

use Master\Foundation\Modules\Commands\Command;
use Master\Modules\AppUsers\Models\AppUser;
use Master\Modules\PushNotifications\Models\PushNotificationDevice;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

class SistemaPushNotificationDevices extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'utility:sistema-push-notification-devices';

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
        foreach (PushNotificationDevice::all() as $device){
            $appUser = AppUser::find($device->app_user_id);
            if (!$appUser){
                $this->info("Elimino device id ".$device->progId." per app_user_id ".$device->app_user_id);
                $device->delete();
            }else{
                $device->model_type = AppUser::class;
                $device->model_id = $appUser->id;
            }
            $device->save();
        }

        return 0;
    }
}
