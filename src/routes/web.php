<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ShopController;
use App\Http\Controllers\MyPageController;
use App\Http\Controllers\LikeController;

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
Route::get('/detail/{shop_id}', [ShopController::class, 'show'])->name('show');

Route::middleware('auth')->group(function () {

    Route::get('/mypage', [MyPageController::class, 'index']);
    Route::get('/like/{shop_id}', [LikeController::class, 'like'])->name('like');
    Route::get('/unlike/{shop_id}', [LikeController::class, 'unlike'])->name('unlike');
    Route::get('/thanks', []);
    Route::get('/done', [ShopController::class, 'show']);

});
