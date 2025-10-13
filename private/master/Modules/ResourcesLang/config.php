<?php

use Illuminate\Support\Facades\Route;
use Master\Modules\Websites\Facades\Websites;

return [
    'active' => true,

    'model' => Master\Modules\ResourcesLang\Models\ResourceLang::class,

    'register' => [

    ],

    'crud' => [
        'form' => function($form) {

            /*
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
            */

            $form->addField('Hidden', [
                'name' => 'type'
            ]);

            $form->addField('Varchar', [
                'name' => 'section',
                'label' => 'Section',
                'rules' => [
                    'required',
                    'max:255'
                ]
            ]);

            $form->addField('Varchar', [
                'name' => 'label',
                'label' => 'Label',
                'rules' => [
                    'required',
                    'max:255'
                ]
            ]);

            $form->addField('TextLang', [
                'name' => 'value',
                'lang_source' => (request()->has("type")) ? request()->get("type") : 'front',
                'label' => 'Value',
                'rules' => [
                    'required',
                    'max:255'
                ]
            ]);


            $form->addTab([
                'label' => __('admin::label.informazioni_generali'),
                'content' => [
                    ['section|col:6','label|col:6'],
                    ['value|col:12'],
                    ['type|col:1']
                ]
            ]);

        },

        'list' => function($module){

            $columns = [];

            $columns[] = [
                'name' => 'id',
                'label' => '',
                'width' => '2%',
                'type' => 'checkbox',
                'order' => 0,
                'orderDefault' => 0,
                'orderDefaultType' => ''
            ];


            /*
            $columns[] = [
                'name' => 'type',
                'label' => __('admin::label.languages_type'),
                'width' => '10%',
                'type' => 'simple',
                'order' => 1,
                'orderDefault' => 1,
                'orderDefaultType' => 'ASC'
            ];
            */
            $columns[] = [
                'name' => 'section',
                'label' => 'Section',
                'width' => '5%',
                'type' => 'simple',
                'order' => 1,
                'orderDefault' => 1,
                'orderDefaultType' => 'ASC'
            ];

            $columns[] = [
                'name' => 'label',
                'label' => 'Label',
                'width' => '20%',
                'type' => 'simple',
                'order' => 1,
                'orderDefault' => 1,
                'orderDefaultType' => 'ASC'
            ];

            if (request()->input("type") == "admin"){
                foreach(Websites::current('adminLanguages') as $lang){
                    $columns[] = [
                        'name' => 'value_'.$lang['iso_code2'],
                        'field_name' => $lang['iso_code2'].'.value',
                        'label' => 'Value ('.$lang['iso_code2'].')',
                        'width' => '',
                        'type' => 'simple',
                        'order' => 1,
                        'orderDefault' => 1,
                        'orderDefaultType' => 'ASC'
                    ];
                }

            }else{
                foreach(Websites::current('frontLanguages') as $lang){
                    $columns[] = [
                        'name' => 'value_'.$lang['iso_code2'],
                        'field_name' => $lang['iso_code2'].'.value',
                        'label' => 'Value ('.$lang['iso_code2'].')',
                        'width' => '',
                        'type' => 'simple',
                        'order' => 1,
                        'orderDefault' => 1,
                        'orderDefaultType' => 'ASC'
                    ];
                }
            }


            $columns[] = [
                'name' => 'actions',
                'label' => __('admin::label.actions'),
                'width' => '10%',
                'type' => 'actions',
                'order' => 0,
                'orderDefault' => 0,
                'orderDefaultType' => ''
            ];

            return $columns;
        }
    ]
];
