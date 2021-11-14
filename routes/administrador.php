<?php

use App\Http\Controllers\Admin\EditController;
use App\Http\Controllers\Admin\InicioController;
use App\Http\Controllers\Admin\UsuarioController;
use Illuminate\Support\Facades\Route;



// Route::get('/administrador', InicioController::class);
Route::get('login/', [UsuarioController::class, 'show'])->name('login.show');
Route::post('login/', [UsuarioController::class, 'validar']);
Route::get('administrador/', [InicioController::class, 'show'])->name('administrador.main');
Route::get('administrador/editar', [EditController::class, 'edit_table'])->name('administrador.edit');
Route::post('administrador/editar', [EditController::class, 'editform'])->name('administrador.editform');
