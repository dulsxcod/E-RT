<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminUserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.attempt');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

Route::middleware(['auth', 'role:super_admin'])->group(function () {
    Route::get('/Super-Admin/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard.super_admin');
    Route::get('/Super-Admin/user', [AdminUserController::class, 'index'])->name('super_admin.user');
    Route::post('/Super-Admin/user', [AdminUserController::class, 'store'])->name('super_admin.user.store');
    Route::put('/Super-Admin/user/{user}', [AdminUserController::class, 'update'])->name('super_admin.user.update');
    Route::delete('/Super-Admin/user/{user}', [AdminUserController::class, 'destroy'])->name('super_admin.user.destroy');
});

Route::middleware(['auth', 'role:rt'])->group(function () {
    Route::get('/rt/dashboard', fn () => view('RT.dashboard'))->name('dashboard.rt');
});

Route::middleware(['auth', 'role:bendahara'])->group(function () {
    Route::get('/bendahara/dashboard', fn () => view('Bendahara.dashboard'))->name('dashboard.bendahara');
});

Route::middleware(['auth', 'role:ketua_pemuda'])->group(function () {
    Route::get('/ketua-pemuda/dashboard', fn () => view('KetuaPemuda.dashboard'))->name('dashboard.ketua_pemuda');
});

Route::middleware(['auth', 'role:warga'])->group(function () {
    Route::get('/warga/dashboard', fn () => view('Warga.dashboard'))->name('dashboard.warga');
});
