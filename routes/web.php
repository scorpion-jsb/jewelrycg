<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['controller' => AppController::class], function() {
    Route::get('/', 'index')->name('index');
    Route::get('/product/{id_product}', 'productPage')->name('product.page');
});

Route::group([
    'controller' => CartController::class,
    'prefix' => 'cart',
    'as' => 'cart.'
], function() {
    Route::patch('/edit', 'editQty')->name('edit.qty');
    Route::patch('/remove', 'removeProduct')->name('remove.product');
});
Route::resource('cart', CartController::class)->only(['index', 'store']);

Route::group(['middleware' => ['auth', 'checkout']], function() {
    Route::resource('checkout', CheckoutController::class)->only(['index', 'store']);
    Route::post('/payment/intent', [CheckoutController::class, 'createPaymentIntent'])->name('checkout.payment.intent');
    Route::get('/payment/finished', [CheckoutController::class, 'paymentFinished'])->name('checkout.payment.finished'); //
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
