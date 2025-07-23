<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::all();
        return view('admin.cliente.index', compact('clientes'));
    }

        public function create()
    {
        return view('admin.cliente.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'ci'       => 'required|integer|unique:CLIENTE,ci',
            'nombre'   => 'required|string|max:20',
            'apellido' => 'required|string|max:20',
            'correo'   => 'required|email|max:50',
            'nit'      => 'required|integer',
        ]);

        Cliente::create($data);
        return redirect()->route('clientes.index');
    }

    public function show(Cliente $cliente)
    {
        return view('clientes.show', compact('cliente'));
    }

    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, Cliente $cliente)
    {
        $data = $request->validate([
            'nombre'   => 'required|string|max:20',
            'apellido' => 'required|string|max:20',
            'correo'   => 'required|email|max:50',
            'nit'      => 'required|integer',
        ]);

        $cliente->update($data);
        return redirect()->route('clientes.index');
    }

    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return redirect()->route('clientes.index');
    }
}
