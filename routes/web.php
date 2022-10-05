<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\SliderController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;
use App\Models\Slider\SliderModel;
use App\Http\Controllers\BannerController;

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
        Route::get('/list', function () {
            return view('admin.category.list');
        });
        Route::get('/add', function () {
            return view('admin.category.create');
        });
        Route::get('/edit', function () {
            return view('admin.category.edit');
        });
    });

    Route::prefix('/product')->group(function () {

        Route::get('/add', [ProductController::class, 'create']);
        Route::get('/list', function () {
            return view('admin.products.list');
        });
        Route::get('/edit', function () {
            return view('admin.products.edit');
        });
    });

    Route::prefix('/variation')->group(function () {
        Route::get('/add', function () {
            return view('admin.variation.add');
        });
        Route::get('/list', function () {
            return view('admin.variation.list');
        });
        Route::get('/edit', function () {
            return view('admin.variation.edit');
        });
    });

    Route::prefix('/voucher')->group(function () {
        Route::get('/add', function () {
            return view('admin.voucher.create');
        });
        Route::get('/list', function () {
            return view('admin.voucher.list');
        });
        Route::get('/edit', function () {
            return view('admin.voucher.edit');
        });
    });

    Route::prefix('/post')->group(function () {
        Route::get('/add', function () {
            return view('admin.post.create');
        });
        Route::get('/list', function () {
            return view('admin.post.list');
        });
        Route::get('/edit', function () {
            return view('admin.post.edit');
        });
    });

    Route::prefix('/banner')->group(function () {
        Route::get('/add', function () {
            return view('admin.banner.create');
        });
        Route::get('/list', function () {
            return view('admin.banner.list');
        });
        Route::get('/edit', function () {
            return view('admin.banner.edit');
        });
    });

    Route::prefix('/preview')->group(function () {
        Route::get('/list', function () {
            return view('admin.preview.list');
        });
    });

    Route::prefix('/contact')->group(function () {
        Route::get('/list', function () {
            return view('admin.contact.list');
        });
    });

    Route::prefix('/user')->group(function () {
        Route::get('/list', function () {
            return view('admin.user.list');
        });
    });

    Route::prefix('/slider')->group(function () {
        Route::get('/list', [SliderController::class, 'index'])->name('slider.list');
        Route::get('/add', [SliderController::class, 'create'])->name('slider.add');
        Route::post('/add', [SliderController::class, 'store'])->name('slider.add_process');
        Route::get('/edit/{id}', [SliderController::class, 'edit'])->name('slider.edit');
        Route::post('/edit/{id}', [SliderController::class, 'update'])->name('slider.edit_process');
        Route::get('/delete/{id}', [SliderController::class, 'destroy']);
    });

    Route::prefix('/banner')->group(function () {
        Route::get('/list', [BannerController::class, 'index'])->name('banner.list');
        Route::get('/add', [BannerController::class, 'create'])->name('banner.add');
        Route::post('/add', [BannerController::class, 'store'])->name('banner.add_process');
        Route::get('/edit/{id}', [BannerController::class, 'edit'])->name('banner.edit');
        Route::post('/edit/{id}', [BannerController::class, 'update'])->name('banner.edit_process');
        Route::get('/delete/{id}', [BannerController::class, 'destroy']);
    });
});



// ->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';