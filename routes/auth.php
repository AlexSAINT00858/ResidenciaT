<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\OfferController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    // Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
    //             ->name('password.request');

    // Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
    //             ->name('password.email');

    // Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
    //             ->name('password.reset');

    // Route::post('reset-password', [NewPasswordController::class, 'store'])
    //             ->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/registerOffer', [OfferController::class, 'showRegisterOffer'])->name('registerOffer');
    Route::post('/registerOffer', [OfferController::class, 'registerOffer'])->name('registerOffer');
    //editar offerta
    //Capturamos la variable que nos proporciona la vista por medio del post
    //Para llevar un control de que oferta editar
    Route::get('/editOffer/{idOffer}', [OfferController::class, 'showEditOffer'])->name('editOffer');
    Route::post('/editOffer/{idOffer}', [OfferController::class, 'editOffer'])->name('editOffer');

    //Eliminar card
    Route::get('/deleteOffer/{idOffer}', [OfferController::class, 'deleteOffer'])
    ->name('deleteOffer');

    //Mostrar todas las ofertas sin importar si ya fueron eliminada
    Route::get('/showHistory', [OfferController::class, 'showHistory'])
    ->name('showHistory');

    //Mostrar postulantes de una oferta
    Route::get('/getCandidatesByOffer/{idOffer}', [OfferController::class, 'getCandidatesByOffer'])
    ->name('getCandidatesByOffer');

    Route::get('/deleteJobApplication/{idJobApplication}/{idOffer}', [OfferController::class, 'deleteJobApplication'])
    ->name('deleteJobApplication');

    // Route::get('verify-email', EmailVerificationPromptController::class)
    //             ->name('verification.notice');

    // Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
    //             ->middleware(['signed', 'throttle:6,1'])
    //             ->name('verification.verify');

    // Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
    //             ->middleware('throttle:6,1')
    //             ->name('verification.send');

    // Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
    //             ->name('password.confirm');

    // Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    // Route::put('password', [PasswordController::class, 'update'])->name('password.update');
    //Cerrar sesion
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});
