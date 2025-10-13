<?php

return [
    'projectUid' => env('PRIVACY_PROJECT_UID',0),
    'username' => env('PRIVACY_AUTH_USER',null),
    'password' => env('PRIVACY_AUTH_PASSWORD',null),
    'appURL' => env('PRIVACY_APP_URL',null),
    'rest_ene_si_tokens_directory' => env('REST_ENE_SI_TOKENS_DIRECTORY',null),
    'rest_ene_si_api_debug' => env('REST_ENE_SI_API_DEBUG',false),
    'signup_privacy_info' => env('SIGNUP_PRIVACY_ID_INFO',0),
    'signup_privacy_marketing' => env('SIGNUP_PRIVACY_ID_MARKETING',0)
];
