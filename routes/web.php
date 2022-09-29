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

Route::get('/admin/user', function () {
    return view('admin.user.list');
});

//voucher
Route::get('/admin/voucher', function () {
    return view('admin.voucher.list');
});

Route::get('/admin/voucher/add', function () {
    return view('admin.voucher.add');
});

Route::get('/admin/voucher/edit', function () {
    return view('admin.voucher.edit');
});

//variation
Route::get('/admin/varitation', function () {
    return view('admin.varitation.list');
});

//contact
Route::get('/admin/contact', function () {
    return view('admin.contact.list');
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