<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RouterController;
use App\Http\Controllers\HotspotController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\VoucherHistoryController;
use App\Http\Controllers\PrintController;

Route::get('/', [DashboardController::class, 'index']);

Route::get('/routers', [RouterController::class, 'index'])->name('routers.index');
Route::post('/routers', [RouterController::class, 'store'])->name('routers.store');
Route::post('/routers/{router}/test', [RouterController::class, 'test'])->name('routers.test');
Route::get('/routers/{router}/edit', [RouterController::class, 'edit'])->name('routers.edit');
Route::put('/routers/{router}', [RouterController::class, 'update'])->name('routers.update');
Route::delete('/routers/{router}', [RouterController::class, 'destroy'])->name('routers.destroy');

Route::get('/routers/{router}/hotspot', [HotspotController::class, 'index'])
    ->name('hotspot.index');

Route::get('/routers/{router}/hotspot/users', [HotspotController::class, 'users'])
    ->name('hotspot.users');

Route::get('/routers/{router}/vouchers', [VoucherController::class, 'index'])
    ->name('vouchers.index');

Route::post('/routers/{router}/vouchers/generate', [VoucherController::class, 'generate'])
    ->name('vouchers.generate');

Route::get('/print/a4/{batch}', [PrintController::class, 'a4'])
    ->name('print.a4');

/*
|--------------------------------------------------------------------------
| Historique des lots
|--------------------------------------------------------------------------
*/

Route::get('/voucher-batches', [VoucherHistoryController::class, 'index'])
    ->name('vouchers.history');

Route::get('/voucher-batches/{batch}', [VoucherHistoryController::class, 'show'])
    ->name('vouchers.history.show');

Route::delete('/voucher-batches/{batch}', [VoucherHistoryController::class, 'destroy'])
    ->name('vouchers.history.destroy');