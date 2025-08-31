<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\{
    AuthController,
    CategoryController,
    OrderController,
    ProductController,
    PromotionController,
};


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


/**
 * seller / admin
 */
Route::prefix('office')->group(function () {

    Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('admin.login');
    Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');

    // widdleware
    Route::middleware('auth')->group(function () {

        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');

        Route::get('/company', function () {
            return view('admin.company.index');
        });

        // category
        Route::resource('categories', CategoryController::class);

        // product
        // remove old image
        Route::delete('products/removeImage', [ProductController::class, 'removeImage'])->name('product.image.remove');
        Route::resource('products', ProductController::class);

        // promotion
        Route::delete('promotions/{id}/removeImage', [PromotionController::class, 'removeImage']);
        Route::resource('promotions', PromotionController::class);

        Route::resource('orders', OrderController::class);
    });
});
