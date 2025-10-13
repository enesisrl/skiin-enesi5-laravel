<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DropdownTranslationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('dropdown_translations')->delete();
        
        
        
    }
}