<?php

use App\Http\Controllers\PHPLessioncontroller;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Models\User;
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

Route::get('user/index', [UserController::class, 'index']);
Route::get('user/details/{id}', [UserController::class, 'show']);
Route::get('user/create', [UserController::class, 'create']);
Route::post('user/store', [UserController::class, 'store']);
Route::get('user/edit/{id}', [UserController::class, 'edit']);
Route::put('user/update/{id}', [UserController::class, 'update']);
// Route::post('user/destroy/{id}', [UserController::class, 'destroy']);
Route::delete('user/destroy/{id}', [UserController::class, 'destroy']);

Route::resource('products', ProductController::class);


/**
 * PHP LESSION
 */
Route::get('/variables', [PHPLessioncontroller::class, 'variables']);
Route::get('/strings', [PHPLessioncontroller::class, 'strings']);
