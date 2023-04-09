<?php

use App\Http\Controllers\Api\PermohonanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('/register', App\Http\Controllers\Api\RegisterController::class)->name('register');
Route::post('/login', App\Http\Controllers\Api\LoginController::class)->name('login');
Route::post('/logout', App\Http\Controllers\Api\LogoutController::class)->name('logout');
Route::post('/permohonan-post', [PermohonanController::class, 'postPermohonan']);
Route::post('post-permohonan-ktp', [PermohonanController::class, 'postKtp']);
Route::post('post-permohonan-kk', [PermohonanController::class, 'postKk']);
Route::post('post-permohonan-sp', [PermohonanController::class, 'postSp']);
Route::post('/permohonan-get', [PermohonanController::class, 'getPermohonan']);
Route::post('/permohonan-get-petugas', [PermohonanController::class, 'getPermohonanPetugas']);
Route::post('permohonan-get-file', [PermohonanController::class, 'getFile']);
Route::post('permohonan-verifikasi', [PermohonanController::class, 'postVerifikasi']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
