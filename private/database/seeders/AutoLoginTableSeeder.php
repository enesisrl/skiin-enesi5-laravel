<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AutoLoginTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('auto_login')->delete();
        
        \DB::table('auto_login')->insert(array (
            0 => 
            array (
                'id' => '0195952d-be53-7123-bc87-1ef199512513',
                'user_id' => 'c2777a10-999e-42f2-bce8-4100579834f3',
                'token' => 'bcb7bfa65b52a107541d868f9cd52c36',
                'valid_until' => '2125-08-02 08:17:03',
                'created_at' => '2025-03-14 15:02:37',
                'updated_at' => '2025-08-26 08:17:03',
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            1 => 
            array (
                'id' => '01990e63-5556-73a5-8fd9-59ff9f9a8eef',
                'user_id' => '6376a913-517a-4437-b06c-ad5764cf6710',
                'token' => '00409525b825364d0c9d7c69c73e9051',
                'valid_until' => '2125-08-10 07:05:44',
                'created_at' => '2025-09-03 07:03:34',
                'updated_at' => '2025-09-03 07:05:44',
                'deleted_at' => NULL,
                'created_by' => 'c2777a10-999e-42f2-bce8-4100579834f3',
                'updated_by' => 'c2777a10-999e-42f2-bce8-4100579834f3',
                'deleted_by' => NULL,
            ),
            2 => 
            array (
                'id' => '01999b2d-d51f-728e-9610-8b26345c505a',
                'user_id' => '2bf2738f-07fa-4da4-a83a-d4c0ac44a525',
                'token' => 'd09e9bb8ad371907e227928fbdbfb668',
                'valid_until' => '2125-09-06 17:12:05',
                'created_at' => '2025-09-30 17:11:36',
                'updated_at' => '2025-09-30 17:12:05',
                'deleted_at' => NULL,
                'created_by' => 'c2777a10-999e-42f2-bce8-4100579834f3',
                'updated_by' => 'c2777a10-999e-42f2-bce8-4100579834f3',
                'deleted_by' => NULL,
            ),
        ));
        
        
    }
}