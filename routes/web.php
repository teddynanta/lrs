<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LRSController;
use App\Http\Controllers\ReportController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/lrs', [LRSController::class, 'index'])->name('lrs.index');
Route::post('/lrs', [LRSController::class, 'store'])->name('lrs.store');
Route::get('/pasien', [LRSController::class, 'indexData'])->name('patient.index');
Route::get('/reports/a', [ReportController::class, 'a'])->name('reports.a');
Route::get('/reports/b', [ReportController::class, 'b'])->name('reports.b');
Route::get('/reports/c', [ReportController::class, 'c'])->name('reports.c');
Route::get('/reports/d', [ReportController::class, 'd'])->name('reports.d');
Route::get('/reports/e', [ReportController::class, 'e'])->name('reports.e');
