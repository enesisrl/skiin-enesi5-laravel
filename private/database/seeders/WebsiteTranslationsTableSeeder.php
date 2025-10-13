<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class WebsiteTranslationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('website_translations')->delete();
        
        \DB::table('website_translations')->insert(array (
            0 => 
            array (
                'id' => '01957f9b-486f-73b2-a917-4199b65ac83b',
                'website_id' => 'e0fbeeb2-a913-4785-91bb-97d0037df035',
                'lang' => 'fr',
                'meta_title' => NULL,
                'meta_description' => NULL,
                'created_at' => '2025-03-10 10:30:37',
                'updated_at' => '2025-09-15 14:22:51',
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            1 => 
            array (
                'id' => '01957f9b-4879-7124-a7e5-86414af5a82f',
                'website_id' => 'e0fbeeb2-a913-4785-91bb-97d0037df035',
                'lang' => 'es',
                'meta_title' => NULL,
                'meta_description' => NULL,
                'created_at' => '2025-03-10 10:30:37',
                'updated_at' => '2025-09-15 14:22:51',
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            2 => 
            array (
                'id' => '1c105f63-27cc-4244-ba11-7ae733a86a6e',
                'website_id' => 'c08a63be-5e2e-4034-96ed-4848c554b16d',
                'lang' => 'en',
                'meta_title' => NULL,
                'meta_description' => NULL,
                'created_at' => '2021-01-12 12:26:44',
                'updated_at' => '2021-01-12 12:26:44',
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            3 => 
            array (
                'id' => '1c5b3a19-ff2a-43a8-a457-10fac8018606',
                'website_id' => 'e0fbeeb2-a913-4785-91bb-97d0037df035',
                'lang' => 'it',
                'meta_title' => NULL,
                'meta_description' => NULL,
                'created_at' => '2020-12-31 13:22:33',
                'updated_at' => '2025-09-15 14:22:51',
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            4 => 
            array (
                'id' => '36eb9ce7-fd31-4ccd-8b36-d3e6b17c895b',
                'website_id' => 'e0fbeeb2-a913-4785-91bb-97d0037df035',
                'lang' => 'en',
                'meta_title' => NULL,
                'meta_description' => NULL,
                'created_at' => '2021-01-04 10:50:15',
                'updated_at' => '2025-09-15 14:22:51',
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            5 => 
            array (
                'id' => 'f1e4cac4-3854-48d5-90be-b39491989036',
                'website_id' => 'c08a63be-5e2e-4034-96ed-4848c554b16d',
                'lang' => 'it',
                'meta_title' => NULL,
                'meta_description' => NULL,
                'created_at' => '2021-01-12 12:26:44',
                'updated_at' => '2021-01-12 12:26:44',
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
        ));
        
        
    }
}