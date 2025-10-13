<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PushNotificationTranslationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('push_notification_translations')->delete();
        
        \DB::table('push_notification_translations')->insert(array (
            0 => 
            array (
                'id' => '019905d4-4546-7049-b9bc-16f905e47313',
                'push_notification_id' => '019905d4-4536-7148-a560-ab24d7d3e696',
                'lang' => 'it',
                'description' => 'Test invio notifica push',
                'created_at' => '2025-09-01 15:10:21',
                'updated_at' => '2025-09-01 15:10:21',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}