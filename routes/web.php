<?php

use App\Http\Controllers\BalikNamaController;
use App\Http\Controllers\HasilInputanController;
use App\Http\Controllers\InputanController;
use App\Http\Controllers\InputBerkasController;
use App\Http\Controllers\JenisLayananController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('input_berkas', InputBerkasController::class)->middleware(['auth']);
Route::resource('jenis_layanan', JenisLayananController::class)->middleware(['auth']);
Route::resource('inputan', InputanController::class)->middleware(['auth']);
Route::resource('hasil_inputan', HasilInputanController::class)->middleware(['auth']);

Route::resource('balik_nama', BalikNamaController::class)->middleware(['auth']);

Route::resource('staff', StaffController::class)->middleware(['auth']);
Route::resource('user_staff', UserStaffController::class)->middleware(['auth']);
Route::get('/getjumlahclient', [InputBerkasController::class, 'getjumlahclient'])->name('getjumlahclients')->middleware(['auth']);
Route::get('/getjenisberkas', [InputBerkasController::class, 'getjenisberkas'])->name('getjenisberkass')->middleware(['auth']);
Route::get('get_inputans', [HasilInputanController::class, 'getInputans'])->name('get_inputans');
Route::get('/inputan/{uid}', '@show')->name('inputan.show');

Route::get('cetakagenda', [InputanController::class, 'cetakagenda'])->name('cetakagenda')->middleware(['auth']);

// web.php
Route::get('/inputan/{id}/edit', [InputanController::class, 'edit'])->name('inputan.edit');
Route::post('/inputan/{id}', [InputanController::class, 'update'])->name('inputan.update');
