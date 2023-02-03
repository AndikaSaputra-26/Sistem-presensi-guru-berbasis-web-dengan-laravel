<?php

use App\Http\Controllers\Admin\AbsensiController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\JabatanController;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SettingAbsenController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\Guru\AbsenController;
use App\Http\Controllers\LupaPasswordController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/daftar', [DaftarController::class,'index'])->name('daftar');
Route::post('/daftar', [DaftarController::class,'store'])->name('daftar.store');
Route::prefix('lupa-password')->name('lupa_password.')->group(function() {
    Route::get('/', [LupaPasswordController::class,'index'])->name('index');
    Route::post('/', [LupaPasswordController::class,'update'])->name('update');
});
Auth::routes();

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function() {
    Route::get('/', [DashboardController::class,'index'])->name('dashboard.index');
    Route::prefix('user')->name('user.')->group(function() {
        Route::get('/', [UserController::class,'index'])->name('index');
        Route::get('/create', [UserController::class,'create'])->name('create');
        Route::post('/', [UserController::class,'store'])->name('store');
        Route::get('/edit/{id}', [UserController::class,'edit'])->name('edit');
        Route::get('/show/{id}', [UserController::class,'show'])->name('show');
        Route::put('/update/{id}', [UserController::class,'update'])->name('update');
        Route::delete('{id}', [UserController::class,'delete'])->name('delete');
        Route::put('/update-profil/{id}', [UserController::class,'updateProfil'])->name('updateProfil');
    });
    Route::prefix('jabatan')->name('jabatan.')->group(function() {
        Route::get('/', [JabatanController::class,'index'])->name('index');
        Route::get('/create', [JabatanController::class,'create'])->name('create');
        Route::get('/edit/{id}', [JabatanController::class,'edit'])->name('edit');
        Route::get('/{id}', [JabatanController::class,'show'])->name('show');
        Route::post('/', [JabatanController::class,'store'])->name('store');
        Route::put('/{id}', [JabatanController::class,'update'])->name('update');
        Route::delete('{id}', [JabatanController::class,'delete'])->name('delete');
    });
    Route::prefix('setting-absen')->name('setting.')->group(function() {
        Route::get('/', [SettingAbsenController::class,'index'])->name('index');
        Route::get('/create', [SettingAbsenController::class,'create'])->name('create');
        Route::get('/edit/{id}', [SettingAbsenController::class,'edit'])->name('edit');
        Route::get('/{id}', [SettingAbsenController::class,'show'])->name('show');
        Route::post('/', [SettingAbsenController::class,'store'])->name('store');
        Route::put('/{id}', [SettingAbsenController::class,'update'])->name('update');
        Route::delete('{id}', [SettingAbsenController::class,'delete'])->name('delete');
    });
    
    Route::prefix('profil')->name('profil.')->group(function() {
        Route::get('/', [ProfileController::class,'index'])->name('index');
        Route::put('/update', [ProfileController::class,'update'])->name('update');
        Route::put('/updateAkun', [ProfileController::class,'updateAkun'])->name('updateAkun');
    });
    Route::prefix('absensi')->name('absensi.')->group(function() {
        Route::get('/', [AbsensiController::class,'index'])->name('index');
        Route::get('/create', [AbsensiController::class,'create'])->name('create');
        Route::get('/edit/{id}', [AbsensiController::class,'edit'])->name('edit');
        Route::get('/{id}', [AbsensiController::class,'show'])->name('show');
        Route::post('/', [AbsensiController::class,'store'])->name('store');
        Route::put('/{id}', [AbsensiController::class,'update'])->name('update');
        Route::delete('{id}', [AbsensiController::class,'delete'])->name('delete');
    });
    Route::prefix('laporan')->name('laporan.')->group(function() {
        Route::get('/', [LaporanController::class,'index'])->name('index');
        Route::post('/', [LaporanController::class,'store'])->name('store');
        Route::post('/print', [LaporanController::class,'print'])->name('print');
    });
});

Route::prefix('guru')->name('guru.')->middleware('auth')->group(function() {
    Route::get('/', [UserDashboardController::class,'index'])->name('dashboard.index');
    Route::prefix('absen')->name('absen.')->group(function() {
        Route::get('/', [AbsenController::class,'index'])->name('index');
        Route::get('/create', [AbsenController::class,'create'])->name('create');
        Route::get('/edit/{id}', [AbsenController::class,'edit'])->name('edit');
        Route::get('/{id}', [AbsenController::class,'show'])->name('show');
        Route::post('/', [AbsenController::class,'store'])->name('store');
        Route::put('/{id}', [AbsenController::class,'update'])->name('update');
        Route::delete('{id}', [AbsenController::class,'delete'])->name('delete');
    });
});
