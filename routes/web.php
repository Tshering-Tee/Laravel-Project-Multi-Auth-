<?php

use App\Http\Controllers\GuestController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');


Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified', 'rolemanager:user'])
    ->name('dashboard');

// Route::get('/guest/dashboard', function () {
//     return view('guest');
// })->middleware(['auth', 'verified', 'rolemanager:guest'])->name('guest');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';


//admin
Route::middleware(['auth', 'verified', 'rolemanager:admin'])->prefix('admin/dashboard')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');

    Route::get('/{id}/edit', [AdminController::class, 'edit'])->name('admin.dashboard.edit');

    Route::put('/{id}', [AdminController::class, 'update'])->name('admin.dashboard.update');

    Route::delete('/{id}', [AdminController::class, 'destroy'])->name('admin.dashboard.destroy');
});

//guest
Route::get('/guest/dashboard', [GuestController::class, 'index'])
    ->middleware(['auth', 'verified', 'rolemanager:guest'])
    ->name('guest.index');


// Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
// Route::get('/profile/password', [ProfileController::class, 'editPassword'])->name('password.edit');
// Route::get('/profile/delete', [ProfileController::class, 'deleteAccount'])->name('account.delete');
