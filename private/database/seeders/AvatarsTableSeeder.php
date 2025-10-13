<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AvatarsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('avatars')->delete();
        
        \DB::table('avatars')->insert(array (
            0 => 
            array (
                'id' => '0444a1e9-0ff4-4d33-92da-4f9cfe67bc71',
                'progId' => 1000,
                'draft' => 0,
                'name' => '1',
                'created_at' => '2025-08-29 09:06:27',
                'updated_at' => '2025-08-29 09:06:47',
                'deleted_at' => NULL,
                'created_by' => 'c2777a10-999e-42f2-bce8-4100579834f3',
                'updated_by' => 'c2777a10-999e-42f2-bce8-4100579834f3',
                'deleted_by' => NULL,
            ),
            1 => 
            array (
                'id' => '1b76a7b3-f5ca-4f12-b291-82bd1884b37c',
                'progId' => 1002,
                'draft' => 0,
                'name' => '3',
                'created_at' => '2025-08-29 09:07:02',
                'updated_at' => '2025-08-29 09:07:08',
                'deleted_at' => NULL,
                'created_by' => 'c2777a10-999e-42f2-bce8-4100579834f3',
                'updated_by' => 'c2777a10-999e-42f2-bce8-4100579834f3',
                'deleted_by' => NULL,
            ),
            2 => 
            array (
                'id' => '530a7c2b-6a68-4434-9bc2-f9f8f65f1778',
                'progId' => 1003,
                'draft' => 0,
                'name' => '4',
                'created_at' => '2025-08-29 09:07:11',
                'updated_at' => '2025-08-29 09:07:17',
                'deleted_at' => NULL,
                'created_by' => 'c2777a10-999e-42f2-bce8-4100579834f3',
                'updated_by' => 'c2777a10-999e-42f2-bce8-4100579834f3',
                'deleted_by' => NULL,
            ),
            3 => 
            array (
                'id' => '67739e85-f168-41bb-a60f-d027e3cf952b',
                'progId' => 1007,
                'draft' => 0,
                'name' => '8',
                'created_at' => '2025-08-29 09:07:50',
                'updated_at' => '2025-08-29 09:07:56',
                'deleted_at' => NULL,
                'created_by' => 'c2777a10-999e-42f2-bce8-4100579834f3',
                'updated_by' => 'c2777a10-999e-42f2-bce8-4100579834f3',
                'deleted_by' => NULL,
            ),
            4 => 
            array (
                'id' => '9bb5b500-62ca-4675-9e76-8fede088adb2',
                'progId' => 1006,
                'draft' => 0,
                'name' => '7',
                'created_at' => '2025-08-29 09:07:42',
                'updated_at' => '2025-08-29 09:07:49',
                'deleted_at' => NULL,
                'created_by' => 'c2777a10-999e-42f2-bce8-4100579834f3',
                'updated_by' => 'c2777a10-999e-42f2-bce8-4100579834f3',
                'deleted_by' => NULL,
            ),
            5 => 
            array (
                'id' => 'a21325dc-c6fd-4cea-b597-4b8a98bbd2fa',
                'progId' => 1004,
                'draft' => 0,
                'name' => '5',
                'created_at' => '2025-08-29 09:07:24',
                'updated_at' => '2025-08-29 09:07:30',
                'deleted_at' => NULL,
                'created_by' => 'c2777a10-999e-42f2-bce8-4100579834f3',
                'updated_by' => 'c2777a10-999e-42f2-bce8-4100579834f3',
                'deleted_by' => NULL,
            ),
            6 => 
            array (
                'id' => 'af43aa4e-4465-4ceb-acc8-3ea65e47ad7e',
                'progId' => 1001,
                'draft' => 0,
                'name' => '2',
                'created_at' => '2025-08-29 09:06:53',
                'updated_at' => '2025-08-29 09:07:00',
                'deleted_at' => NULL,
                'created_by' => 'c2777a10-999e-42f2-bce8-4100579834f3',
                'updated_by' => 'c2777a10-999e-42f2-bce8-4100579834f3',
                'deleted_by' => NULL,
            ),
            7 => 
            array (
                'id' => 'cc3edcfa-d8d9-4346-acff-fec6828d5352',
                'progId' => 1005,
                'draft' => 0,
                'name' => '6',
                'created_at' => '2025-08-29 09:07:32',
                'updated_at' => '2025-08-29 09:07:39',
                'deleted_at' => NULL,
                'created_by' => 'c2777a10-999e-42f2-bce8-4100579834f3',
                'updated_by' => 'c2777a10-999e-42f2-bce8-4100579834f3',
                'deleted_by' => NULL,
            ),
        ));
        
        
    }
}