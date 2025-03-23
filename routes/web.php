<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PHPLessioncontroller;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/product', function(){
    return view('product.index');
});

Route::get('/product/{id}', function(){
    return view('product.details');
});

Route::get('/login', function(){
    return view('auth.login');
})->name('login');

Route::post('/login/store', [LoginController::class, 'login'])->name('login.store');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// Route::middleware('test-middle')->group(function() {
//     Route::get('user/index', [UserController::class, 'index'])->name('user.index');
// });

// Route::middleware('auth')->group(function(){
    Route::get('user/index', [UserController::class, 'index'])->name('user.index');
    Route::get('user/create', [UserController::class, 'create']);
    Route::post('user/store', [UserController::class, 'store'])->name('user.store');
    Route::get('user/show/{id}', [UserController::class, 'show']);
    Route::get('user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('user/update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('user/destroy/{id}', [UserController::class, 'destroy'])->name('user.delete');

    Route::resource('products', ProductController::class);
// });


/**
 * PHP LESSION
 */
Route::get('/variables', [PHPLessioncontroller::class, 'variables']);
Route::get('/strings', [PHPLessioncontroller::class, 'strings']);
Route::get('/operator', [PHPLessioncontroller::class, 'operator']);
Route::get('/loops', [PHPLessioncontroller::class, 'loops']);
Route::get('/functions', [PHPLessioncontroller::class, 'functions']);
Route::get('/arrays', [PHPLessioncontroller::class, 'arrays']);

Route::get('/clc', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Artisan::call('optimize');
    Artisan::call('clear-compiled');
    Artisan::call('view:clear');
    Artisan::call('optimize:clear');
    Artisan::call('optimize:clear');
    // Artisan::call('storage:link');
    session()->forget('key');
    return "Cleared!";
});

