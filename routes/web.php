<?php

use App\Http\Controllers\CutiController;
use App\Http\Controllers\cutiKhususController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\DashboardPegawaiController;
use App\Http\Controllers\exportCutiController;
use App\Http\Controllers\jenisCutiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\templatePengajuanController;
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
    return redirect()->route('login');
});

Route::get('/tes', function () {
    return view('welcome');
});

Route::get('/admin/riwayat', [CutiController::class, 'show'])->name('semuaCuti');
Route::resource('/admin/cuti-khusus', jenisCutiController::class);
Route::get('/dashboard/profil', [ProfilController::class, 'index'])->middleware('auth');
Route::post('/change-password', [ProfilController::class, 'changePassword'])->name('update-password');

Route::get('/print/{id}', [templatePengajuanController::class, 'index']);

Route::resource('/admin', DashboardAdminController::class);
Route::delete('/deleteCuti/{cuti}', [CutiController::class, 'destroyCuti']);

Route::delete('/deletePegawai/{pegawai}', [DashboardAdminController::class, 'destroy']);
Route::delete('/deleteKontrak/{pegawai}', [DashboardAdminController::class, 'destroyKontrak']);

Route::post('/changePass/{id}', [DashboardAdminController::class, 'resetPass'])->middleware('auth')->name('changePass');
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/exportcuti', [exportCutiController::class, 'export']);
Route::post('/importpegawai', [DashboardAdminController::class, 'pegawaiimportexcel'])->name('importpegawai');

Route::get('/dashboard',[DashboardPegawaiController::class, 'index'])->middleware('auth')->name('dashboardPegawai');
Route::resource('/dashboard',DashboardPegawaiController::class)->middleware('auth');
Route::get('/dashboard/create/cuti-khusus', [cutiKhususController::class, 'index'])->middleware('auth');
