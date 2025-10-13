<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Master\Modules\Countries\Facades\Countries;

return [
    'active' => true,

    'model' => Master\Modules\IsoRentReceipts\Models\IsoRentReceipt::class,

    'register' => [
        'registerAdminWebRoutes' => function($module) {

        }
    ],

    'crud' => [
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
                    'name' => 'created_at',
                    'label' => __('admin::label.date'),
                    'width' => '10%',
                    'type' => 'date',
                    'order' => 1,
                    'orderDefault' => 1,
                    'orderDefaultType' => 'desc'
                ],
                [
                    'name' => 'name',
                    'label' => __('admin::label.name'),
                    'width' => '10%',
                    'type' => 'simple',
                    'order' => 1,
                    'orderDefault' => 1,
                    'orderDefaultType' => 'asc'
                ],
                [
                    'name' => 'ski',
                    'label' => __('admin::materials.ski'),
                    'width' => '10%',
                    'type' => 'simple',
                    'order' => 1,
                    'orderDefault' => 0,
                    'orderDefaultType' => ''
                ],
                [
                    'name' => 'height',
                    'label' => __('admin::label.height'),
                    'width' => '10%',
                    'type' => 'simple',
                    'order' => 1,
                    'orderDefault' => 0,
                    'orderDefaultType' => ''
                ],
                [
                    'name' => 'weight',
                    'label' => __('admin::label.weight'),
                    'width' => '10%',
                    'type' => 'simple',
                    'order' => 1,
                    'orderDefault' => 0,
                    'orderDefaultType' => ''
                ],
                [
                    'name' => 'shoe_measure',
                    'label' => __('admin::label.shoe_measure'),
                    'width' => '10%',
                    'type' => 'simple',
                    'order' => 1,
                    'orderDefault' => 0,
                    'orderDefaultType' => ''
                ],
                [
                    'name' => 'uo_age',
                    'label' => __('admin::label.uo_age'),
                    'width' => '10%',
                    'type' => 'boolean',
                    'order' => 1,
                    'orderDefault' => 0,
                    'orderDefaultType' => ''
                ],
                [
                    'name' => 'skier_type',
                    'label' => __('admin::label.skier_type'),
                    'width' => '10%',
                    'type' => 'custom',
                    'formatFunction' => function($qb){
                        return \Master\Facades\Tool::getSkierTypeDescription($qb->skier_type);
                    },
                    'order' => 1,
                    'orderDefault' => 0,
                    'orderDefaultType' => ''
                ],
                [
                    'name' => 'z_value',
                    'label' => __('admin::label.z_value'),
                    'width' => '10%',
                    'type' => 'simple',
                    'order' => 1,
                    'orderDefault' => 0,
                    'orderDefaultType' => ''
                ],
                [
                    'name' => 'signature_pdf',
                    'label' => __('admin::label.signature'),
                    'width' => '10%',
                    'type' => 'custom',
                    'formatFunction' => function($qb) use ($module){
                        $ret = "";
                        $signature_pdf = $qb->getMedia('pdf_file')->first();
                        if ($signature_pdf && file_exists($signature_pdf->getPath())) {
                            $ret .= '<a class="mr-3" target="_blank" href="'.$signature_pdf->getUrl().'"><i class="far fa-file-pdf"></i></a>';
                        }
                        return $ret;
                    }],
                [
                    'name' => 'signature_zpl',
                    'label' => __('admin::label.signature'),
                    'width' => '10%',
                    'type' => 'custom',
                    'formatFunction' => function($qb) use ($module){
                        $ret = "";
                        $signature_zpl = public_path('storage/signatures/iso/').$qb->id.".zpl";
                        if (file_exists($signature_zpl)){
                            if ($ret) $ret .= '&nbsp;';
                            $ret .= '<a class="ml-3" href="#" onclick="adminAjaxCall(this); return false;" data-ajax-call=\'{"action":"'.\Illuminate\Support\Facades\App::make('IsoReceiptsModule')->adminRoute('printIso', ['id'=>$qb->id,'from_receipt'=>1]).'"}\'><i class="fas fa-print"></i></a>';
                        }
                        return $ret;
                    },
                    'searchable' => false,
                    'order' => 0,
                    'orderDefault' => 0,
                    'orderDefaultType' => ''
                ]
            ];
        }
    ]
];
