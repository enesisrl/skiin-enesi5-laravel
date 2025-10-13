<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 'ef6c86e1-b815-4eae-9674-2e9f7c9369d5',
                'name' => 'Amministratore',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            1 => 
            array (
                'id' => 'f3b119cb-08b1-4fca-a214-5111567029f9',
                'name' => 'Super-Admin',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
        ));
        
        
    }
}