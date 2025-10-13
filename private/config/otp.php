<?php

return [
    /**
     * Lunghezza del codice OTP.
     *
     * Questo valore definisce il numero di caratteri del codice OTP generato.
     * Può essere configurato tramite la variabile d'ambiente `TWO_FACTOR_OTP_LENGTH`.
     */
    'otp-length' => env('TWO_FACTOR_OTP_LENGTH', 6),

    /**
     * Tipo di codice OTP.
     *
     * Specifica il formato del codice OTP generato. I valori possibili sono:
     * - `numeric`: solo numeri
     * - `alpha_numeric`: lettere e numeri
     * Può essere configurato tramite la variabile d'ambiente `TWO_FACTOR_OTP_TYPE`.
     */
    'otp-type' => env('TWO_FACTOR_OTP_TYPE', 'numeric'),

    /**
     * Validità del codice OTP in minuti.
     *
     * Indica per quanto tempo il codice OTP sarà considerato valido dopo la sua generazione.
     * Può essere configurato tramite la variabile d'ambiente `TWO_FACTOR_OTP_VALIDITY_MINUTES`.
     */
    'otp-validity-minutes' => env('TWO_FACTOR_OTP_VALIDITY_MINUTES', 15),
];
