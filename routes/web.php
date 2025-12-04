<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/estados', function () {
    return view('estados');
})->middleware(['auth', 'verified'])->name('estados');

Route::get('/municipios', function () {
    return view('municipios');
})->middleware(['auth', 'verified'])->name('municipios');

Route::get('/usuarios', function () {
    return view('usuarios');
})->middleware(['auth', 'verified'])->name('usuarios');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
