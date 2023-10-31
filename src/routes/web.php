<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ShopController;
use App\Http\Controllers\MyPageController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ReservationController;

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

Route::middleware('auth')->group(function () {

    Route::get('/mypage', [MyPageController::class, 'index']);
    Route::get('/like/{shop_id}', [LikeController::class, 'like'])->name('like');
    Route::get('/unlike/{shop_id}', [LikeController::class, 'unlike'])->name('unlike');
    Route::get('/thanks', []);
    Route::post('/reserve/{shop_id}', [ReservationController::class, 'store'])->name('reserve.store');
    Route::delete('/reserve_destroy/{shop_id}', [ReservationController::class, 'destroy'])->name('reserve.destroy');
    Route::get('/done', [ShopController::class, 'show']);

});
