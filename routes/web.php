<?php

use App\Http\Controllers\ComunaController;
use App\Http\Controllers\MunicipioController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

//RUTAS DE COMUNAS

Route::get('/comunas', [ComunaController::class, 'index'])->name('comunascrud');
Route::get('/comunas/create', [ComunaController::class, 'create'])->name('crearComuna');

Route::post('/comunas/create.store', [ComunaController::class, 'store'])->name('guardarComuna');
Route::delete('/comunas/{comuna}', [ComunaController::class, 'destroy'])->name('comunas.destroy');
Route::put('/comunas/{comuna}', [ComunaController::class, 'update'])->name('comunas.update');

Route::get('/comunas/{comuna}/edit', [ComunaController::class, 'edit'])->name('comunas.edit');

//RUTAS DE MUNICIPIOS

Route::get('/municipios', [MunicipioController::class, 'index'])->name('municipios.index');