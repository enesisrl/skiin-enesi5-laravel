<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OtpsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('otps')->delete();
        
        \DB::table('otps')->insert(array (
            0 => 
            array (
                'id' => '01999b30-4764-732e-98ef-f252f727ea38',
                'model_type' => 'Master\\Modules\\Users\\Models\\User',
                'model_id' => '2bf2738f-07fa-4da4-a83a-d4c0ac44a525',
                'token' => '552119',
                'validity' => 15,
                'valid' => 0,
                'created_at' => '2025-09-30 17:14:16',
                'updated_at' => '2025-09-30 17:14:42',
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            1 => 
            array (
                'id' => '01999b30-cc1b-7324-a23a-c5059addfd68',
                'model_type' => 'Master\\Modules\\Users\\Models\\User',
                'model_id' => '2bf2738f-07fa-4da4-a83a-d4c0ac44a525',
                'token' => '590235',
                'validity' => 15,
                'valid' => 0,
                'created_at' => '2025-09-30 17:14:50',
                'updated_at' => '2025-09-30 17:15:11',
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            2 => 
            array (
                'id' => '01999b32-fa29-7381-b28c-9c7a3e68aa64',
                'model_type' => 'Master\\Modules\\Users\\Models\\User',
                'model_id' => '2bf2738f-07fa-4da4-a83a-d4c0ac44a525',
                'token' => '167317',
                'validity' => 15,
                'valid' => 0,
                'created_at' => '2025-09-30 17:17:13',
                'updated_at' => '2025-09-30 17:17:25',
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            3 => 
            array (
                'id' => '01999b36-41b4-70fb-af85-51bf5597db05',
                'model_type' => 'Master\\Modules\\Users\\Models\\User',
                'model_id' => '2bf2738f-07fa-4da4-a83a-d4c0ac44a525',
                'token' => '439748',
                'validity' => 15,
                'valid' => 0,
                'created_at' => '2025-09-30 17:20:48',
                'updated_at' => '2025-09-30 17:20:59',
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            4 => 
            array (
                'id' => '01999b36-aa36-7252-acaa-c999ff263e15',
                'model_type' => 'Master\\Modules\\Users\\Models\\User',
                'model_id' => '2bf2738f-07fa-4da4-a83a-d4c0ac44a525',
                'token' => '754834',
                'validity' => 15,
                'valid' => 0,
                'created_at' => '2025-09-30 17:21:15',
                'updated_at' => '2025-09-30 17:21:27',
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
        ));
        
        
    }
}