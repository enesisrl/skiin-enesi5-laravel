<?php

use Front\Main\Controllers\ApiController;
use Illuminate\Support\Facades\Route;



Route::group(['middleware' => ['setApiLocale', 'cors', 'json.response', 'nocache']], function () {

    Route::prefix('mail/')->group(function () {
        Route::any('send', [ApiController::class, 'sendMail'])->name('api-mail-send');
        Route::any('send-test', [ApiController::class, 'sendTestMail'])->name('api-mail-send-test');
    });

    Route::prefix('app/1.0/')->group(function () {
        Route::prefix('{language}/')->group(function () {
            Route::post( 'globals', [ApiController::class, 'globals'])->name('app-globals');

            Route::group(['middleware' => ['appUser.update']], function () {
                Route::post('home',[ApiController::class, 'home'])->name('app-home');
                Route::post('publications',[ApiController::class, 'publications'])->name('app-publications');
                Route::match(['post','get'],'publications/{publication}',[ApiController::class, 'publication'])->name('app-publication');
                Route::post('shops',[ApiController::class, 'shops'])->name('app-shops');
                Route::match(['post','get'],'shops/{shop}',[ApiController::class, 'shop'])->name('app-shop');
                Route::post('services',[ApiController::class, 'services'])->name('app-services');


                Route::post('user/auth',[ApiController::class, 'userAuth'])->name('app-userAuth');
                Route::post('user/loginWith',[ApiController::class, 'loginWith'])->name('app-loginWith');
                Route::post('user/check',[ApiController::class, 'userCheck'])->name('app-userCheck');
                Route::post('user/consents',[ApiController::class, 'userConsents'])->name('app-userConsents');
            });
            Route::post('user/create',[ApiController::class, 'userCreate'])->name('app-userCreate');
            Route::post('user/update',[ApiController::class, 'userUpdate'])->name('app-userUpdate');
            Route::post('user/delete',[ApiController::class, 'userDelete'])->name('app-userDelete');
            Route::post('user/pwd-recover',[ApiController::class, 'userPwdRecovery'])->name('app-userPwdRecovery');

            Route::post('notifications/registerToken',[ApiController::class, 'registerToken'])->name('app-registerToken');
            Route::post('notifications/unregisterToken',[ApiController::class, 'unregisterToken'])->name('app-unregisterToken');
            Route::post('notifications/list',[ApiController::class, 'notificationList'])->name('app-notificationList');
            Route::post('notifications/badge',[ApiController::class, 'notificationsBadge'])->name('app-notificationsBadge');
            Route::post('notifications/set-last-access',[ApiController::class, 'setLastAccessNotifications'])->name('app-setLastAccessNotifications');
        });
    });
});