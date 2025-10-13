<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserWebsitesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('user_websites')->delete();
        
        \DB::table('user_websites')->insert(array (
            0 => 
            array (
                'id' => '01990e65-4bdd-71c4-94af-f0672ba7ed05',
                'user_id' => '6376a913-517a-4437-b06c-ad5764cf6710',
                'website_id' => 'e0fbeeb2-a913-4785-91bb-97d0037df035',
                'language_id' => '9c273bfa-7488-4b08-b2b2-0655c0f8623c',
                'role_id' => 'ef6c86e1-b815-4eae-9674-2e9f7c9369d5',
                'created_at' => '2025-09-03 07:05:43',
                'updated_at' => '2025-09-03 07:05:43',
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            1 => 
            array (
                'id' => '01999b2e-382d-718b-b85a-f12e81451821',
                'user_id' => '2bf2738f-07fa-4da4-a83a-d4c0ac44a525',
                'website_id' => 'e0fbeeb2-a913-4785-91bb-97d0037df035',
                'language_id' => '9c273bfa-7488-4b08-b2b2-0655c0f8623c',
                'role_id' => 'ef6c86e1-b815-4eae-9674-2e9f7c9369d5',
                'created_at' => '2025-09-30 17:12:01',
                'updated_at' => '2025-09-30 17:12:01',
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            2 => 
            array (
                'id' => '8578c839-c433-4520-8133-f89fb5d16c15',
                'user_id' => 'c2777a10-999e-42f2-bce8-4100579834f3',
                'website_id' => 'e0fbeeb2-a913-4785-91bb-97d0037df035',
                'language_id' => '1c2c193c-47dc-4ed8-9f4d-c731d8d67ee9',
                'role_id' => 'f3b119cb-08b1-4fca-a214-5111567029f9',
                'created_at' => '2021-01-11 14:31:36',
                'updated_at' => '2021-01-11 14:31:36',
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
        ));
        
        
    }
}