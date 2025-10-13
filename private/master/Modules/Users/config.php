<?php

use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Route;
use Master\Modules\Timezones\Facades\Timezones;
use Master\Modules\Users\Controllers\AdminController;

return [
    'active' => true,

    'model' => Master\Modules\Users\Models\User::class,

    'register' => [
        'registerAdminWebRoutes' => function($module) {
            Route::get('/loginAs/{id}', [AdminController::class, 'loginAs'])->name('loginAs');
            Route::get('/editProfile/{id}', [AdminController::class, 'editProfile'])->name('editProfile');
            Route::patch('/editProfile/{id}', [AdminController::class, 'storeEditProfile'])->name('storeEditProfile');

            event('2fa.users.register.admin.routes', [$module]);
        }
    ],

    'crud' => [
        'searchForm' => function($searchForm){
            $sessionValues = [];
            if ($users_customSearch = session()->get("users_customSearch")){
                foreach($users_customSearch as $val){
                    $sessionValues[$val["name"]] = $val["value"];
                }
            }


            $searchForm->addField('Select', [
                'name' => 'users.status',
                'field_name' => 'status',
                'type' => 'enum',
                'table' => 'users',
                'sessionValue' => (isset($sessionValues["users.status"])) ? $sessionValues["users.status"] : null,
                'label' => __('admin::label.status')
            ]);

            $searchForm->addField('Varchar', [
                'name' => 'users.username',
                'label' => __('admin::label.username'),
                'sessionValue' => (isset($sessionValues["users.username"])) ? $sessionValues["users.username"] : null,
                'rules' => [
                    'nullable',
                    'max:255'
                ]
            ]);

            $searchForm->addField('Varchar', [
                'name' => 'users.name',
                'label' => __('admin::label.name'),
                'sessionValue' => (isset($sessionValues["users.name"])) ? $sessionValues["users.name"] : null,
                'rules' => [
                    'nullable',
                    'max:255'
                ]
            ]);
            $searchForm->addField('Varchar', [
                'name' => 'users.last_name',
                'label' => __('admin::label.last_name'),
                'sessionValue' => (isset($sessionValues["users.last_name"])) ? $sessionValues["users.last_name"] : null,
                'rules' => [
                    'nullable',
                    'max:255'
                ]
            ]);
            $searchForm->addField('Varchar', [
                'name' => 'users.company_name',
                'label' => __('admin::label.company_name'),
                'sessionValue' => (isset($sessionValues["users.company_name"])) ? $sessionValues["users.company_name"] : null,
                'rules' => [
                    'nullable',
                    'max:255'
                ]
            ]);

            $searchForm->addField('Email', [
                'name' => 'users.email',
                'label' => __('admin::label.email'),
                'sessionValue' => (isset($sessionValues["users.email"])) ? $sessionValues["users.email"] : null,
                'rules' => function($model) {
                    return [
                        'nullable',
                        'email'
                    ];
                }
            ]);

            $searchForm->addTab([
                'label' => __('admin::label.parametri_ricerca'),
                'content' => [
                    ['users.status|col:3','users.email|col:3','users.username|col:3'],
                    ['users.name|col:4','users.last_name|col:4','users.company_name|col:4']
                ]
            ]);

        },
        'form' => function($form, $model) {


            $form->addField('Varchar', [
                'name' => 'name',
                'label' => __('admin::label.name'),
                'rules' => [
                    'max:255'
                ]
            ]);
            $form->addField('Varchar', [
                'name' => 'last_name',
                'label' => __('admin::label.last_name'),
                'rules' => [
                    'max:255'
                ]
            ]);
            $form->addField('Varchar', [
                'name' => 'company_name',
                'label' => __('admin::label.company_name'),
                'rules' => [
                    'max:255'
                ]
            ]);

            $form->addField('Email', [
                'name' => 'email',
                'label' => __('admin::label.email'),
                'rules' => function($model) {
                    return [
                        'nullable',
                        'email'
                    ];
                }
            ]);

            $form->addField('Varchar', [
                'name' => 'url',
                'label' => __('admin::label.url'),
                'rules' => function($model) {
                    return [
                        'nullable',
                        'url'
                    ];
                }
            ]);



            $form->addField('Address', [
                'name' => 'address_id',
                'label' => __('admin::label.address'),
                'rules' => [
                    'max:255'
                ]
            ]);

            $form->addField('Phone', [
                'name' => 'phone',
                'label' => __('admin::label.phone'),
                'rules' => [
                    'max:20'
                ]
            ]);

            $form->addField('Phone', [
                'name' => 'phone2',
                'label' => __('admin::label.phone2'),
                'rules' => [
                    'max:50'
                ]
            ]);

            $form->addField('Phone', [
                'name' => 'fax',
                'label' => __('admin::label.fax'),
                'rules' => [
                    'max:50'
                ]
            ]);

            $form->addField('Varchar', [
                'name' => 'vat_id',
                'label' => __('admin::label.vat_id'),
                'rules' => [
                    'max:20'
                ]
            ]);


            $form->addField('Varchar', [
                'name' => 'fiscal_code',
                'label' => __('admin::label.fiscal_code'),
                'rules' => [
                    'max:20'
                ]
            ]);

            $form->addTab([
                'label' => __('admin::label.informazioni_generali'),
                'content' => [
                    ['name|col:4', 'last_name|col:4', 'company_name|col:4'],
                    ['address_id|col:12'],
                    [':separator'],
                    ['phone|col:4', 'phone2|col:4', 'fax|col:4'],
                    ['email|col:4', 'url|col:4'],
                    ['vat_id|col:6', 'fiscal_code|col:6'],
                ]
            ]);

            $form->addField('Varchar', [
                'name' => 'username',
                'label' => __('admin::label.username'),
                'rules' => function($model) {
                    return [
                        'required',
                        'max:255',
                        "unique:users,username,{$model->id},id,deleted_at,NULL",
                    ];
                }
            ]);

            $form->addField('Password', [
                'name' => 'password',
                'label' => __('admin::label.password'),
                'rules' => function($model) {
                    return [
                        (!$model->id ? 'required' : 'nullable'),
                        'min:6'
                    ];
                }
            ]);

            if (\Illuminate\Support\Facades\Auth::user()->id == $model->id){
                $form->addField('Hidden', [
                    'name' => 'status'
                ]);
            }else{
                $form->addField('Select', [
                    'name' => 'status',
                    'type' => 'enum',
                    'table' => 'users',
                    'label' => __('admin::label.status')
                ]);

            }


            $form->addTab([
                'label' => __('admin::label.informazioni_accesso'),
                'content' => [
                    ['status|col:12'],
                    ['username|col:6','password|col:6'],
                ]
            ]);

            if (\Master\Modules\UserWebsites\Facades\UserWebsites::can('read') && \Illuminate\Support\Facades\Auth::user()->id !== $model->id) {
                $form->addField('Crud', [
                    'name' => 'user_websites',
                    'module' => 'UserWebsites',
                    'reference_key' => 'user_id'
                ]);
                $form->addTab([
                    'label' => __('admin::label.user_websites'),
                    'content' => [
                        ['user_websites']
                    ]
                ]);
            }


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
                    'name' => 'status',
                    'field_name' => 'users.status',
                    'label' => __('admin::label.status'),
                    'width' => '',
                    'type' => 'custom',
                    'formatFunction' => function($qb, $field){
                        return (Lang::has('admin::option.'.strtolower($qb->{$field['name']}))) ? __('admin::option.'.strtolower($qb->{$field['name']})) : strtoupper($qb->{$field['name']});
                    },
                    'order' => 1,
                    'orderDefault' => 0,
                    'orderDefaultType' => ''
                ],
                [
                    'name' => 'username',
                    'label' => __('admin::label.username'),
                    'width' => '',
                    'type' => 'simple',
                    'order' => 1,
                    'orderDefault' => 1,
                    'orderDefaultType' => 'ASC'
                ],
                [
                    'name' => 'last_name',
                    'label' => __('admin::label.last_name'),
                    'width' => '',
                    'type' => 'simple',
                    'order' => 1,
                    'orderDefault' => 1,
                    'orderDefaultType' => 'ASC'
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
                    'name' => 'company_name',
                    'label' => __('admin::label.company_name'),
                    'width' => '',
                    'type' => 'simple',
                    'order' => 1,
                    'orderDefault' => 1,
                    'orderDefaultType' => 'ASC'
                ],
                [
                    'name' => 'email',
                    'label' => __('admin::label.email'),
                    'width' => '25%',
                    'type' => 'email',
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
