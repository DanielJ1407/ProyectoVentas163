<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// ->middleware('auth')

Route::get('/admin', [App\Http\Controllers\adminController::class, 'index'])->name('admin.index');

Route::get('/admin/categorias', [App\Http\Controllers\CategoriaController::class, 'index']) -> name('categorias.index');
Route::get('/admin/categorias/create', [App\Http\Controllers\CategoriaController::class, 'create'])->name('categorias.create');
Route::post('/admin/categorias/create', [App\Http\Controllers\CategoriaController::class, 'create'])->name('categorias.create');

Route::get('/admin/Productos', [App\Http\Controllers\ProductoController::class, 'index']) -> name('productos.index');
Route::get('/admin/Productos/create', [App\Http\Controllers\ProductoController::class, 'create'])->name('productos.create');
Route::post('/admin/Productos/create', [App\Http\Controllers\ProductoController::class, 'store'])->name('productos.create');

Route::get('/admin/clientes', [App\Http\Controllers\ClienteController::class, 'index']) -> name('clientes.index');
Route::get('/admin/clientes/create', [App\Http\Controllers\ClienteController::class, 'create'])->name('clientes.create');

Route::get('/admin/ventas', [App\Http\Controllers\DetalleVentaController::class, 'index']) -> name('ventas.index');
Route::get('/admin/ventas/create', [App\Http\Controllers\DetalleVentaController::class, 'create'])->name('ventas.create');

Route::get('/admin/vendedores', [App\Http\Controllers\ClienteController::class, 'index']) -> name('vendedores.index');
Route::get('/admin/vendedores/create', [App\Http\Controllers\ClienteController::class, 'create'])->name('vendedores.create');