<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;

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

// -----------------------------------ADMIN-----------------------------
Route::prefix('/admin')->group(function () {
    Route::get('/', function () {
        return view('admin.index');
    });
    Route::prefix('/categories')->group(function () {
        Route::get('/list', [CategoryController::class, 'index']);
        Route::get('/add', function() {
            return view('admin.category.create');
        });
        Route::get('/edit', function() {
            return view('admin.category.edit');
        });
    });

    Route::prefix('/product')->group(function () {

        Route::get('/add', [ProductController::class, 'create']);
        Route::get('/list', function() {
            return view('admin.products.list');
        });
        Route::get('/edit', function() {
            return view('admin.products.edit');
        });
    });

    Route::prefix('/variation')->group(function () {
        Route::get('/add', function() {
            return view('admin.variation.add');
        });
        Route::get('/list', function() {
            return view('admin.variation.list');
        });
        Route::get('/edit', function() {
            return view('admin.variation.edit');
        });
    });

    Route::prefix('/voucher')->group(function () {
        Route::get('/add', function() {
            return view('admin.voucher.create');
        });
        Route::get('/list', function() {
            return view('admin.voucher.list');
        });
        Route::get('/edit', function() {
            return view('admin.voucher.edit');
        });
    });

    Route::prefix('/post')->group(function () {
        Route::get('/add', function() {
            return view('admin.post.create');
        });
        Route::get('/list', function() {
            return view('admin.post.list');
        });
        Route::get('/edit', function() {
            return view('admin.post.edit');
        });
    });

    Route::prefix('/banner')->group(function () {
        Route::get('/add', function() {
            return view('admin.banner.create');
        });
        Route::get('/list', function() {
            return view('admin.banner.list');
        });
        Route::get('/edit', function() {
            return view('admin.banner.edit');
        });
    });

    Route::prefix('/preview')->group(function () {
        Route::get('/list', function() {
            return view('admin.preview.list');
        });
    });

    Route::prefix('/contact')->group(function () {
        Route::get('/list', function() {
            return view('admin.contact.list');
        });
    });

    Route::prefix('/user')->group(function () {
        Route::get('/list', function() {
            return view('admin.user.list');
        });
    });

});




// ->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

