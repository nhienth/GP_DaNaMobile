<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StocksController;
use App\Http\Controllers\CombinationsController;
use App\Http\Controllers\PreviewController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\VariationController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\OrderDetailsController;
use App\Http\Controllers\PaymentController;

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

Route::get('/', [HomeController::class, 'index']);

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
    Route::prefix('/category')->group(function () {
        Route::get('/list', [CategoryController::class, 'index']);
        Route::get('/create', [CategoryController::class, 'create']);
        Route::post('/create', [CategoryController::class, 'store']);
        Route::get('/update/{id}', [CategoryController::class, 'edit']);
        Route::post('/update/{id}', [CategoryController::class, 'update']);
        Route::get('/delete/{id}', [CategoryController::class, 'destroy']);
    });

    Route::prefix('/product')->group(function () {

        Route::get('/list', [ProductController::class, 'index']);

        Route::get('/create', [ProductController::class, 'create']);
        Route::post('/create', [ProductController::class, 'store']);

        Route::get('/edit/{id}', [ProductController::class, 'edit']);
        Route::post('/update/{id}', [ProductController::class, 'update']);

        Route::get('/delete/{id}', [ProductController::class, 'destroy']);

        Route::get('/createVariation/{id}', [VariationController::class, 'create'] );
        Route::post('/createVariation', [VariationController::class, 'store'] );

        Route::get('/test/{id}', [VariationController::class, 'test'] );
    });

    Route::prefix('/variation')->group(function () {
        Route::get('/create', function () {
            return view('admin.variation.create');
        });
        Route::get('/list', function () {
            return view('admin.variation.list');
        });
        Route::get('/edit', function () {
            return view('admin.variation.edit');
        });
    });



    Route::prefix('/post')->group(function () {
        Route::get('/list', [PostController::class, 'index']); 

        Route::get('/create', [PostController::class, 'create']); 
        Route::post('/create', [PostController::class, 'store']); 

        Route::get('/edit/{id}', [PostController::class, 'edit']); 
        Route::post('/update/{id}', [PostController::class, 'update']); 

        Route::get('/details/{id}', [PostController::class, 'show']); 

        Route::get('/delete/{id}', [PostController::class, 'destroy']);
    });

    // Route::prefix('/banner')->group(function () {
    //     Route::get('/create', function () {
    //         return view('admin.banner.create');
    //     });
    //     Route::get('/list', function () {
    //         return view('admin.banner.list');
    //     });
    //     Route::get('/edit', function () {
    //         return view('admin.banner.edit');
    //     });
    // });

    Route::prefix('/preview')->group(function () {
        Route::get('/list',[PreviewController::class,'index']);
        Route::get('/detail/{id}',[PreviewController::class,'show']);
        Route::get('/delete/{id}', [PreviewController::class, 'destroy']);
    });

    Route::prefix('/contact')->group(function () {
       Route::get('/list', [ContactController::class, 'index']);
    });

    Route::prefix('/user')->group(function () {
        Route::get('/list',[UserController::class,'index']);
        Route::get('/edit/{id}',[UserController::class,'edit']);
        Route::put('/update/{id}', [UserController::class, 'update']);
    });


    Route::prefix('/order')->group(function () {
        Route::get('/list',[OrderController::class,'index']);
        Route::get('/details/{id}', [OrderDetailsController::class,'show']);
        Route::get('/edit/{id}',[OrderController::class,'edit']);
        Route::put('/update/{id}', [OrderController::class, 'update']);  
    });
    
    
    Route::prefix('/stocks')->group(function () {
        Route::get('/list',[StocksController::class,'index']);
        Route::get('/stock_detail/{id}',[StocksController::class,'show']);
    });

    Route::prefix('/slider')->group(function () {
        Route::get('/list', [SliderController::class, 'index'])->name('slider.list');
        Route::get('/create', [SliderController::class, 'create'])->name('slider.create');
        Route::post('/create', [SliderController::class, 'store'])->name('slider.create_process');
        Route::get('/edit/{id}', [SliderController::class, 'edit'])->name('slider.edit');
        Route::post('/edit/{id}', [SliderController::class, 'update'])->name('slider.edit_process');
        Route::get('/delete/{id}', [SliderController::class, 'destroy']);
    });

    Route::prefix('/banner')->group(function () {
        Route::get('/list', [BannerController::class, 'index'])->name('banner.list');
        Route::get('/create', [BannerController::class, 'create'])->name('banner.create');
        Route::post('/create', [BannerController::class, 'store'])->name('banner.create_process');
        Route::get('/edit/{id}', [BannerController::class, 'edit'])->name('banner.edit');
        Route::post('/edit/{id}', [BannerController::class, 'update'])->name('banner.edit_process');
        Route::get('/delete/{id}', [BannerController::class, 'destroy']);
    });
    Route::prefix('/voucher')->group(function () {
        Route::get('/list', [VoucherController::class, 'index'])->name('voucher.list');
        Route::get('/create',  [VoucherController::class, 'create']);
        Route::post('/create', [VoucherController::class, 'store'])->name('voucher.create');
        Route::get('/edit/{id}', [VoucherController::class, 'edit']);
        Route::post('/update/{id}', [VoucherController::class, 'update']);
        Route::get('/delete/{id}', [VoucherController::class, 'destroy']);
    });

    Route::prefix('/payment')->group(function () {
        Route::get('/list', [PaymentController::class, 'index'])->name('payment.list');
        Route::get('/create',  [PaymentController::class, 'create']);
        Route::post('/create', [PaymentController::class, 'store'])->name('Payment.create');
        Route::get('/edit/{id}', [PaymentController::class, 'edit']);
        Route::post('/update/{id}', [PaymentController::class, 'update']);
        Route::get('/delete/{id}', [PaymentController::class, 'destroy']);
    });

});
   

    

// ->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';