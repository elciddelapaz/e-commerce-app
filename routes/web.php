<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PaymentController;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('orders', OrderController::class)->only(['index', 'create', 'store', 'edit']);
    Route::resource('products', ProductController::class)->except(['show']);
    Route::post('/payment', [PaymentController::class, 'store'])->name('payment.store');
});



require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
