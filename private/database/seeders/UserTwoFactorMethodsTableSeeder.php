<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserTwoFactorMethodsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('user_two_factor_methods')->delete();
        
        \DB::table('user_two_factor_methods')->insert(array (
            0 => 
            array (
                'id' => '01999b2e-77cb-71b9-a390-ac38baa5a4c6',
                'user_id' => '2bf2738f-07fa-4da4-a83a-d4c0ac44a525',
                'method' => 'email',
                'is_enabled' => 1,
                'is_primary' => 1,
                'settings' => NULL,
                'verified_at' => '2025-09-30 17:20:59',
                'created_at' => '2025-09-30 17:12:17',
                'updated_at' => '2025-09-30 17:20:59',
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
        ));
        
        
    }
}