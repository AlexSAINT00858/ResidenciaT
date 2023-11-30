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
    use App\Http\Controllers\CompanyController;
    use App\Http\Controllers\OfferController;
    use Illuminate\Support\Facades\Route;

    Route::middleware('guest')->group(function () {
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
        //Rutas para las acciones de las compañias
        Route::get('/registerCompany', [CompanyController::class, 'showRegisterCompany'])
            ->name('registerCompany');
        Route::post('/registerCompany', [CompanyController::class, 'registerCompany'])
            ->name('registerCompany');
        Route::get('/viewCompanies', [CompanyController::class, 'showAllCompanies'])
            ->name('viewCompanies');
        Route::get('/editCompany/{idCompany}', [CompanyController::class, 'showEditCompany'])
            ->name('editCompany');
        Route::post('/editCompany/{idCompany}', [CompanyController::class, 'editCompany'])
            ->name('editCompany');
        Route::get('/deleteCompany/{idCompany}', [CompanyController::class, 'deleteCompany'])
            ->name('deleteCompany');

        //Rutas para las acciones de las ofertas de empleo
        Route::get('/registerOffer', [OfferController::class, 'showRegisterOffer'])
            ->name('registerOffer');
        Route::post('/registerOfferWithData', [OfferController::class, 'registerOfferWithData'])
            ->name('registerOfferWithData');
        Route::post('/registerOfferWithOutData', [OfferController::class, 'registerOfferWithOutData'])
            ->name('registerOfferWithOutData');
        //editar offerta
        //Capturamos la variable que nos proporciona la vista por medio del post
        //Para llevar un control de que oferta editar
        Route::get('/editOffer/{idOffer}', [OfferController::class, 'showEditOffer'])->name('editOffer');
        Route::post('/editOffer/{idOffer}', [OfferController::class, 'editOffer'])->name('editOffer');

        //Cambiar es estado de la card
        Route::get('/changeStateOfferWithData/{idOffer}', [OfferController::class, 'changeStateOfferWithData'])
            ->name('changeStateOfferWithData');
        Route::get('/changeStateOfferWithOutData/{idOffer}', [OfferController::class, 'changeStateOfferWithOutData'])
            ->name('changeStateOfferWithOutData');

        //Eliminar card de la bd
        Route::get('/deleteOfferWithData/{idOffer}', [OfferController::class, 'deleteOfferWithData'])
            ->name('deleteOfferWithData');
        Route::get('/deleteOfferWithOutData/{idOffer}', [OfferController::class, 'deleteOfferWithOutData'])
            ->name('deleteOfferWithOutData');
        //Mostrar todas las ofertas con estadi inactivo
        Route::get('/showHistory', [OfferController::class, 'showHistory'])
            ->name('showHistory');

        // Route::get('verify-email', EmailVerificationPromptController::class)
        //             ->name('verification.notice');

        // Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        //             ->middleware(['signed', 'throttle:6,1'])
        //             ->name('verification.verify');

         Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                     ->middleware('throttle:6,1')
                     ->name('verification.send');

        // Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        //             ->name('password.confirm');

        // Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

         Route::put('password', [PasswordController::class, 'update'])->name('password.update');
        //Cerrar sesion
        Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
            ->name('logout');
    });
