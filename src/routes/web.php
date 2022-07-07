<?php

    /** ------------------------------------------------------------------------------------
     *  WEB : Routes
     * ------------------------------------------------------------------------------------- */
    Route::group(['middleware' => 'web'], function (){

        Route::prefix('checkout')->group(function () {

            Route::prefix('pay')->group(function () {

                Route::get('/now', 'Stripe\App\Controllers\PaymentController@index')->name('stripe.pay');
                Route::post('/intent', 'Stripe\App\Controllers\PaymentController@paymentIntent')->name('stripe.intent');
                Route::get('/verify', 'Stripe\App\Controllers\PaymentController@verify')->name('stripe.verify');

            });
        });
    });




