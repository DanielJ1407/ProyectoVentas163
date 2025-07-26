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
            'correo'   => 'required|max:50',
            'nit'      => 'required|integer',
        ]);

        Cliente::create($data);
        return redirect()->route('clientes.index')
        ->with('mensaje', 'Cliente creado exitosamente')
        ->with('icono', 'success');
    }

    public function show($ci)
    {          
        $cliente = Cliente::findOrFail($ci);
        return view('admin.cliente.show', compact('cliente'));
    }

    public function edit($ci)
    {          
        $cliente = Cliente::findOrFail($ci);
        return view('admin.cliente.edit', compact('cliente'));
    }

    public function update(Request $request, $ci)
    {
        $data = $request->validate([
            'nombre'   => 'required|string|max:20',
            'apellido' => 'required|string|max:20',
            'correo'   => 'required|max:50',
            'nit'      => 'required|integer',
        ]);

        $cliente = Cliente::findOrFail($ci);
        $cliente->update($data);
        return redirect()->route('clientes.index')
        ->with('mensaje', 'Cliente actualizado exitosamente')
        ->with('icono', 'success');
    }

    public function destroy($ci)
    {
        $cliente = Cliente::findOrFail($ci);
        $cliente->delete();
        return redirect()->route('clientes.index')
        ->with('mensaje', 'Cliente eliminado exitosamente')
        ->with('icono', 'success');
    }
}
