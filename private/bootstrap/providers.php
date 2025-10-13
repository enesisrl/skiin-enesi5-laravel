<?php

// Provider di terze parti estratti come costante per maggiore chiarezza
$THIRD_PARTY_PROVIDERS = [
    Yajra\DataTables\DataTablesServiceProvider::class,
    Spatie\Permission\PermissionServiceProvider::class,
    Cog\Laravel\Ban\Providers\BanServiceProvider::class,
    Illuminate\Redis\RedisServiceProvider::class,
    SimonSchaufi\LaravelDKIM\DKIMMailServiceProvider::class
];

// Provider dell'applicazione organizzati in una variabile più leggibile
$appProviders = [
    App\Providers\AppServiceProvider::class,
    App\Providers\AuthServiceProvider::class,
    App\Providers\EventServiceProvider::class,
    App\Providers\RouteServiceProvider::class,
    App\Providers\MasterServiceProvider::class,
    App\Providers\FrontServiceProvider::class,
    App\Providers\DynamicMailProvider::class
];

// Unione di entrambi i gruppi di provider
$serviceProviders = array_merge($appProviders, $THIRD_PARTY_PROVIDERS);

return $serviceProviders;
