<?php

use Front\Main\Controllers\ApiController;
use Front\Main\Controllers\PagesController;

use Illuminate\Support\Facades\Route;


/* Pagine
------------------------------------------------------------ */

Route::group(['middleware' => ['cors', 'json.response', 'nocache'], 'locale' => 'it'], function () {
    Route::get('i18n/app/translations',[ApiController::class, 'translations'])->name('app-translations');
});

Route::any('/', [PagesController::class, 'home'])->name('index');
Route::any('/privacy-policy', [PagesController::class, 'privacyPolicyGlobal'])->name('privacy-policy-global');
Route::get('/account-deletion', [PagesController::class, 'accountDeletion'])->name('account.deletion');
Route::any('/testMail', [PagesController::class, 'testMail'])->name('testMail');

// Home
Route::group(['as' => 'it.', 'locale' => 'it'], function () {
    Route::get('/', [PagesController::class, 'home'])->name('home');
    Route::prefix('it/')->group(function () {
        Route::get('/account-confirmation/{id}', [PagesController::class, 'accountConfirmation'])->name('account.confirmation');
        Route::get('/account-deletion', [PagesController::class, 'accountDeletionPage'])->name('account.deletionPage');
        Route::get('/privacy-policy', [PagesController::class, 'privacyPolicy'])->name('privacyPolicy');
    });
});