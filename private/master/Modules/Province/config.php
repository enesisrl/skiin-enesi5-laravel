<?php


return [
    'active' => true,

    'model' => Master\Modules\Province\Models\Provincia::class,

    'register' => [
        
    ],

    'crud' => [
        'form' => function($form) {

            $form->addField('Varchar', [
                'name' => 'sigla',
                'label' => __('admin::label.sigla'),
                'rules' => [
                    'required',
                    'max:2'
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

            $form->addField('Select', [
                'name' => 'regione_id',
                'type' => 'standard',
                'query' => "SELECT regione.id value, regione.description FROM regione WHERE 1 ORDER BY regione.description",
                'label' => __('admin::label.regione'),
                'rules' => [
                    'required'
                ]
            ]);


            $form->addTab([
                'label' => __('admin::label.informazioni_generali'),
                'content' => [
                    ['regione_id|col:12'],
                    [':separator'],
                    ['sigla|col:3', 'description|col:9'],
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
                    'name' => 'sigla',
                    'label' => __('admin::label.sigla'),
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
