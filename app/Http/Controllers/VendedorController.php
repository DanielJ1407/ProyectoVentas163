<?php

namespace App\Http\Controllers;

use App\Models\Vendedor;
use Illuminate\Http\Request;

class VendedorController extends Controller
{
    public function index()
    {
        $vendedores = Vendedor::with('empleado')->get();
        return view('vendedores.index', compact('vendedores'));
    }

    public function create()
    {
        return view('vendedores.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'idEmpleado' => 'required|integer|unique:VENDEDOR,idEmpleado|exists:EMPLEADO,idEmpleado',
            'userV'      => 'required|string|max:20',
            'passwordV'  => 'required|string|max:20',
        ]);

        Vendedor::create($data);
        return redirect()->route('vendedores.index');
    }

    public function show(Vendedor $vendedor)
    {
        return view('vendedores.show', compact('vendedor'));
    }

    public function edit(Vendedor $vendedor)
    {
        return view('vendedores.edit', compact('vendedor'));
    }

    public function update(Request $request, Vendedor $vendedor)
    {
        $data = $request->validate([
            'userV'     => 'required|string|max:20',
            'passwordV' => 'required|string|max:20',
        ]);

        $vendedor->update($data);
        return redirect()->route('vendedores.index');
    }

    public function destroy(Vendedor $vendedor)
    {
        $vendedor->delete();
        return redirect()->route('vendedores.index');
    }
}
