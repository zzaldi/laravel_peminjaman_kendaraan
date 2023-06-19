<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehicleController;
use App\Models\Vehicle;

route::get('/', [VehicleController::class, 'index'])->name('dashboard');
Route::get('/vehicles/create', [VehicleController::class, 'create'])->name('vehicles.create');


Route::post('/vehicles', [VehicleController::class, 'store'])->name('vehicles.store');
Route::put('/vehicles/{id}/show', [VehicleController::class, 'show'])->name('vehicles.show');
Route::get('/vehicles/{id}/edit', [VehicleController::class, 'edit'])->name('vehicles.edit');
Route::put('/vehicles/{id}', [VehicleController::class, 'update'])->name('vehicles.update');
Route::delete('/vehicles/{id}', [VehicleController::class, 'destroy'])->name('vehicles.destroy');
Route::get('/vehicle/logout', [VehicleController::class, 'logout'])->name('vehicles.logout');


Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'loginadmin']);
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');


Route::middleware(['admin'])->prefix('admin')->group(function () {
});
Route::get('/logout', function () {
    Vehicle::logout();
    return redirect('/login');
});
Route::get("/vegicle/signup", sigupController::class)->name("signup");

Route::middleware(['guest'])->group(function () {
    Route::get("/vehicle/login", sigupController::class)->name("login");
});
