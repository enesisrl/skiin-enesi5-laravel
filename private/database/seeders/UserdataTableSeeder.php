<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserdataTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('userdata')->delete();
        
        \DB::table('userdata')->insert(array (
            0 => 
            array (
                'user_id' => 'c2777a10-999e-42f2-bce8-4100579834f3',
                'progId' => 1004,
                'date_joined' => NULL,
                'created_at' => '2021-04-27 12:41:57',
                'updated_at' => '2021-04-29 15:57:33',
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => 'c2777a10-999e-42f2-bce8-4100579834f3',
                'deleted_by' => NULL,
            ),
        ));
        
        
    }
}