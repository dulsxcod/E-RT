<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.attempt');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

Route::middleware(['auth', 'role:super_admin'])->group(function () {
    Route::get('/Super-Admin/dashboard', fn () => view('SuperAdmin.dashboard'))->name('dashboard.super_admin');
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
