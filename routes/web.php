<?php

use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PermohonanController;
use App\Http\Controllers\ProfilController;
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
    return redirect('/home');
});

Auth::routes();
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('permohonan', PermohonanController::class);
    Route::get('permohonan/petugas/{id}', [PermohonanController::class, 'setPetugas']);
    Route::post('permohonan/set-petugas/{id}', [PermohonanController::class, 'updatePetugas']);
    Route::get('permohonan/setujui/{id}', [PermohonanController::class, 'setujui']);
    Route::put('permohonan/berkas-post/{id}', [PermohonanController::class, 'postBerkas']);
    Route::resource('pengguna', PenggunaController::class);
    Route::resource('profil', ProfilController::class);
});
