<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehicleController;

route::get('/', [VehicleController::class, 'index'])->name('dashboard');
Route::get('/vehicles/create', [VehicleController::class, 'create'])->name('vehicles.create');


Route::post('/vehicles', [VehicleController::class, 'store'])->name('vehicles.store');
Route::get('/vehicles/{id}/show', [VehicleController::class, 'show'])->name('vehicles.show');
Route::get('/vehicles/{id}/edit', [VehicleController::class, 'edit'])->name('vehicles.edit');
Route::put('/vehicles/{id}', [VehicleController::class, 'update'])->name('vehicles.update');
Route::delete('/vehicles/{id}', [VehicleController::class, 'destroy'])->name('vehicles.destroy');
Route::get('/vehicles/login', [VehicleController::class, 'login'])->name('vehicles.login');
Route::get('/vehicle/logout', [VehicleController::class, 'logout'])->name('vehicle.logout');