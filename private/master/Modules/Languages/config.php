<?php


return [
    'active' => true,

    'model' => Master\Modules\Languages\Models\Language::class,

    'register' => [

    ],

    'crud' => [
        'form' => function($form) {

            $form->addField('Select', [
                'name' => 'type',
                'type' => 'enum',
                'table' => 'languages',
                'label' => __('admin::label.languages_type'),
                'rules' => [
                    'required',
                    'max:255'
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

            $form->addField('Sequence', [
                'name' => 'sequence',
                'label' => __('admin::label.sequence'),
                'rules' => [
                    'nullable',
                    'integer'
                ]
            ]);

            $form->addField('Varchar', [
                'name' => 'lang',
                'label' => __('admin::label.languages_lang'),
                'rules' => [
                    'required',
                    'max:5'
                ]
            ]);

            $form->addField('Varchar', [
                'name' => 'iso_code2',
                'label' => __('admin::label.languages_iso_code2'),
                'rules' => [
                    'required',
                    'max:3'
                ]
            ]);

            $form->addField('Varchar', [
                'name' => 'iso_code3',
                'label' => __('admin::label.languages_iso_code3'),
                'rules' => [
                    'required',
                    'max:3'
                ]
            ]);

            $form->addField('Varchar', [
                'name' => 'locale_code',
                'label' => __('admin::label.languages_locale_code'),
                'rules' => [
                    'required',
                    'max:5'
                ]
            ]);

            $form->addTab([
                'label' => __('admin::label.informazioni_generali'),
                'content' => [
                    ['type|col:3', 'description|col:6', 'sequence|col:3'],
                    [':separator'],
                    ['lang|col:3', 'iso_code2|col:3', 'iso_code3|col:3', 'locale_code|col:3'],
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
                    'name' => 'type',
                    'label' => __('admin::label.languages_type'),
                    'width' => '10%',
                    'type' => 'simple',
                    'order' => 1,
                    'orderDefault' => 1,
                    'orderDefaultType' => 'ASC'
                ],
                [
                    'name' => 'sequence',
                    'label' => __('admin::label.sequence'),
                    'width' => '5%',
                    'type' => 'simple',
                    'order' => 1,
                    'orderDefault' => 1,
                    'orderDefaultType' => 'ASC'
                ],
                [
                    'name' => 'lang',
                    'label' => __('admin::label.languages_lang'),
                    'width' => '5%',
                    'type' => 'simple',
                    'order' => 1,
                    'orderDefault' => 1,
                    'orderDefaultType' => 'ASC'
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
                    'name' => 'iso_code2',
                    'label' => __('admin::label.languages_iso_code2'),
                    'width' => '10%',
                    'type' => 'simple',
                    'order' => 1,
                    'orderDefault' => 1,
                    'orderDefaultType' => 'ASC'
                ],
                [
                    'name' => 'iso_code3',
                    'label' => __('admin::label.languages_iso_code3'),
                    'width' => '10%',
                    'type' => 'simple',
                    'order' => 1,
                    'orderDefault' => 1,
                    'orderDefaultType' => 'ASC'
                ],
                [
                    'name' => 'locale_code',
                    'label' => __('admin::label.languages_locale_code'),
                    'width' => '10%',
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
