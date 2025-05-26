<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PenerimaanController;
use App\Http\Controllers\LainnyaController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\KasController;
use App\Http\Controllers\InformasiController;

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

    //Endpoint Informasi
    Route::get('/informasi', [InformasiController::class, 'index']);
    Route::put('/informasi/{id}', [InformasiController::class, 'update']);

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

    //Endpoint Penerimaan
        //Endpoint Jenis Penerimaan
        Route::get('/penerimaan', [PenerimaanController::class, 'jenis_penerimaan']);
        Route::post('/penerimaan/jenis', [PenerimaanController::class, 'tambah_jenis_penerimaan']);
        Route::get('/penerimaan/edit/{kode}', [PenerimaanController::class, 'edit_jenis_penerimaan']);
        Route::put('/penerimaan/edit/{kode}', [PenerimaanController::class, 'update_jenis_penerimaan']);
        Route::get('/penerimaan/hapus/{kode}', [PenerimaanController::class, 'hapus_jenis_penerimaan']);

        //Endpoint Laporan Pembayaran
        Route::get('/laporan/pembayaran', [PembayaranController::class, 'index']);
        Route::post('/laporan/pembayaran', [PembayaranController::class, 'cari']);
        Route::get('/laporan/pembayaran/download', [PenerimaanController::class, 'export_pembayaran']);
        Route::post('/penerimaan/pembayaran', [PembayaranController::class, 'store']);
        Route::get('/penerimaan/pembayaran/{id}', [PembayaranController::class, 'show']);

        //Endpoint Laporan Lain-lain
        Route::get('/laporan/lain-lain', [LainnyaController::class, 'index']);
        Route::post('/laporan/lain-lain', [LainnyaController::class, 'cari']);
        Route::get('/laporan/lain-lain/download', [PenerimaanController::class, 'export_lainlain']);
        Route::post('/penerimaan/lain-lain', [LainnyaController::class, 'store']);
        Route::get('/penerimaan/lain-lain/{id}', [LainnyaController::class, 'view_pdf']);

        //Endpoint Transaksi Pembayaran
        Route::get('/transaksi/pembayaran', [PembayaranController::class, 'transaksi']);
        Route::get('/transaksi/pembayaran/edit/{id}', [PembayaranController::class, 'edit_transaksi']);
        Route::put('/transaksi/pembayaran/edit/{id}', [PembayaranController::class, 'update_transaksi']);
        Route::get('/transaksi/pembayaran/hapus/{id}', [PembayaranController::class, 'hapus_transaksi']);

        //Endpoint Transaksi Lain-lain
        Route::get('/transaksi/lain-lain', [LainnyaController::class, 'transaksi']);
        Route::get('/transaksi/lain-lain/edit/{id}', [LainnyaController::class, 'edit_transaksi']);
        Route::put('/transaksi/lain-lain/edit/{id}', [LainnyaController::class, 'update_transaksi']);
        Route::get('/transaksi/lain-lain/hapus/{id}', [LainnyaController::class, 'hapus_transaksi']);

        //Endpoint Laporan Jenis Penerimaan
        Route::get('/laporan/jenis-penerimaan', [PenerimaanController::class, 'laporan_jenis_penerimaan']);
        Route::get('/laporan/jenis-penerimaan/download', [PenerimaanController::class, 'export_jenis_penerimaan']);

    //Endpoint Pengeluaran
        //Endpoint Jenis Pengeluaran
        Route::get('/pengeluaran', [PengeluaranController::class, 'jenis_pengeluaran']);
        Route::post('/pengeluaran/jenis', [PengeluaranController::class, 'tambah_jenis_pengeluaran']);
        Route::get('/pengeluaran/edit/{kode}', [PengeluaranController::class, 'edit_jenis_pengeluaran']);
        Route::put('/pengeluaran/edit/{kode}', [PengeluaranController::class, 'update_jenis_pengeluaran']);
        Route::get('/pengeluaran/hapus/{kode}', [PengeluaranController::class, 'hapus_jenis_pengeluaran']);

        //Endpoint Pengeluaran
        Route::post('/pengeluaran', [PengeluaranController::class, 'store']);
        Route::get('/laporan/pengeluaran/kwitansi/{id}', [PengeluaranController::class, 'view_pdf']);

        //Endpoint Laporan Pengeluaran
        Route::get('/laporan/pengeluaran', [PengeluaranController::class, 'pengeluaran']);
        Route::post('/laporan/pengeluaran', [PengeluaranController::class, 'cari']);
        Route::get('/laporan/pengeluaran/download', [PengeluaranController::class, 'export']);
        Route::get('/laporan/jenis-pengeluaran', [PengeluaranController::class, 'laporan_jenis_pengeluaran']);
        Route::get('/laporan/jenis-pengeluaran/download', [PengeluaranController::class, 'export_jenis_pengeluaran']);


        //Endpoint Transaksi
        Route::get('/transaksi/pengeluaran', [PengeluaranController::class, 'transaksi']);
        Route::get('/transaksi/pengeluaran/edit/{id}', [PengeluaranController::class, 'edit_transaksi']);
        Route::put('/transaksi/pengeluaran/edit/{id}', [PengeluaranController::class, 'update_transaksi']);
        Route::get('/transaksi/pengeluaran/hapus/{id}', [PengeluaranController::class, 'hapus_transaksi']);

    //Endpoint Laporan Kelas
    Route::get('/laporan/kelas', [DetailController::class, 'kelas']);
    Route::get('/laporan/kelas/download', [DetailController::class, 'export']);
    Route::get('/laporan/kelas/{id}', [DetailController::class, 'show']);
    Route::post('/laporan/kelas/{id}', [DetailController::class, 'showCari']);
    Route::get('/laporan/kelas/siswa/{nisn}', [DetailController::class, 'detail']);
    Route::post('/laporan/kelas/siswa/{nisn}', [DetailController::class, 'detailCari']);
    Route::get('/laporan/kelas/siswa/pembayaran/{id}', [DetailController::class, 'view_pdf']);

    //Endpoint Laporan Siswa
    Route::get('/laporan/siswa', [SiswaController::class, 'laporanSiswa']);
    Route::get('/laporan/siswa/cari', [SiswaController::class, 'laporanCari']);
    Route::get('/laporan/siswa/download', [SiswaController::class, 'export_siswa']);

    //Endpoint Kelas
    Route::get('/kelas', [KelasController::class, 'index']);
    Route::post('/kelas', [KelasController::class, 'store']);
    Route::get('/kelas/edit/{id}', [KelasController::class, 'edit']);
    Route::put('/kelas/edit/{id}', [KelasController::class, 'update']);
    Route::get('/kelas/hapus/{nama_kelas}', [KelasController::class, 'destroy']);

    //Endpoint Kas
    Route::get('/kas', [KasController::class, 'index']);
    Route::post('/kas', [KasController::class, 'show']);
    Route::post('/kas/cari/download', [KasController::class, 'view_pdf_detail']);
    Route::get('/kas/download', [KasController::class, 'view_pdf']);
});


