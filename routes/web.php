<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\backend\BannerController;
use App\Http\Controllers\backend\BillController;
use App\Http\Controllers\backend\contactController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\ImageUploadController;
use App\Http\Controllers\backend\RoomController;
use App\Http\Controllers\backend\TypeRoomController;
use App\Http\Controllers\backend\ServiceController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\Backend\VoucherController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\frontEnd\CartController;
use App\Http\Controllers\frontEnd\dashBoardController as FrontEndDashBoardController;
use App\Http\Controllers\frontEnd\RoomController as FrontEndRoomController;
use App\Mail\contact;
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

Route::group(['prefix' => 'auth'], function () {
    Route::get('login', [AuthController::class, 'Login'])->name('login');
    Route::get('logout', [AuthController::class, 'Logout'])->name('logout');
    Route::post('postlogin', [AuthController::class, 'postLogin'])->name('post.login');
    Route::get('google', [AuthController::class, 'redirectToGoogle'])->name('auth.google');
    Route::get('google/callback', [AuthController::class, 'handleGoogleCallback'])->name('google-auth.callback');
});
Route::middleware(['auth'])->group(function () {
    /**
     *
     * ROUTER   ADMIN
     *
     */
    Route::middleware(['RoleAdmin'])->group(function () {
        Route::prefix('/admin')->group(function () {
            Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
            Route::prefix('account')->group(function () {
                // Route::match(['get', 'put'], '{id}/edit', [UserController::class, 'edit'])->name('admin.user.edit');
                Route::get('', [UserController::class, 'index'])->name('admin.user.index');
                Route::post('{id}', [UserController::class, 'updateRole'])->name('admin.user.update.role');
                // Route::get('create', [UserController::class, 'create'])->name('admin.typeroom.create');
                // Route::post('store', [UserController::class, 'store'])->name('admin.typeroom.store');
                Route::delete('{id}', [UserController::class, 'delete'])->name('admin.user.destroy');
                Route::get('user-soft-delete', [UserController::class, 'softDelete'])->name('admin.user.soft.delete');
                Route::get('user-soft-delete/{id}/backup', [UserController::class, 'backUp'])->name('admin.user.soft.backup');
            });
            Route::prefix('type-room')->group(function () {
                Route::match(['get', 'put'], '{id}/edit', [TypeRoomController::class, 'edit'])->name('admin.typeroom.edit');
                Route::get('', [TypeRoomController::class, 'index'])->name('admin.typeroom.index');
                Route::get('create', [TypeRoomController::class, 'create'])->name('admin.typeroom.create');
                Route::post('store', [TypeRoomController::class, 'store'])->name('admin.typeroom.store');
                Route::delete('{id}', [TypeRoomController::class, 'delete'])->name('admin.typeroom.destroy');
                Route::get('typeroom-soft-delete', [TypeRoomController::class, 'softDelete'])->name('admin.typeroom.soft.delete');
                Route::get('typeroom-soft-delete/{id}/backup', [TypeRoomController::class, 'backUp'])->name('admin.typeroom.soft.backup');
            });
            Route::prefix('room')->group(function () {
                Route::match(['get', 'put'], '{id}/edit', [RoomController::class, 'edit'])->name('admin.room.edit');
                Route::get('', [RoomController::class, 'index'])->name('admin.room.index');
                Route::match(['get', 'post'], 'add', [RoomController::class, 'add'])->name('admin.room.add');
                Route::delete('{id}', [RoomController::class, 'delete'])->name('admin.room.destroy');
                Route::get('room-soft-delete', [RoomController::class, 'softDelete'])->name('admin.room.soft.delete');
                Route::get('room-soft-delete/{id}/backup', [RoomController::class, 'backUp'])->name('admin.room.soft.backup');
            });
            Route::prefix('service')->group(function () {
                Route::match(['get', 'put'], '{id}/edit', [ServiceController::class, 'edit'])->name('admin.service.edit');
                Route::get('', [ServiceController::class, 'index'])->name('admin.service.index');
                Route::match(['get', 'post'], 'add', [ServiceController::class, 'add'])->name('admin.service.add');
                Route::delete('{id}', [ServiceController::class, 'delete'])->name('admin.service.destroy');
                Route::get('service-soft-delete', [ServiceController::class, 'softDelete'])->name('admin.service.soft.delete');
                Route::get('service-soft-delete/{id}/backup', [ServiceController::class, 'backUp'])->name('admin.service.soft.backup');
            });
            Route::prefix('banner')->group(function () {
                Route::match(['get', 'put'], '{id}/edit', [BannerController::class, 'edit'])->name('admin.banner.edit');
                Route::get('', [BannerController::class, 'index'])->name('admin.banner.index');
                Route::match(['get', 'post'], 'add', [BannerController::class, 'add'])->name('admin.banner.add');
                Route::delete('{id}', [BannerController::class, 'delete'])->name('admin.banner.destroy');
                Route::get('banner-soft-delete', [BannerController::class, 'softDelete'])->name('admin.banner.soft.delete');
                Route::get('banner-soft-delete/{id}/backup', [BannerController::class, 'backUp'])->name('admin.banner.soft.backup');
            });
            Route::prefix('voucher')->group(function () {
                Route::match(['get', 'put'], '{id}/edit', [VoucherController::class, 'edit'])->name('admin.voucher.edit');
                Route::get('', [VoucherController::class, 'index'])->name('admin.voucher.index');
                Route::match(['get', 'post'], 'add', [VoucherController::class, 'add'])->name('admin.voucher.add');
                Route::delete('{id}', [VoucherController::class, 'delete'])->name('admin.voucher.destroy');
                Route::get('voucher-soft-delete', [VoucherController::class, 'softDelete'])->name('admin.voucher.soft.delete');
                Route::get('voucher-soft-delete/{id}/backup', [VoucherController::class, 'backUp'])->name('admin.voucher.soft.backup');
            });
            Route::prefix('bill')->group(function () {
                Route::match(['get', 'put'], '{id}/edit', [BillController::class, 'edit'])->name('admin.bill.edit');
                Route::get('', [BillController::class, 'index'])->name('admin.bill.index');
                Route::match(['get', 'post'], 'add', [BillController::class, 'add'])->name('admin.bill.add');
                Route::delete('{id}', [BillController::class, 'delete'])->name('admin.bill.destroy');
                Route::get('bill-soft-delete', [BillController::class, 'softDelete'])->name('admin.bill.soft.delete');
                Route::get('bill-soft-delete/{id}/backup', [BillController::class, 'backUp'])->name('admin.bill.soft.backup');
                Route::post('update-pay/{id}', [BillController::class, 'updatePay'])->name('admin.bill.updatePay');
            });
            Route::prefix('contact')->group(function () {
                Route::match(['get', 'put'], '{id}/edit', [contactController::class, 'edit'])->name('admin.contact.edit');
                Route::get('', [contactController::class, 'index'])->name('admin.contact.index');
                Route::delete('{id}', [contactController::class, 'delete'])->name('admin.contact.destroy');
                Route::get('contact-soft-delete', [contactController::class, 'softDelete'])->name('admin.contact.soft.delete');
                Route::get('contact-soft-delete/{id}/backup', [contactController::class, 'backUp'])->name('admin.contact.soft.backup');
            });
            Route::post('image-upload', [ImageUploadController::class, 'storeImage'])->name("image.upload");
        });
    });


    /**
     *
     * END ROUTER ADMIN
     */


    /**
     *
     *  ROUTER CLINE
     */
    Route::get('/', [FrontEndDashBoardController::class, 'index'])->name('fontend.dashboard');
    Route::prefix('room')->group(function () {
        Route::get('/', [FrontEndRoomController::class, 'index'])->name('fontend.rooms');
        Route::get('my-room', [FrontEndRoomController::class, 'myRoom'])->name('fontend.room.myRoom');
        Route::post('add-service', [FrontEndRoomController::class, 'addService'])->name('fontend.room.addService');
        Route::get('{id}', [FrontEndRoomController::class, 'detailRoom'])->name('fontend.room.detail');
    });

    Route::prefix('cart')->group(function () {
        Route::get('{id}', [CartController::class, 'addCart'])->name('fontend.cart.add');
        Route::get('', [CartController::class, 'clear'])->name('fontend.cart.clear');
    });
    Route::prefix('bill')->group(function () {
        Route::get('/form', [BillController::class, 'formBill'])->name('fontend.bill.formbill');
        Route::post('/add', [BillController::class, 'addBill'])->name('fontend.bill.addbill');
    });
    Route::prefix('contact')->group(function () {
        Route::match(['get', 'post'], 'add', [contactController::class, 'add'])->name('fontend.contact.add');
    });
    /**
     * EMAIL
     */
    Route::get('send-mail', [EmailController::class, 'index'])->name('bill.email');
    Route::get('bill-final', [EmailController::class, 'billFinal'])->name('billFinal.email');
    Route::get('contact-email', [EmailController::class, 'contactEmail'])->name('contact.email');
});
