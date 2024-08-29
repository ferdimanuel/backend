<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PengajuanCutiController;

// Rute login dan logout
Route::post('login', [PegawaiController::class, 'login']);
Route::post('logout', [PegawaiController::class, 'logout'])->middleware('auth:sanctum');

// Rute untuk Pegawai dan Pengajuan Cuti yang memerlukan autentikasi
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('pegawai', PegawaiController::class);
    Route::apiResource('pengajuan-cuti', PengajuanCutiController::class);
});

// Rute untuk mendapatkan data pengguna yang sedang login
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
