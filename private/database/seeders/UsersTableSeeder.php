<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => '2bf2738f-07fa-4da4-a83a-d4c0ac44a525',
                'progId' => 1001,
                'status' => 'active',
                'draft' => 0,
                'name' => 'Emanuele',
                'last_name' => 'Toffolon',
                'company_name' => NULL,
                'phone' => NULL,
                'phone2' => NULL,
                'fax' => NULL,
                'url' => NULL,
                'vat_id' => NULL,
                'fiscal_code' => NULL,
                'email' => 'emanuele@enesi.it',
                'email_verified_at' => NULL,
                'username' => 'emanuele',
                'password' => '$2y$10$fIwmqxlxc5kE9mkWgaUNs.cr1Rm8ZV7do.a/fYB2cd37832BjW6pK',
                'remember_token' => NULL,
                'two_factor_enabled' => 1,
                'two_factor_skipped' => 0,
                'memo' => NULL,
                'date_joined' => NULL,
                'created_at' => '2025-09-30 17:11:36',
                'updated_at' => '2025-09-30 17:20:59',
                'deleted_at' => NULL,
                'created_by' => 'c2777a10-999e-42f2-bce8-4100579834f3',
                'updated_by' => '2bf2738f-07fa-4da4-a83a-d4c0ac44a525',
                'deleted_by' => NULL,
                'banned_at' => NULL,
                'login_failed_counter' => 0,
            ),
            1 => 
            array (
                'id' => '6376a913-517a-4437-b06c-ad5764cf6710',
                'progId' => NULL,
                'status' => 'active',
                'draft' => 0,
                'name' => 'Massimiliano',
                'last_name' => 'Boggio',
                'company_name' => 'Fattore Digital Studio',
                'phone' => NULL,
                'phone2' => NULL,
                'fax' => NULL,
                'url' => NULL,
                'vat_id' => NULL,
                'fiscal_code' => NULL,
                'email' => 'massimiliano.boggio@fattoredigitalstudio.com',
                'email_verified_at' => NULL,
                'username' => 'massimiliano.boggio',
                'password' => '$2y$10$AyCZs3a/d8qrreGrfrHs/uf08xWG6jxhHXsuG/gGMJtALf2U48jeO',
                'remember_token' => NULL,
                'two_factor_enabled' => 0,
                'two_factor_skipped' => 0,
                'memo' => NULL,
                'date_joined' => NULL,
                'created_at' => '2025-09-03 07:03:34',
                'updated_at' => '2025-09-03 07:05:24',
                'deleted_at' => NULL,
                'created_by' => 'c2777a10-999e-42f2-bce8-4100579834f3',
                'updated_by' => 'c2777a10-999e-42f2-bce8-4100579834f3',
                'deleted_by' => NULL,
                'banned_at' => NULL,
                'login_failed_counter' => 0,
            ),
            2 => 
            array (
                'id' => 'c2777a10-999e-42f2-bce8-4100579834f3',
                'progId' => 1000,
                'status' => 'active',
                'draft' => 0,
                'name' => 'Super Admin',
                'last_name' => 'Enesi',
                'company_name' => NULL,
                'phone' => '014275866',
                'phone2' => NULL,
                'fax' => NULL,
                'url' => NULL,
                'vat_id' => NULL,
                'fiscal_code' => NULL,
                'email' => 'info@enesi.it',
                'email_verified_at' => NULL,
                'username' => 'info@enesi.it',
                'password' => '$2y$10$eim2gJQCJSlq8XSuaI7mUe1wCTM/WqKWvSAYCqslDr/xPuhMKApui',
                'remember_token' => '4dKUoWVGIND2qhqtQv5WG2LajVd3EOYSIT9LZu8dO4fAMWum5eeB1J7Uw82j',
                'two_factor_enabled' => 0,
                'two_factor_skipped' => 1,
                'memo' => NULL,
                'date_joined' => NULL,
                'created_at' => '2020-12-19 06:07:28',
                'updated_at' => '2025-09-30 17:11:28',
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => 'c2777a10-999e-42f2-bce8-4100579834f3',
                'deleted_by' => NULL,
                'banned_at' => NULL,
                'login_failed_counter' => 0,
            ),
        ));
        
        
    }
}