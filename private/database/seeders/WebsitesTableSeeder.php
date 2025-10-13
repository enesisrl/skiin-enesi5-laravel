<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class WebsitesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('websites')->delete();
        
        \DB::table('websites')->insert(array (
            0 => 
            array (
                'id' => 'e0fbeeb2-a913-4785-91bb-97d0037df035',
                'theme_id' => 'eaa6fa08-3087-4d3f-a203-f2da29223fb4',
                'published' => 1,
                'description' => 'MyCampo - CMS',
                'domains' => '[{"value":"cdf.test"},{"value":"campodeifiori.enesi8.it"},{"value":"my.campodeifiori.cc"}]',
                'lang_front_default' => '1c2c193c-47dc-4ed8-9f4d-c731d8d67ee9',
                'lang_admin_default' => '9c273bfa-7488-4b08-b2b2-0655c0f8623c',
                'ene_api_key' => '3beb5f807a803786b4ce23b850248b4d',
                'ene_api_sek' => '3beb5f807a803786b4ce23b850248b4d.d07dfe10f2f8456dcfe4d7aa48358f82d0b10ded7fd23e758c37570d40da663d4431afdc',
                'epp_policy_id' => '10317',
                'google_analytics_id' => NULL,
                'google_api_key' => NULL,
                'company_name' => 'Consorzio degli Operatori del Centro Commerciale Campo dei Fiori',
                'phone' => '+390332730887',
                'fax' => '+390332744472',
                'mobile' => NULL,
                'whatsapp' => NULL,
                'email' => 'info.campodeifiori@cbre.com',
                'pec' => NULL,
                'vat_id' => NULL,
                'fiscal_code' => NULL,
                'cciaa' => NULL,
                'rea' => NULL,
                'share_capital' => NULL,
                'fully_paid' => NULL,
                'social_facebook' => 'https://www.facebook.com/centrocampodeifiori/',
                'social_instagram' => 'https://www.instagram.com/campodeifiorigavirate/',
                'social_linkedin' => NULL,
                'social_twitter' => NULL,
                'social_youtube' => NULL,
                'social_tripadvisor' => NULL,
                'social_snapchat' => NULL,
                'social_tumblr' => NULL,
                'social_pinterest' => NULL,
                'social_disqus' => NULL,
                'social_dailymotion' => NULL,
                'email_destination' => '[{"value":"info@enesi.it"}]',
                'smtp_auth_id' => '01990e36-071c-7102-8a7f-8fcad3f0e6e5',
                'shop_hours' => '<p><strong>Negozi</strong><br> Lunedì-Domenica: dalle 9.00 alle 21.00 </p><p><strong>Ipermercato Carrefour</strong><br> Lunedì-Domenica: dalle 8.00 alle 21.00 </p><p><strong>Ristorazione 5° Piano</strong><br> Lunedì-Domenica: 11.30-15.00 e 18.00-22.00 </p><p><strong>Negozi</strong><br> Lunedì-Domenica: dalle 9.00 alle 21.00 </p><p><strong>Ipermercato Carrefour</strong><br> Lunedì-Domenica: dalle 8.00 alle 21.00 </p><p><strong>Ristorazione 5° Piano</strong><br> Lunedì-Domenica: 11.30-15.00 e 18.00-22.00 </p><p><strong>Negozi</strong><br> Lunedì-Domenica: dalle 9.00 alle 21.00 </p><p><strong>Ipermercato Carrefour</strong><br> Lunedì-Domenica: dalle 8.00 alle 21.00 </p><p><strong>Ristorazione 5° Piano</strong><br> Lunedì-Domenica: 11.30-15.00 e 18.00-22.00 </p>',
                'fidelity_text' => '<h1>La nuova Fidelity Card digitale sta arrivando!</h1><p> Questa sezione sarà disponibile a partire da gennaio 2026 e ti permetterà di gestire comodamente la tua nuova fidelity card direttamente dall’app. </p><p> Ti ricordiamo che puoi continuare ad accumulare punti sulla tua attuale fidelity card fino al 31 dicembre 2025. </p><p> Rimani aggiornato tramite il sito ufficiale, le comunicazioni sull’app e all’interno del centro commerciale. </p>',
                'created_at' => '2020-12-31 13:22:33',
                'updated_at' => '2025-09-03 06:14:16',
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => 'c2777a10-999e-42f2-bce8-4100579834f3',
                'deleted_by' => NULL,
            ),
        ));
        
        
    }
}