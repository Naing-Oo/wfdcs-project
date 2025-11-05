<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PHPLessioncontroller;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PromotionController;
use App\Http\Controllers\UserController;
use App\Models\Category;
use App\Models\Product;
use App\Models\Promotion;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Web\{
    AccountController,
    HomeController,
    ShopController,
    BlogController,
    CheckoutController,
    ContactController,
};
use App\Models\District;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

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
 * web / buyer
 */


Route::get('/', [HomeController::class, 'index']);
Route::get('/switchlang/{lang}', [HomeController::class, 'switchLanguage']);

Route::prefix('auth')->group(function () {
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/logout', [LoginController::class, 'logout']);
    Route::post('/register', [LoginController::class, 'register']);
});

Route::prefix('shop')->group(function () {
    Route::get('/', [ShopController::class, 'index']);
    Route::get('/{id}/show', [ShopController::class, 'show'])->name('shop.show');
    Route::post('/{id}/update', [ShopController::class, 'update'])->name('shop.update');
    Route::get('/shopping-cart', [ShopController::class, 'shoppingCart'])->name('shop.shoppingCart');
    Route::get('/shopping-cart/{id}/remove', [ShopController::class, 'removeCart'])->name('cart.remove');
    Route::post('/shopping-cart/{id}/update', [ShopController::class, 'updateCart']);
});

Route::get('account/manage', [AccountController::class, 'manages'])->name('account.manage');
Route::get('account/orders', [AccountController::class, 'orders'])->name('account.orders');
Route::get('account/{id}/order', [AccountController::class, 'order'])->name('account.order');
Route::get('account/{id}/address', [AccountController::class, 'getAddress'])->name('account.address');
Route::post('account/address/update', [AccountController::class, 'updateAddress'])->name('account.address.update');
Route::post('account/{id}/address/remove', [AccountController::class, 'removeAddress'])->name('account.address.remove');
Route::put('account/{id}/update', [AccountController::class, 'updateAccount'])->name('account.update');

Route::resource('checkout', CheckoutController::class);

Route::get('/blog', [BlogController::class, 'index']);
Route::get('/contact', [ContactController::class, 'index']);

Route::get('/district/{id}', [HomeController::class, 'districts']);
Route::get('/subdistrict/{id}', [HomeController::class, 'subDistricts']);



// Route::get('/dashboard', function () {
//     return view('dashboard');
// });

// Route::get('/product', function(){
//     return view('product.index');
// });

// Route::get('/product/{id}', function(){
//     return view('product.details');
// });

// Route::get('/login', function(){
//     return view('auth.login');
// })->name('login');

// Route::post('/login/store', [LoginController::class, 'login'])->name('login.store');
// Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// Route::middleware('test-middle')->group(function() {
//     Route::get('user/index', [UserController::class, 'index'])->name('user.index');
// });

// Route::middleware('auth')->group(function(){
//     Route::get('user/index', [UserController::class, 'index'])->name('user.index');
//     Route::get('user/create', [UserController::class, 'create']);
//     Route::post('user/store', [UserController::class, 'store'])->name('user.store');
//     Route::get('user/show/{id}', [UserController::class, 'show']);
//     Route::get('user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
//     Route::put('user/update/{id}', [UserController::class, 'update'])->name('user.update');
//     Route::delete('user/destroy/{id}', [UserController::class, 'destroy'])->name('user.delete');

//     Route::resource('products', ProductController::class);
// });


/**
 * PHP LESSION
 */
// Route::get('/variables', [PHPLessioncontroller::class, 'variables']);
// Route::get('/strings', [PHPLessioncontroller::class, 'strings']);
// Route::get('/operator', [PHPLessioncontroller::class, 'operator']);
// Route::get('/loops', [PHPLessioncontroller::class, 'loops']);
// Route::get('/functions', [PHPLessioncontroller::class, 'functions']);
// Route::get('/arrays', [PHPLessioncontroller::class, 'arrays']);


Route::get('/clc', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Artisan::call('optimize');
    Artisan::call('clear-compiled');
    Artisan::call('optimize:clear');
    Artisan::call('optimize:clear');
    // Artisan::call('storage:link');
    session()->forget('key');
    return "Cleared!";
});
