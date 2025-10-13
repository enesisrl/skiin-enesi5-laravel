<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminModulesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admin_modules')->delete();
        
        \DB::table('admin_modules')->insert(array (
            0 => 
            array (
                'id' => '0195b284-babf-71c3-adee-f4e681f8bd7b',
                'website_id' => 'e0fbeeb2-a913-4785-91bb-97d0037df035',
                'description' => 'Notifications',
                'created_at' => '2025-03-20 07:46:37',
                'updated_at' => '2025-03-20 07:46:37',
                'deleted_at' => NULL,
                'created_by' => 'c2777a10-999e-42f2-bce8-4100579834f3',
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            1 => 
            array (
                'id' => '0195b284-f076-71ef-8b2d-7b77aa63b741',
                'website_id' => 'e0fbeeb2-a913-4785-91bb-97d0037df035',
                'description' => 'SmtpAuths',
                'created_at' => '2025-03-20 07:46:51',
                'updated_at' => '2025-03-20 07:48:09',
                'deleted_at' => NULL,
                'created_by' => 'c2777a10-999e-42f2-bce8-4100579834f3',
                'updated_by' => 'c2777a10-999e-42f2-bce8-4100579834f3',
                'deleted_by' => NULL,
            ),
            2 => 
            array (
                'id' => '01990e66-68a5-7387-97e6-49178274962c',
                'website_id' => 'e0fbeeb2-a913-4785-91bb-97d0037df035',
                'description' => 'Shops',
                'created_at' => '2025-09-03 07:06:56',
                'updated_at' => '2025-09-03 07:06:56',
                'deleted_at' => NULL,
                'created_by' => 'c2777a10-999e-42f2-bce8-4100579834f3',
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            3 => 
            array (
                'id' => '01990e66-bea6-7030-b0e3-971ac375e55e',
                'website_id' => 'e0fbeeb2-a913-4785-91bb-97d0037df035',
                'description' => 'Publications',
                'created_at' => '2025-09-03 07:07:18',
                'updated_at' => '2025-09-03 07:07:18',
                'deleted_at' => NULL,
                'created_by' => 'c2777a10-999e-42f2-bce8-4100579834f3',
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            4 => 
            array (
                'id' => '01990e66-f538-73d8-945d-406a2414ea46',
                'website_id' => 'e0fbeeb2-a913-4785-91bb-97d0037df035',
                'description' => 'CdfServices',
                'created_at' => '2025-09-03 07:07:32',
                'updated_at' => '2025-09-03 07:07:32',
                'deleted_at' => NULL,
                'created_by' => 'c2777a10-999e-42f2-bce8-4100579834f3',
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            5 => 
            array (
                'id' => '01990e67-17fd-73b8-a4aa-d06ccf497993',
                'website_id' => 'e0fbeeb2-a913-4785-91bb-97d0037df035',
                'description' => 'Avatars',
                'created_at' => '2025-09-03 07:07:41',
                'updated_at' => '2025-09-03 07:07:41',
                'deleted_at' => NULL,
                'created_by' => 'c2777a10-999e-42f2-bce8-4100579834f3',
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            6 => 
            array (
                'id' => '01990e67-40a8-72d8-9905-04413b22a976',
                'website_id' => 'e0fbeeb2-a913-4785-91bb-97d0037df035',
                'description' => 'AppUsers',
                'created_at' => '2025-09-03 07:07:51',
                'updated_at' => '2025-09-03 07:07:51',
                'deleted_at' => NULL,
                'created_by' => 'c2777a10-999e-42f2-bce8-4100579834f3',
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            7 => 
            array (
                'id' => '01990e67-e63b-7213-a66d-343334144598',
                'website_id' => 'e0fbeeb2-a913-4785-91bb-97d0037df035',
                'description' => 'PushNotifications',
                'created_at' => '2025-09-03 07:08:34',
                'updated_at' => '2025-09-03 07:08:34',
                'deleted_at' => NULL,
                'created_by' => 'c2777a10-999e-42f2-bce8-4100579834f3',
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            8 => 
            array (
                'id' => '01990e68-5b6e-72a3-aa17-e0981088d01e',
                'website_id' => 'e0fbeeb2-a913-4785-91bb-97d0037df035',
                'description' => 'AppLocalizations',
                'created_at' => '2025-09-03 07:09:04',
                'updated_at' => '2025-09-03 07:09:04',
                'deleted_at' => NULL,
                'created_by' => 'c2777a10-999e-42f2-bce8-4100579834f3',
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            9 => 
            array (
                'id' => '01990e69-c37c-7169-9b9e-034f02dbefe0',
                'website_id' => 'e0fbeeb2-a913-4785-91bb-97d0037df035',
                'description' => 'Toponyms',
                'created_at' => '2025-09-03 07:10:36',
                'updated_at' => '2025-09-03 07:10:36',
                'deleted_at' => NULL,
                'created_by' => 'c2777a10-999e-42f2-bce8-4100579834f3',
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            10 => 
            array (
                'id' => '01990e69-e870-72be-a3a1-d582818f4120',
                'website_id' => 'e0fbeeb2-a913-4785-91bb-97d0037df035',
                'description' => 'UsStates',
                'created_at' => '2025-09-03 07:10:45',
                'updated_at' => '2025-09-03 07:10:45',
                'deleted_at' => NULL,
                'created_by' => 'c2777a10-999e-42f2-bce8-4100579834f3',
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            11 => 
            array (
                'id' => '0b2a89f7-b905-4004-875e-6e5573b53c3b',
                'website_id' => 'e0fbeeb2-a913-4785-91bb-97d0037df035',
                'description' => 'Comuni',
                'created_at' => '2021-04-28 16:06:30',
                'updated_at' => '2021-04-28 16:06:30',
                'deleted_at' => NULL,
                'created_by' => 'c2777a10-999e-42f2-bce8-4100579834f3',
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            12 => 
            array (
                'id' => '1108e2ac-464a-49a6-888b-e023406af3d8',
                'website_id' => 'e0fbeeb2-a913-4785-91bb-97d0037df035',
                'description' => 'Regioni',
                'created_at' => '2021-04-28 16:08:04',
                'updated_at' => '2021-04-28 16:08:04',
                'deleted_at' => NULL,
                'created_by' => 'c2777a10-999e-42f2-bce8-4100579834f3',
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            13 => 
            array (
                'id' => '2a040a54-8bc6-4e3f-8935-f5843425526b',
                'website_id' => 'e0fbeeb2-a913-4785-91bb-97d0037df035',
                'description' => 'Websites',
                'created_at' => '2021-04-28 16:08:51',
                'updated_at' => '2021-04-28 16:08:51',
                'deleted_at' => NULL,
                'created_by' => 'c2777a10-999e-42f2-bce8-4100579834f3',
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            14 => 
            array (
                'id' => '59c80e76-1899-4ac1-8550-624ed0d5459f',
                'website_id' => 'e0fbeeb2-a913-4785-91bb-97d0037df035',
                'description' => 'Themes',
                'created_at' => '2021-04-28 16:08:34',
                'updated_at' => '2021-04-28 16:08:34',
                'deleted_at' => NULL,
                'created_by' => 'c2777a10-999e-42f2-bce8-4100579834f3',
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            15 => 
            array (
                'id' => '700c8edc-fbac-4312-894c-1d7da13e81c4',
                'website_id' => 'e0fbeeb2-a913-4785-91bb-97d0037df035',
                'description' => 'ResourcesLang',
                'created_at' => '2021-04-28 16:08:12',
                'updated_at' => '2021-04-28 16:08:12',
                'deleted_at' => NULL,
                'created_by' => 'c2777a10-999e-42f2-bce8-4100579834f3',
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            16 => 
            array (
                'id' => '74ffb27f-154a-4722-9abd-89c978c05cc2',
                'website_id' => 'e0fbeeb2-a913-4785-91bb-97d0037df035',
                'description' => 'Languages',
                'created_at' => '2021-04-28 16:07:20',
                'updated_at' => '2021-04-28 16:07:20',
                'deleted_at' => NULL,
                'created_by' => 'c2777a10-999e-42f2-bce8-4100579834f3',
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            17 => 
            array (
                'id' => 'c83c428f-ef80-41f2-a285-63dee96e3f1a',
                'website_id' => 'e0fbeeb2-a913-4785-91bb-97d0037df035',
                'description' => 'Countries',
                'created_at' => '2021-04-28 16:06:39',
                'updated_at' => '2021-04-28 16:06:39',
                'deleted_at' => NULL,
                'created_by' => 'c2777a10-999e-42f2-bce8-4100579834f3',
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            18 => 
            array (
                'id' => 'c92d4a26-55cf-452b-8a97-9daf35f41844',
                'website_id' => 'e0fbeeb2-a913-4785-91bb-97d0037df035',
                'description' => 'MediaLibrary',
                'created_at' => '2021-04-28 16:07:33',
                'updated_at' => '2021-04-28 16:07:33',
                'deleted_at' => NULL,
                'created_by' => 'c2777a10-999e-42f2-bce8-4100579834f3',
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            19 => 
            array (
                'id' => 'ccff10a4-885e-440f-bd64-017cbfbd8737',
                'website_id' => 'e0fbeeb2-a913-4785-91bb-97d0037df035',
                'description' => 'Roles',
                'created_at' => '2021-04-28 16:08:20',
                'updated_at' => '2021-04-28 16:08:20',
                'deleted_at' => NULL,
                'created_by' => 'c2777a10-999e-42f2-bce8-4100579834f3',
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            20 => 
            array (
                'id' => 'd4aaa5dc-b0d9-4e85-9227-8105e555fc90',
                'website_id' => 'e0fbeeb2-a913-4785-91bb-97d0037df035',
                'description' => 'Dashboard',
                'created_at' => '2021-04-28 16:06:46',
                'updated_at' => '2021-04-28 16:06:46',
                'deleted_at' => NULL,
                'created_by' => 'c2777a10-999e-42f2-bce8-4100579834f3',
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            21 => 
            array (
                'id' => 'd8df8bb6-b586-4b2c-9225-abe27b020866',
                'website_id' => 'e0fbeeb2-a913-4785-91bb-97d0037df035',
                'description' => 'Addresses',
                'created_at' => '2021-04-28 16:05:54',
                'updated_at' => '2021-04-28 16:05:54',
                'deleted_at' => NULL,
                'created_by' => 'c2777a10-999e-42f2-bce8-4100579834f3',
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            22 => 
            array (
                'id' => 'deda7245-08bd-4e04-af61-2a46f004ce7f',
                'website_id' => 'e0fbeeb2-a913-4785-91bb-97d0037df035',
                'description' => 'UserWebsites',
                'created_at' => '2021-04-28 16:08:46',
                'updated_at' => '2021-04-28 16:08:46',
                'deleted_at' => NULL,
                'created_by' => 'c2777a10-999e-42f2-bce8-4100579834f3',
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            23 => 
            array (
                'id' => 'ee9729ff-48cb-4df1-9adf-2a1c799cbdbb',
                'website_id' => 'e0fbeeb2-a913-4785-91bb-97d0037df035',
                'description' => 'Province',
                'created_at' => '2021-04-28 16:07:42',
                'updated_at' => '2021-04-28 16:07:42',
                'deleted_at' => NULL,
                'created_by' => 'c2777a10-999e-42f2-bce8-4100579834f3',
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            24 => 
            array (
                'id' => 'f5f00838-7868-4571-9073-58dbe36cbc51',
                'website_id' => 'e0fbeeb2-a913-4785-91bb-97d0037df035',
                'description' => 'Users',
                'created_at' => '2021-04-28 16:08:41',
                'updated_at' => '2021-04-28 16:08:41',
                'deleted_at' => NULL,
                'created_by' => 'c2777a10-999e-42f2-bce8-4100579834f3',
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
        ));
        
        
    }
}