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
        return redirect()->route('productos.index');
    }

    public function show(Producto $producto)
    {
        return view('productos.show', compact('producto'));
    }

    public function edit(Producto $producto)
    {
        return view('productos.edit', compact('producto'));
    }

    public function update(Request $request, Producto $producto)
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

        $producto->update($data);
        return redirect()->route('productos.index');
    }

    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('productos.index');
    }
}