<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MenuController;
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
    
    Route::get('/menu', [MenuController::class, 'index'])->name('menu');
});

Route::group(['middleware' => ['role:pemilik']], function () {
    Route::get('/menu/create', [MenuController::class, 'create'])->name('menu.create');
    Route::get('/menu/edit/{id}', [MenuController::class, 'edit'])->name('menu.edit');
    Route::post('/menu/store', [MenuController::class, 'store'])->name('menu.store');
    Route::patch('/menu/{id}/update', [MenuController::class, 'update'])->name('menu.update');
    Route::delete('/menu/{id}/delete', [MenuController::class, 'destroy'])->name('menu.destroy');
});

require __DIR__.'/auth.php';
