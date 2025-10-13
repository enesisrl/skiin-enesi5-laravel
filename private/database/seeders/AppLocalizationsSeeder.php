<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\DB;
use Master\Modules\AppLocalizations\Models\AppLocalization;

class AppLocalizationsSeeder extends Seeder {

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run() {
           DB::table("app_localizations")->delete();

        $this->insertLang('common', 'cancel', unserialize(base64_decode('YToxOntzOjI6Iml0IjtzOjg6IkNhbmNlbGxhIjt9')));
        $this->insertLang('common', 'cancel_account_confirm', unserialize(base64_decode('YToxOntzOjI6Iml0IjtzOjE4OiJBY2NvdW50IGNhbmNlbGxhdG8iO30=')));
        $this->insertLang('common', 'cancel_account_text', unserialize(base64_decode('YToxOntzOjI6Iml0IjtzOjk0OiJBdHRlbnppb25lLCBzdGFpIHBlciBlZmZldHR1YXJlIGxhIGNhbmNlbGxhemlvbmUgZGVsIHR1byBhY2NvdW50LiBM4oCZYXppb25lIMOoIGlycmV2ZXJzaWJpbGUuIjt9')));
        $this->insertLang('common', 'contact_profile_prefix', unserialize(base64_decode('YToxOntzOjI6Iml0IjtzOjk6Ikdlc3Rpb25lOiI7fQ==')));
        $this->insertLang('common', 'create_account', unserialize(base64_decode('YToxOntzOjI6Iml0IjtzOjQ6IkNyZWEiO30=')));
        $this->insertLang('common', 'login', unserialize(base64_decode('YToxOntzOjI6Iml0IjtzOjY6IkFjY2VkaSI7fQ==')));
        $this->insertLang('common', 'next', unserialize(base64_decode('YToxOntzOjI6Iml0IjtzOjY6IkF2YW50aSI7fQ==')));
        $this->insertLang('common', 'notice_on_offline', unserialize(base64_decode('YToxOntzOjI6Iml0IjtzOjM4OiJFJyBuZWNlc3NhcmlhIHVuYSBjb25uZXNzaW9uZSBpbnRlcm5ldCI7fQ==')));
        $this->insertLang('common', 'otherwise_login_with', unserialize(base64_decode('YToxOntzOjI6Iml0IjtzOjE3OiJPcHB1cmUgYWNjZWRpIGNvbiI7fQ==')));
        $this->insertLang('common', 'save', unserialize(base64_decode('YToxOntzOjI6Iml0IjtzOjU6IlNhbHZhIjt9')));
        $this->insertLang('contacts', 'facebook_label', unserialize(base64_decode('YToxOntzOjI6Iml0IjtzOjE5OiJjZW50cm9jYW1wb2RlaWZpb3JpIjt9')));
        $this->insertLang('contacts', 'instagram_label', unserialize(base64_decode('YToxOntzOjI6Iml0IjtzOjIxOiJjYW1wb2RlaWZpb3JpZ2F2aXJhdGUiO30=')));
        $this->insertLang('dialog', 'cancel', unserialize(base64_decode('YToxOntzOjI6Iml0IjtzOjc6IkFubnVsbGEiO30=')));
        $this->insertLang('dialog', 'confirm', unserialize(base64_decode('YToxOntzOjI6Iml0IjtzOjg6IkNvbmZlcm1hIjt9')));
        $this->insertLang('dialog', 'proceed', unserialize(base64_decode('YToxOntzOjI6Iml0IjtzOjc6IlByb2NlZGkiO30=')));
        $this->insertLang('error', 'check_email_confirmation', unserialize(base64_decode('YToxOntzOjI6Iml0IjtzOjM2OiJMZSBlLW1haWwgaW5zZXJpdGUgbm9uIGNvcnJpc3BvbmRvbm8iO30=')));
        $this->insertLang('error', 'check_email_format', unserialize(base64_decode('YToxOntzOjI6Iml0IjtzOjMxOiJDb250cm9sbGEgaWwgZm9ybWF0byBkZWxsJ2VtYWlsIjt9')));
        $this->insertLang('error', 'insert_email', unserialize(base64_decode('YToxOntzOjI6Iml0IjtzOjIzOiJJbnNlcmlzY2kgbGEgdHVhIGUtbWFpbCI7fQ==')));
        $this->insertLang('error', 'insert_password', unserialize(base64_decode('YToxOntzOjI6Iml0IjtzOjMyOiJJbnNlcmlzY2kgbGEgcGFzc3dvcmQgZGVzaWRlcmF0YSI7fQ==')));
        $this->insertLang('error', 'insert_password_confirm', unserialize(base64_decode('YToxOntzOjI6Iml0IjtzOjQ1OiJJbnNlcmlzY2kgbnVvdmFtZW50ZSBsYSBwYXNzd29yZCBwZXIgY29uZmVybWEiO30=')));
        $this->insertLang('error', 'insert_phone_number', unserialize(base64_decode('YToxOntzOjI6Iml0IjtzOjM1OiJJbnNlcmlzY2kgaWwgdHVvIG51bWVybyBkaSB0ZWxlZm9ubyI7fQ==')));
        $this->insertLang('error', 'insert_your_first_name', unserialize(base64_decode('YToxOntzOjI6Iml0IjtzOjIxOiJJbnNlcmlzY2kgaWwgdHVvIG5vbWUiO30=')));
        $this->insertLang('error', 'insert_your_last_name', unserialize(base64_decode('YToxOntzOjI6Iml0IjtzOjI0OiJJbnNlcmlzY2kgaWwgdHVvIGNvZ25vbWUiO30=')));
        $this->insertLang('error', 'password_must_contain_at_least_8_characters', unserialize(base64_decode('YToxOntzOjI6Iml0IjtzOjQ1OiJMYSBwYXNzd29yZCBkZXZlIGNvbnRlbmVyZSBhbG1lbm8gOCBjYXJhdHRlcmkiO30=')));
        $this->insertLang('error', 'password_must_contain_at_least_one_lowercase_letter', unserialize(base64_decode('YToxOntzOjI6Iml0IjtzOjU1OiJMYSBwYXNzd29yZCBkZXZlIGNvbnRlbmVyZSBhbG1lbm8gdW5hIGxldHRlcmEgbWludXNjb2xhIjt9')));
        $this->insertLang('error', 'password_must_contain_at_least_one_number_digit', unserialize(base64_decode('YToxOntzOjI6Iml0IjtzOjQzOiJMYSBwYXNzd29yZCBkZXZlIGNvbnRlbmVyZSBhbG1lbm8gdW4gbnVtZXJvIjt9')));
        $this->insertLang('error', 'password_must_contain_at_least_one_uppercase_letter', unserialize(base64_decode('YToxOntzOjI6Iml0IjtzOjU1OiJMYSBwYXNzd29yZCBkZXZlIGNvbnRlbmVyZSBhbG1lbm8gdW5hIGxldHRlcmEgbWFpdXNjb2xhIjt9')));
        $this->insertLang('error', 'wrong_password_confirm', unserialize(base64_decode('YToxOntzOjI6Iml0IjtzOjI2OiJMZSBwYXNzd29yZCBub24gY29pbmNpZG9ubyI7fQ==')));
        $this->insertLang('features', 'contacts', unserialize(base64_decode('YToxOntzOjI6Iml0IjtzOjg6IkNvbnRhdHRpIjt9')));
        $this->insertLang('features', 'events', unserialize(base64_decode('YToxOntzOjI6Iml0IjtzOjY6IkV2ZW50aSI7fQ==')));
        $this->insertLang('features', 'hours', unserialize(base64_decode('YToxOntzOjI6Iml0IjtzOjU6Ik9yYXJpIjt9')));
        $this->insertLang('features', 'promotions', unserialize(base64_decode('YToxOntzOjI6Iml0IjtzOjEwOiJQcm9tb3ppb25pIjt9')));
        $this->insertLang('features', 'services', unserialize(base64_decode('YToxOntzOjI6Iml0IjtzOjc6IlNlcnZpemkiO30=')));
        $this->insertLang('features', 'shop_list', unserialize(base64_decode('YToxOntzOjI6Iml0IjtzOjEzOiJFbGVuY28gbmVnb3ppIjt9')));
        $this->insertLang('form', 'edit_mail_external_login', unserialize(base64_decode('YToxOntzOjI6Iml0IjtzOjE0NjoiQVRURU5aSU9ORSEgVGkgc2VpIHJlZ2lzdHJhdG8gdHJhbWl0ZSBzZXJ2aXppbyBlc3Rlcm5vLCBtb2RpZmljYW5kbyBsJ2UtbWFpbCBub24gcG90cmFpIHBpw7kgdXNhcmUgcXVlbCBzZXJ2aXppbyBlIGRvdnJhaSBzcGVjaWZpY2FyZSB1bmEgcGFzc3dvcmQiO30=')));
        $this->insertLang('form', 'edit_profile_field', unserialize(base64_decode('YToxOntzOjI6Iml0IjtzOjE1OiJNb2RpZmljYSA6ZmllbGQiO30=')));
        $this->insertLang('form', 'email', unserialize(base64_decode('YToxOntzOjI6Iml0IjtzOjY6IkUtbWFpbCI7fQ==')));
        $this->insertLang('form', 'email_confirm', unserialize(base64_decode('YToxOntzOjI6Iml0IjtzOjE5OiJSZS1pbnNlcmlzY2kgZS1tYWlsIjt9')));
        $this->insertLang('form', 'email_password', unserialize(base64_decode('YToxOntzOjI6Iml0IjtzOjE3OiJlLW1haWwgZSBwYXNzd29yZCI7fQ==')));
        $this->insertLang('form', 'first_name', unserialize(base64_decode('YToxOntzOjI6Iml0IjtzOjQ6Ik5vbWUiO30=')));
        $this->insertLang('form', 'fullname', unserialize(base64_decode('YToxOntzOjI6Iml0IjtzOjE0OiJub25lIGUgY29nbm9tZSI7fQ==')));
        $this->insertLang('form', 'last_name', unserialize(base64_decode('YToxOntzOjI6Iml0IjtzOjc6IkNvZ25vbWUiO30=')));
        $this->insertLang('form', 'new_password', unserialize(base64_decode('YToxOntzOjI6Iml0IjtzOjE0OiJOdW92YSBwYXNzd29yZCI7fQ==')));
        $this->insertLang('form', 'password', unserialize(base64_decode('YToxOntzOjI6Iml0IjtzOjg6IlBhc3N3b3JkIjt9')));
        $this->insertLang('form', 'password_confirm', unserialize(base64_decode('YToxOntzOjI6Iml0IjtzOjE3OiJDb25mZXJtYSBwYXNzd29yZCI7fQ==')));
        $this->insertLang('form', 'phone_number', unserialize(base64_decode('YToxOntzOjI6Iml0IjtzOjE4OiJOdW1lcm8gZGkgdGVsZWZvbm8iO30=')));
        $this->insertLang('form', 'username', unserialize(base64_decode('YToxOntzOjI6Iml0IjtzOjQ6IlVzZXIiO30=')));
        $this->insertLang('home', 'our_hours', unserialize(base64_decode('YToxOntzOjI6Iml0IjtzOjE0OiJJIE5PU1RSSSBPUkFSSSI7fQ==')));
        $this->insertLang('home', 'our_shops', unserialize(base64_decode('YToxOntzOjI6Iml0IjtzOjE1OiJJIE5PU1RSSSBORUdPWkkiO30=')));
        $this->insertLang('login', 'create_an_account', unserialize(base64_decode('YToxOntzOjI6Iml0IjtzOjY6IkNyZWFsbyI7fQ==')));
        $this->insertLang('login', 'forgot_password', unserialize(base64_decode('YToxOntzOjI6Iml0IjtzOjI4OiJIYWkgZGltZW50aWNhdG8gbGEgcGFzc3dvcmQ/Ijt9')));
        $this->insertLang('login', 'not_have_an_account', unserialize(base64_decode('YToxOntzOjI6Iml0IjtzOjE5OiJOb24gaGFpIHVuIGFjY291bnQ/Ijt9')));
        $this->insertLang('login', 'subtitle', unserialize(base64_decode('YToxOntzOjI6Iml0IjtzOjI4OiJJbnNlcmlzY2kgbGUgdHVlIGNyZWRlbnppYWxpIjt9')));
        $this->insertLang('login', 'title', unserialize(base64_decode('YToxOntzOjI6Iml0IjtzOjU6IkNpYW8hIjt9')));
        $this->insertLang('message', 'password_changed', unserialize(base64_decode('YToxOntzOjI6Iml0IjtzOjQ1OiJMYSBwYXNzd29yZCDDqCBzdGF0YSBjb3JyZXR0YW1lbnRlIG1vZGlmaWNhdGEiO30=')));
        $this->insertLang('privacy', 'error_consent_required', unserialize(base64_decode('YToxOntzOjI6Iml0IjtzOjc0OiJQZXIgZmF2b3JlIGFjY29uc2VudGkgYWwgdHJhdHRhbWVudG8gYXV0b21hdGl6emF0byBkZWkgdHVvaSBkYXRpIHBlcnNvbmFsaSI7fQ==')));
        $this->insertLang('privacy', 'text_consent_optional', unserialize(base64_decode('YToxOntzOjI6Iml0IjtzOjE4NDoiQWNjb25zZW50byBhbCB0cmF0dGFtZW50byBkZWkgbWllaSBkYXRpIHBlcnNvbmFsIHBlciBsYSBmaW5hbGl0w6AgZGkgbWFya2V0aW5nIGVkIGluIHBhcnRpY29sYXJlIHJpY2V2ZXJlIGluZm9ybWF6aW9uaSBzdSBldmVudGksIG9mZmVydGUsIGF0dGl2aXTDoCBwcm9tb3ppb25hbGkgZGEgcGFydGUgZGVsIFRpdG9sYXJlLiI7fQ==')));
        $this->insertLang('privacy', 'text_consent_required', unserialize(base64_decode('YToxOntzOjI6Iml0IjtzOjEyMzoiRGljaGlhcm8gZGkgYXZlciBsZXR0byBlIGNvbXByZXNvIGwnaW5mb3JtYXRpdmEgY2hlIHJlZ29sYSBpbCB0cmF0dGFtZW50byBkZWkgZGF0aSBwZXJzb25hbGkgc29wcmEgaW5kaWNhdGEgW09iYmxpZ2F0b3Jpb10uIjt9')));
        $this->insertLang('profile', 'fidelity', unserialize(base64_decode('YToxOntzOjI6Iml0IjtzOjEzOiJGaWRlbGl0eSBjYXJkIjt9')));
        $this->insertLang('profile', 'quiz', unserialize(base64_decode('YToxOntzOjI6Iml0IjtzOjIwOiJRdWl6IGRlbGxhIHNldHRpbWFuYSI7fQ==')));
        $this->insertLang('profile', 'settings', unserialize(base64_decode('YToxOntzOjI6Iml0IjtzOjI1OiJJbXBvc3RhemlvbmkgPGJyPiBwcm9maWxvIjt9')));
        $this->insertLang('publications', 'all_events', unserialize(base64_decode('YToxOntzOjI6Iml0IjtzOjE2OiJUdXR0aSBnbGkgZXZlbnRpIjt9')));
        $this->insertLang('publications', 'all_promotions', unserialize(base64_decode('YToxOntzOjI6Iml0IjtzOjE5OiJUdXR0ZSBsZSBwcm9tb3ppb25pIjt9')));
        $this->insertLang('publications', 'events', unserialize(base64_decode('YToxOntzOjI6Iml0IjtzOjY6IkV2ZW50aSI7fQ==')));
        $this->insertLang('publications', 'promotions', unserialize(base64_decode('YToxOntzOjI6Iml0IjtzOjEwOiJQcm9tb3ppb25pIjt9')));
        $this->insertLang('pwd_recovery', 'subtitle', unserialize(base64_decode('YToxOntzOjI6Iml0IjtzOjczOiJJbnNlcmlzY2kgbGEgdHVhIGVtYWlsIGUgdGkgaW52aWVyZW1vIHVuYSBlbWFpbCBjb24gbGEgdHVhIG51b3ZhIHBhc3N3b3JkIjt9')));
        $this->insertLang('pwd_recovery', 'title', unserialize(base64_decode('YToxOntzOjI6Iml0IjtzOjE3OiJSZWN1cGVybyBwYXNzd29yZCI7fQ==')));
        $this->insertLang('register', 'privacy_info', unserialize(base64_decode('YToxOntzOjI6Iml0IjtzOjI1OiJJbmZvcm1hdGl2YSBzdWxsYSBwcml2YWN5Ijt9')));
        $this->insertLang('register', 'subtitle', unserialize(base64_decode('YToxOntzOjI6Iml0IjtzOjIxOiJJbnNlcmlzY2kgaSB0dW9pIGRhdGkiO30=')));
        $this->insertLang('register', 'terms_and_conditions', unserialize(base64_decode('YToxOntzOjI6Iml0IjtzOjMyOiJUZXJtaW5pIGUgY29uZGl6aW9uaSBkaSBzZXJ2aXppbyI7fQ==')));
        $this->insertLang('register', 'title', unserialize(base64_decode('YToxOntzOjI6Iml0IjtzOjEyOiJDcmVhIGFjY291bnQiO30=')));
        $this->insertLang('services', 'services', unserialize(base64_decode('YToxOntzOjI6Iml0IjtzOjc6IlNlcnZpemkiO30=')));
        $this->insertLang('settings', 'label_change_password', unserialize(base64_decode('YToxOntzOjI6Iml0IjtzOjE1OiJDYW1iaWEgcGFzc3dvcmQiO30=')));
        $this->insertLang('settings', 'label_delete_account', unserialize(base64_decode('YToxOntzOjI6Iml0IjtzOjE2OiJDYW5jZWxsYSBBY2NvdW50Ijt9')));
        $this->insertLang('settings', 'label_logout', unserialize(base64_decode('YToxOntzOjI6Iml0IjtzOjc6IkxPRyBPVVQiO30=')));
        $this->insertLang('settings', 'label_personal_data', unserialize(base64_decode('YToxOntzOjI6Iml0IjtzOjEwOiJBbmFncmFmaWNhIjt9')));
        $this->insertLang('settings', 'title', unserialize(base64_decode('YToxOntzOjI6Iml0IjtzOjIwOiJJbXBvc3RhemlvbmkgcHJvZmlsbyI7fQ==')));
        $this->insertLang('shops', 'all_shops', unserialize(base64_decode('YToxOntzOjI6Iml0IjtzOjE0OiJUdXR0aSBpIG5lZ296aSI7fQ==')));
        $this->insertLang('shops', 'facebook_label', unserialize(base64_decode('YToxOntzOjI6Iml0IjtzOjg6IkZhY2Vib29rIjt9')));
        $this->insertLang('shops', 'instagram_label', unserialize(base64_decode('YToxOntzOjI6Iml0IjtzOjk6Ikluc3RhZ3JhbSI7fQ==')));

        $model = new AppLocalization();
        $model->generateLanguageFiles();
    }

    protected function insertLang($section, $label, $values) {

        $app_localization_id = Uuid::uuid4()->toString();

        DB::table('app_localizations')->insert([[
            'id' => $app_localization_id,
            'section' => $section,
            'label' => $label
        ]]);

        foreach($values as $lang => $value){
            DB::table('app_localization_translations')->insert([[
                'id' => Uuid::uuid4()->toString(),
                'app_localization_id' => $app_localization_id,
                'lang' => $lang,
                'value' => $value
            ]]);
        }

    }
}
