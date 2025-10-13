<?php


use Illuminate\Support\Facades\Auth;
use Master\Modules\SmtpAuths\Facades\SmtpAuths;
use Master\Modules\Themes\Facades\Themes;

return [
    'active' => true,

    'model' => Master\Modules\Websites\Models\Website::class,

    'register' => [

    ],

    'crud' => [
        'form' => function($form) {




            $currentUser = Auth::user();
            if ($currentUser && (strtolower(trim($currentUser->user_login->role->name ?? null))) === strtolower(trim('super-admin'))) {


                $form->addField('Published', [
                    'name' => 'published',
                    'checkbox_value' => 1,
                    'label' => __('admin::label.active')
                ]);

                $form->addField('Varchar', [
                    'name' => 'description',
                    'label' => __('admin::label.description'),
                    'rules' => [
                        'required',
                        'max:255'
                    ]
                ]);

                $form->addField('Tag', [
                    'name' => 'domains',
                    'type' => 'json',
                    'label' => __('admin::label.domains')
                ]);

                $form->addField('Select', [
                    'name' => 'theme_id',
                    'type' => 'values',
                    'resultSet' => Themes::getThemesForSelect(),
                    'label' => __('admin::label.theme'),
                    /*'rules' => [
                        'required'
                    ]*/
                ]);

                $form->addField('Select', [
                    'name' => 'lang_front_default',
                    'type' => 'standard',
                    'query' => "SELECT languages.id value, languages.description FROM languages WHERE languages.type='front' ORDER BY languages.description",
                    'label' => __('admin::label.lang_front_default'),
                    /*'rules' => [
                        'required'
                    ]*/
                ]);

                $form->addField('Select', [
                    'name' => 'lang_admin_default',
                    'type' => 'standard',
                    'query' => "SELECT languages.id value, languages.description FROM languages WHERE languages.type='admin' ORDER BY languages.description",
                    'label' => __('admin::label.lang_admin_default'),
                    /*'rules' => [
                        'required'
                    ]*/
                ]);


                $form->addField('Select', [
                    'name' => 'languages_front',
                    'type' => 'standard',
                    'multiple' => true,
                    'query' => "SELECT languages.id value, languages.description FROM languages WHERE languages.type='front' ORDER BY languages.description",
                    'label' => __('admin::label.languages_front'),
                    /*'rules' => [
                        'required'
                    ]*/
                ]);

                $form->addField('Select', [
                    'name' => 'languages_admin',
                    'type' => 'standard',
                    'multiple' => true,
                    'query' => "SELECT languages.id value, languages.description FROM languages WHERE languages.type='admin' ORDER BY languages.description",
                    'label' => __('admin::label.languages_admin'),
                    /*'rules' => [
                        'required'
                    ]*/
                ]);

                $form->addField('Select', [
                    'name' => 'languages_front_enabled',
                    'type' => 'standard',
                    'multiple' => true,
                    'query' => "SELECT languages.id value, languages.description FROM languages WHERE languages.type='front' ORDER BY languages.description",
                    'label' => __('admin::label.languages_front_enabled'),
                    /*'rules' => [
                        'required'
                    ]*/
                ]);


                $form->addField('Varchar', [
                    'name' => 'ene_api_key',
                    'label' => __('admin::label.ene_api_key'),
                    'rules' => [
                        /*'required',*/
                        'max:32'
                    ]
                ]);

                $form->addField('Varchar', [
                    'name' => 'ene_api_sek',
                    'label' => __('admin::label.ene_api_sek'),
                    'rules' => [
                        /*'required',*/
                        'max:105'
                    ]
                ]);
                $form->addField('Varchar', [
                    'name' => 'epp_policy_id',
                    'label' => __('admin::label.epp_policy_id'),
                    'rules' => [
                        /*'required',*/
                        'max:32'
                    ]
                ]);
                $form->addField('Varchar', [
                    'name' => 'google_api_key',
                    'label' => __('admin::label.google_api_key'),
                    'rules' => [
                        /*'required',*/
                        'max:40'
                    ]
                ]);
                $form->addField('Varchar', [
                    'name' => 'google_analytics_id',
                    'label' => __('admin::label.google_analytics_id'),
                    'rules' => [
                        /*'required',*/
                        'max:32'
                    ]
                ]);

                $form->addTab([
                    'label' => 'Admin',
                    'content' => [
                        ['published|col:2', 'description|col:5', 'theme_id|col:5'],
                        ['domains|col:12'],
                        [':separator'],
                        ['lang_admin_default|col:6','lang_front_default|col:6'],
                        ['languages_admin|col:6', 'languages_front|col:6'],
                        [':separator'],
                        ['languages_front_enabled|col:6'],
                        [':separator'],
                        ['ene_api_key|col:3','ene_api_sek|col:6','epp_policy_id|col:3'],
                        [':separator'],
                        ['google_api_key|col:9','google_analytics_id|col:3'],
                    ]
                ]);
            }



            $form->addField('Varchar', [
                'name' => 'company_name',
                'label' => __('admin::label.company_name'),
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
                'name' => 'fax',
                'label' => __('admin::label.fax'),
                'rules' => [
                    'max:20'
                ]
            ]);

            $form->addField('Phone', [
                'name' => 'mobile',
                'label' => __('admin::label.mobile'),
                'rules' => [
                    'max:20'
                ]
            ]);

            $form->addField('Phone', [
                'name' => 'whatsapp',
                'label' => __('admin::label.whatsapp'),
                'rules' => [
                    'max:20'
                ]
            ]);

            $form->addField('Email', [
                'name' => 'email',
                'label' => __('admin::label.email'),
                'rules' => [
                    'max:255'
                ]
            ]);

            $form->addField('Email', [
                'name' => 'pec',
                'label' => __('admin::label.pec'),
                'rules' => [
                    'max:255'
                ]
            ]);


            $form->addField('Address', [
                'name' => 'sede_legale_address_id',
                'label' => __('admin::label.sede_legale'),
                'rules' => [
                    'max:255'
                ]
            ]);

            $form->addField('Address', [
                'name' => 'sede_operativa_address_id',
                'label' => __('admin::label.sede_operativa'),
                'rules' => [
                    'max:255'
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

            $form->addField('Varchar', [
                'name' => 'cciaa',
                'label' => __('admin::label.cciaa'),
                'rules' => [
                    'max:20'
                ]
            ]);

            $form->addField('Varchar', [
                'name' => 'rea',
                'label' => __('admin::label.rea'),
                'rules' => [
                    'max:20'
                ]
            ]);

            $form->addField('Currency', [
                'name' => 'share_capital',
                'label' => __('admin::label.share_capital'),
                'rules' => [
                    'nullable',
                    'numeric'
                ]
            ]);
            $form->addField('Checkbox', [
                'name' => 'fully_paid',
                'checkbox_value' => 1,
                'label' => __('admin::label.fully_paid')
            ]);


            $form->addTab([
                'label' => __('admin::label.informazioni_generali'),
                'content' => [
                    ['company_name|col:12'],
                    [':section-title|title:'.__("admin::label.recapiti")],
                    ['phone|col:6','fax|col:6'],
                    ['mobile|col:6','whatsapp|col:6'],
                    ['email|col:6','pec|col:6'],
                    ['sede_legale_address_id|col:12'],
                    ['sede_operativa_address_id|col:12'],
                    [':section-title|title:'.__("admin::label.company_data")],
                    ['vat_id|col:6','fiscal_code|col:6'],
                    ['cciaa|col:3','rea|col:3','share_capital|col:3','fully_paid|col:3'],

                ]
            ]);

            if ($currentUser && (strtolower(trim($currentUser->user_login->role->name ?? null))) === strtolower(trim('super-admin'))) {
                $form->addField('VarcharLang', [
                    'name' => 'meta_title',
                    'label' => __('admin::label.meta_title'),
                    'rules' => [
                        'max:255'
                    ]
                ]);

                $form->addField('TextLang', [
                    'name' => 'meta_description',
                    'label' => __('admin::label.meta_description'),
                    'rules' => [
                        'max:255'
                    ]
                ]);


                $form->addTab([
                    'label' => 'S.E.0.',
                    'content' => [
                        ['meta_title|col:12'],
                        ['meta_description|col:12'],
                    ]
                ]);
            }

            $form->addField('Varchar', [
                'name' => 'social_facebook',
                'label' => __('admin::label.social_facebook'),
                'rules' => [
                    'nullable',
                    'max:255',
                    'url'
                ]
            ]);

            $form->addField('Varchar', [
                'name' => 'social_instagram',
                'label' => __('admin::label.social_instagram'),
                'rules' => [
                    'nullable',
                    'max:255',
                    'url'
                ]
            ]);

            /*
             $form->addField('Varchar', [
                'name' => 'social_linkedin',
                'label' => __('admin::label.social_linkedin'),
                'rules' => [
                    'max:255',
                ]
            ]);

            $form->addField('Varchar', [
                'name' => 'social_twitter',
                'label' => __('admin::label.social_twitter'),
                'rules' => [
                    'max:255',
                ]
            ]);
            $form->addField('Varchar', [
                'name' => 'social_youtube',
                'label' => __('admin::label.social_youtube'),
                'rules' => [
                    'max:255',
                    'url'
                ]
            ]);
            $form->addField('Varchar', [
                'name' => 'social_tripadvisor',
                'label' => __('admin::label.social_tripadvisor'),
                'rules' => [
                    'max:255',
                ]
            ]);
            $form->addField('Varchar', [
                'name' => 'social_snapchat',
                'label' => __('admin::label.social_snapchat'),
                'rules' => [
                    'max:255',
                ]
            ]);

            $form->addField('Varchar', [
                'name' => 'social_tumblr',
                'label' => __('admin::label.social_tumblr'),
                'rules' => [
                    'max:255',
                ]
            ]);

            $form->addField('Varchar', [
                'name' => 'social_pinterest',
                'label' => __('admin::label.social_pinterest'),
                'rules' => [
                    'max:255',
                ]
            ]);
            $form->addField('Varchar', [
                'name' => 'social_disqus',
                'label' => __('admin::label.social_disqus'),
                'rules' => [
                    'max:255',
                ]
            ]);*/


            $form->addTab([
                'label' => __('admin::label.canali_social'),
                'content' => [
                    ['social_facebook|col:6','social_instagram|col:6'],
                    /*
                    ['social_linkedin|col:6','social_twitter|col:6'],
                    ['social_youtube|col:6','social_tumblr|col:6'],
                    ['social_pinterest|col:6','social_disqus|col:6'],
                    ['social_snapchat|col:6','social_tripadvisor|col:6'],
                    */
                ]
            ]);

            $form->addField('Tag', [
                'name' => 'email_destination',
                'type' => 'json',
                'label' => __('admin::label.email_destination')
            ]);

            $form->addField('Select', [
                'name' => 'smtp_auth_id',
                'type' => 'values',
                'resultSet' => SmtpAuths::getSmtpAuthsForSelect(),
                'label' => __('admin::label.smtp_auth'),
                /*'rules' => [
                    'required'
                ]*/
            ]);

            $form->addTab([
                'label' => __('admin::label.email'),
                'content' => [
                    ['email_destination|col:12'],
                    [':separator'],
                    ['smtp_auth_id|col:12'],
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
                    'name' => 'published',
                    'label' => __('admin::label.active'),
                    'width' => '5%',
                    'type' => 'boolean',
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
