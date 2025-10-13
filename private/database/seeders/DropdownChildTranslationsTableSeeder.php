<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DropdownChildTranslationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('dropdown_child_translations')->delete();
        
        
        
    }
}