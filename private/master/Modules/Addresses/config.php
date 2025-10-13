<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Request;

return [
    'active' => true,

    'model' => Master\Modules\Addresses\Models\Address::class,

    'register' => [
        'registerAdminWebRoutes' => function($module) {
            Route::any('/geolocateFromAddress', [\Master\Modules\Addresses\Controllers\AdminController::class, 'geolocateFromAddress'])->name('geolocateFromAddress');
            Route::any('/getAddressFromGeolocation', [\Master\Modules\Addresses\Controllers\AdminController::class, 'getAddressFromGeolocation'])->name('getAddressFromGeolocation');
            Route::any('/getAddressDetailsFromGeolocation', [\Master\Modules\Addresses\Controllers\AdminController::class, 'getAddressDetailsFromGeolocation'])->name('getAddressDetailsFromGeolocation');
        }
    ],

    'crud' => [
        'form' => function($form) {

        },

        'list' => function($module){

        }
    ]
];
