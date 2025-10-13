<?php


return [
    'active' => true,

    'model' => Master\Modules\Themes\Models\Theme::class,

    'register' => [
        
    ],

    'crud' => [
        'form' => function($form) {

            $form->addField('Varchar', [
                'name' => 'description',
                'label' => __('admin::label.description'),
                'rules' => [
                    'required',
                    'max:255'
                ]
            ]);

            $form->addField('Varchar', [
                'name' => 'folder',
                'label' => __('admin::label.folder'),
                'rules' => [
                    'required',
                    'max:255'
                ]
            ]);

            $form->addTab([
                'label' => __('admin::label.informazioni_generali'),
                'content' => [
                    ['description|col:6','folder|col:6']
                ]
            ]);
        },

        'list' => function($module){
            return [
                [
                    'name' => 'id',
                    'label' => '',
                    'width' => '',
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
                    'name' => 'folder',
                    'label' => __('admin::label.folder'),
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
