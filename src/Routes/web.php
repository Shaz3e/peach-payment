<?php

use Illuminate\Support\Facades\Route;
use Shaz3e\PeachPayment\Http\Controllers\User\PeachPaymentController;

// Route::middleware(config('peach-payment.middleware'))
//     ->prefix(config('peach-payment.admin_route'))
//     ->name('admin.')
//     ->group(function(){
//     });

Route::get('peachpayment', [PeachPaymentController::class, 'createTransaction']);
Route::get('peachpayment/create-transaction', [PeachPaymentController::class, 'postTransaction'])->name('peachpayment.post');