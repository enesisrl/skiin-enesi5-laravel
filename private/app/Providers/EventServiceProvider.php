<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'Illuminate\Auth\Events\Attempting' => [
            'Master\Modules\Auth\Listeners\LogAuthenticationAttempt',
        ],

        'Illuminate\Auth\Events\Authenticated' => [
            'Master\Modules\Auth\Listeners\LogAuthenticated',
        ],

        'Illuminate\Auth\Events\Login' => [
            'Master\Modules\Auth\Listeners\LogSuccessfulLogin',
        ],

        'Illuminate\Auth\Events\Failed' => [
            'Master\Modules\Auth\Listeners\LogFailedLogin',
        ],

        'Illuminate\Auth\Events\Validated' => [
            'Master\Modules\Auth\Listeners\LogValidated',
        ],

        'Illuminate\Auth\Events\Verified' => [
            'Master\Modules\Auth\Listeners\LogVerified',
        ],

        'Illuminate\Auth\Events\Logout' => [
            'Master\Modules\Auth\Listeners\LogSuccessfulLogout',
        ],

        'Illuminate\Auth\Events\CurrentDeviceLogout' => [
            'Master\Modules\Auth\Listeners\LogCurrentDeviceLogout',
        ],

        'Illuminate\Auth\Events\OtherDeviceLogout' => [
            'Master\Modules\Auth\Listeners\LogOtherDeviceLogout',
        ],

        'Illuminate\Auth\Events\Lockout' => [
            'Master\Modules\Auth\Listeners\LogLockout',
        ],

        'Illuminate\Auth\Events\PasswordReset' => [
            'Master\Modules\Auth\Listeners\LogPasswordReset',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
