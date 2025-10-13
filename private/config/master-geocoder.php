<?php

/**
 * Configurazione per il pacchetto LaravelMasterGeocoder
 *
 * Questo file contiene tutte le configurazioni necessarie per utilizzare
 * i diversi provider di geocodifica supportati dal pacchetto.
 *
 * @package Enesisrl\LaravelMasterGeocoder
 */

return [
    /**
     * Provider di geocodifica predefinito
     *
     * Specifica quale servizio di geocodifica utilizzare come predefinito.
     * Valori possibili: 'photon', 'nominatim'
     *
     * Si può impostare tramite variabile d'ambiente GEOCODER_PROVIDER
     *
     * @var string
     */
    'default' => env('GEOCODER_PROVIDER', 'nominatim'),

    /**
     * Configurazioni specifiche per ciascun provider di geocodifica supportato
     *
     * @var array
     */
    'providers' => [
        /**
         * Configurazione per il provider Photon
         *
         * Photon è un servizio di geocodifica basato su OpenStreetMap ottimizzato
         * per prestazioni e ricerche in tempo reale.
         *
         * @link https://photon.komoot.io/ Documentazione ufficiale di Photon
         */
        'photon' => [
            /**
             * Endpoint base API di Photon
             *
             * Per il reverse geocoding, il sistema sostituirà automaticamente
             * '/api' con '/reverse' o aggiungerà '/reverse' alla fine dell'URL.
             *
             * @var string
             */
            'endpoint' => 'https://photon.komoot.io/api/',
            /**
             * Timeout da utilizzare nelle richieste HTTP
             *
             *
             * @var int
             */
            'timeout' => env('PHOTON_TIMEOUT', 5)
        ],

        /**
         * Configurazione per il provider Nominatim
         *
         * Nominatim è il servizio di geocodifica ufficiale di OpenStreetMap.
         * È necessario rispettare l'Usage Policy di Nominatim:
         * https://operations.osmfoundation.org/policies/nominatim/
         *
         * @link https://nominatim.org/release-docs/latest/ Documentazione ufficiale di Nominatim
         */
        'nominatim' => [
            /**
             * Endpoint base API di Nominatim
             *
             * Per il reverse geocoding, il sistema aggiungerà automaticamente
             * '/reverse' al posto di '/search'.
             *
             * @var string
             */
            'endpoint' => 'https://nominatim.openstreetmap.org/search',

            /**
             * User-Agent personalizzato per le richieste a Nominatim
             *
             * Nominatim richiede un User-Agent che identifichi chiaramente l'applicazione.
             * È consigliabile personalizzare questo valore con il nome della propria applicazione.
             *
             * Si può impostare tramite variabile d'ambiente NOMINATIM_USER_AGENT
             *
             * @var string
             */
            'user_agent' => env('NOMINATIM_USER_AGENT', 'LaravelMasterGeocoder/1.0 (https://github.com/enesisrl/laravel-master-geocoder)'),

            /**
             * Timeout da utilizzare nelle richieste HTTP
             *
             *
             * @var int
             */
            'timeout' => env('NOMINATIM_TIMEOUT', 5)
        ],
    ],
];
