<?php

use Illuminate\Support\Facades\Route;

return [
    'active' => true,

    'model' => Master\Modules\Toponyms\Models\Toponym::class,

    'register' => [
        'registerAdminWebRoutes' => function($module) {
            Route::get('/autocomplete', [\Master\Modules\Toponyms\Controllers\AdminController::class, 'autocompleteToponyms'])->name('autocompleteToponyms');
        }
    ],

    'crud' => [
        'form' => function($form) {

            $form->addField('VarcharLang', [
                'name' => 'description',
                'label' => __('admin::label.description'),
                'rules' => [
                    'required',
                    'max:255'
                ]
            ]);


            $form->addTab([
                'label' => __('admin::label.informazioni_generali'),
                'content' => [
                    ['description|col:12'],
                ]
            ]);
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
                    'name' => 'description',
                    'field_name' => 'toponym_translations.description',
                    'label' => __('admin::label.description'),
                    'width' => '',
                    'type' => 'simple',
                    'order' => 1,
                    'orderDefault' => 1,
                    'orderDefaultType' => 'ASC'
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
