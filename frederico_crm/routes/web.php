<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\CustomerController;

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return redirect()->route('dashboard');
    });

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('products', ProductController::class);


    Route::resource('leads', LeadController::class);

    Route::get('projects', [ProjectController::class, 'index'])->name('projects.index');
    Route::post('projects/{lead}', [ProjectController::class, 'store'])->name('projects.store');
    
    Route::post('projects/{project}/approve', [ProjectController::class, 'approve'])
        ->name('projects.approve')
        ->middleware('is.manager');

    Route::get('customers', [CustomerController::class, 'index'])->name('customers.index');
});