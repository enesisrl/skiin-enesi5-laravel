<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RegioneTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('regione')->delete();
        
        \DB::table('regione')->insert(array (
            0 => 
            array (
                'id' => '036fc02e-72fb-4446-9b1f-350371048b1b',
                'progId' => 1,
                'description' => 'ESTERO',
                'meta_rewurl' => 'estero',
                'created_at' => '2020-12-18 17:00:41',
                'updated_at' => '2020-12-18 17:00:41',
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            1 => 
            array (
                'id' => '0b719923-5a95-49c3-a628-df72eb82c0f3',
                'progId' => 2,
                'description' => 'Liguria',
                'meta_rewurl' => 'liguria',
                'created_at' => '2020-12-18 17:00:41',
                'updated_at' => '2020-12-18 17:00:41',
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            2 => 
            array (
                'id' => '28de1cf6-2dcb-4ba0-8b29-738b08c81b14',
                'progId' => 3,
                'description' => 'Piemonte',
                'meta_rewurl' => 'piemonte',
                'created_at' => '2020-12-18 17:00:41',
                'updated_at' => '2020-12-18 17:00:41',
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            3 => 
            array (
                'id' => '38705ceb-da5a-4f27-bcf4-4bb2b3b3c68e',
                'progId' => 4,
                'description' => 'Veneto',
                'meta_rewurl' => 'veneto',
                'created_at' => '2020-12-18 17:00:41',
                'updated_at' => '2020-12-18 17:00:41',
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            4 => 
            array (
                'id' => '3dff19bd-4216-4ff1-b766-dd0cd63fea70',
                'progId' => 5,
                'description' => 'Abruzzo',
                'meta_rewurl' => 'abruzzo',
                'created_at' => '2020-12-18 16:59:14',
                'updated_at' => '2020-12-18 16:59:14',
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            5 => 
            array (
                'id' => '4a76f033-bb95-4b49-925d-2dde7ade6016',
                'progId' => 6,
                'description' => 'Sicilia',
                'meta_rewurl' => 'sicilia',
                'created_at' => '2020-12-18 17:00:41',
                'updated_at' => '2020-12-18 17:00:41',
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            6 => 
            array (
                'id' => '60d0d107-bf1d-4585-92c3-4f364db949f3',
                'progId' => 7,
                'description' => 'Calabria',
                'meta_rewurl' => 'calabria',
                'created_at' => '2020-12-18 17:00:41',
                'updated_at' => '2020-12-18 17:00:41',
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            7 => 
            array (
                'id' => '61412bef-8f8a-4d91-91c3-b0ff8f99c9a3',
                'progId' => 8,
                'description' => 'Marche',
                'meta_rewurl' => 'marche',
                'created_at' => '2020-12-18 17:00:41',
                'updated_at' => '2020-12-18 17:00:41',
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            8 => 
            array (
                'id' => '643436b8-1601-49b5-89f6-383a114d996a',
                'progId' => 9,
                'description' => 'Friuli-Venezia Giulia',
                'meta_rewurl' => 'friuli-venezia-giulia',
                'created_at' => '2020-12-18 17:00:41',
                'updated_at' => '2020-12-18 17:00:41',
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            9 => 
            array (
                'id' => '8e991667-6fce-4095-bcf0-2688a21302e7',
                'progId' => 10,
                'description' => 'Trentino-Alto Adige',
                'meta_rewurl' => 'trentino-alto-adige',
                'created_at' => '2020-12-18 17:00:41',
                'updated_at' => '2020-12-18 17:00:41',
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            10 => 
            array (
                'id' => '95edabb2-244f-4eb1-a3fc-e1dfaaa9f4d4',
                'progId' => 11,
                'description' => 'Campania',
                'meta_rewurl' => 'campania',
                'created_at' => '2020-12-18 17:00:41',
                'updated_at' => '2020-12-18 17:00:41',
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            11 => 
            array (
                'id' => '981d6260-f6e6-4872-9bc7-cd63164082df',
                'progId' => 12,
                'description' => 'Emilia-Romagna',
                'meta_rewurl' => 'emilia-romagna',
                'created_at' => '2020-12-18 17:00:41',
                'updated_at' => '2020-12-18 17:00:41',
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            12 => 
            array (
                'id' => 'a081a364-2ba5-470d-937c-c650406236f8',
                'progId' => 13,
                'description' => 'Basilicata',
                'meta_rewurl' => 'basilicata',
                'created_at' => '2020-12-18 17:00:41',
                'updated_at' => '2020-12-18 17:00:41',
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            13 => 
            array (
                'id' => 'a6c101fa-0620-4936-ad5b-53515b113612',
                'progId' => 14,
                'description' => 'Molise',
                'meta_rewurl' => 'molise',
                'created_at' => '2020-12-18 17:00:41',
                'updated_at' => '2020-12-18 17:00:41',
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            14 => 
            array (
                'id' => 'acf96486-75fc-4e42-abd9-14c87f6d0192',
                'progId' => 15,
                'description' => 'Puglia',
                'meta_rewurl' => 'puglia',
                'created_at' => '2020-12-18 17:00:41',
                'updated_at' => '2020-12-18 17:00:41',
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            15 => 
            array (
                'id' => 'ad5a79f4-1085-4f1d-9333-38c1ab7ca458',
                'progId' => 16,
                'description' => 'Umbria',
                'meta_rewurl' => 'umbria',
                'created_at' => '2020-12-18 17:00:41',
                'updated_at' => '2020-12-18 17:00:41',
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            16 => 
            array (
                'id' => 'b604e2d2-1cde-47b8-b889-b385e8ff0889',
                'progId' => 17,
                'description' => 'Sardegna',
                'meta_rewurl' => 'sardegna',
                'created_at' => '2020-12-18 17:00:41',
                'updated_at' => '2020-12-18 17:00:41',
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            17 => 
            array (
                'id' => 'd0c568c6-4452-4852-9a56-1a868dfff0ab',
                'progId' => 18,
                'description' => 'Valle d\'Aosta',
                'meta_rewurl' => 'valle-daosta',
                'created_at' => '2020-12-18 17:00:41',
                'updated_at' => '2020-12-18 17:00:41',
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            18 => 
            array (
                'id' => 'dd707fab-f673-41da-b9dd-722213a7da3b',
                'progId' => 19,
                'description' => 'Toscana',
                'meta_rewurl' => 'toscana',
                'created_at' => '2020-12-18 17:00:41',
                'updated_at' => '2020-12-18 17:00:41',
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            19 => 
            array (
                'id' => 'ecdc5999-7727-40f4-9994-faafbaf479fa',
                'progId' => 20,
                'description' => 'Lazio',
                'meta_rewurl' => 'lazio',
                'created_at' => '2020-12-18 17:00:41',
                'updated_at' => '2020-12-18 17:00:41',
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            20 => 
            array (
                'id' => 'fd3f7323-060b-49cb-8c1a-74ee6793225f',
                'progId' => 21,
                'description' => 'Lombardia',
                'meta_rewurl' => 'lombardia',
                'created_at' => '2020-12-18 17:00:41',
                'updated_at' => '2020-12-18 17:00:41',
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
        ));
        
        
    }
}