<?php

namespace App\Providers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\ServiceProvider;
use Master\Modules\SmtpAuths\Models\SmtpAuth;
use Master\Modules\Websites\Facades\Websites;

class DynamicMailProvider extends ServiceProvider
{
    public function boot()
    {
        Websites::autoload();
        $smtp_auth_id = Websites::current('smtp_auth_id');
        if ($smtp_auth_id){
            // Recupera le credenziali SMTP dal database
            $smtp = SmtpAuth::find($smtp_auth_id);

            if ($smtp) {
                // Configura dinamicamente il mailer con le credenziali dal database
                Config::set('mail.mailers.smtp', [
                    'transport'  => 'smtp',
                    'host'       => $smtp->smtp_host,
                    'port'       => $smtp->smtp_port,
                    'username'   => $smtp->smtp_username,
                    'password'   => Crypt::decryptString($smtp->smtp_password),
                    'from'       => [
                        'address' => $smtp->smtp_from,
                        'name'    => $smtp->smtp_from_name,
                    ],
                ]);
            }
        }



    }

    public function register()
    {
        //
    }
}
