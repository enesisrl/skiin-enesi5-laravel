<?php

return [
    'typologies' => [
        'rent_deposit' => env('TYPOLOGY_RENT_DEPOSIT',1),
        'only_deposit' => env('TYPOLOGY_ONLY_DEPOSIT',2),
        'only_rent' => env('TYPOLOGY_ONLY_RENT',3)
    ],
    'skier_types' => [
        'beginner' => env('SKIER_TYPE_BEGINNER',1),
        'average' => env('SKIER_TYPE_AVERAGE',2),
        'expert' => env('SKIER_TYPE_EXPERT',3),
    ],
    'categories' => [
        'cabinets' => env('CABINETS_CATEGORY_ID','d9978e28-3d10-4b9e-892f-50cdefcaaeb2'),
        'departments' => [
            'ski-snowboard' => env('DEPARTMENT_SKI_SNOWBOARD',0),
            'boots' => env('DEPARTMENT_BOOTS',1),
            'other' => env('DEPARTMENT_OTHER',2),
            'bikes' => env('DEPARTMENT_BIKES',3)
        ]
    ],
    'paths' => [
        'signature' => env('SIGNATURE_PATH', "/storage/signatures/"),
        'docs' => env('DOCS_PATH', "/storage/documents/")
    ],
    'urls' => [
        'enesi5' => env('URL_ENESI_5','https://skiin.enesi5.it/'),
        'booking' => env('URL_BOOKING','https://admin.skiincourmayeur.it/')
    ],
    'websocket_server' => env('WEBSOCKET_SERVER','ws://gestionale.skiin.enesi.vm:8080'),
    'ws' => [
        'booking' => [
            'username' => env('WS_USERNAME','info@skiincourmayeur.it'),
            'password' => env('WS_PASSWORD','skiincourma')
        ],
        'enesi5' => [
            'username' => env('WS5_USERNAME','cassa'),
            'password' => env('WS5_PASSWORD','cassa')
        ],
        'cloud' => [
            'username' => env('CLOUD_USERNAME','enesi5'),
            'password' => env('CLOUD_PASSWORD','66e81a26cc61e8')
        ]
    ],
    'websites' => [
        'checrouit' => env('WEBSITE_ID_CHECROUIT','e0fbeeb2-a913-4785-91bb-97d0037df035'),
        'regionale' => env('WEBSITE_ID_REGIONALE','3ad4af84-efa8-46c2-aacc-3ce48b3dcc51'),
        'booking' => env('WEBSITE_ID_BOOKING','f738ced9-192e-4147-ac94-786e1ab7a609'),
        'tour-operator' => env('WEBSITE_ID_TOUR_OPERATOR','e83a6b42-20e9-4766-95e3-a5c304cc6b10')
    ],
    'consent_register' => [
        'commercial' => 10011
    ],
    'newsletter'=>[
        'idr' => [
            '5f3f41970229d0957a3520da79cabfd4'
        ]
    ],
    'documents' => [
        'expire_date_day' => env('DOCUMENT_EXPIRE_DATE_DAY','30'),
        'expire_date_month' => env('DOCUMENT_EXPIRE_DATE_MONTH','06'),
    ],
    'booking-domain' => env('BOOKING_DOMAIN','booking.skiincourmayeur.it'),
    'tour-operator-domain' => env('TOUR_OPERATOR_DOMAIN','touroperator.skiincourmayeur.it'),
    'booking' => [
        'invoice_prefix' => env('BOOKING_INVOICE_PREFIX','WEB'),
        'sync_type' => env('BOOKING_SYNC_TYPE','web'),
        'summary_text_truncate_length' => env('BOOKING_SUMMARY_TEXT_TRUNCATE_LENGTH',100),
        'articles' => [
            'typologies' => [
                'ski-snowboard' => env('BOOKING_ARTICLES_TYPOLOGY_SKI_SNOWBOARD','sci - snowboard'),
                'boots' => env('BOOKING_ARTICLES_TYPOLOGY_BOOTS','scarponi'),
                'other' => env('BOOKING_ARTICLES_TYPOLOGY_OTHER','altro'),
            ],
            'sections' => [
                'ski' => env('BOOKING_ARTICLES_TYPOLOGY_SKI', 1),
                'boots_ski' => env('BOOKING_ARTICLES_TYPOLOGY_BOOTS_SKI', 2),
                'snowboard' => env('BOOKING_ARTICLES_TYPOLOGY_SNOWBOARD', 3),
                'boots_snowboard' => env('BOOKING_ARTICLES_TYPOLOGY_BOOTS_SNOWBOARD', 4),
                'helmets' => env('BOOKING_ARTICLES_TYPOLOGY_HELMETS', 5),
                'snowshoes' => env('BOOKING_ARTICLES_TYPOLOGY_SNOWSHOES', 6),
                'wardrobes' => env('BOOKING_ARTICLES_TYPOLOGY_WARDROBES', 7),
                'bikes' => env('BOOKING_ARTICLES_TYPOLOGY_BIKES', 8),
                'other' => env('BOOKING_ARTICLES_TYPOLOGY_OTHER', 9)
            ]
        ],
        'account' => [
            'reservations_per_page' => env('BOOKING_ACCOUNT_RESERVATIONS_PER_PAGE',20)
        ],
        'debug_ccn' => [
            'active' => env('BOOKING_DEBUG_CCN',false),
            'recipient' => env('BOOKING_DEBUG_CCN_RECIPIENT',null),
        ],
    ],
    'two-factor' => [
        'required' => env('TWO_FACTOR_REQUIRED', false)
    ]
];
