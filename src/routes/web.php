<?php

use App\Console\Commands\Evaluation;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

use App\Http\Controllers\ShopController;
use App\Http\Controllers\MyPageController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ShopManager\ShopManagerController;
use App\Http\Controllers\ShopManager\ShopManagerLoginController;
use App\Http\Controllers\ShopManager\ShopManagerMailController;
use App\Http\Controllers\ShopManager\ShopManagerRegisterController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminMailController;
use App\Http\Controllers\EvaluationController;
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

Route::prefix('admin')->group(function () {
    Route::get('login', [AdminLoginController::class, 'create'])->name('admin.login');
    Route::post('login', [AdminLoginController::class, 'store']);

    Route::middleware('auth:admin')->group(function () {
        Route::get('/', [AdminController::class, 'index']);
        Route::get('/shop_manager_list', [AdminController::class, 'show'])->name('admin.show');
        Route::get('/new_shop_manager', [AdminController::class, 'new'])->name('admin.new_shop_manager');
        Route::post('/new_shop_manager/mail', [AdminMailController::class, 'new_shop_manager_mail'])->name('admin.new_shop_manager.mail');
        Route::get('/mail', [AdminMailController::class, 'index'])->name('admin.mail.index');
        Route::post('/mail/send', [AdminMailController::class, 'mail_all_users'])->name('admin.mail.send');
    });
});

Route::prefix('shop_manager')->group(function () {
        Route::get('login', [ShopManagerLoginController::class, 'create'])->name('shop_manager.login');
        Route::post('login', [ShopManagerLoginController::class, 'store']);
        Route::get('register', [ShopManagerRegisterController::class, 'create'])->name('shop_manager.register');
        Route::post('register', [ShopManagerRegisterController::class, 'store']);

    Route::middleware('auth:shop_manager')->group(function () {
        Route::get('/', [ShopManagerController::class, 'index']);
        Route::get('/new', [ShopManagerController::class, 'new'])->name('shop_manager.new');
        Route::post('/store', [ShopManagerController::class, 'store'])->name('shop_manager.store');
        Route::get('/shop_list', [ShopManagerController::class, 'shop_list'])->name('shop_manager.shop_list');
        Route::get('/edit/{shop_id}', [ShopManagerController::class, 'edit'])->name('shop_manager.edit');
        Route::patch('/update/{shop_id}', [ShopManagerController::class, 'update'])->name('shop_manager.update');
        Route::get('/reserve_list/{shop_id}', [ShopManagerController::class, 'reserve_list'])->name('shop_manager.reserve_list');
        Route::get('/menu/new/{shop_id}', [ShopManagerController::class, 'menu_new'])->name('shop_manager.menu.new');
        Route::post('/menu/store/{shop_id}', [ShopManagerController::class, 'menu_store'])->name('shop_manager.menu.store');
        Route::get('/menu/list/{shop_id}', [ShopManagerController::class, 'menu_list'])->name('shop_manager.menu.list');
        Route::get('/menu/edit/{menu_id}', [ShopManagerController::class, 'menu_edit'])->name('shop_manager.menu.edit');
        Route::patch('/menu/update/{menu_id}', [ShopManagerController::class, 'menu_update'])->name('shop_manager.menu.update');
        Route::get('/qr_code', [ShopManagerController::class, 'qr_code'])->name('shop_manager.qr_code');
        Route::get('/mail', [ShopManagerMailController::class, 'index'])->name('shop_manager.mail.index');
        Route::post('/mail/send', [ShopManagerMailController::class, 'send'])->name('shop_manager.mail.send');
    });
});

Route::middleware('verified')->group(function () {
    Route::get('/mypage', [MyPageController::class, 'index']);
    Route::get('/like/{shop_id}', [LikeController::class, 'like'])->name('like');
    Route::get('/unlike/{shop_id}', [LikeController::class, 'unlike'])->name('unlike');
    Route::post('/reserve/{shop_id}', [ReservationController::class, 'store'])->name('reserve.store');
    Route::get('/reserve/edit/{reserve_id}', [ReservationController::class, 'edit'])->name('reserve.edit');
    Route::patch('/reserve/update/{reserve_id}', [ReservationController::class, 'update'])->name('reserve.update');
    Route::delete('/reserve/destroy/{reserve_id}', [ReservationController::class, 'destroy'])->name('reserve.destroy');
    Route::post('/stripe/store', [StripePaymentController::class, 'store'])->name('stripe.store');
    Route::get('/evaluate/{shop_id}', [EvaluationController::class, 'index'])->name('evaluate.index');
    Route::post('/evaluate/{shop_id}', [EvaluationController::class, 'create'])->name('evaluate.create');
    Route::get('/evaluate/{evaluation_id}', [EvaluationController::class, 'edit'])->name('evaluate.edit');
    Route::patch('/evaluate/{evaluation_id}', [EvaluationController::class, 'update'])->name('evaluate.update');
    Route::delete('/evaluate/{evaluation_id}', [EvaluationController::class, 'destroy'])->name('evaluate.destroy');
});

Route::get('/email/verify', function () {
    return view('auth/verify-email');
})->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return view('general/thanks');
})->middleware(['auth', 'signed'])->name('verification.verify');
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
