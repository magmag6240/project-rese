<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ShopController;
use App\Http\Controllers\MyPageController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\StoreManagerController;
use App\Http\Controllers\StripePaymentController;

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

Route::get('/', [ShopController::class, 'index'])->name('shop.index');
Route::get('/detail/{shop_id}', [ReservationController::class, 'index'])->name('reserve.index');

Route::prefix('stripe')->group(function () {
    Route::post('/store', [StripePaymentController::class, 'store'])->name('stripe.store');
});

Route::middleware('verified')->group(function () {

    Route::get('/mypage', [MyPageController::class, 'index']);
    Route::get('/like/{shop_id}', [LikeController::class, 'like'])->name('like');
    Route::get('/unlike/{shop_id}', [LikeController::class, 'unlike'])->name('unlike');
    Route::post('/reserve/{shop_id}', [ReservationController::class, 'store'])->name('reserve.store');
    Route::delete('/reserve_destroy/{reserve_id}', [ReservationController::class, 'destroy'])->name('reserve.destroy');
    Route::get('/done', [ShopController::class, 'show']);

    Route::group(['prefix' => 'admin'], function () {
        Route::get('/', [AdminController::class, 'index']);
        Route::get('/detail/{id}', [AdminController::class, 'show'])->name('admin.show');
        Route::patch('/update/{id}', [AdminController::class, 'update'])->name('admin.update');
        Route::post('/delete/{id}', [AdminController::class, 'destroy'])->name('admin.delete');
    });

    Route::group(['prefix' => 'store_manager'], function () {
        Route::get('/', [StoreManagerController::class, 'index']);
        Route::get('/new/{id}', [StoreManagerController::class, 'new']);
        Route::post('/create/{id}', [StoreManagerController::class, 'create']);
        Route::get('/edit/{id}', [StoreManagerController::class, 'edit'])->name('store_manager.edit');
        Route::patch('/update/{id}', [StoreManagerController::class, 'update'])->name('store_manager.update');
        Route::get('/reserve_list/{id}', [StoreManagerController::class, 'reserve_list'])->name('store_manager.reserve_list');
    });
});
