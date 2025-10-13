<?php

use Master\Modules\Roles\Facades\Roles;
use Master\Modules\Websites\Facades\Websites;

return [
    'active' => true,

    'model' => Master\Modules\UserWebsites\Models\UserWebsites::class,

    'register' => [

    ],

    'crud' => [
        'form' => function($form) {

            $form->addField('Select', [
                'name' => 'user_id',
                'type' => 'standard',
                'query' => "SELECT users.id value, users.name description FROM users WHERE 1 ORDER BY users.name",
                'label' => __('admin::UsersModule.title'),
                'rules' => [
                    'required'
                ]
            ]);

            $websites = Websites::getWebsitesForSelect();
            if ($websites->count() > 1) {
                $form->addField('Select', [
                    'name' => 'website_id',
                    'type' => 'values',
                    'resultSet' => Websites::getWebsitesForSelect(),
                    'label' => __('admin::label.website'),
                    'rules' => [
                        'required'
                    ]
                ]);
            }else{
                $form->addField('Hidden',[
                    'name' => 'website_id',
                    'value' => $websites[0]["value"]
                ]);
            }

            $form->addField('Select', [
                'name' => 'role_id',
                'type' => 'values',
                'resultSet' => Roles::getRolesForSelect(),
                'label' => __('admin::label.ruolo'),
                'rules' => [
                    'required'
                ]
            ]);

            $languages = Websites::getAdminLanguagesForSelect("id");
            if (count($languages) > 1) {
                $form->addField('Select', [
                    'name' => 'language_id',
                    'type' => 'values',
                    'resultSet' => Websites::getAdminLanguagesForSelect("id"),
                    'label' => __('admin::label.default_language'),
                    'rules' => [
                        'required'
                    ]
                ]);
            }else{
                $form->addField('Hidden',[
                    'name' => 'language_id',
                    'value' => $languages[0]["value"]
                ]);
            }

            $form->addTab([
                'label' => __('admin::label.informazioni_generali'),
                'content' => [
                    ['user_id|col:12'],
                    ['website_id|col:12'],
                    ['role_id|col:12'],
                    ['language_id|col:12'],
                ]
            ]);
        },

        'list' => function($module){
            return [
                [
                    'name' => 'website_description',
                    'field_name' => 'websites.description',
                    'label' => __('admin::label.website'),
                    'width' => '',
                    'type' => 'simple',
                    'order' => 1,
                    'orderDefault' => 1,
                    'orderDefaultType' => 'ASC'
                ],
                [
                    'name' => 'role_name',
                    'field_name' => 'roles.name',
                    'label' => __('admin::label.ruolo'),
                    'width' => '',
                    'type' => 'simple',
                    'order' => 1,
                    'orderDefault' => 1,
                    'orderDefaultType' => 'ASC'
                ]/*,
                [
                    'name' => 'language_description',
                    'field_name' => 'languages.description',
                    'label' => __('admin::label.lingua'),
                    'width' => '',
                    'type' => 'simple',
                    'order' => 1,
                    'orderDefault' => 1,
                    'orderDefaultType' => 'ASC'
                ]*/,
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
