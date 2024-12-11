<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\RoleController;

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


Route::get('/productos/create', [ProductosController::class, 'create'])->middleware('auth')->name('productos.create');

Route::get('/', [ProductosController::class, 'index'])->name('productos.index');
Route::post('/productos/filter', [ProductosController::class, 'filter'])->name('productos.filter');
Route::post('/productos', [ProductosController::class, 'store'])->middleware('auth')->name('productos.store');
Route::get('/productos/{id}/editar', [ProductosController::class, 'edit'])->name('productos.edit');
Route::get('/productos/{id}', [ProductosController::class, 'show'])->name('productos.show');
Route::put('/productos/{id}', [ProductosController::class, 'update'])->middleware('auth')->name('productos.update');
Route::delete('/productos/{id}', [ProductosController::class, 'destroy'])->middleware('auth')->name('productos.destroy');




//Rutas categoris

 // Ruta para ver todas las categorías
Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias.index');
Route::get('/categorias/create', [CategoriaController::class, 'create'])->name('categorias.create');
Route::post('/categorias', [CategoriaController::class, 'store'])->name('categorias.store');
Route::get('/categorias/{id}/edit', [CategoriaController::class, 'edit'])->name('categorias.edit');
Route::put('/categorias/{id}', [CategoriaController::class, 'update'])->name('categorias.update');
Route::delete('/categorias/{id}', [CategoriaController::class, 'destroy'])->name('categorias.destroy');




 // Rutas para la gestión de roles
Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
Route::post('/roles/assign/{user}', [RoleController::class, 'assignRole'])->name('roles.assign');
Route::delete('/roles/remove/{user}', [RoleController::class, 'removeRole'])->name('roles.remove');



Route::get('/welcome', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
