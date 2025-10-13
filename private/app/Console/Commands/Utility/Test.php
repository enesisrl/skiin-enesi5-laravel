<?php

namespace App\Console\Commands\Utility;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use Master\Foundation\GDPR;
use Master\Foundation\Modules\Commands\Command;
use Master\Modules\AppUsers\Mail\Registration;
use Master\Modules\AppUsers\Models\AppUser;
use Master\Modules\ResourcesLang\Models\ResourceLang;
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
        $appUser = AppUser::where('username','emanuele@enesi.it')->first();
        $message = new Registration($appUser);
        Mail::to('URjWdiQwnPAAfh@dkimvalidator.com')->send($message);
        /*
        $consentPid = array(config('gdpr.signup_privacy_info'));
        $gdpr = new GDPR();
        $gdpr->auth();
        $consent = $gdpr->getConsent($appUser->consent_privacy_info);
        dd($consent);
        */
        //$appUser->storeGdpr($consentPid);
    }
}
