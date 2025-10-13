<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PushNotificationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('push_notifications')->delete();
        
        \DB::table('push_notifications')->insert(array (
            0 => 
            array (
                'id' => '019905d4-4536-7148-a560-ab24d7d3e696',
                'progId' => 1000,
                'website_id' => 'e0fbeeb2-a913-4785-91bb-97d0037df035',
                'status' => 'sent',
                'delayed_date' => NULL,
                'sent_date' => '2025-09-01 15:17:14',
                'created_at' => '2025-09-01 15:10:21',
                'updated_at' => '2025-09-01 15:17:14',
                'deleted_at' => NULL,
                'created_by' => 'c2777a10-999e-42f2-bce8-4100579834f3',
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
        ));
        
        
    }
}