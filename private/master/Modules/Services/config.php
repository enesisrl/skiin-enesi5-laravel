<?php

use Master\Modules\Services\Controllers\AdminController;
use Master\Modules\Services\Facades\Services;

return [
    'active' => true,

    'register' => [
        'registerAdminWebRoutes' => function($module) {
            Route::post('generate_slug', $module->getClassname("Controllers\AdminController@generateSlug"))->name('service_generate_slug');
            Route::post('customScripts', $module->getClassname("Controllers\AdminController@customScripts"))->name('service_custom_scripts');
            Route::post('addContent', $module->getClassname("Controllers\AdminController@addContent"))->name('service_add_content');
            Route::any('viewOnMap', $module->getClassname("Controllers\AdminController@viewOnMap"))->name('service_view_on_map');
        }
    ]
];
