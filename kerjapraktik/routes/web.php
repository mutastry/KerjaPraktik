<?php

use App\Http\Controllers\Cart\AddCartItemController;
use App\Http\Controllers\Cart\CartController;
use App\Http\Controllers\Cart\ClearCartController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Order\CheckoutController;
use App\Http\Controllers\Order\ConfirmationController;
use App\Http\Controllers\Order\OrderController;
use App\Http\Controllers\Order\PaymentController;
use App\Http\Controllers\Order\ProcessPaymentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Catalog routes
Route::prefix('catalog')->name('catalog.')->group(function () {
    Route::get('/', [CatalogController::class, 'index'])->name('index');
    Route::get('/{songket}', [CatalogController::class, 'show'])->name('show');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('cart')->name('cart.')->group(function () {
        Route::get('/', [CartController::class, 'index'])->name('index');
        Route::post('/add', AddCartItemController::class)->name('add');
        Route::patch('/{cartItem}', [CartController::class, 'update'])->name('update');
        Route::delete('/{cartItem}', [CartController::class, 'destroy'])->name('destroy');
        Route::delete('/', ClearCartController::class)->name('clear');
    });

    // Checkout routes
    Route::prefix('checkout')->name('checkout.')->group(function () {
        Route::get('/', [CheckoutController::class, 'index'])->name('index');
        Route::post('/', [CheckoutController::class, 'store'])->name('store');
        Route::get('/payment/{order}', PaymentController::class)->name('payment');
        Route::post('/payment/{order}', ProcessPaymentController::class)->name('payment.process');
        Route::get('/confirmation/{order}', ConfirmationController::class)->name('confirmation');
    });

    // Order routes
    Route::prefix('orders')->name('orders.')->group(function () {
        Route::get('/', [OrderController::class, 'index'])->name('index');
        Route::get('/{order}', [OrderController::class, 'show'])->name('show');
    });
});

require __DIR__ . '/auth.php';