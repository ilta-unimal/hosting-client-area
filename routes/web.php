<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Service\IotHostingController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('front.index');
})->name('home');

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
        Route::get('/payment/{id}', [IotHostingController::class, 'payment'])->name('service.iot-hosting.payment');
        Route::post('/payment/{id}', [IotHostingController::class, 'paymentStore'])->name('service.iot-hosting.payment.submit');
        Route::get('/create', [IotHostingController::class, 'create'])->name('service.iot-hosting.create');
        Route::post('/create', [IotHostingController::class, 'store'])->name('service.iot-hosting.create.store');
    });
    Route::get('/shared-hosting', function () {
        $data = [
            'title' => 'Service',
            'subTitle' => 'Shared Hosting',
            'page_id' => null,
        ];
        return view('pages.maintenace', $data);
    })->name('service.shared-hosting');
    Route::get('/mqtt', function () {
        $data = [
            'title' => 'Service',
            'subTitle' => 'MQTT',
            'page_id' => null,
        ];
        return view('pages.maintenace', $data);
    })->name('service.mqtt');
    Route::get('/vps-hosting', function () {
        $data = [
            'title' => 'Service',
            'subTitle' => 'VPS Hosting',
            'page_id' => null,
        ];
        return view('pages.maintenace', $data);
    })->name('service.vps-hosting');
    Route::get('/cloud-hosting', function () {
        $data = [
            'title' => 'Service',
            'subTitle' => 'Cloud Hosting',
            'page_id' => null,
        ];
        return view('pages.maintenace', $data);
    })->name('service.cloud-hosting');
    Route::get('/cloud-storage', function () {
        $data = [
            'title' => 'Service',
            'subTitle' => 'Cloud Storage',
            'page_id' => null,
        ];
        return view('pages.maintenace', $data);
    })->name('service.cloud-storage');
});

Route::prefix('/profile')->middleware(['auth'])->group(function () {
    Route::get('/', [ProfileController::class, 'index'])->name('profile');
    Route::post('/', [ProfileController::class, 'profileUpdate'])->name('profile.update');
    Route::post('/signin-method', [ProfileController::class, 'signinUpdate'])->name('profile.signin');
    Route::post('/change-password', [ProfileController::class, 'changePassword'])->name('profile.change-password');
});

Route::prefix('/user')->middleware(['auth'])->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('user');
    Route::get('/data', [UserController::class, 'data'])->name('user.data');
});
