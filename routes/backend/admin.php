<?php

use App\Http\Controllers\Backend\DashboardController;
use Illuminate\Support\Facades\Route;


// All route names are prefixed with 'admin.'.

Route::redirect('/', 'admin/dashboard', 301)->name('admin');
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
