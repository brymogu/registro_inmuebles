<?php

use App\Http\Controllers\Admin\AcuerdosController;
use App\Http\Controllers\Admin\EditController;
use App\Http\Controllers\Admin\InicioController;
use App\Http\Controllers\Admin\UsuarioController;
use App\Http\Controllers\Admin\DownloadController;
use App\Http\Controllers\Admin\ExcelController;
use App\Http\Controllers\Admin\finco;
use App\Http\Controllers\Admin\FormatosController;
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

Route::post('administrador/descargas/formatos', [FormatosController::class, 'cpvj'])->name('administrador.formatos');
Route::post('administrador/descargas/formatos/{codineg}', [FormatosController::class, 'update'])->name('administrador.irformatos');

Route::post('administrador/descargas/excel', [ExcelController::class, 'descargar'])->name('administrador.excel');
Route::post('administrador/descargas/finco', [finco::class, 'consulta'])->name('administrador.finco');

Route::get('administrador/acuerdos', [AcuerdosController::class, 'showtable'])->name('administrador.acuerdos');
