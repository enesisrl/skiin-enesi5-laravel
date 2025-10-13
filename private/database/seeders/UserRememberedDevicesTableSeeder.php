<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserRememberedDevicesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('user_remembered_devices')->delete();
        
        \DB::table('user_remembered_devices')->insert(array (
            0 => 
            array (
                'id' => '01999b33-2b0b-721a-b98c-fcd8f330fbff',
                'user_id' => '2bf2738f-07fa-4da4-a83a-d4c0ac44a525',
                'device_fingerprint' => 'bd601a56461a32418e82cb6f250802d8c57069dcd3d4964c79bcd6029798ccb7',
                'device_name' => 'Chrome su 127.0.0.1',
                'expires_at' => '2025-10-15 17:21:27',
                'last_used_at' => '2025-09-30 17:21:27',
                'created_at' => '2025-09-30 17:17:25',
                'updated_at' => '2025-09-30 17:21:27',
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
        ));
        
        
    }
}