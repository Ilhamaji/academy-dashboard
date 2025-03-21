<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\KelasController;

//Endpoint Auth
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'store']);
Route::get('/logout', [LogoutController::class, 'index']);

//Endpoint Dashboard
Route::middleware(['auth'])->group(function () {
    //Endpoint Home
    Route::get('/', [HomeController::class, 'index']);

        //Endpoint User
    Route::get('/profil', [UserController::class, 'index']);
    Route::put('/profil/{id}', [UserController::class, 'update']);

    //Endpoint Siswa
    Route::get('/siswa', [SiswaController::class, 'index']);
    Route::post('/siswa', [SiswaController::class, 'store']);
    Route::get('/siswa/edit/{nisn}', [SiswaController::class, 'edit']);
    Route::put('/siswa/edit/{nisn}', [SiswaController::class, 'update']);
    Route::get('/siswa/cari', [SiswaController::class, 'show']);
    Route::get('/siswa/hapus/{nisn}', [SiswaController::class, 'destroy']);

    //Endpoint Pembayaran
    Route::get('/pembayaran', [PembayaranController::class, 'index']);

    //Endpoint Kelas
    Route::get('/kelas', [KelasController::class, 'index']);
    Route::post('/kelas', [KelasController::class, 'store']);
    Route::get('/kelas/edit/{id}', [KelasController::class, 'edit']);
    Route::put('/kelas/edit/{id}', [KelasController::class, 'update']);
    Route::get('/kelas/hapus/{id}', [KelasController::class, 'destroy']);
});


