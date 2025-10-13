<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ToponymsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('toponyms')->delete();
        
        \DB::table('toponyms')->insert(array (
            0 => 
            array (
                'id' => '019566a8-dd4a-7033-a842-8fcc0b25b73f',
                'progId' => 1000,
                'website_id' => 'e0fbeeb2-a913-4785-91bb-97d0037df035',
                'draft' => 0,
                'created_at' => '2025-03-05 14:14:57',
                'updated_at' => '2025-03-05 14:14:57',
                'deleted_at' => NULL,
                'created_by' => 'c2777a10-999e-42f2-bce8-4100579834f3',
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            1 => 
            array (
                'id' => '0195a45c-3e2c-72d3-afb0-468bec0f1274',
                'progId' => 1001,
                'website_id' => 'e0fbeeb2-a913-4785-91bb-97d0037df035',
                'draft' => 0,
                'created_at' => '2025-03-17 13:47:43',
                'updated_at' => '2025-09-03 07:10:54',
                'deleted_at' => '2025-09-03 07:10:54',
                'created_by' => 'c2777a10-999e-42f2-bce8-4100579834f3',
                'updated_by' => '6376a913-517a-4437-b06c-ad5764cf6710',
                'deleted_by' => '6376a913-517a-4437-b06c-ad5764cf6710',
            ),
            2 => 
            array (
                'id' => '01977e1d-3933-7172-8a5f-e78365b36bf1',
                'progId' => 1002,
                'website_id' => 'e0fbeeb2-a913-4785-91bb-97d0037df035',
                'draft' => 0,
                'created_at' => '2025-06-17 13:38:53',
                'updated_at' => '2025-06-17 13:38:53',
                'deleted_at' => NULL,
                'created_by' => 'c2777a10-999e-42f2-bce8-4100579834f3',
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            3 => 
            array (
                'id' => '0199047d-ad14-701d-9481-ff67786ece26',
                'progId' => 1003,
                'website_id' => 'e0fbeeb2-a913-4785-91bb-97d0037df035',
                'draft' => 0,
                'created_at' => '2025-09-01 08:56:09',
                'updated_at' => '2025-09-01 08:56:09',
                'deleted_at' => NULL,
                'created_by' => 'c2777a10-999e-42f2-bce8-4100579834f3',
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
        ));
        
        
    }
}