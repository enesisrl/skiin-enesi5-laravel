<?php

return [
    'enabled' => env('TWO_FACTOR_ENABLED', true),
    // Numero di giorni per cui il dispositivo può essere ricordato
    // Valore predefinito: 30 giorni, configurabile tramite la variabile d'ambiente TWO_FACTOR_REMEMBER_DAYS
    'remember_device_days' => env('TWO_FACTOR_REMEMBER_DAYS', 30),

    // Indica se l'utente può scegliere di ricordare il login
    // Valore predefinito: true, configurabile tramite la variabile d'ambiente TWO_FACTOR_CAN_REMEMBER_LOGIN
    'can_remember_login' => env('TWO_FACTOR_CAN_REMEMBER_LOGIN', true),

    // Metodi disponibili per l'autenticazione a due fattori
    // 'email' è il metodo predefinito, altri metodi possono essere aggiunti dinamicamente dai service provider
    'available_methods' => [
        'email',
        // Altri metodi verranno aggiunti dinamicamente dai service provider
    ],
];
