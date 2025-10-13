<?php


/*

-----
Caricamento dei moduli:
I file di configurazione dei moduli
vengono caricati qui in modo da sfruttare il caching di Laravel
-----

*/

return [
    'author' => [
        'name' => env("MASTER_AUTHOR_NAME",'Enesi s.r.l.'),
        'url' => env("MASTER_AUTHOR_URL",'https://www.enesi.it/'),
    ],
    'debug_domain' => env("DEBUG_DOMAIN",'localhost'),
    'command_domain' => env("COMMAND_DOMAIN",'localhost'),
    'login_url' => env("LOGIN_URL",null),
    'use_epp' => env("USE_EPP",false),
    'admin' => [
        'baseurl' => 'admin',
        'superuser_username' => 'info@enesi.it',
        'test_mail_to' => env("TEST_MAIL_TO","technical@enesi.it"),
        'debug_mail_to' => env("DEBUG_MAIL_TO","technical@enesi.it"),
        'view_mode_enabled' => env("ADMIN_VIEW_MODE_ENABLED",false)
    ],
    'max_trashed_days' => env("MAX_TRASHED_DAYS",30),
    'max_draft_days' => env("MAX_DRAFT_DAYS",1),
    'constants' => [
        'id_country_italia' => 'ec374182-d317-4007-a3d8-914750044bab'
    ],
    'translations' => [
        'cache_driver' => env('TRANSLATIONS_CACHE_DRIVER','database')
    ],
    'website' => [
        'cache_driver' => env('WEBSITE_CACHE_DRIVER','database')
    ],
    'contentConfigsClass' => [
        'contentGallery' => 'MediaLibrary',
        'contentAttachment' => 'File'
    ],
    'contentConfigs' => [
        "contentGallery" => [
            'maxNumberOfFiles' => 200,
            'allowedFileTypes' => ['.jpg', '.jpeg', '.png', '.gif']
        ],
        "contentAttachment" => [
            'maxNumberOfFiles' => 1,
            'allowedFileTypes' => ['.pdf', '.doc', '.docx', '.xls', '.xlsx','.zip','.rar'.'.7z']
        ],
        "contentAttachmentText" => [

        ],
        "contentArticle" => [
            'maxNumberOfFiles' => 1,
            'allowedFileTypes' => ['.jpg', '.jpeg', '.png', '.gif']
        ],
        "contentArticleText" => [

        ],
        "contentArticleSelectOptions" => [
            ["value" => 'left-pic-right-text'],
            ["value" => 'right-pic-left-text'],
            ["value" => 'top-pic-bottom-text'],
            ["value" => 'bottom-pic-top-text']
        ]
    ]

];
