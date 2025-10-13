<?php

use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Route;

return [
    'active' => true,

    'model' => \Master\Modules\Notifications\Models\Notification::class,

    'register' => [
        'registerAdminWebRoutes' => function($module) {
            Route::match(['GET', 'POST'], '/preview/{id}', [\Master\Modules\Notifications\Controllers\AdminController::class, 'preview'])->name('preview');
            Route::match(['GET', 'POST'], '/message/{id}', [\Master\Modules\Notifications\Controllers\AdminController::class, 'message'])->name('message');
            Route::get('/t/{notification_id}', [\Master\Modules\Notifications\Controllers\AdminController::class, 'trackView'])->name('trackView');
        }
    ],

    'crud' => [
        'form' => function($form) {},

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
                    'name' => 'recipients',
                    'label' => __('admin::label.recipients'),
                    'width' => '',
                    'type' => 'custom',
                    'formatFunction' => function($qb, $field){
                        return implode(";", $qb->{$field['name']});
                    },
                    'order' => 1,
                    'orderDefault' => 0,
                    'orderDefaultType' => ''
                ],
                [
                    'name' => 'subject',
                    'label' => __('admin::label.subject'),
                    'width' => '',
                    'type' => 'simple',
                    'order' => 1,
                    'orderDefault' => 1,
                    'orderDefaultType' => 'ASC'
                ],
                [
                    'name' => 'status',
                    'label' => __('admin::label.status'),
                    'width' => '20%',
                    'type' => 'custom',
                    'formatFunction' => function($qb, $field){

                        $class = "";
                        $label = (Lang::has('admin::notification_status.'.strtolower($qb->{$field['name']}))) ? strtoupper(__('admin::notification_status.'.strtolower($qb->{$field['name']}))) : $qb->{$field['name']};
                        switch($qb->{$field['name']}){
                            case 'awaiting':
                                $class = 'bg-warning-o-20 text-warning';
                                break;
                            case 'sent':
                                $class = 'bg-success-o-20 text-success';
                                break;
                            default:
                                $class = 'bg-danger-o-20 text-danger';
                                break;
                        }
                        return '<p class="rounded p-2 text-center  '.$class.'">'.$label.'</p>';
                    },
                    'order' => 1,
                    'orderDefault' => 0,
                    'orderDefaultType' => ''
                ],
                [
                    'name' => 'date_sent',
                    'label' => __('admin::label.date_sent'),
                    'width' => '15%',
                    'type' => 'custom',
                    'formatFunction' => function($qb){
                        return optional($qb->date_sent_tz)->format('d-m-Y H:i:s');
                    },
                    'order' => 1,
                    'orderDefault' => 0,
                    'orderDefaultType' => ''
                ],
                // [
                //     'name' => 'delayed_send_date',
                //     'label' => __('admin::label.delayed_send_date'),
                //     'width' => '15%',
                //     'type' => 'datetime',
                //     'order' => 1,
                //     'orderDefault' => 0,
                //     'orderDefaultType' => ''
                // ],
                // [
                //     'name' => 'readings',
                //     'label' => __('admin::label.readings'),
                //     'width' => '',
                //     'type' => 'simple',
                //     'order' => 1,
                //     'orderDefault' => 0,
                //     'orderDefaultType' => ''
                // ],
                [
                    'name' => 'created_at',
                    'label' => __('admin::label.created_at'),
                    'width' => '15%',
                    'type' => 'custom',
                    'formatFunction' => function($qb){
                        return optional($qb->created_at_tz)->format('d-m-Y H:i:s');
                    },
                    'order' => 1,
                    'orderDefault' => 1,
                    'orderDefaultType' => 'desc'
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
