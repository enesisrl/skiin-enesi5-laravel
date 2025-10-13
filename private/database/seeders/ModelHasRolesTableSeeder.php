<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ModelHasRolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('model_has_roles')->delete();
        
        \DB::table('model_has_roles')->insert(array (
            0 => 
            array (
                'role_id' => 'ef6c86e1-b815-4eae-9674-2e9f7c9369d5',
                'model_type' => 'Master\\Modules\\Users\\Models\\User',
                'model_id' => '2bf2738f-07fa-4da4-a83a-d4c0ac44a525',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            1 => 
            array (
                'role_id' => 'ef6c86e1-b815-4eae-9674-2e9f7c9369d5',
                'model_type' => 'Master\\Modules\\Users\\Models\\User',
                'model_id' => '418a6fac-1622-4784-8fcc-d5d3e3d85beb',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            2 => 
            array (
                'role_id' => 'ef6c86e1-b815-4eae-9674-2e9f7c9369d5',
                'model_type' => 'Master\\Modules\\Users\\Models\\User',
                'model_id' => '6376a913-517a-4437-b06c-ad5764cf6710',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            3 => 
            array (
                'role_id' => 'ef6c86e1-b815-4eae-9674-2e9f7c9369d5',
                'model_type' => 'Master\\Modules\\Users\\Models\\User',
                'model_id' => '6af86eef-c64c-4347-89e8-83c8338b172a',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            4 => 
            array (
                'role_id' => 'f3b119cb-08b1-4fca-a214-5111567029f9',
                'model_type' => 'Master\\Modules\\Users\\Models\\User',
                'model_id' => 'c2777a10-999e-42f2-bce8-4100579834f3',
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