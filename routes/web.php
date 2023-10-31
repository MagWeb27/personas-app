<?php

use App\Models\Municipio;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaisController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ComunaController;
use App\Http\Controllers\LogOutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\MunicipioController;
use App\Http\Controllers\DepartamentoController;

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

//RUTAS DE AUTENTICACION
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::post('/logout', [LogOutController::class, 'store'])->name('logout');

//RUTAS DE COMUNAS
Route::middleware('auth')->group(function () {
Route::get('/comunas', [ComunaController::class, 'index'])->name('comunascrud');
Route::get('/comunas/create', [ComunaController::class, 'create'])->name('crearComuna');

Route::post('/comunas/create.store', [ComunaController::class, 'store'])->name('guardarComuna');
Route::delete('/comunas/{comuna}', [ComunaController::class, 'destroy'])->name('comunas.destroy');

Route::put('/comunas/{comuna}', [ComunaController::class, 'update'])->name('comunas.update');
Route::get('/comunas/{comuna}/edit', [ComunaController::class, 'edit'])->name('comunas.edit');

//RUTAS DE DEPARTAMENTOS
Route::get('/departamentos', [DepartamentoController::class, 'index'])->name('departamentos.index');
Route::get('/departamentos/create', [DepartamentoController::class, 'create'])->name('departamentos.create');

Route::post('/departamentos/create.store', [DepartamentoController::class, 'store'])->name('departamentos.store');
Route::delete('/departamentos/{departamento}', [DepartamentoController::class, 'destroy'])->name('departamentos.destroy');

Route::put('/departamentos/{departamento}', [DepartamentoController::class, 'update'])->name('departamentos.update');
Route::get('/departamentos/{departamento}/edit', [DepartamentoController::class, 'edit'])->name('departamentos.edit');

//RUTAS DE MUNICIPIOS
Route::get('/municipios', [MunicipioController::class, 'index'])->name('municipios.index');
Route::get('/municipios/create', [MunicipioController::class, 'create'])->name('municipios.create');

Route::post('/municipios/create.store', [MunicipioController::class, 'store'])->name('municipios.store');
Route::delete('/municipios/{municipio}', [MunicipioController::class, 'destroy'])->name('municipios.destroy');

Route::put('/municipios/{municipio}', [MunicipioController::class, 'update'])->name('municipios.update');
Route::get('/municipios/{municipio}/edit', [MunicipioController::class, 'edit'])->name('municipios.edit');

//RUTAS DE PAIS
Route::get('/paises', [PaisController::class, 'index'])->name('paises.index');
Route::get('/paises/create', [PaisController::class, 'create'])->name('paises.create');

Route::post('/paises/create.store', [PaisController::class, 'store'])->name('paises.store');

Route::put('/paises/{pais}', [PaisController::class, 'update'])->name('paises.update');
Route::get('/paises/{pais}/edit', [PaisController::class, 'edit'])->name('paises.edit');
});