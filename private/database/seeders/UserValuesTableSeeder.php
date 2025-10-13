<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserValuesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('user_values')->delete();
        
        
        
    }
}