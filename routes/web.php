<?php

use App\Http\Controllers\GuestController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'rolemanager:user'])->name('dashboard');


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
Route::get('/admin/dashboard', [AdminController::class, 'index'])
    ->middleware(['auth', 'verified', 'rolemanager:admin'])
    ->name('admin.index');

    Route::get('/admin/dashboard/{id}/edit', [AdminController::class, 'edit'])
    ->middleware(['auth', 'verified', 'rolemanager:admin'])
    ->name('admin.dashboard.edit');

Route::put('/admin/dashboard/{id}', [AdminController::class, 'update'])
    ->middleware(['auth', 'verified', 'rolemanager:admin'])
    ->name('admin.dashboard.update');

    Route::delete('/admin/dashboard/{id}', [AdminController::class, 'destroy'])
    ->middleware(['auth', 'verified', 'rolemanager:admin'])
    ->name('admin.dashboard.destroy');



//guest
Route::get('/guest/dashboard', [GuestController::class, 'index'])
    ->middleware(['auth', 'verified', 'rolemanager:guest'])
    ->name('guest.index');

    
