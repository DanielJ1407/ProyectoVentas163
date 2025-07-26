<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [App\Http\Controllers\ProductoController::class, 'index']) -> name('productos.index')->middleware('auth');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// ->middleware('auth')

Route::get('/admin', [App\Http\Controllers\adminController::class, 'index'])->name('admin.index')->middleware('auth');

Route::get('/admin/categorias', [App\Http\Controllers\CategoriaController::class, 'index']) -> name('categorias.index');
Route::get('/admin/categorias/create', [App\Http\Controllers\CategoriaController::class, 'create'])->name('categorias.create');
Route::post('/admin/categorias/create', [App\Http\Controllers\CategoriaController::class, 'create'])->name('categorias.create');

Route::get('/admin/Productos', [App\Http\Controllers\ProductoController::class, 'index']) -> name('productos.index');
Route::get('/admin/Productos/create', [App\Http\Controllers\ProductoController::class, 'create'])->name('productos.create');
Route::post('/admin/Productos/create', [App\Http\Controllers\ProductoController::class, 'store'])->name('productos.store');
Route::get('/admin/Productos/{idProducto}', [App\Http\Controllers\ProductoController::class, 'show'])->name('productos.show');
Route::get('/admin/Productos/{idProducto}/edit', [App\Http\Controllers\ProductoController::class, 'edit'])->name('productos.edit');
Route::put('/admin/Productos/{idProducto}', [App\Http\Controllers\ProductoController::class, 'update'])->name('productos.update');
Route::delete('/admin/Productos/{idProducto}', [App\Http\Controllers\ProductoController::class, 'destroy'])->name('productos.destroy');

Route::get('/admin/clientes', [App\Http\Controllers\ClienteController::class, 'index']) -> name('clientes.index');
Route::get('/admin/clientes/create', [App\Http\Controllers\ClienteController::class, 'create'])->name('clientes.create');
Route::post('/admin/clientes/create', [App\Http\Controllers\ClienteController::class, 'store'])->name('clientes.store');
Route::get('/admin/clientes/{ci}', [App\Http\Controllers\ClienteController::class, 'show'])->name('clientes.show');
Route::get('/admin/clientes/{ci}/edit', [App\Http\Controllers\ClienteController::class, 'edit'])->name('clientes.edit');
Route::put('/admin/clientes/{ci}', [App\Http\Controllers\ClienteController::class, 'update'])->name('clientes.update');
Route::delete('/admin/clientes/{ci}', [App\Http\Controllers\ClienteController::class, 'destroy'])->name('clientes.destroy');

Route::get('/admin/proveedores', [App\Http\Controllers\ProveedorController::class, 'index']) -> name('proveedores.index');
Route::get('/admin/proveedores/create', [App\Http\Controllers\ProveedorController::class, 'create'])->name('proveedores.create');
Route::post('/admin/proveedores/create', [App\Http\Controllers\ProveedorController::class, 'store'])->name('proveedores.store');
Route::get('/admin/proveedores/{idProveedor}', [App\Http\Controllers\ProveedorController::class, 'show'])->name('proveedores.show');
Route::get('/admin/proveedores/{idProveedor}/edit', [App\Http\Controllers\ProveedorController::class, 'edit'])->name('proveedores.edit');
Route::put('/admin/proveedores/{idProveedor}', [App\Http\Controllers\ProveedorController::class, 'update'])->name('proveedores.update');
Route::delete('/admin/proveedores/{idProveedor}', [App\Http\Controllers\ProveedorController::class, 'destroy'])->name('proveedores.destroy');

Route::get('/admin/empleados', [App\Http\Controllers\EmpleadoController::class, 'index']) -> name('empleados.index');
Route::get('/admin/empleados/create', [App\Http\Controllers\EmpleadoController::class, 'create'])->name('empleados.create');
Route::post('/admin/empleados/create', [App\Http\Controllers\EmpleadoController::class, 'store'])->name('empleados.store');
Route::get('/admin/empleados/{idEmpleado}', [App\Http\Controllers\EmpleadoController::class, 'show'])->name('empleados.show');
Route::get('/admin/empleados/{idEmpleado}/edit', [App\Http\Controllers\EmpleadoController::class, 'edit'])->name('empleados.edit');
Route::put('/admin/empleados/{idEmpleado}', [App\Http\Controllers\EmpleadoController::class, 'update'])->name('empleados.update');
Route::delete('/admin/empleados/{idEmpleado}', [App\Http\Controllers\EmpleadoController::class, 'destroy'])->name('empleados.destroy');

Route::get('/admin/ventas', [App\Http\Controllers\DetalleVentaController::class, 'index']) -> name('ventas.index');
Route::get('/admin/ventas/create', [App\Http\Controllers\DetalleVentaController::class, 'create'])->name('ventas.create');
Route::post('/admin/ventas/create', [App\Http\Controllers\DetalleVentaController::class, 'store'])->name('ventas.store');
Route::get('/admin/ventas/{idProducto}/{idDetalle_venta}', [App\Http\Controllers\DetalleVentaController::class, 'show'])->name('ventas.show');
Route::get('/admin/ventas/{idProducto}/{idDetalle_venta}/edit', [App\Http\Controllers\DetalleVentaController::class, 'edit'])->name('ventas.edit');
Route::put('/admin/ventas/{idProducto}/{idDetalle_venta}', [App\Http\Controllers\DetalleVentaController::class, 'update'])->name('ventas.update');
Route::delete('/admin/ventas/{idProducto}/{idDetalle_venta}', [App\Http\Controllers\DetalleVentaController::class, 'destroy'])->name('ventas.destroy');

Route::get('/admin/usuarios', [App\Http\Controllers\AdministradorController::class, 'index']) -> name('usuarios.index');
Route::get('/admin/usuarios/create', [App\Http\Controllers\AdministradorController::class, 'create'])->name('usuarios.create');
Route::post('/admin/usuarios/create', [App\Http\Controllers\AdministradorController::class, 'store'])->name('usuarios.store');
Route::get('/admin/usuarios/{idEmpleado}', [App\Http\Controllers\AdministradorController::class, 'show'])->name('usuarios.show');
Route::get('/admin/usuarios/{idEmpleado}/edit', [App\Http\Controllers\AdministradorController::class, 'edit'])->name('usuarios.edit');
Route::put('/admin/usuarios/{idEmpleado}', [App\Http\Controllers\AdministradorController::class, 'update'])->name('usuarios.update');
Route::delete('/admin/usuarios/{idEmpleado}', [App\Http\Controllers\AdministradorController::class, 'destroy'])->name('usuarios.destroy');