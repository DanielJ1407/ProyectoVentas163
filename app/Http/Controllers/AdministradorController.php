<?php

namespace App\Http\Controllers;

use App\Models\Administrador;
use Illuminate\Http\Request;

class AdministradorController extends Controller
{
    public function index()
    {
        $admins = Administrador::with('empleado')->get();
        return view('administradores.index', compact('admins'));
    }

    public function create()
    {
        return view('administradores.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'idEmpleado'   => 'required|integer|unique:ADMINISTRADOR,idEmpleado|exists:EMPLEADO,idEmpleado',
            'userAdmi'     => 'required|string|max:20',
            'passwordAdmi' => 'required|string|max:18',
        ]);

        Administrador::create($data);
        return redirect()->route('administradores.index');
    }

    public function show(Administrador $administrador)
    {
        return view('administradores.show', compact('administrador')); 
    }

    public function edit(Administrador $administrador)
    {
        return view('administradores.edit', compact('administrador'));
    }

    public function update(Request $request, Administrador $administrador)
    {
        $data = $request->validate([
            'userAdmi'     => 'required|string|max:20',
            'passwordAdmi' => 'required|string|max:18',
        ]);

        $administrador->update($data);
        return redirect()->route('administradores.index');
    }

    public function destroy(Administrador $administrador)
    {
        $administrador->delete();
        return redirect()->route('administradores.index');
    }
}