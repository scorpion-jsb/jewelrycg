<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ProductsController;
use App\Http\Controllers\Backend\UsersController;
use App\Http\Controllers\Backend\CategorysController;
use App\Http\Controllers\Backend\VendorsController;
use App\Http\Controllers\Backend\BlogsController;
use App\Http\Controllers\Backend\BlogcategoriesController;




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
  Route::group([
    'prefix' => 'backend',
    'as' => 'backend.',
    'middleware' => 'auth'
], function() {

    //products routes
    Route::group([ 
        'prefix' => 'products',
        'as' => 'products.'
    ], function() {
            Route::get('/', [ProductsController::class, 'index'])->name('list');
            Route::get('/create', [ProductsController::class, 'create'])->name('create');
            Route::get('/edit/{id}', [ProductsController::class, 'edit'])->name('edit');
            Route::put('/update/{product}', [ProductsController::class, 'update'])->name('update');
            Route::post('/store', [ProductsController::class, 'store'])->name('store');
            Route::get('/get', [ProductsController::class, 'get'])->name('get');
        });
    
    //users routes
    Route::group([ 
        'prefix' => 'users',
        'as' => 'users.'
    ], function() {
            Route::get('/', [UsersController::class, 'index'])->name('list');
            Route::get('/create', [UsersController::class, 'create'])->name('create');
            Route::get('/edit/{id}', [UsersController::class, 'edit'])->name('edit');
            Route::put('/update/{product}', [UsersController::class, 'update'])->name('update');
            Route::post('/store', [UsersController::class, 'store'])->name('store');
            Route::get('/get', [UsersController::class, 'get'])->name('get');
        });

        Route::group([ 
            'prefix' => 'customers',
            'as' => 'customers.'
        ], function() {
                Route::get('/', [UsersController::class, 'customers'])->name('list');
            });

    //categories routes
    Route::group([ 
        'prefix' => 'catalogue/categories',
        'as' => 'categories.'
    ], function() {
            Route::get('/', [CategorysController::class, 'index'])->name('list');
            Route::get('/create', [CategorysController::class, 'create'])->name('create');
            Route::get('/edit/{id}', [CategorysController::class, 'edit'])->name('edit');
            Route::put('/update/{product}', [CategorysController::class, 'update'])->name('update');
            Route::post('/store', [CategorysController::class, 'store'])->name('store');
            Route::get('/get', [CategorysController::class, 'get'])->name('get');
        });

        Route::group([ 
            'prefix' => 'sellers',
            'as' => 'sellers.'
        ], function() {
                Route::get('/', [VendorsController::class, 'index'])->name('list');
                Route::get('/create', [VendorsController::class, 'create'])->name('create');
                Route::get('/edit/{id}', [VendorsController::class, 'edit'])->name('edit');
                Route::put('/update/{product}', [VendorsController::class, 'update'])->name('update');
                Route::post('/store', [VendorsController::class, 'store'])->name('store');
                Route::get('/get', [VendorsController::class, 'get'])->name('get');
            });


        //posts routes
    Route::group([ 
        'prefix' => 'blog/posts',
        'as' => 'posts.'
    ], function() {
            Route::get('/', [BlogsController::class, 'index'])->name('list');
            Route::get('/create', [BlogsController::class, 'create'])->name('create');
            Route::get('/edit/{id}', [BlogsController::class, 'edit'])->name('edit');
            Route::put('/update/{product}', [BlogsController::class, 'update'])->name('update');
            Route::post('/store', [BlogsController::class, 'store'])->name('store');
            Route::get('/get', [BlogsController::class, 'get'])->name('get');
        });

        //posts routes
    Route::group([ 
        'prefix' => 'blog/categories',
        'as' => 'blog.categories.'
    ], function() {
            Route::get('/', [BlogcategoriesController::class, 'index'])->name('list');
            Route::get('/create', [BlogcategoriesController::class, 'create'])->name('create');
            Route::get('/edit/{id}', [BlogcategoriesController::class, 'edit'])->name('edit');
            Route::put('/update/{product}', [BlogcategoriesController::class, 'update'])->name('update');
            Route::post('/store', [BlogcategoriesController::class, 'store'])->name('store');
            Route::get('/get', [BlogcategoriesController::class, 'get'])->name('get');
        });

    Route::get('/', [DashboardController::class, 'index'])->name('login');

});
Route::get('/', [AppController::class, 'index'])->name('index');

Route::get('/products/search', [ProductController::class, 'search'])->name('products.search');
Route::middleware(['auth', 'admin'])->resource('products', ProductController::class)->except(['index', 'show']);
Route::resource('products', ProductController::class)->only('show');

Route::group([
    'controller' => CartController::class,
    'prefix' => 'cart',
    'as' => 'cart.'
], function() {
    Route::group(['middleware' => 'auth'], function() {
        Route::middleware('verified')->post('/buy-now', 'buyNow')->name('buy.now');

        Route::group(['prefix' => 'wishlist', 'as' => 'wishlist'], function() {
            Route::get('/', 'wishlist');
            Route::post('/', 'wishlistStore');
            Route::put('/', 'wishlistToCart');
            Route::delete('/', 'removeFromWishlist');
        });
    });
    Route::patch('/edit', 'editQty')->name('edit.qty');
    Route::patch('/remove', 'removeProduct')->name('remove.product');
});
Route::resource('cart', CartController::class)->only(['index', 'store']);

Route::group(['middleware' => 'auth'], function() {
    Route::group(['prefix' => 'email/verify', 'as' => 'verification.', 'controller' => VerifyEmailController::class], function() {
        Route::get('/', 'emailVerificationNotice')->name('notice');
        Route::get('/{id}/{hash}', 'verificationHandler')->middleware('signed')->name('verify');
    });
    Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'resend'])->middleware('throttle:6,1')->name('verification.send');

    Route::group(['prefix' => 'payment', 'as' => 'checkout.', 'controller' => CheckoutController::class], function() {
        Route::get('/finished', 'paymentFinished')->name('finished');
        Route::delete('/cancel', 'cancel')->name('cancel');
    });
    Route::group(['middleware' => ['checkout', 'verified']], function() {
        Route::resource('checkout', CheckoutController::class)->only(['index', 'store']);
        Route::post('/payment/intent', [CheckoutController::class, 'createPaymentIntent'])->name('checkout.payment.intent');
    });

    Route::resource('orders', OrderController::class)->only(['index', 'show', 'update']);
    
    Route::group(['prefix' => 'user', 'as' => 'user.', 'controller' => UserController::class], function() {
        Route::get('/edit', 'edit')->name('edit');
        Route::get('/edit/password', 'editPassword')->name('edit.password');
        Route::patch('/edit/password', 'updatePassword')->name('update.password');
        Route::put('/edit', 'update')->name('update');
        Route::delete('/delete', 'delete')->name('delete');
        Route::get('/{id_user}', 'index')->name('index');
    });
});





require __DIR__.'/auth.php';
