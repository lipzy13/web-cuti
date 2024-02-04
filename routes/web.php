<?php

use App\Http\Controllers\CutiController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\DashboardPegawaiController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\KontrakController;
use App\Http\Controllers\LoginController;
use App\Livewire\CreateKontrak;
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


Route::resource('/admin', DashboardAdminController::class);
Route::delete('/deleteCuti/{cuti}', [CutiController::class, 'destroyCuti']);

Route::delete('/deletePegawai/{pegawai}', [DashboardAdminController::class, 'destroy']);
Route::delete('/deleteKontrak/{pegawai}', [DashboardAdminController::class, 'destroyKontrak']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::post('/importpegawai', [DashboardAdminController::class, 'pegawaiimportexcel'])->name('importpegawai');

Route::get('/dashboard',[DashboardPegawaiController::class, 'index'])->middleware('auth')->name('dashboardPegawai');
Route::resource('/dashboard',DashboardPegawaiController::class)->middleware('auth');
