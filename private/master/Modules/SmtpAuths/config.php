<?php


return [
    'active' => true,

    'model' => Enesisrl\LaravelMasterCore\Modules\SmtpAuths\Models\SmtpAuth::class,

    'register' => [

    ],

    'crud' => [
        'form' => function($form) {

            $form->addField('Email', [
                'name' => 'smtp_from',
                'label' => __('admin::label.smtp_from'),
                'rules' => [
                    'required',
                    'max:255'
                ]
            ]);

            $form->addField('Varchar', [
                'name' => 'smtp_from_name',
                'label' => __('admin::label.smtp_from_name'),
                'rules' => [
                    'required',
                    'max:255'
                ]
            ]);

            $form->addField('Varchar', [
                'name' => 'smtp_username',
                'label' => __('admin::label.smtp_username'),
                'rules' => [
                    'required',
                    'max:255'
                ]
            ]);

            $form->addField('Password', [
                'name' => 'smtp_password',
                'decryptable' => true,
                'label' => __('admin::label.password'),
                'rules' => function($model) {
                    return [
                        (!$model->id ? 'required' : 'nullable'),
                        'min:6'
                    ];
                }
            ]);

            $form->addField('Varchar', [
                'name' => 'smtp_host',
                'label' => __('admin::label.smtp_host'),
                'rules' => [
                    'required'
                ]
            ]);

            $form->addField('Integer', [
                'name' => 'smtp_port',
                'label' => __('admin::label.smtp_port'),
                'rules' => [
                    'required'
                ]
            ]);

            $form->addField('Checkbox', [
                'name' => 'smtp_ssl',
                'checkbox_value' => 1,
                'label' => __('admin::label.smtp_ssl')
            ]);

            $form->addField('Email', [
                'name' => 'reply_to',
                'label' => __('admin::label.reply_to'),
                'rules' => [
                    'max:255'
                ]
            ]);

            $form->addTab([
                'label' => __('admin::label.informazioni_generali'),
                'content' => [
                    ['smtp_from|col:6','smtp_from_name|col:6'],
                    ['smtp_username|col:6','smtp_password|col:6'],
                    ['smtp_host|col:6','smtp_port|col:3','smtp_ssl|col:3'],
                    ['reply_to|col:6'],
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
                    'name' => 'smtp_from',
                    'label' => __('admin::label.smtp_from'),
                    'width' => '',
                    'type' => 'simple',
                    'order' => 1,
                    'orderDefault' => 1,
                    'orderDefaultType' => 'ASC'
                ],
                [
                    'name' => 'smtp_from_name',
                    'label' => __('admin::label.smtp_from_name'),
                    'width' => '',
                    'type' => 'simple',
                    'order' => 1,
                    'orderDefault' => 1,
                    'orderDefaultType' => 'ASC'
                ],
                [
                    'name' => 'reply_to',
                    'label' => __('admin::label.reply_to'),
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
