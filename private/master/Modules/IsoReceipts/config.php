<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Master\Modules\Countries\Facades\Countries;

return [
    'active' => true,

    'model' => Master\Modules\IsoReceipts\Models\IsoReceipt::class,

    'register' => [
        'registerAdminWebRoutes' => function($module) {

        }
    ],

    'crud' => [
        'form' => function($form) {

        },

        'list' => function($module){

            $list = [];
            if ($module->can('destroy')) {
                $list[] = [
                    'name' => 'id',
                    'label' => '',
                    'width' => '2%',
                    'type' => 'checkbox',
                    'order' => 0,
                    'orderDefault' => 0,
                    'orderDefaultType' => ''
                ];
            }
            $list[] = [
                'name' => 'created_at',
                'label' => __('admin::label.date'),
                'width' => '10%',
                'type' => 'date',
                'order' => 1,
                'orderDefault' => 1,
                'orderDefaultType' => 'desc'
            ];
            $list[] = [
                'name' => 'last_name',
                'label' => __('admin::label.last_name'),
                'width' => '10%',
                'type' => 'simple',
                'order' => 1,
                'orderDefault' => 1,
                'orderDefaultType' => 'asc'
            ];
            $list[] = [
                'name' => 'first_name',
                'label' => __('admin::label.name'),
                'width' => '10%',
                'type' => 'simple',
                'order' => 1,
                'orderDefault' => 1,
                'orderDefaultType' => 'asc'
            ];
            $list[] = [
                'name' => 'ski',
                'label' => __('admin::materials.ski'),
                'width' => '10%',
                'type' => 'simple',
                'order' => 1,
                'orderDefault' => 0,
                'orderDefaultType' => ''
            ];
            $list[] = [
                'name' => 'height',
                'label' => __('admin::label.height'),
                'width' => '10%',
                'type' => 'simple',
                'order' => 1,
                'orderDefault' => 0,
                'orderDefaultType' => ''
            ];
            $list[] = [
                'name' => 'weight',
                'label' => __('admin::label.weight'),
                'width' => '10%',
                'type' => 'simple',
                'order' => 1,
                'orderDefault' => 0,
                'orderDefaultType' => ''
            ];
            $list[]=[
                'name' => 'shoe_measure',
                'label' => __('admin::label.shoe_measure'),
                'width' => '10%',
                'type' => 'simple',
                'order' => 1,
                'orderDefault' => 0,
                'orderDefaultType' => ''
            ];
            $list[] = [
                'name' => 'uo_age',
                'label' => __('admin::label.uo_age'),
                'width' => '10%',
                'type' => 'boolean',
                'order' => 1,
                'orderDefault' => 0,
                'orderDefaultType' => ''
            ];
            $list[] = [
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
            ];
            $list[] = [
                'name' => 'z_value',
                'label' => __('admin::label.z_value'),
                'width' => '10%',
                'type' => 'simple',
                'order' => 1,
                'orderDefault' => 0,
                'orderDefaultType' => ''
            ];
            $list[] = [
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
                }];
            if ($module->can('destroy')){
                $list[] = [
                    'name' => 'actions',
                    'label' => __('admin::label.actions'),
                    'width' => '10%',
                    'type' => 'actions',
                    'order' => 0,
                    'orderDefault' => 0,
                    'orderDefaultType' => ''
                ];
            }
            return $list;
        }
    ]
];
