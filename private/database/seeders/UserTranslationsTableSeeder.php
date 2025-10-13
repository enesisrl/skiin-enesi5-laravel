<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserTranslationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('user_translations')->delete();
        
        
        
    }
}