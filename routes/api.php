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
Route::post('/permohonan-get', [PermohonanController::class, 'getPermohonan']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
