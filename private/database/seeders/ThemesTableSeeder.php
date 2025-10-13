<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ThemesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('themes')->delete();
        
        \DB::table('themes')->insert(array (
            0 => 
            array (
                'id' => 'eaa6fa08-3087-4d3f-a203-f2da29223fb4',
                'description' => 'Main',
                'folder' => 'Main',
                'thumbnails' => NULL,
                'created_at' => '2021-01-07 12:44:40',
                'updated_at' => '2021-01-07 12:55:50',
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
        ));
        
        
    }
}