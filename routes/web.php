<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConjuntoController;
use App\Http\Controllers\DetallesController;
use App\Http\Controllers\FotosController;
use App\Http\Controllers\GraciasController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NegocioController;
use App\Http\Controllers\PlanesController;


Route::get('/', HomeController::class);
Route::post('/', [HomeController::class, 'store'])->name('propietario.store');

Route::get('propietario/{negocio}', [HomeController::class, 'edit'])->name('propietario.edit');
Route::post('propietario/{negocio}', [HomeController::class, 'update'])->name('propietario.update');

Route::get('negocio/{negocio}', [NegocioController::class, 'show'])->name('negocio.show');
Route::post('negocio/{negocio}', [NegocioController::class, 'store'])->name('negocio.store');
Route::get('negocio/editar/{negocio}', [NegocioController::class, 'edit'])->name('negocio.edit');
Route::post('negocio/editar/{negocio}', [NegocioController::class, 'update'])->name('negocio.update');

Route::get('detalles/{id}', [DetallesController::class, 'show'])->name('detalles.show');
Route::post('detalles/{id}', [DetallesController::class, 'store'])->name('detalles.store');
Route::get('detalles/editar/{propiedad}', [DetallesController::class, 'edit'])->name('detalles.edit');
Route::post('detalles/editar/{propiedad}', [DetallesController::class, 'update'])->name('detalles.update');

Route::get('conjunto/{id}', [ConjuntoController::class, 'show'])->name('conjunto.show');
Route::post('conjunto/{id}', [ConjuntoController::class, 'store'])->name('conjunto.store');
Route::get('conjunto/editar/{propiedad}', [ConjuntoController::class, 'edit'])->name('conjunto.edit');
Route::post('conjunto/editar/{propiedad}', [ConjuntoController::class, 'update'])->name('conjunto.update');

Route::get('fotos/{id}', [FotosController::class, 'show'])->name('fotos.show');
Route::post('fotos/{id}', [FotosController::class, 'store'])->name('fotos.store');

Route::get('planes/{id}', [PlanesController::class, 'show'])->name('planes.show');
Route::post('planes/{id}', [PlanesController::class, 'store'])->name('planes.store');
Route::get('gracias/{id}', [GraciasController::class, 'show'])->name('gracias.show');