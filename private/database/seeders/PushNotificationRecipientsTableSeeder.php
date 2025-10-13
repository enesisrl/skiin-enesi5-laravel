<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PushNotificationRecipientsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('push_notification_recipients')->delete();
        
        
        
    }
}