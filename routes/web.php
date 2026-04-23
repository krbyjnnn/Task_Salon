<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Service Management
    Route::get('/services', [ServiceController::class, 'index']);
    Route::get('/services/create', [ServiceController::class, 'create']);
    Route::post('/services', [ServiceController::class, 'store']);
    Route::get('/services/{id}/edit', [ServiceController::class, 'edit']);
    Route::put('/services/{id}', [ServiceController::class, 'update']);
    Route::delete('/services/{id}', [ServiceController::class, 'destroy']);

    Route::get('/appointments', [AppointmentController::class, 'index']);
    Route::get('/appointments/create', [AppointmentController::class, 'create']);
    Route::post('/appointments', [AppointmentController::class, 'store']);
    Route::get('/appointments/{id}/edit', [AppointmentController::class, 'edit']);
    Route::put('/appointments/{id}', [AppointmentController::class, 'update']);
    Route::delete('/appointments/{id}', [AppointmentController::class, 'destroy']);

    Route::get('/payments', [PaymentController::class, 'index']);
    Route::patch('/payments/{id}/pay', [PaymentController::class, 'pay']);
    Route::delete('/payments/{id}', [PaymentController::class, 'destroy']);
});

require __DIR__.'/auth.php';