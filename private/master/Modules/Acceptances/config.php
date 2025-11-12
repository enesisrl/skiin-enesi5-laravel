<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Master\Modules\Acceptances\Facades\Acceptances;
use Master\Modules\Countries\Facades\Countries;

return [
    'active' => true,

    'model' => Master\Modules\Acceptances\Models\Acceptance::class,

    'register' => [
        'registerAdminWebRoutes' => function($module) {

        }
    ],

    'crud' => [

        'searchForm' => function($searchForm){
            $sessionValues = [];
            if ($users_customSearch = session()->get("acceptances_customSearch")){
                foreach($users_customSearch as $val){
                    $sessionValues[$val["name"]] = $val["value"];
                }
            }
            $searchForm->addField('Select', [
                'name' => 'acceptances.typology_1',
                'type' => 'values',
                'resultSet' => Acceptances::getAcceptanceTypologies(),
                'label' => __('admin::label.typology_1'),
                'sessionValue' => $sessionValues["acceptances.typology_1"] ?? null,
            ]);

            $searchForm->addField('Select', [
                'name' => 'acceptances.typology_2',
                'type' => 'values',
                'resultSet' => Acceptances::getAcceptanceTypologies(),
                'label' => __('admin::label.typology_2'),
                'sessionValue' => $sessionValues["acceptances.typology_2"] ?? null,
            ]);

            $searchForm->addField('Select', [
                'name' => 'acceptances.typology_3',
                'type' => 'values',
                'resultSet' => Acceptances::getAcceptanceTypologies(),
                'label' => __('admin::label.typology_3'),
                'sessionValue' => $sessionValues["acceptances.typology_3"] ?? null,
            ]);

            $searchForm->addField('Varchar', [
                'name' => 'acceptances.article_1',
                'label' => __('admin::label.art_code_1'),
                'sessionValue' => $sessionValues["acceptances.article_1"] ?? null,
            ]);

            $searchForm->addField('Varchar', [
                'name' => 'acceptances.article_2',
                'label' => __('admin::label.art_code_2'),
                'sessionValue' => $sessionValues["acceptances.article_2"] ?? null,
            ]);

            $searchForm->addField('Varchar', [
                'name' => 'acceptances.article_3',
                'label' => __('admin::label.art_code_3'),
                'sessionValue' => $sessionValues["acceptances.article_3"] ?? null,
            ]);

            $searchForm->addField('Varchar', [
                'name' => 'acceptances.site_1',
                'label' => __('admin::label.site_1'),
                'sessionValue' => $sessionValues["acceptances.site_1"] ?? null,
            ]);

            $searchForm->addField('Varchar', [
                'name' => 'acceptances.site_2',
                'label' => __('admin::label.site_2'),
                'sessionValue' => $sessionValues["acceptances.site_2"] ?? null,
            ]);

            $searchForm->addField('Varchar', [
                'name' => 'acceptances.barcode',
                'label' => __('admin::label.acceptance_barcode'),
                'sessionValue' => $sessionValues["acceptances.barcode"] ?? null,
            ]);

            $searchForm->addField('Varchar', [
                'name' => 'acceptances.name',
                'label' => __('admin::label.acceptance_name'),
                'sessionValue' => $sessionValues["acceptances.name"] ?? null,
            ]);

            $searchForm->addField('Varchar', [
                'name' => 'acceptances.identity',
                'label' => __('admin::label.acceptance_identity'),
                'sessionValue' => $sessionValues["acceptances.identity"] ?? null,
            ]);

            $searchForm->addField('Varchar', [
                'name' => 'acceptances.reservation',
                'label' => __('admin::label.reservation_number'),
                'sessionValue' => $sessionValues["acceptances.reservation"] ?? null,
            ]);

            $searchForm->addField('Date', [
                'name' => 'acceptances.date_in',
                'type'=>'date',
                'label' => __('admin::label.date_in'),
                'sessionValue' => $sessionValues["acceptances.date_in"] ?? null,
            ]);

            $searchForm->addField('Date', [
                'name' => 'acceptances.date_out',
                'type'=>'date',
                'label' => __('admin::label.date_out'),
                'sessionValue' => $sessionValues["acceptances.date_out"] ?? null,
            ]);


            $searchForm->addField('Select', [
                'name' => 'acceptances.insurance',
                'label' => __('admin::label.insurance'),
                'type' => 'values',
                'resultSet' => [['value'=>-1,'description'=>__('admin::label.no')],['value'=>1,'description'=>__('admin::label.yes')]],
                'sessionValue' => $sessionValues["acceptances.insurance"] ?? null,
            ]);

            $searchForm->addField('Select', [
                'name' => 'orderField',
                'label' => __('admin::label.orderField'),
                'type' => 'values',
                'resultSet' => Acceptances::getSearchFormOrderFields(),
                'sessionValue' => $sessionValues["orderField"] ?? null,
            ]);

            $searchForm->addField('Select', [
                'name' => 'orderType',
                'label' => __('admin::label.orderType'),
                'type' => 'values',
                'resultSet' => [['value'=>'ASC','description'=>__('admin::label.asc')],['value'=>'DESC','description'=>__('admin::label.desc')]],
                'sessionValue' => $sessionValues["orderType"] ?? null,
            ]);

            $searchForm->addTab([
                'label' => __('admin::label.parametri_ricerca'),
                'content' => [
                    [':separator'],
                    ['acceptances.typology_1|col:4','acceptances.article_1|col:4','acceptances.site_1|col:4'],
                    ['acceptances.typology_2|col:4','acceptances.article_2|col:4','acceptances.site_2|col:4'],
                    ['acceptances.typology_3|col:4','acceptances.article_3|col:4'],
                    ['acceptances.barcode|col:4','acceptances.name|col:4','acceptances.identity|col:4'],
                    ['acceptances.reservation|col:4'],
                    ['acceptances.date_in|col:4','acceptances.date_out|col:4'],
                    ['acceptances.insurance|col:4'],
                    [':separator'],
                    ['orderField|col:4','orderType|col:4'],
                ]
            ]);



        },

        'form' => function($form) {

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
                    'name' => 'barcode',
                    'label' => __('admin::label.acceptance_code'),
                    'width' => '10%',
                    'type' => 'custom',
                    'formatFunction' => function($qb){
                        $ret = '<div class="d-flex align-items-center justify-content-between">';

                        if($qb->refundable){
                            $ret .= '<span class="label text-nowrap label-lg label-info"><i class="fas fa-euro-sign text-light"></i></span>&nbsp;';
                        }
                        $ret .= '&nbsp;<span class="label text-nowrap label-lg font-weight-bold text-dark label-light label-inline">' . $qb->barcode . '</span>';
                        $ret .= '</div>';
                        return $ret;
                    },
                    'order' => 1,
                    'orderDefault' => 0,
                    'orderDefaultType' => ''
                ],
                [
                    'name' => 'site_1',
                    'label' => __('admin::label.ski_code_and_site'),
                    'width' => '10%',
                    'type' => 'custom',
                    'formatFunction' => function($qb){
                        $pos = $art = null;
                        $text = '';

                        if ($qb->returned_1){
                            $text .= '<span class="label text-nowrap label-lg font-weight-bold text-dark label-success label-inline">';
                        }

                        if(!$qb->site_1 || $qb->site_1 == 0){
                            $pos = "-";
                            $art = "-";
                        }else{
                            $pos = $qb->site_1;
                            if($qb->typology_1 == config('constants.typologies.only_deposit')){
                                $art = "-";
                            }else{
                                if(!$qb->article_1){
                                    $art = '<span class="text-danger">???</span>';
                                }else{
                                    $art = $qb->article_1;
                                }
                            }
                        }
                        $text .= implode(" - ",[$art,$pos]);

                        if ($qb->returned_1){
                            $text .= '</span>';
                        }


                        return $text;

                    },
                    'order' => 0,
                    'orderDefault' => 0,
                    'orderDefaultType' => ''
                ],
                [
                    'name' => 'site_2',
                    'label' => __('admin::label.boots_code_and_site'),
                    'width' => '10%',
                    'type' => 'custom',
                    'formatFunction' => function($qb){
                        $pos = $art = null;
                        $text = '';
                        if ($qb->returned_2){
                            $text .= '<span class="label text-nowrap label-lg font-weight-bold text-dark label-success label-inline">';
                        }
                        if(!$qb->site_2 || $qb->site_2 == 0){
                            $pos = "-";
                            $art = "-";
                        }else{
                            $pos = $qb->site_2;
                            if($qb->typology_2 == config('constants.typologies.only_deposit')){
                                $art = "-";
                            }else{
                                if(!$qb->article_2){
                                    $art = '<span class="text-danger">???</span>';
                                }else{
                                    $art = $qb->article_2;
                                }
                            }
                        }
                        $text .= implode(" - ",[$art,$pos]);
                        if ($qb->returned_2){
                            $text .= '</span>';
                        }
                        return $text;
                    },
                    'order' => 0,
                    'orderDefault' => 0,
                    'orderDefaultType' => 'ASC'
                ],
                [
                    'name' => 'article_3',
                    'label' => __('admin::label.other_code'),
                    'width' => '10%',
                    'type' => 'custom',
                    'formatFunction' => function($qb){
                        $art = null;
                        $text = '';
                        if ($qb->returned_3){
                            $text .= '<span class="label text-nowrap label-lg font-weight-bold text-dark label-success label-inline">';
                        }
                        if(!$qb->category_id_3){
                            $art = "-";
                        }else{
                            if($qb->category_id_3 == config('constants.categories.cabinets')){
                                $art = "PIN".substr($qb->site_3,-2);
                            }else{
                                if(!$qb->article_3){
                                    $art = '<span class="text-danger">???</span>';
                                }else{
                                    $art = $qb->article_3;
                                }
                            }
                        }
                        $text .= $art;
                        if ($qb->returned_3){
                            $text .= '</span>';
                        }
                        return $text;
                    },
                    'order' => 0,
                    'orderDefault' => 0,
                    'orderDefaultType' => ''
                ],
                [
                    'name' => 'date_in',
                    'label' => __('admin::label.date_in'),
                    'width' => '10%',
                    'type' => 'date',
                    'order' => 0,
                    'orderDefault' => 0,
                    'orderDefaultType' => ''
                ],
                [
                    'name' => 'date_out',
                    'label' => __('admin::label.date_out'),
                    'width' => '10%',
                    'type' => 'date',
                    'order' => 0,
                    'orderDefault' => 0,
                    'orderDefaultType' => ''
                ],
                [
                    'name' => 'customer_name',
                    'label' => __('admin::label.name_and_identity'),
                    'width' => '',
                    'type' => 'custom',
                    'formatFunction' => function($qb){
                        $ret = "";
                        if($qb->agency){
                            $ret .= '<strong>';
                        }
                        $ret .= $qb->name;
                        if($qb->identity){
                            $ret .= '<br />(<em>'.addslashes(stripslashes($qb->identity)).'</em>)';
                        }
                        if($qb->agency){
                            $ret .= '</strong>';
                        }
                        return $ret;
                    },
                    'order' => 0,
                    'orderDefault' => 0,
                    'orderDefaultType' => ''
                ],
                [
                    'name' => 'insurance',
                    'label' => __('admin::label.insurance'),
                    'width' => '10%',
                    'type' => 'boolean',
                    'order' => 1,
                    'orderDefault' => 0,
                    'orderDefaultType' => ''
                ],
                [
                    'name' => 'doc',
                    'label' => __('admin::label.doc'),
                    'width' => '10%',
                    'type' => 'custom',
                    'formatFunction' => function($qb){
                        return "";
                        $doc = "";
                        $class = 'info';
                        if ($qb->document == 'WEB'){
                            $class = 'info';
                            $doc = '<strong>WEB</strong>';
                        }elseif($qb->document){
                            $class = 'success';
                            $doc = '<a target="_blank" href="'.$qb->document.'"><i class="far fa-file-pdf"></i></a>';
                        }else{
                            $class = 'danger';
                            $doc = '<i class="text-danger fas fa-times"></i>';
                        }
                        return '<span class="label text-nowrap label-lg font-weight-bold label-light-' . $class . ' label-inline">' . $doc . '</span>';
                    },
                    'searchable' => false,
                    'order' => 0,
                    'orderDefault' => 0,
                    'orderDefaultType' => ''
                ],
                [
                    'name' => 'signature',
                    'label' => __('admin::label.signature'),
                    'width' => '10%',
                    'type' => 'custom',
                    'formatFunction' => function($qb){
                        return "";
                        $ret = "";
                        $signature_pdf = public_path('storage/signatures/iso/').$qb->id.".pdf";
                        if (file_exists($signature_pdf)){
                            $ret .= '<a class="mr-3" target="_blank" href="'.asset('/storage/signatures/iso/')."/".$qb->id.".pdf".'"><i class="far fa-file-pdf"></i></a>';
                        }
                        $signature_zpl = public_path('storage/signatures/iso/').$qb->id.".zpl";
                        if (file_exists($signature_zpl)){
                            if ($ret) $ret .= '&nbsp;';
                            $ret .= '<a class="ml-3" href="#" onclick="adminAjaxCall(this); return false;" data-ajax-call=\'{"action":"'.\Illuminate\Support\Facades\App::make('IsoReceiptsModule')->adminRoute('printIso', ['id'=>$qb->id,'from_receipt'=>0]).'"}\'><i class="fas fa-print"></i></a>';
                        }
                        return $ret;
                    },
                    'searchable' => false,
                    'order' => 0,
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
