<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\BalikNamaController;
use App\Http\Controllers\HasilInputanController;
use App\Http\Controllers\InputanController;
use App\Http\Controllers\InputBerkasController;
use App\Http\Controllers\JenisLayananController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\UserStaffController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/tracking', [App\Http\Controllers\TrackingController::class, 'index'])->name('tracking');
Route::post('/tracking/search', [App\Http\Controllers\TrackingController::class, 'search'])->name('tracking.search');
Route::resource('input_berkas', InputBerkasController::class)->middleware(['auth']);
Route::resource('jenis_layanan', JenisLayananController::class)->middleware(['auth']);
Route::resource('inputan', InputanController::class)->middleware(['auth']);
Route::resource('hasil_inputan', HasilInputanController::class)->middleware(['auth']);
Route::middleware(['auth'])->group(function () {
    Route::get('/absensi_user', [AbsensiController::class, 'index'])->name('absensi.user');

    Route::post('/absensi_store', [AbsensiController::class, 'store'])->name('absensi.store');

    Route::middleware(['auth'])->group(function () {
        Route::get('/absensi_admin', [AbsensiController::class, 'adminIndex'])->name('absensi.admin');
    });
});

Route::get('/location', [LocationController::class, 'index'])->name('location.index');
Route::put('/location', [LocationController::class, 'update'])->name('location.update');

Route::resource('balik_nama', BalikNamaController::class)->middleware(['auth']);

Route::resource('staff', StaffController::class)->middleware(['auth']);
Route::resource('user_staff', UserStaffController::class)->middleware(['auth']);
Route::get('/getjumlahclient', [InputBerkasController::class, 'getjumlahclient'])->name('getjumlahclients')->middleware(['auth']);
Route::get('/getjenislayanan', [InputBerkasController::class, 'getjenislayanan'])->name('getjenislayanans')->middleware(['auth']);
Route::get('/getjumlahagenda', [InputBerkasController::class, 'getjumlahagenda'])->name('getjumlahagendas')->middleware(['auth']);
Route::get('/getjumlahstaff', [InputBerkasController::class, 'getjumlahstaff'])->name('getjumlahstaffs')->middleware(['auth']);
Route::get('/getjenisberkas', [InputBerkasController::class, 'getjenisberkas'])->name('getjenisberkass')->middleware(['auth']);
Route::get('get_inputans', [HasilInputanController::class, 'getInputans'])->name('get_inputans');
Route::get('/inputan/{uid}', '@show')->name('inputan.show');

Route::get('cetakagenda', [InputanController::class, 'cetakagenda'])->name('cetakagenda')->middleware(['auth']);

// web.php
Route::get('/inputan/{id}/edit', [InputanController::class, 'edit'])->name('inputan.edit');
Route::post('/inputan/{id}', [InputanController::class, 'update'])->name('inputan.update');
