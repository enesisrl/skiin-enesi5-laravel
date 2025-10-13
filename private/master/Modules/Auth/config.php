<?php

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

use Master\Modules\Auth\Controllers\AuthenticatedSessionController;
use Master\Modules\Auth\Controllers\ConfirmablePasswordController;
use Master\Modules\Auth\Controllers\EmailVerificationNotificationController;
use Master\Modules\Auth\Controllers\EmailVerificationPromptController;
use Master\Modules\Auth\Controllers\NewPasswordController;
use Master\Modules\Auth\Controllers\PasswordResetLinkController;
use Master\Modules\Auth\Controllers\RegisteredUserController;
use Master\Modules\Auth\Controllers\VerifyEmailController;
use Master\Modules\Users\Facades\Users;

return [
    'active' => true,

    'admin' => [
        'baseurl' => ''
    ],

    'model' => User::class,

    'register' => [
        'registerAdminGuestWebRoutes' => function($module) {
            Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
            Route::post('/register', [RegisteredUserController::class, 'store']);
            Route::get('/login/{token}', [AuthenticatedSessionController::class, 'autologin'])->name('auto-login');
            Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
            Route::post('/login', [AuthenticatedSessionController::class, 'store']);
            Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
            Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
            Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
            Route::post('/reset-password', [NewPasswordController::class, 'store'])->name('password.update');

            event('2fa.auth.register.admin.guest.routes', [$module]);
        },

        'registerAdminWebRoutes' => function($module) {
            Route::get('/verify-email', [EmailVerificationPromptController::class, '__invoke'])->name('verification.notice');
            Route::get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])->middleware(['signed', 'throttle:6,1'])->name('verification.verify');
            Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])->middleware(['throttle:6,1'])->name('verification.send');
            Route::get('/confirm-password', [ConfirmablePasswordController::class, 'show'])->name('password.confirm');
            Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store']);
            Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

            // Service
            Route::post('/auth/service/change-profile', function(){
                return Users::changeProfile();
            })->name('auth-service-change-profile');
            Route::post('/auth/service/change-language', function(){
                return Users::changeLanguage();
            })->name('auth-service-change-language');

            event('2fa.auth.register.admin.routes', [$module]);

        }
    ]
];
