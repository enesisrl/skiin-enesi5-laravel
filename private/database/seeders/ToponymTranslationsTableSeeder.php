<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ToponymTranslationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('toponym_translations')->delete();
        
        \DB::table('toponym_translations')->insert(array (
            0 => 
            array (
                'id' => '019566a8-dd50-71b8-9897-1799631bde50',
                'toponym_id' => '019566a8-dd4a-7033-a842-8fcc0b25b73f',
                'lang' => 'it',
                'description' => 'via',
                'created_at' => '2025-03-05 14:14:57',
                'updated_at' => '2025-03-05 14:14:57',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => '0195a45c-3e38-7160-957b-a9e5db32520a',
                'toponym_id' => '0195a45c-3e2c-72d3-afb0-468bec0f1274',
                'lang' => 'en',
                'description' => 'via',
                'created_at' => '2025-03-17 13:47:43',
                'updated_at' => '2025-03-17 13:47:43',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => '01977e1d-3937-7029-ba9e-074bab9f8122',
                'toponym_id' => '01977e1d-3933-7172-8a5f-e78365b36bf1',
                'lang' => 'it',
                'description' => 'Piazza',
                'created_at' => '2025-06-17 13:38:53',
                'updated_at' => '2025-06-17 13:38:53',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => '0199047d-ad1a-7292-9ded-5f021aba7c1a',
                'toponym_id' => '0199047d-ad14-701d-9481-ff67786ece26',
                'lang' => 'it',
                'description' => 'viale',
                'created_at' => '2025-09-01 08:56:09',
                'updated_at' => '2025-09-01 08:56:09',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}