<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ShopController;
use App\Http\Controllers\MyPageController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ShopManagerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MailController;
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
    Route::get('/reserve/edit/{reserve_id}', [ReservationController::class, 'edit'])->name('reserve.edit');
    Route::patch('/reserve/update/{reserve_id}', [ReservationController::class, 'update'])->name('reserve.update');
    Route::delete('/reserve_destroy/{reserve_id}', [ReservationController::class, 'destroy'])->name('reserve.destroy');
    Route::get('/shop_evaluate/{shop_id}', [ShopController::class, 'evaluate'])->name('evaluate.index');
    Route::post('/shop_evaluate/post/{shop_id}', [ShopController::class, 'post'])->name('evaluate.post');
    Route::get('/done', [ShopController::class, 'show']);

    Route::group(['prefix' => 'admin'], function () {
        Route::get('/', [AdminController::class, 'index']);
        Route::get('/shop_manager_list', [AdminController::class, 'show'])->name('admin.show');
        Route::get('/new', [AdminController::class, 'new'])->name('admin.new');
        Route::patch('/update', [AdminController::class, 'update'])->name('admin.update');
        Route::get('/mail', [MailController::class, 'index'])->name('admin.mail.index');
        Route::get('/mail/send', [MailController::class, 'send'])->name('admin.mail.send');
    });

    Route::group(['prefix' => 'shop_manager'], function () {
        Route::get('/', [ShopManagerController::class, 'index']);
        Route::get('/new', [ShopManagerController::class, 'new'])->name('shop_manager.new');
        Route::post('/store', [ShopManagerController::class, 'store'])->name('shop_manager.store');
        Route::get('/shop_list', [ShopManagerController::class, 'shop_list'])->name('shop_manager.shop_list');
        Route::get('/edit/{shop_id}', [ShopManagerController::class, 'edit'])->name('shop_manager.edit');
        Route::patch('/update/{shop_id}', [ShopManagerController::class, 'update'])->name('shop_manager.update');
        Route::get('/reserve_list/{shop_id}', [ShopManagerController::class, 'reserve_list'])->name('shop_manager.reserve_list');
        Route::get('/menu/new/{shop_id}', [ShopManagerController::class, 'menu_new'])->name('shop_manager.menu.new');
        Route::post('/menu/store/{shop_id}', [ShopManagerController::class, 'menu_store'])->name('shop_manager.menu.store');
        Route::get('/menu/edit/{shop_id}', [ShopManagerController::class, 'menu_edit'])->name('shop_manager.menu.edit');
        Route::patch('/menu/update/{shop_id}', [ShopManagerController::class, 'menu_update'])->name('shop_manager.menu.update');
        Route::get('/mail', [MailController::class, 'index'])->name('shop_manager.mail.index');
        Route::get('/mail/send', [MailController::class, 'send'])->name('shop_manager.mail.send');
    });
});
