<?php

use Master\Modules\Websites\Facades\Websites;

return [
    'active' => true,

    'model' => Master\Modules\UsStates\Models\UsState::class,

    'register' => [

    ],

    'crud' => [
        'form' => function($form) {

            $form->addField('Varchar', [
                'name' => 'state_code',
                'label' => __('admin::label.state_code'),
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
                    ['state_code|col:2'],
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
                    'name' => 'state_code',
                    'label' => __('admin::label.state_code'),
                    'width' => '15%',
                    'type' => 'simple',
                    'order' => 1,
                    'orderDefault' => 0,
                    'orderDefaultType' => ''
                ],
                [
                    'name' => 'description',
                    'field_name' => 'us_state_translations.description',
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
