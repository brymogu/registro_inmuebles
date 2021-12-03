<?php

use App\Http\Controllers\Admin\AcuerdosController;
use App\Http\Controllers\Admin\EditController;
use App\Http\Controllers\Admin\InicioController;
use App\Http\Controllers\Admin\UsuarioController;
use App\Http\Controllers\Admin\DownloadController;
use App\Http\Controllers\NegocioController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;




// Route::get('/administrador', InicioController::class);
Route::get('login/', [UsuarioController::class, 'show'])->name('login.show');
Route::post('login/', [UsuarioController::class, 'validar']);
Route::get('administrador/', [InicioController::class, 'show'])->name('administrador.main');
Route::get('administrador/editar', [EditController::class, 'showtable'])->name('administrador.edit');
Route::post('administrador/editar', [EditController::class, 'convertir'])->name('administrador.editcampos');

Route::get('administrador/editar/inmueble/{codiprop}', [EditController::class, 'show'])->name('administrador.editform');
Route::post('administrador/editar/inmueble/{codiprop}', [EditController::class, 'update'])->name('administrador.editupdate');

Route::get('administrador/descargas', [DownloadController::class, 'showtable'])->name('administrador.download');
Route::get('download_public/{certificado}', [NegocioController::class, 'download_public'])->name('download_public');

Route::get('administrador/acuerdos', [AcuerdosController::class, 'showtable'])->name('administrador.acuerdos');