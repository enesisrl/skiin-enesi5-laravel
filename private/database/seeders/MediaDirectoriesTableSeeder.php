<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MediaDirectoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('media_directories')->delete();
        
        \DB::table('media_directories')->insert(array (
            0 => 
            array (
                'id' => '0195669b-9169-728a-9840-5a5ba993fb7c',
                'parent_id' => NULL,
                'description' => 'Root',
                'created_at' => '2025-03-05 14:00:26',
                'updated_at' => '2025-03-05 14:00:26',
                'deleted_at' => NULL,
                'created_by' => 'c2777a10-999e-42f2-bce8-4100579834f3',
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
        ));
        
        
    }
}