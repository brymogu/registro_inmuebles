<?php

use App\Http\Controllers\Admin\AcuerdosController;
use App\Http\Controllers\Admin\EditController;
use App\Http\Controllers\Admin\InicioController;
use App\Http\Controllers\Admin\UsuarioController;
use App\Http\Controllers\Admin\RegistroController;
use App\Http\Controllers\Admin\ExcelController;
use App\Http\Controllers\Admin\finco;
use App\Http\Controllers\Admin\FormatosController;
use Illuminate\Support\Facades\Route;


Route::get('login/', [UsuarioController::class, 'show'])->name('login');
Route::post('login/', [UsuarioController::class, 'validar'])->name('login.validador');
Route::get('salir', [UsuarioController::class, 'salir'])->name('salir');

Route::get('administrador/', [InicioController::class, 'show'])->name('administrador.main');
Route::get('administrador/editar', [EditController::class, 'showtable'])->name('administrador.edit');

Route::post('administrador/editar/inmueble', [RegistroController::class, 'show'])->name('administrador.editform');
Route::post('administrador/editar/inmueble/inm', [RegistroController::class, 'update'])->name('administrador.editupdate');

Route::get('administrador/descargas', [RegistroController::class, 'showtable'])->name('administrador.download');
Route::get('administrador/descargas/formatos/{codineg}', [FormatosController::class, 'cpvj'])->name('administrador.formatos');
Route::post('administrador/descargas/formatos/update', [FormatosController::class, 'update'])->name('administrador.irformatos');

Route::post('administrador/descargas/excel', [ExcelController::class, 'descargar'])->name('administrador.excel');
Route::post('administrador/descargas/finco', [finco::class, 'consulta'])->name('administrador.finco');

Route::get('administrador/usuarios', [UsuarioController::class, 'lista'])->name('administrador.usuarios');

Route::get('administrador/acuerdos', [AcuerdosController::class, 'showtable'])->name('administrador.acuerdos');
