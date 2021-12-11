<?php

use App\Http\Controllers\Admin\AcuerdosController;
use App\Http\Controllers\Admin\EditController;
use App\Http\Controllers\Admin\InicioController;
use App\Http\Controllers\Admin\UsuarioController;
use App\Http\Controllers\Admin\DownloadController;
use App\Http\Controllers\admin\FormatosContraller;
use Illuminate\Support\Facades\Route;


// Route::get('/administrador', InicioController::class);
Route::get('login/', [UsuarioController::class, 'show'])->name('login.show');
Route::post('login/', [UsuarioController::class, 'validar']);
Route::get('administrador/', [InicioController::class, 'show'])->name('administrador.main');
Route::get('administrador/editar', [EditController::class, 'showtable'])->name('administrador.edit');
Route::post('administrador/editar', [EditController::class, 'convertir'])->name('administrador.editcampos');

Route::get('administrador/editar/inmueble/{codiprop}', [EditController::class, 'show'])->name('administrador.editform');
Route::post('administrador/editar/inmueble/{codiprop}', [EditController::class, 'update'])->name('administrador.editupdate');

Route::get('administrador/descargas', [DownloadController::class, 'showtable'])->name('administrador.download');
Route::post('administrador/descargas', [DownloadController::class, 'convertir'])->name('administrador.pasarformatos');

Route::get('administrador/descargas/formatos/{codineg}', [FormatosContraller::class, 'show'])->name('administrador.formatos');
Route::post('administrador/descargas/formatos/{codineg}', [FormatosController::class, 'convertir'])->name('administrador.irformatos');

Route::get('administrador/acuerdos', [AcuerdosController::class, 'showtable'])->name('administrador.acuerdos');