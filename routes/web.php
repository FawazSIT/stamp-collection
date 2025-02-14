<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $user = auth()->user();
    return redirect()->route($user->role === 'admin' ? 'admin.dashboard' : 'customer.dashboard');
})->middleware('auth')->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Dashboard Routes
Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/editUser/{id}', [AdminController::class, 'editUser'])->name('admin.editUser');
    Route::put('/admin/editUser/{id}', [AdminController::class, 'updateUser'])->name('admin.updateUser');
    Route::get('/admin/deleteUser/{id}', [AdminController::class, 'deleteUser'])->name('admin.deleteUser');

    // Stamp Management Routes
    Route::post('/admin/stamps/create', [AdminController::class, 'createStamp'])->name('admin.createStamp'); // Create new stamp
    Route::get('/admin/stamps/edit/{id}', [AdminController::class, 'editStamp'])->name('admin.editStamp'); // Edit stamp
    Route::put('/admin/stamps/update/{id}', [AdminController::class, 'updateStamp'])->name('admin.updateStamp'); // Update stamp
    Route::delete('/admin/stamps/delete/{id}', [AdminController::class, 'deleteStamp'])->name('admin.deleteStamp'); // Delete stamp
});

// Customer Dashboard Routes
Route::middleware('auth')->group(function () {
    Route::get('/customer/dashboard', [CustomerController::class, 'index'])->name('customer.dashboard');
    Route::get('/customer/collectstamp/{id}', [CustomerController::class, 'collectStamp'])->name('customer.collectStamp');
});

require __DIR__.'/auth.php';
