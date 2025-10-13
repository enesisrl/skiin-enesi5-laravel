<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserLoginsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('user_logins')->delete();
        
        \DB::table('user_logins')->insert(array (
            0 => 
            array (
                'user_id' => '2bf2738f-07fa-4da4-a83a-d4c0ac44a525',
                'website_id' => 'e0fbeeb2-a913-4785-91bb-97d0037df035',
                'role_id' => 'ef6c86e1-b815-4eae-9674-2e9f7c9369d5',
                'language_id' => '1c2c193c-47dc-4ed8-9f4d-c731d8d67ee9',
                'last_login_at' => '2025-09-30 17:21:27',
                'last_logout_at' => '2025-09-30 17:21:45',
                'created_at' => '2025-09-30 17:12:12',
                'updated_at' => '2025-09-30 17:21:45',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'user_id' => '6376a913-517a-4437-b06c-ad5764cf6710',
                'website_id' => 'e0fbeeb2-a913-4785-91bb-97d0037df035',
                'role_id' => 'ef6c86e1-b815-4eae-9674-2e9f7c9369d5',
                'language_id' => '1c2c193c-47dc-4ed8-9f4d-c731d8d67ee9',
                'last_login_at' => '2025-09-15 14:08:36',
                'last_logout_at' => NULL,
                'created_at' => '2025-09-03 07:05:54',
                'updated_at' => '2025-09-15 14:08:36',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'user_id' => 'c2777a10-999e-42f2-bce8-4100579834f3',
                'website_id' => 'e0fbeeb2-a913-4785-91bb-97d0037df035',
                'role_id' => 'f3b119cb-08b1-4fca-a214-5111567029f9',
                'language_id' => '1c2c193c-47dc-4ed8-9f4d-c731d8d67ee9',
                'last_login_at' => '2025-09-30 17:21:50',
                'last_logout_at' => '2025-09-30 17:12:08',
                'created_at' => '2021-01-25 09:53:54',
                'updated_at' => '2025-09-30 17:21:50',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}