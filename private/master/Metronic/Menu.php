<?php

namespace Master\Metronic;

use Master\Modules\AdminModules\Facades\AdminModules;
use Master\Modules\AppLocalizations\Facades\AppLocalizations;
use Master\Modules\AppUserProfiles\Facades\AppUserProfiles;
use Master\Modules\AppUsers\Facades\AppUsers;
use Master\Modules\Avatars\Facades\Avatars;
use Master\Modules\CdfServices\Facades\CdfServices;
use Master\Modules\Dashboard\Facades\Dashboard;
use Master\Modules\MediaLibrary\Facades\MediaLibrary;
use Master\Modules\Notifications\Facades\Notifications;
use Master\Modules\SmtpAuths\Facades\SmtpAuths;
use Master\Modules\Toponyms\Facades\Toponyms;
use Master\Modules\Users\Facades\Users;
use Master\Modules\Countries\Facades\Countries;
use Master\Modules\Province\Facades\Province;
use Master\Modules\Comuni\Facades\Comuni;
use Master\Modules\Regioni\Facades\Regioni;
use Master\Modules\Roles\Facades\Roles;
use Master\Modules\UsStates\Facades\UsStates;
use Master\Modules\Websites\Facades\Websites;
use Master\Modules\Themes\Facades\Themes;
use Master\Modules\Languages\Facades\Languages;
use Master\Modules\Publications\Facades\Publications;
use Master\Modules\PushNotifications\Facades\PushNotifications;
// use Master\Modules\PushNotifications\Facades\PushNotifications;
use Master\Modules\ResourcesLang\Facades\ResourcesLang;
use Master\Modules\Shops\Facades\Shops;

class Menu extends \Enesisrl\LaravelMasterCore\Metronic\Menu
{
    public static function loadMenuItems(): array
    {


        $items = [];

        if (Dashboard::can("read")){
            $items[] = [
                'title' => Dashboard::adminLang('title'),
                'icon' => '<span class="svg-icon menu-icon"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><polygon points="0 0 24 0 24 24 0 24"/><path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" fill="#000000" fill-rule="nonzero"/><path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" fill="#000000" opacity="0.3"/></g></svg></span>',
                'page' => Dashboard::adminRoute('index')
            ];
        }

        if (MediaLibrary::can("read")){
            $items[] = [
                'title' => MediaLibrary::adminLang('title'),
                'icon' => '<span class="svg-icon menu-icon"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" fill="#000000"/><rect fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519) " x="16.3255682" y="2.94551858" width="3" height="18" rx="1"/></g></svg></span>',
                'page' => MediaLibrary::adminRoute('index')
            ];
        }

        if (Publications::can("read")) {
            $items[] = ['section' => __('admin::menu.section_contents')];

            if (Shops::can("read")){
                $items[] = [
                    'title' => Shops::adminLang('title'),
                    'icon' => '<span class="svg-icon menu-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" fill-rule="evenodd"><path d="M0 0h24v24H0z"/><path d="M14 9V8a2 2 0 1 0-4 0v1H8V8a4 4 0 1 1 8 0v1zm0 0V8a2 2 0 1 0-4 0v1H8V8a4 4 0 1 1 8 0v1z" fill="#000" fill-rule="nonzero" opacity=".3"/><path d="M6.847 9h10.306a1 1 0 0 1 .986.836l1.473 8.835A2 2 0 0 1 17.639 21H6.361a2 2 0 0 1-1.973-2.329l1.473-8.835A1 1 0 0 1 6.847 9" fill="#000"/></g></svg></span>',
                    'page' => Shops::adminRoute('list')
                ];
            }

            if (Publications::can("read")){
                $items[] = [
                    'title' => Publications::adminLang('title'),
                    'icon' => '<span class="svg-icon menu-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" fill-rule="evenodd"><path d="M0 0h24v24H0z"/><path d="M3.523 14.029a1.8 1.8 0 0 1 0-2.535l8.09-7.953a1.8 1.8 0 0 1 1.26-.516h6.454c.993 0 1.798.805 1.798 1.797v6.436c0 .483-.194.945-.538 1.283l-8.077 7.932a1.8 1.8 0 0 1-2.543 0zM16.93 9.017a1.798 1.798 0 1 0 0-3.596 1.798 1.798 0 0 0 0 3.596" fill="#000" fill-rule="nonzero"/></g></svg></span>',
                    'page' => Publications::adminRoute('list')
                ];
            }

            if (CdfServices::can("read")){
                $items[] = [
                    'title' => CdfServices::adminLang('title'),
                    'icon' => '<span class="svg-icon menu-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" fill-rule="evenodd"><path d="M0 0h24v24H0z"/><path d="m15.95 3.808-2.925 2.925a2 2 0 0 0 0 2.828l1.414 1.414a2 2 0 0 0 2.828 0l2.925-2.925a5.93 5.93 0 0 1-1.517 5.76c-1.83 1.83-4.566 2.206-6.791 1.134l-5.127 5.127a2 2 0 1 1-2.828-2.828l5.127-5.127c-1.072-2.225-.696-4.961 1.133-6.79a5.93 5.93 0 0 1 5.76-1.518" fill="#000"/><path d="m16.657 5.929 1.414 1.414a1 1 0 0 1 0 1.414l-1.38 1.38a1 1 0 0 1-1.414 0l-1.414-1.414a1 1 0 0 1 0-1.414l1.38-1.38a1 1 0 0 1 1.414 0" fill="#000" opacity=".3"/></g></svg></span>',
                    'page' => CdfServices::adminRoute('list')
                ];
            }
            if (Avatars::can("read")){
                $items[] = [
                    'title' => Avatars::adminLang('title'),
                    'icon' => '<span class="svg-icon menu-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" fill-rule="evenodd"><path d="M0 0h24v24H0z"/><circle fill="#000" opacity=".3" cx="12" cy="12" r="10"/><path d="M12 11a2 2 0 1 1 0-4 2 2 0 0 1 0 4m-5 5.5c.216-2.983 2.368-4.5 4.99-4.5 2.66 0 4.846 1.433 5.009 4.5.006.122 0 .5-.418.5H7.404c-.14 0-.415-.338-.404-.5" fill="#000" opacity="1"/></g></svg></span>',
                    'page' => Avatars::adminRoute('list')
                ];
            }
        }

        if (AppUsers::can('read') || Users::can('read')) {
            $items[] = ['section' => __('admin::menu.section_users')];

            if (AppUsers::can('read')) {
                $items[] = [
                    'title' => AppUsers::adminLang('title_confirmed'),
                    'icon' => '<span class="svg-icon menu-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" fill-rule="evenodd"><path d="M0 0h24v24H0z"/><path d="M12 11a4 4 0 1 1 0-8 4 4 0 0 1 0 8" fill="#000" fill-rule="nonzero" opacity=".3"/><path d="M3 20.2c.388-4.773 4.262-7.2 8.983-7.2 4.788 0 8.722 2.293 9.015 7.2.012.195 0 .8-.751.8H3.727c-.25 0-.747-.54-.726-.8" fill="#000" fill-rule="nonzero"/></g></svg></span>',
                    'page' => AppUsers::adminRoute('app_users_list', ['type' => 'user', 'confirmed' => 1]),
                ];
                /*$items[] = [
                    'title' => AppUsers::adminLang('title_unconfirmed'),
                    'icon' => '<span class="svg-icon menu-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" fill-rule="evenodd"><path d="M0 0h24v24H0z"/><path d="M12 11a4 4 0 1 1 0-8 4 4 0 0 1 0 8" fill="#000" fill-rule="nonzero" opacity=".3"/><path d="M3 20.2c.388-4.773 4.262-7.2 8.983-7.2 4.788 0 8.722 2.293 9.015 7.2.012.195 0 .8-.751.8H3.727c-.25 0-.747-.54-.726-.8" fill="#000" fill-rule="nonzero"/></g></svg></span>',
                    'page' => AppUsers::adminRoute('app_users_list', ['type' => 'user', 'confirmed' => 0]),
                ];*/
            }

            if (Users::can('read')) {
                $items[] = [
                    'title' => Users::adminLang('title'),
                    'icon' => '<span class="svg-icon menu-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" fill-rule="evenodd"><path d="M0 0h24v24H0z"/><path d="M12 11a4 4 0 1 1 0-8 4 4 0 0 1 0 8" fill="#000" fill-rule="nonzero" opacity=".3"/><path d="M3 20.2c.388-4.773 4.262-7.2 8.983-7.2 4.788 0 8.722 2.293 9.015 7.2.012.195 0 .8-.751.8H3.727c-.25 0-.747-.54-.726-.8" fill="#000" fill-rule="nonzero"/></g></svg></span>',
                    'page' => Users::adminRoute('index'),
                ];
            }
        }


        if (Notifications::can("read")) {

            $items[] = ['section' => __('admin::menu.section_notifications')];

            if (Notifications::can("read")){
                $items[] = [
                    'title' => Notifications::adminLang('title'),
                    'icon' => '<span class="svg-icon menu-icon"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" fill="#000000"/><rect fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519) " x="16.3255682" y="2.94551858" width="3" height="18" rx="1"/></g></svg></span>',
                    'page' => Notifications::adminRoute('list')
                ];
            }

            if (PushNotifications::can("read")){
                $items[] = [
                    'title' => PushNotifications::adminLang('title'),
                    'icon' => '<span class="svg-icon menu-icon"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" fill="#000000"/><rect fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519) " x="16.3255682" y="2.94551858" width="3" height="18" rx="1"/></g></svg></span>',
                    'page' => PushNotifications::adminRoute('list')
                ];
            }
        }

        if (Countries::can("read") || Regioni::can("read") || Province::can("read") || Comuni::can("read") || Toponyms::can("read") || UsStates::can("read")){
            $item = [
                'title' => __('admin::menu.section_tabelle_generali'),
                'icon' => '<span class="svg-icon menu-icon"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M5.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L5.5,11 C4.67157288,11 4,10.3284271 4,9.5 L4,5.5 C4,4.67157288 4.67157288,4 5.5,4 Z M11,6 C10.4477153,6 10,6.44771525 10,7 C10,7.55228475 10.4477153,8 11,8 L13,8 C13.5522847,8 14,7.55228475 14,7 C14,6.44771525 13.5522847,6 13,6 L11,6 Z" fill="#000000" opacity="0.3"/><path d="M5.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M11,15 C10.4477153,15 10,15.4477153 10,16 C10,16.5522847 10.4477153,17 11,17 L13,17 C13.5522847,17 14,16.5522847 14,16 C14,15.4477153 13.5522847,15 13,15 L11,15 Z" fill="#000000"/></g></svg></span>',
                'bullet' => 'dot',
                'submenu' => []
            ];

            if (Countries::can("read")){
                $item["submenu"][] = [
                    'title' => Countries::adminLang('title'),
                    'page' => Countries::adminRoute('list')
                ];
            }
            if (UsStates::can("read")){
                $item["submenu"][] = [
                    'title' => UsStates::adminLang('title'),
                    'page' => UsStates::adminRoute('list')
                ];
            }
            if (Regioni::can("read")){
                $item["submenu"][] = [
                    'title' => Regioni::adminLang('title'),
                    'page' => Regioni::adminRoute('list')
                ];
            }
            if (Province::can("read")){
                $item["submenu"][] = [
                    'title' => Province::adminLang('title'),
                    'page' => Province::adminRoute('list')
                ];
            }
            if (Comuni::can("read")){
                $item["submenu"][] = [
                    'title' => Comuni::adminLang('title'),
                    'page' => Comuni::adminRoute('list')
                ];
            }
            if (Toponyms::can("read")){
                $item["submenu"][] = [
                    'title' => Toponyms::adminLang('title'),
                    'page' => Toponyms::adminRoute('list')
                ];
            }
            $items[] = $item;
        }

        if (ResourcesLang::can("read") || AppLocalizations::can('read')) {

            $items[] = ['section' => __('admin::menu.section_localizations')];

            if (AppLocalizations::can("read")) {
                $items[] = [
                    'title' => AppLocalizations::adminLang('title'),
                    'icon' => '<span class="svg-icon menu-icon"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" fill="#000000"/><rect fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519) " x="16.3255682" y="2.94551858" width="3" height="18" rx="1"/></g></svg></span>',
                    'page' => AppLocalizations::adminRoute('list')
                ];
            }

            if (ResourcesLang::can("read")){
                $items[] = [
                    'title' => ResourcesLang::adminLang('title_front'),
                    'icon' => '<span class="svg-icon menu-icon"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" fill="#000000"/><rect fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519) " x="16.3255682" y="2.94551858" width="3" height="18" rx="1"/></g></svg></span>',
                    'page' => ResourcesLang::adminRoute('list',["type"=>"front"])
                ];
                $items[] = [
                    'title' => ResourcesLang::adminLang('title_admin'),
                    'icon' => '<span class="svg-icon menu-icon"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" fill="#000000"/><rect fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519) " x="16.3255682" y="2.94551858" width="3" height="18" rx="1"/></g></svg></span>',
                    'page' => ResourcesLang::adminRoute('list',["type"=>"admin"])
                ];
            }


        }

        if (Websites::can("read") || Themes::can("read") || Languages::can("read") || AdminModules::can("read") || Roles::can("read") || SmtpAuths::can("read")){
            $items[] = ['section' => __('admin::menu.section_settings')];


            if (Websites::can("read")){

                $items[] = [
                    'title' => Websites::adminLang('title'),
                    'icon' => '<span class="svg-icon menu-icon"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" fill="#000000"/><rect fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519) " x="16.3255682" y="2.94551858" width="3" height="18" rx="1"/></g></svg></span>',
                    'page' => Websites::adminRoute('list')
                ];

            }

            if (SmtpAuths::can("read")){

                $items[] = [
                    'title' => SmtpAuths::adminLang('title'),
                    'icon' => '<span class="svg-icon menu-icon"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" fill="#000000"/><rect fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519) " x="16.3255682" y="2.94551858" width="3" height="18" rx="1"/></g></svg></span>',
                    'page' => SmtpAuths::adminRoute('list')
                ];


            }

            if (Themes::can("read")){

                $items[] = [
                    'title' => Themes::adminLang('title'),
                    'icon' => '<span class="svg-icon menu-icon"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" fill="#000000"/><rect fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519) " x="16.3255682" y="2.94551858" width="3" height="18" rx="1"/></g></svg></span>',
                    'page' => Themes::adminRoute('list')
                ];


            }
            if (Languages::can("read")){

                $items[] = [
                    'title' => Languages::adminLang('title'),
                    'icon' => '<span class="svg-icon menu-icon"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" fill="#000000"/><rect fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519) " x="16.3255682" y="2.94551858" width="3" height="18" rx="1"/></g></svg></span>',
                    'page' => Languages::adminRoute('list')
                ];


            }
            if (AdminModules::can("read")){

                $items[] = [
                    'title' => AdminModules::adminLang('title'),
                    'icon' => '<span class="svg-icon menu-icon"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" fill="#000000"/><rect fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519) " x="16.3255682" y="2.94551858" width="3" height="18" rx="1"/></g></svg></span>',
                    'page' => AdminModules::adminRoute('list')
                ];

            }
            if (Roles::can("read")){

                $items[] = [
                    'title' => Roles::adminLang('title'),
                    'icon' => '<span class="svg-icon menu-icon"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" fill="#000000"/><rect fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519) " x="16.3255682" y="2.94551858" width="3" height="18" rx="1"/></g></svg></span>',
                    'page' => Roles::adminRoute('list')
                ];

            }

        }

        return $items;
    }



}
