<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

// Route Dashboard Admin
Route::get('/admin/dashboard', function () {
    // Keamanan sederhana: cek apakah yang akses adalah admin
    if (!Auth::check() || Auth::user()->role !== 'admin') {
        return redirect('/')->with('error', 'Akses ditolak! Anda bukan Admin.');
    }
    return view('admin.dashboard');
})->name('admin.dashboard');

// Route Autentikasi
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');