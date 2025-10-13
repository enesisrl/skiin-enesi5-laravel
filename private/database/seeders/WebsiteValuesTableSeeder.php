<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class WebsiteValuesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('website_values')->delete();
        
        \DB::table('website_values')->insert(array (
            0 => 
            array (
                'id' => '01994dc1-d0db-70c4-a2f8-4472e8c1aac7',
                'website_id' => 'e0fbeeb2-a913-4785-91bb-97d0037df035',
                'field_name' => 'languages_admin',
                'field_value' => '9c273bfa-7488-4b08-b2b2-0655c0f8623c',
                'created_at' => '2025-09-15 14:22:51',
                'updated_at' => '2025-09-15 14:22:51',
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            1 => 
            array (
                'id' => '01994dc1-d0e3-7040-bce0-9e395a41cd8a',
                'website_id' => 'e0fbeeb2-a913-4785-91bb-97d0037df035',
                'field_name' => 'languages_front',
                'field_value' => '1c2c193c-47dc-4ed8-9f4d-c731d8d67ee9',
                'created_at' => '2025-09-15 14:22:51',
                'updated_at' => '2025-09-15 14:22:51',
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            2 => 
            array (
                'id' => '01994dc1-d0e7-7113-bf3e-cdf8c514b428',
                'website_id' => 'e0fbeeb2-a913-4785-91bb-97d0037df035',
                'field_name' => 'languages_front_enabled',
                'field_value' => '1c2c193c-47dc-4ed8-9f4d-c731d8d67ee9',
                'created_at' => '2025-09-15 14:22:51',
                'updated_at' => '2025-09-15 14:22:51',
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            3 => 
            array (
                'id' => '1f2e0837-cfc1-4a4c-9370-8223a956a760',
                'website_id' => 'c08a63be-5e2e-4034-96ed-4848c554b16d',
                'field_name' => 'languages_front',
                'field_value' => '1c2c193c-47dc-4ed8-9f4d-c731d8d67ee9',
                'created_at' => '2021-01-12 12:26:45',
                'updated_at' => '2021-01-12 12:26:45',
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            4 => 
            array (
                'id' => '2dc733fb-f194-46f0-991c-73ea6c9be4f6',
                'website_id' => 'c08a63be-5e2e-4034-96ed-4848c554b16d',
                'field_name' => 'languages_admin',
                'field_value' => '9c273bfa-7488-4b08-b2b2-0655c0f8623c',
                'created_at' => '2021-01-12 12:26:44',
                'updated_at' => '2021-01-12 12:26:44',
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            5 => 
            array (
                'id' => 'b90e459a-41c4-4664-a2c2-a522f3ffee6b',
                'website_id' => 'c08a63be-5e2e-4034-96ed-4848c554b16d',
                'field_name' => 'languages_admin',
                'field_value' => '8c95b9d5-d707-4bcd-ab1e-afcdff51a560',
                'created_at' => '2021-01-12 12:26:44',
                'updated_at' => '2021-01-12 12:26:44',
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            6 => 
            array (
                'id' => 'e57d3235-0afb-4b05-b740-95e6ea39ec9a',
                'website_id' => 'c08a63be-5e2e-4034-96ed-4848c554b16d',
                'field_name' => 'languages_front',
                'field_value' => '3c051abf-e40c-4a9d-a67f-49a9502286e3',
                'created_at' => '2021-01-12 12:26:44',
                'updated_at' => '2021-01-12 12:26:44',
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
        ));
        
        
    }
}