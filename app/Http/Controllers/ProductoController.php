<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        return view('admin.producto.index', compact('productos'));
    }

    public function create()
    {
        return view('admin.producto.create');
    }

    public function store(Request $request)
    {   
        // return response()->json($request->all());
        $data = $request->validate([
            'idProducto'      => 'required|integer|unique:PRODUCTO,idProducto',
            'nombre_producto' => 'required|string|max:20',
            'precio_unitario' => 'required|integer',
            'marca'           => 'required|string|max:20',
            'tipo'            => 'required|string|max:20',
            'color'           => 'required|string|max:20',
            'talla'           => 'required|string|max:20',
            'modelo'          => 'required|string|max:20',
            'stock'           => 'required|integer',
        ]);

        Producto::create($data);
        return redirect()->route('productos.index')
        ->with('mensaje', 'Producto creado exitosamente')
        ->with('icono', 'success');
    }

    public function show($idProducto)
    {
        $producto = Producto::findOrFail($idProducto);
        return view('admin.producto.show', compact('producto'));
    }

    public function edit($idProducto)
    {          
        $producto = Producto::findOrFail($idProducto);
        return view('admin.producto.edit', compact('producto'));
    }

    public function update(Request $request, $idProducto)
    {
        $data = $request->validate([
            'nombre_producto' => 'required|string|max:20',
            'precio_unitario' => 'required|integer',
            'marca'           => 'required|string|max:20',
            'tipo'            => 'required|string|max:20',
            'color'           => 'required|string|max:20',
            'talla'           => 'required|string|max:20',
            'modelo'          => 'required|string|max:20',
            'stock'           => 'required|integer',
        ]);

        $producto = Producto::findOrFail($idProducto);
        $producto->update($data);
        return redirect()->route('productos.index')
        ->with('mensaje', 'Producto actualizado exitosamente')
        ->with('icono', 'success');
    }

    public function destroy($idProducto)
    {
        $producto = Producto::findOrFail($idProducto);
        $producto->delete();
        return redirect()->route('productos.index')
        ->with('mensaje', 'Producto eliminado exitosamente')
        ->with('icono', 'success');
    }
}