<?php


use Illuminate\Support\Facades\Route;
use Master\Modules\Countries\Facades\Countries;

return [
    'active' => true,

    'register' => [
        'registerAdminWebRoutes' => function($module) {
            Route::any('/usage', [\Master\Modules\Statistics\Controllers\AdminController::class, 'usage'])->name('usage');
            Route::any('/insurance', [\Master\Modules\Statistics\Controllers\AdminController::class, 'insurance'])->name('insurance');
            Route::any('/categories', [\Master\Modules\Statistics\Controllers\AdminController::class, 'categories'])->name('categories');
            Route::any('/deposits', [\Master\Modules\Statistics\Controllers\AdminController::class, 'deposits'])->name('deposits');
        }
    ],

    'crud' => [



        'form' => function($form) {

        },

        'list' => function($module){
            return [
                [
                    'name' => 'id',
                    'label' => '',
                    'width' => '2%',
                    'type' => 'checkbox',
                    'order' => 0,
                    'orderDefault' => 0,
                    'orderDefaultType' => ''
                ],
                [
                    'name' => 'created_at',
                    'label' => __('admin::label.created_at'),
                    'width' => '',
                    'type' => 'date',
                    'order' => 1,
                    'orderDefault' => 1,
                    'orderDefaultType' => 'DESC'
                ],
                [
                    'name' => 'actions',
                    'label' => __('admin::label.actions'),
                    'width' => '10%',
                    'type' => 'actions',
                    'order' => 0,
                    'orderDefault' => 0,
                    'orderDefaultType' => ''
                ]
            ];
        }
    ]
];
