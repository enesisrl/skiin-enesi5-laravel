<?php

namespace App\Console\Commands\Account;

use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Master\Foundation\Modules\Commands\Command;
use Master\Modules\AppUsers\Models\AppUser;
use Master\Modules\Websites\Facades\Websites;

class AccountExpired extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'accounts:expired';

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

        $endDate = Carbon::now()->subDays(8)->startOfDay()->toDateTimeString();

        $langs = ['it'];
        foreach ($langs as $lang){
            App::setLocale($lang);
            $appUsers = AppUser::where('lang',App::getLocale())->whereNull('date_joined')->where('created_at','<',$endDate)->get();
            foreach($appUsers as $appUser){
                $appUser->saveExpiredNotification();
                sleep(1);
                $appUser->delete();
                sleep(1);
            }
        }





        return self::SUCCESS;
    }
}
