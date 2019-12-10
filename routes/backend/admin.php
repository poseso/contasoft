<?php

use App\Http\Controllers\Dashboard\DashboardController;

// All route names are prefixed with 'admin.'.
Route::redirect('/', '/dashboard', 301)->name('redirect');
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('colores', [DashboardController::class, 'colores'])->name('dashboard.colores');
