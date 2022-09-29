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

Route::get('/admin/preview', function () {
    return view('admin.preview.list');
});

Route::get('/admin/banner', function () {
    return view('admin.banner.list');
});

Route::get('/admin/banner/add', function () {
    return view('admin.banner.create');
});


Route::get('/', function () {
    return view('client.index');
});

// ->middleware(['auth'])->name('dashboard');

// require __DIR__.'/auth.php';