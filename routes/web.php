<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MultipleuploadsController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


// ROUTE PUBLIC
Route::get('/', function () {
    return view('welcome');
});

Route::get('/pcr', function () {
    return 'Selamat Datang di Website Kampus PCR!';
});

Route::get('/mahasiswa', function () {
    return 'Halo Para Mahasiswa';
})->name('mahasiswa.show');

Route::get('/nama/{param1?}', function ($param1 = '') {
    return 'Nama saya: ' . $param1;
});

Route::get('/mahasiswa/{param1}', [MahasiswaController::class, 'show']);

Route::get('/about', function () {
    return view('halaman-about');
})->name('route.about');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::post('question/store', [QuestionController::class, 'store'])
    ->name('question.store');


// =========================
// 🔥 AUTH ROUTE
// =========================
Route::get('/auth', [AuthController::class, 'index'])->name('auth.index');
Route::post('/auth/login', [AuthController::class, 'login'])->name('auth.login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
// =========================
// 🔥 AUTH ROUTE
// =========================
Route::get('/auth', [AuthController::class, 'index'])->name('auth.index');
Route::post('/auth/login', [AuthController::class, 'login'])->name('auth.login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// 🔥 SIGN UP ROUTE
Route::get('/auth/signup', [AuthController::class, 'signup'])->name('auth.signup');
Route::post('/auth/signup', [AuthController::class, 'register'])->name('auth.register');


// =========================
// 🔥 ROUTE LOGIN WAJIB LOGIN
// =========================
Route::middleware(['checkislogin'])->group(function () {

    // DASHBOARD — Semua user login boleh masuk
    Route::get('dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    // ================================
    // 🔥 SUPER ADMIN ONLY → /user
    // ================================
    Route::middleware(['checkrole:Super Admin'])->group(function () {
        Route::resource('user', UserController::class);
    });

    // ================================
    // 🔥 MITRA ONLY → /pelanggan
    // ================================
    Route::middleware(['checkrole:Mitra'])->group(function () {
        Route::resource('pelanggan', PelangganController::class);
    });

    // ================================
    // 🔥 PELANGGAN ONLY → /profile
    // ================================
    Route::middleware(['checkrole:Pelanggan'])->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::get('/profile/show', [ProfileController::class, 'show'])->name('profile.show');
        Route::delete('/profile/delete', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    // MULTIPLE UPLOADS — semua user login boleh
    Route::get('/multipleuploads', [MultipleuploadsController::class, 'index'])->name('uploads');
    Route::post('/save', [MultipleuploadsController::class, 'store'])->name('uploads.store');
});


// LOGIN TESTING — Opsional
Route::get('/test-login', function () {
    Auth::loginUsingId(1);
    return "Logged in!";
});
