<?php

return [
    'active' => true,

    'admin' => [
        'baseurl' => ''
    ],

    'register' => [
        'registerAdminWebRoutes' => function($module) {
            Route::get('/', [\Master\Modules\Dashboard\Controllers\AdminController::class, 'getDashboard'])->name('index');
        }
    ]
];
