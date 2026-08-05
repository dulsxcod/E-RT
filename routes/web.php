<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\WargaController;

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

Route::middleware(['auth', 'role:super_admin'])->group(function () {
    Route::get('/Super-Admin/warga', [WargaController::class, 'index'])->name('super_admin.warga');
    Route::get('/Super-Admin/warga/create', [WargaController::class, 'create'])->name('super_admin.warga.create');
    Route::post('/Super-Admin/warga', [WargaController::class, 'store'])->name('super_admin.warga.store');
    Route::get('/Super-Admin/warga/{warga}/edit', [WargaController::class, 'edit'])->name('super_admin.warga.edit');
    Route::put('/Super-Admin/warga/{warga}', [WargaController::class, 'update'])->name('super_admin.warga.update');
    Route::delete('/Super-Admin/warga/{warga}', [WargaController::class, 'destroy'])->name('super_admin.warga.destroy');
    Route::get('/Super-Admin/warga/pending', [WargaController::class, 'pending'])->name('super_admin.warga.pending');
    Route::put('/Super-Admin/warga/{warga}/activate', [WargaController::class, 'activate'])->name('super_admin.warga.activate');
});

Route::get('/warga/register', [WargaController::class, 'showRegister'])->name('warga.register');
Route::post('/warga/register', [WargaController::class, 'register'])->name('warga.register.submit');
Route::get('/warga/login', [WargaController::class, 'showLogin'])->name('warga.login');
Route::post('/warga/login', [WargaController::class, 'login'])->name('warga.login.submit');
Route::get('/warga/reset-password', [WargaController::class, 'showResetPassword'])->name('warga.reset-password');
Route::post('/warga/reset-password', [WargaController::class, 'resetPassword'])->name('warga.reset-password.submit');
