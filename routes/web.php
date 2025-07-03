<?php

use App\Http\Controllers\LRSController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/lrs', [LRSController::class, 'index'])->name('lrs.index');
Route::post('/lrs', [LRSController::class, 'store'])->name('lrs.store');
Route::get('/pasien', [LRSController::class, 'indexData'])->name('patient.index');
