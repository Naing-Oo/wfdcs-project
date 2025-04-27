<?php

use App\Http\Controllers\Admin\CategoryController;
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

/**
 * web / buyer
 */
Route::get('/', function () {
    return view('web.home.index');
});

Route::get('/shop', function () {

    $products = [
        [
            'name' => 'Crab Pool Security',
            'price' => 30,
            'image' => 'web/img/product/product-1.jpg',
        ],
        [
            'name' => 'Crab Pool Security',
            'price' => 40,
            'image' => 'web/img/product/product-2.jpg',
        ],
        [
            'name' => 'Crab Pool Security',
            'price' => 50,
            'image' => 'web/img/product/product-3.jpg',
        ],
        [
            'name' => 'Crab Pool Security',
            'price' => 60,
            'image' => 'web/img/product/product-4.jpg',
        ],
        [
            'name' => 'Crab Pool Security',
            'price' => 70,
            'image' => 'web/img/product/product-5.jpg',
        ],
        [
            'name' => 'Crab Pool Security',
            'price' => 80,
            'image' => 'web/img/product/product-6.jpg',
        ],
        [
            'name' => 'Crab Pool Security',
            'price' => 90,
            'image' => 'web/img/product/product-7.jpg',
        ],
        [
            'name' => 'Crab Pool Security',
            'price' => 100,
            'image' => 'web/img/product/product-8.jpg',
        ],
        [
            'name' => 'Crab Pool Security',
            'price' => 110,
            'image' => 'web/img/product/product-9.jpg',
        ],
        [
            'name' => 'Crab Pool Security',
            'price' => 120,
            'image' => 'web/img/product/product-10.jpg',
        ],
    ];

    $promotions = [
        [
            'category' => 'Dried Fruit',
            'name' => 'Raisin’n’nuts',
            'price' => 36,
            'discount' => 20,
            'image' => 'web/img/product/discount/pd-1.jpg',
        ],
        [
            'category' => 'Vegetables',
            'name' => 'Vegetables’package',
            'price' => 36,
            'discount' => 20,
            'image' => 'web/img/product/discount/pd-2.jpg',
        ],
        [
            'category' => 'Dried Fruit',
            'name' => 'Mixed Fruitss',
            'price' => 36,
            'discount' => 20,
            'image' => 'web/img/product/discount/pd-3.jpg',
        ],
        [
            'category' => 'Dried Fruit',
            'name' => 'Raisin’n’nuts',
            'price' => 36,
            'discount' => 20,
            'image' => 'web/img/product/discount/pd-4.jpg',
        ],
        [
            'category' => 'Dried Fruit',
            'name' => 'Raisin’n’nuts',
            'price' => 36,
            'discount' => 20,
            'image' => 'web/img/product/discount/pd-5.jpg',
        ],
        [
            'category' => 'Dried Fruit',
            'name' => 'Raisin’n’nuts',
            'price' => 36,
            'discount' => 20,
            'image' => 'web/img/product/discount/pd-6.jpg',
        ],
    ];

    return view('web.shop.index', [
        'products' => $products,
        'promotions' => $promotions
    ]);
});


Route::get('/blog', function () {

    $blogs = [
        [
            'image' => 'web/img/blog/blog-1.jpg',
            'date' => now(),
            'comments' => 10,
            'title' => '6 ways to prepare breakfast for 30',
            'description' => 'Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam
                            quaerat',
        ],
        [
            'image' => 'web/img/blog/blog-2.jpg',
            'date' => now(),
            'comments' => 10,
            'title' => 'Visit the clean farm in the US',
            'description' => 'Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam
                            quaerat',
        ],
        [
            'image' => 'web/img/blog/blog-3.jpg',
            'date' => now(),
            'comments' => 10,
            'title' => 'Cooking tips make cooking simple',
            'description' => 'Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam
                            quaerat',
        ],
        [
            'image' => 'web/img/blog/blog-4.jpg',
            'date' => now(),
            'comments' => 10,
            'title' => 'Cooking tips make cooking simple',
            'description' => 'Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam
                            quaerat',
        ],
        [
            'image' => 'web/img/blog/blog-5.jpg',
            'date' => now(),
            'comments' => 10,
            'title' => 'The Moment You Need To Remove Garlic From The Menu',
            'description' => 'Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam
                            quaerat',
        ],
        [
            'image' => 'web/img/blog/blog-6.jpg',
            'date' => now(),
            'comments' => 10,
            'title' => 'Cooking tips make cooking simple',
            'description' => 'Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam
                            quaerat',
        ],
    ];

    return view('web.blog.index', [
        'blogs' => $blogs
    ]);
});

Route::get('/contact', function () {
    return view('web.contact.index');
});


/**
 * seller / admin
 */
Route::group(['prefix' => 'admin'], function(){

    Route::get('/login', function () {
        return view('admin.login');
    });

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });

    Route::get('/company', function () {
        return view('admin.company.index');
    });

    Route::resource('categories', CategoryController::class);

    // additional menus

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
    Artisan::call('optimize:clear');
    Artisan::call('optimize:clear');
    // Artisan::call('storage:link');
    session()->forget('key');
    return "Cleared!";
});

