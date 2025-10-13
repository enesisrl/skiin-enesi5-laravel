<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class NotificationContactsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('notification_contacts')->delete();
        
        \DB::table('notification_contacts')->insert(array (
            0 => 
            array (
                'id' => '0195b289-2347-718c-8f80-e81f36cd9f7a',
                'website_id' => 'e0fbeeb2-a913-4785-91bb-97d0037df035',
                'form_data' => '{"tax_id": "test4", "subject": "[BECAUSE BLUE\'S BETTER] Request to become a wholesale distributor", "comments": "test6", "mail_body": "test3", "work_aria": [{"value": "dealer", "description": "Dealer"}, {"value": "retail", "description": "Retail"}, {"value": "online_shop", "description": "Online Shop"}], "user_token": "03AFcWeA6Qyjszisvelywiux2TGgNrpjy8oHiIUV_X6l41Uekq2-p_4E4GTm_pFwEYrfIbgg3yDqksoIIvQ2Ilb3aOej2QHT_H8snLA8hKPrZSpACkiembzwwt2NWCGNUA1xmNIGsgz5Kq6uFQehQRUZsTPPaeRewsuR74kftSZoVfIqN2YJgWzWBP44gqDpDbMBRANZZjwnJxGjOmQ48m_UKlPA91hCbnP38J0TbM6PYT4ZHAah118PLSm79Vp6slgLxZfS0jFSyFFPtUA08FknNdl7EreQQczBrej3mrd_z2txUmp1ByWMjiUWFwB_8KJVANQX5VTr8eS5rKZi_5gN2HRIo82m1jWGf-YC22mmBZBzgUWGfo0cu8DdHAh9wO3J2DQq_-Gs_bTvQchrruCyuIZwc6-22xEygbua2KUmoPwkHqQQqIeZ4lO9ipmlEfrfuQIKXyVP9vcP7aT_Tf6WtrOwehOFrM1oTYmmEfnC5LyWdAn-7hAJgKL-frv1BBrq6Mz2Fqs9FmU1cgHiPRqlD1j8Ek9iSX87tLoA-l-OLNpP7HipgBcYYe2m3jGxcoO19tuN6BuMGLNWq-nikKrB58qLH0_DJqLGAmxSB_7upAdxRD8slg_mtpI41C5Hd7NsJuxWU01bOHOUhUSc9g0W3AdXX7578lmqlWXfIl5hdb3eAGiPR1tdzMf95i7TwZcpinJYfPZvPacZPdS_r6gqEaSzaiRGWX1bkmbjRGdkp67ae1eCLy6NPeya-uzaSOeRqvhU3QYCpfFYHoHeb2m_5BmVm7PVi7iIFKQw9qWmyKpyrp11Rv5wky-BJsaCwVW4lFwpa9KcBs3DAWp7dWp3k-ESaS7_8jPqwdGqHCzM26ylMRT0h7qFThNAJVrVTd_HceWJ--jSmhD9j9baTN5waz6WMBHg39jjdvywAQltl6-rd_OwOBiJoWZ3Dgmnmf8ZCV_EEvQSZgXGTAX_0-1w2hHg-UimqVIWG67nsW4gPal-Ywb0uotkiLJ3EM-v1gDSfyk-iheNuYIoJ-cJ59eTzxNqXrL6ar6SPdrOaofMZxJ1YyNOvS6KnRAhYYfC5GM72zDtpX_MgYF5S4vmb7b5Rau9ky0cv3gAweFqjIWoRHP-VzQfVzVh3RujrcqlHivTHSkj31KrS9Qz5pDstEzSaMKhLADYbzfA2FEYjBrsBcPnKv-uvmEhDa8_M9eHnQH10jsBOXBTng4diZEViieBlvyM7ucb0q_6UWyHM2RiMxZwRENPAt0BHI7xWpCqrF9B4b2MHgrpPLYhUGyh6SSf8k0O0HLzKIB7LuMUVGE3ewJ6O1C7BmFunkII5GqW88vlSqcQZ5fYEYGKHQaMwXexRSiWS3IB0mIc2wu4JQZXobXzJ3mO9TgyPyJHqx-Ls3I12EFu-oGSI4HvES6nsDwOzYXonjDRkBbH2nihoISMj80hFdwWShs868tUy_sio9DYK46H8j-4CNKp2VrmX4j1Fiuc3dLr31tEyg9SmpgmaePCswgBSJ84bZvfZUKEQJzxwrKchNb5Mv7-eaQW-9Zt9evXvVDPGEMQiBospo97m-1AvOKgSoLO7JdO_lZFr-lpk_dPrIN1K2lRnJ2iYF2Z8Sue6cnIqezQSB21iaK9zg_xdDUGM98VOr3Yc5MIOcjwD6QTsAGNe2LaeNbthya9Ns4k2rziiUhFeSaogg9EOxntJVSTmVJRcLtQYzsAISrGOsasFo1plzhoaoA3baTsAlLhGf9Ijy9eifqtq65yx-3rPeLDAahk94cVrONBxgP-b-dgp3TFlG96A4bhIuwsGj7F0zf2QLJYRUM9N8Giq4f8rkR18HIrmWVZ_u-bL4Ax9aByIKdxK8vHmYcmAv0MB90u0zQZZ2CNwEBbQhVwtOwePM_7lTZV7PZQRnoIukOyvGzPRFbzVTdlOB6Ud1vz-mMJJtlWe2gThrNqFwqggimzF_GdaXgLW81E6IrtQUCLSKEuen2XbBnro4bTATjWcz9ZhVWZf_t00GwPEFwPRMIRjHIYr1vmeFo41FU4bu6_m_miYNvb_tQW2LJ2OES6c5Zh-F0s29AQ", "mail_subject": "test2", "business_name": "test1", "email_address": "walter@enesi.it", "business_years": "test5", "epp-consent-10001": "on"}',
                'created_at' => '2025-03-20 07:51:26',
                'updated_at' => '2025-03-20 07:51:26',
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
        ));
        
        
    }
}