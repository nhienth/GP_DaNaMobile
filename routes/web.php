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


//  ---------------------------------------- ADMIN ---------------------------------------
Route::get('/admin', function () {
    return view('admin.index');
});

// Products
Route::get('/admin/products-list', function () {
    return view('admin.products.list');
});

Route::get('/admin/products', function () {
    return view('admin.products.list');
});

Route::get('/admin/products-add', function () {
    return view('admin.products.add');
});
Route::get('/admin/products-edit', function () {
    return view('admin.products.edit');
});

// 

Route::get('/blogs', function () {
    return view('client.blogs.index');
});
Route::get('/blogs-detail', function () {
    return view('client.blogs.detail');
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




Route::get('/admin/user', function () {
    return view('admin.user.list');
});

Route::get('/admin/preview', function () {
    return view('admin.preview.list');
});

Route::get('/admin/banner', function () {
    return view('admin.banner.list');
});

Route::get('/admin/banner/add', function () {
    return view('admin.banner.create');
});

// ----------------------------------------------------CLIENT------------------------------------------------------------

Route::get('/', function () {
    return view('client.index');
});

Route::get('/product-detail', function () {
    return view('client.products.product_details');
});

Route::get('/product-bycate', function () {
    return view('client.products.product_ bycate');
});
Route::get('/wishlist', function () {
    return view('client.products.wishlist');
});


Route::get('/cart', function () {
    return view('client.shop.cart');
});

Route::get('/checkout', function () {
    return view('client.shop.checkout');
});




// ->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

