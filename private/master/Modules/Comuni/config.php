<?php

use Illuminate\Support\Facades\Route;

return [
    'active' => true,

    'model' => Master\Modules\Comuni\Models\Comune::class,

    'register' => [
        'registerAdminWebRoutes' => function($module) {
            Route::get('/getComuni', [\Master\Modules\Comuni\Controllers\AdminController::class, 'getComuni'])->name('getComuni');
            Route::get('/getCap', [\Master\Modules\Comuni\Controllers\AdminController::class, 'getCap'])->name('getCap');
        }
    ],

    'crud' => [
        'form' => function($form) {
            $form->addField('Select', [
                'name' => 'provincia_id',
                'type' => 'standard',
                'query' => "SELECT provincia.id value, provincia.description FROM provincia WHERE 1 ORDER BY provincia.description",
                'label' => __('admin::label.provincia'),
                'rules' => [
                    'required'
                ]
            ]);
            $form->addField('Varchar', [
                'name' => 'description',
                'label' => __('admin::label.description'),
                'rules' => [
                    'required',
                    'max:255'
                ]
            ]);

            $form->addField('Varchar', [
                'name' => 'codice_istat',
                'label' => __('admin::label.codice_istat'),
                'rules' => [
                    'required',
                    'max:2'
                ]
            ]);
            $form->addField('Varchar', [
                'name' => 'lat',
                'label' => __('admin::label.lat'),
                'rules' => [
                    'required',
                    'max:2'
                ]
            ]);
            $form->addField('Varchar', [
                'name' => 'lng',
                'label' => __('admin::label.lng'),
                'rules' => [
                    'required',
                    'max:2'
                ]
            ]);
            $form->addField('Varchar', [
                'name' => 'cap',
                'label' => __('admin::label.cap'),
                'rules' => [
                    'required',
                    'max:2'
                ]
            ]);

            $form->addTab([
                'label' => __('admin::label.informazioni_generali'),
                'content' => [
                    ['provincia_id|col:12'],
                    [':separator'],
                    ['description|col:12'],
                    ['codice_istat|col:3','lat|col:3','lng|col:3','cap|col:3'],
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
                    'label' => __('admin::label.description'),
                    'width' => '',
                    'type' => 'simple',
                    'order' => 1,
                    'orderDefault' => 1,
                    'orderDefaultType' => 'ASC'
                ],
                [
                    'name' => 'created_at',
                    'label' => __('admin::label.created_at'),
                    'width' => '15%',
                    'type' => 'datetime',
                    'order' => 1,
                    'orderDefault' => 0,
                    'orderDefaultType' => ''
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
