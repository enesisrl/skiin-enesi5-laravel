<?php


use Master\Modules\Roles\Form\Fields\Permissions as PermissionsField;

return [
    'active' => true,

    'model' => Master\Modules\Roles\Models\Role::class,

    'register' => [
        
    ],

    'crud' => [
        'form' => function($form) {
            $form->addField('Varchar', [
                'name' => 'name',
                'label' => __('admin::label.name'),
                'rules' => [
                    'required',
                    'max:255'
                ]
            ]);

            $form->addField(PermissionsField::class, [
                'name' => 'perm'
            ]);

            $form->addTab([
                'label' => __('admin::label.informazioni_generali'),
                'content' => [
                    ['name|col:12'],
                    [':separator'],
                    ['perm']
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
                    'name' => 'name',
                    'label' => __('admin::label.name'),
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
