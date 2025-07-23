<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function index()
    {
        $proveedores = Proveedor::all();
        return view('proveedores.index', compact('proveedores'));
    }

    public function create()
    {
        return view('proveedores.create');
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
        return redirect()->route('proveedores.index');
    }

    public function show(Proveedor $proveedor)
    {
        return view('proveedores.show', compact('proveedor'));
    }

    public function edit(Proveedor $proveedor)
    {
        return view('proveedores.edit', compact('proveedor'));
    }

    public function update(Request $request, Proveedor $proveedor)
    {
        $data = $request->validate([
            'nombreProv'  => 'required|string|max:20',
            'tipo'        => 'required|string|max:20',
            'nroContacto' => 'required|integer',
            'ubicacion'   => 'required|string|max:50',
        ]);

        $proveedor->update($data);
        return redirect()->route('proveedores.index');
    }

    public function destroy(Proveedor $proveedor)
    {
        $proveedor->delete();
        return redirect()->route('proveedores.index');
    }
}
