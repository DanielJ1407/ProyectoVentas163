<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use App\Models\Producto;
use App\Models\ProveeProducto;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function index()
    {
        $proveedores = Proveedor::all();
        return view('admin.Proveedor.index', compact('proveedores'));
    }

    public function create()
    {
        return view('admin.Proveedor.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'idProveedor' => 'required|integer|unique:PROVEEDOR,idProveedor',
            'nombreProv'  => 'required|string|max:20',
            'tipo'        => 'required|string|max:20',
            'nroContacto' => 'required|integer',
            'ubicacion'   => 'required|string|max:50',
        ]);

        Proveedor::create($data);
        return redirect()->route('proveedores.index')
        ->with('mensaje', 'Proveedor creado exitosamente')
        ->with('icono', 'success');
    }

    public function show($idProveedor)
    {
        $proveedor = Proveedor::with('productos')->findOrFail($idProveedor);
        return view('admin.Proveedor.show', compact('proveedor'));
    }

    public function edit($idProveedor)
    {
        $proveedor = Proveedor::findOrFail($idProveedor);
        return view('admin.Proveedor.edit', compact('proveedor'));
    }

    public function update(Request $request, $idProveedor)
    {
        $data = $request->validate([
            'nombreProv'  => 'required|string|max:20',
            'tipo'        => 'required|string|max:20',
            'nroContacto' => 'required|integer',
            'ubicacion'   => 'required|string|max:50',
        ]);

        $proveedor = Proveedor::findOrFail($idProveedor);
        $proveedor->update($data);
        return redirect()->route('proveedores.index')
        ->with('mensaje', 'Proveedor actualizado exitosamente')
        ->with('icono', 'success');
    }

    public function destroy($idProveedor)
    {
        $proveedor = Proveedor::findOrFail($idProveedor);
        $proveedor->delete();
        return redirect()->route('proveedores.index')
        ->with('mensaje', 'Proveedor eliminado exitosamente')
        ->with('icono', 'success');
    }
}
