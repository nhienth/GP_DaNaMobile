<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/admin', function () {
    return view('admin.index');
});

Route::get('/', function () {
    return view('client.index');
});

Route::get('/product-detail', function () {
    return view('client.products.product_details');
});

Route::get('/product-bycate', function () {
    return view('client.products.product_ bycate');
});




// ->middleware(['auth'])->name('dashboard');

// require __DIR__.'/auth.php';