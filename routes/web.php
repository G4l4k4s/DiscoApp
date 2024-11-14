<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RoleControllet;
use Database\Seeders\RoleSeeder;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/roles', [RoleController::class, 'index'])->name('roles.index'); // Lista todos los roles
Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create'); // Formulario para crear un rol
Route::post('/roles', [RoleController::class, 'store'])->name('roles.store'); // Guarda el nuevo rol
Route::get('/roles/{role}', [RoleController::class, 'show'])->name('roles.show'); // Muestra un rol específico
Route::get('/roles/{role}/edit', [RoleController::class, 'edit'])->name('roles.edit'); // Formulario para editar un rol
Route::put('/roles/{role}', [RoleController::class, 'update'])->name('roles.update'); // Actualiza el rol existente
Route::delete('/roles/{role}', [RoleController::class, 'destroy'])->name('roles.destroy'); // Elimina el rol


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




require __DIR__.'/auth.php';
