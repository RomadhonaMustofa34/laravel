<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ApprovalController;

/*
|--------------------------------------------------------------------------
| LOGIN
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'login'])
    ->name('login');

Route::post('/login', [AuthController::class, 'authenticate'])
    ->name('login.post');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

/*
|--------------------------------------------------------------------------
| PROTECTED ROUTE
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/', function () {
        return redirect('/dashboard');
    });

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::resource('vehicles', VehicleController::class);

    Route::resource('drivers', DriverController::class);

    Route::resource('bookings', BookingController::class);

    Route::get('/approvals', [ApprovalController::class, 'index'])
        ->name('approvals.index');

    Route::post('/approvals/{id}/approve', [ApprovalController::class, 'approve'])
        ->name('approvals.approve');

    Route::post('/approvals/{id}/reject', [ApprovalController::class, 'reject'])
        ->name('approvals.reject');

});