<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Service\IotHostingController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('front.index');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::prefix('/auth')->middleware(['guest'])->group(function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerSubmit'])->name('register.submit');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginSubmit'])->name('login.submit');
    Route::get('/forgot-password', [AuthController::class, 'forgot'])->name('forgot');
    Route::post('/forgot-password', [AuthController::class, 'forgotSubmit'])->name('forgot.submit');
    Route::get('/forget/{token}/reset', [AuthController::class, 'reset'])->name('reset');
    Route::post('/forget/{token}/reset', [AuthController::class, 'resetSubmit'])->name('reset.submit');
});
Route::get('/auth/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::prefix('/service')->middleware(['auth'])->group(function () {
    Route::prefix('/iot-hosting')->group(function () {
        Route::get('/', [IotHostingController::class, 'index'])->name('service.iot-hosting');
        Route::post('/payment/{id}', [IotHostingController::class, 'paymentSubmit'])->name('service.iot-hosting.payment');
        Route::get('/create', [IotHostingController::class, 'create'])->name('service.iot-hosting.create');
        Route::post('/create', [IotHostingController::class, 'store'])->name('service.iot-hosting.create.store');
    });
});

Route::prefix('/profile')->middleware(['auth'])->group(function () {
    Route::get('/', [ProfileController::class, 'index'])->name('profile');
    Route::post('/', [ProfileController::class, 'profileUpdate'])->name('profile.update');
    Route::post('/signin-method', [ProfileController::class, 'signinUpdate'])->name('profile.signin');
    Route::post('/change-password', [ProfileController::class, 'changePassword'])->name('profile.change-password');
});

Route::prefix('/user')->middleware(['auth'])->group(function () {
    Route::get('/pending', [UserController::class, 'pending'])->name('user.pending');
    Route::get('/pending/data', [UserController::class, 'pendingData'])->name('user.pending.data');
    Route::get('/pending/{id}/approve', [UserController::class, 'approve'])->name('user.pending.approve');
    Route::get('/active', [UserController::class, 'active'])->name('user.active');
    Route::get('/active/data', [UserController::class, 'activeData'])->name('user.active.data');
    Route::get('/{id}/destroy', [UserController::class, 'destroy'])->name('user.destroy');
});
