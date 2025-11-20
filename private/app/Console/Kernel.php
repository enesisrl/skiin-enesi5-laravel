<?php

namespace App\Console;

use App\Jobs\Account\AccountExpired;
use App\Jobs\Account\AccountReminder;
use App\Jobs\Closure\Closure;
use App\Jobs\PushNotifications\PushNotifications;
use App\Jobs\Utilities\TrashedClear;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule): void
    {

        $schedule->command('ban:delete-expired')->withoutOverlapping(120)->everyMinute();
        $schedule->job(TrashedClear::class)->everyOddHour()->withoutOverlapping(120);
        $schedule->command('otp:clean')->withoutOverlapping(120)->daily();

        switch(config('app.env')){
            case 'production':
                $schedule->command('queue:restart')->withoutOverlapping()->hourlyAt(10);
                $schedule->command('backup:db')->withoutOverlapping(120)->dailyAt("00:00");
                $schedule->job(Closure::class)->withoutOverlapping(120)->hourlyAt(15);
                break;
            case 'local':
                break;
        }
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');
    }
}
