<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LanguagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('languages')->delete();
        
        \DB::table('languages')->insert(array (
            0 => 
            array (
                'id' => '01956c48-bac3-716e-85dd-db86d95f7748',
                'type' => 'front',
                'lang' => 'fr',
                'description' => 'Français',
                'iso_code2' => 'fr',
                'iso_code3' => 'fra',
                'locale_code' => 'fr_FR',
                'sequence' => 30,
                'created_at' => '2025-03-06 16:27:40',
                'updated_at' => '2025-03-06 16:27:40',
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            1 => 
            array (
                'id' => '01956c49-11f4-7012-9ae7-93fc9d9ac457',
                'type' => 'front',
                'lang' => 'es',
                'description' => 'Español',
                'iso_code2' => 'es',
                'iso_code3' => 'esp',
                'locale_code' => 'es_ES',
                'sequence' => 40,
                'created_at' => '2025-03-06 16:28:02',
                'updated_at' => '2025-03-06 16:28:02',
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            2 => 
            array (
                'id' => '1c2c193c-47dc-4ed8-9f4d-c731d8d67ee9',
                'type' => 'front',
                'lang' => 'it',
                'description' => 'Italiano',
                'iso_code2' => 'it',
                'iso_code3' => 'ita',
                'locale_code' => 'it_IT',
                'sequence' => 10,
                'created_at' => '2020-12-30 10:47:45',
                'updated_at' => '2020-12-30 10:47:45',
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            3 => 
            array (
                'id' => '3c051abf-e40c-4a9d-a67f-49a9502286e3',
                'type' => 'front',
                'lang' => 'en',
                'description' => 'English',
                'iso_code2' => 'en',
                'iso_code3' => 'eng',
                'locale_code' => 'en_GB',
                'sequence' => 20,
                'created_at' => '2020-12-30 10:47:45',
                'updated_at' => '2020-12-30 10:47:45',
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            4 => 
            array (
                'id' => '8c95b9d5-d707-4bcd-ab1e-afcdff51a560',
                'type' => 'admin',
                'lang' => 'en',
                'description' => 'English',
                'iso_code2' => 'en',
                'iso_code3' => 'eng',
                'locale_code' => 'en_GB',
                'sequence' => 20,
                'created_at' => '2021-01-05 08:34:19',
                'updated_at' => '2021-01-05 08:34:19',
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            5 => 
            array (
                'id' => '9c273bfa-7488-4b08-b2b2-0655c0f8623c',
                'type' => 'admin',
                'lang' => 'it',
                'description' => 'Italiano',
                'iso_code2' => 'it',
                'iso_code3' => 'ita',
                'locale_code' => 'it_IT',
                'sequence' => 10,
                'created_at' => '2020-12-30 10:47:45',
                'updated_at' => '2020-12-30 10:47:45',
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
        ));
        
        
    }
}