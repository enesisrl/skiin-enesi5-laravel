<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SmtpAuthsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('smtp_auths')->delete();
        
        \DB::table('smtp_auths')->insert(array (
            0 => 
            array (
                'id' => '01990e36-071c-7102-8a7f-8fcad3f0e6e5',
                'website_id' => 'e0fbeeb2-a913-4785-91bb-97d0037df035',
                'smtp_from' => 'no-reply@enesi2.it',
                'smtp_from_name' => 'Campo dei fiori TEST',
                'smtp_ssl' => NULL,
                'smtp_username' => '04689fd7877e26',
                'smtp_password' => 'eyJpdiI6InFINW9CKzNBWFA5VWZ1Um9BTVdNZ0E9PSIsInZhbHVlIjoiMXVYM1hNdjVacnN2Z1dMZHBsWnNEdz09IiwibWFjIjoiYzI3MmUwYzhmMjBkNzA3OGRmM2U3NjBkNjQyOWE4YTg0Nzg2ZTk2YmM5NjI3ZGE3ZDYyMTc0MzY3MzAzMjQ5NSIsInRhZyI6IiJ9',
                'smtp_host' => 'smtp.mailtrap.io',
                'smtp_port' => 2525,
                'reply_to' => 'emanuele@enesi.it',
                'created_at' => '2025-09-03 06:14:05',
                'updated_at' => '2025-09-20 08:57:12',
                'deleted_at' => NULL,
                'created_by' => 'c2777a10-999e-42f2-bce8-4100579834f3',
                'updated_by' => 'c2777a10-999e-42f2-bce8-4100579834f3',
                'deleted_by' => NULL,
            ),
        ));
        
        
    }
}