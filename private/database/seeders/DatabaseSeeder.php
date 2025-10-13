<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        $this->call(ComuneTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(CountryTranslationsTableSeeder::class);
        $this->call(LanguagesTableSeeder::class);
        $this->call(ProvinciaTableSeeder::class);
        $this->call(RegioneTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(ThemesTableSeeder::class);
        $this->call(UserLoginsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(UserWebsitesTableSeeder::class);
        $this->call(WebsitesTableSeeder::class);
        $this->call(WebsiteTranslationsTableSeeder::class);
        $this->call(WebsiteValuesTableSeeder::class);
        $this->call(MediaDirectoriesTableSeeder::class);
        $this->call(AddressesTableSeeder::class);
        $this->call(MediaTableSeeder::class);
        $this->call(UserValuesTableSeeder::class);
        $this->call(AdminModulesTableSeeder::class);
        $this->call(ModelHasPermissionsTableSeeder::class);
        $this->call(ModelHasRolesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(RoleHasPermissionsTableSeeder::class);
        $this->call(ActionCodesTableSeeder::class);
        $this->call(AutoLoginTableSeeder::class);
        $this->call(UsStatesTableSeeder::class);
        $this->call(UsStateTranslationsTableSeeder::class);
        $this->call(ToponymsTableSeeder::class);

        $this->call(ResourcesAdminLangTableSeeder::class);
        $this->call(ResourcesLangTableSeeder::class);
        $this->call(CacheLocksTableSeeder::class);
        $this->call(JobBatchesTableSeeder::class);
        $this->call(NotificationsTableSeeder::class);
        $this->call(SmtpAuthsTableSeeder::class);
        $this->call(ToponymTranslationsTableSeeder::class);
        $this->call(UserTranslationsTableSeeder::class);
        $this->call(NotificationContactsTableSeeder::class);
        $this->call(AppUsersTableSeeder::class);
        $this->call(AvatarsTableSeeder::class);
        $this->call(CdfServicesTableSeeder::class);
        $this->call(PublicationsTableSeeder::class);
        $this->call(PushNotificationDevicesTableSeeder::class);
        $this->call(PushNotificationTranslationsTableSeeder::class);
        $this->call(PushNotificationValuesTableSeeder::class);
        $this->call(PushNotificationsTableSeeder::class);
        $this->call(ShopsTableSeeder::class);

        $this->call(AppLocalizationsSeeder::class);
        $this->call(OtpsTableSeeder::class);
        $this->call(PushNotificationRecipientsTableSeeder::class);
        $this->call(UserRememberedDevicesTableSeeder::class);
        $this->call(UserTwoFactorMethodsTableSeeder::class);
    }
}
