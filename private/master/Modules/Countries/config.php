<?php


return [
    'active' => true,

    'model' => Master\Modules\Countries\Models\Country::class,

    'register' => [

    ],

    'crud' => [
        'form' => function($form) {

            $form->addField('Varchar', [
                'name' => 'country_code',
                'label' => __('admin::label.country_code'),
                'rules' => [
                    'required',
                    'max:2'
                ]
            ]);

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
                    ['country_code|col:2'],
                    [':separator'],
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
                    'name' => 'country_code',
                    'label' => __('admin::label.country_code'),
                    'width' => '15%',
                    'type' => 'simple',
                    'order' => 1,
                    'orderDefault' => 0,
                    'orderDefaultType' => ''
                ],
                [
                    'name' => 'description',
                    'field_name' => 'country_translations.description',
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
