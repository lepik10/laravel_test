<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Cabinet\UserBalanceController;
use App\Http\Controllers\Cabinet\UserOperationController;

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

Route::get('/', [AuthController::class, 'index'])
    ->name('index');
Route::post('/login', [AuthController::class, 'login'])
    ->name('auth.login');
Route::post('/logout', [AuthController::class, 'logout'])
    ->name('auth.logout');

Route::middleware(['auth'])
    ->prefix('cabinet')
    ->name('cabinet.')
    ->group(function () {
        Route::get('/', [UserBalanceController::class, 'index'])
            ->name('balance');
        Route::get('/operations', [UserOperationController::class, 'index'])
            ->name('operations');
        Route::post('/update-info', [UserBalanceController::class, 'getUpdateInfo'])
            ->name('update.info');
});
