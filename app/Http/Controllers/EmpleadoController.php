<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    public function index()
    {
        $empleados = Empleado::all();
        return view('empleados.index', compact('empleados'));
    }

    public function create()
    {
        return view('empleados.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'ci'           => 'required|integer|unique:EMPLEADO,ci',
            'rol_empleado' => 'required|string|max:20',
            'nombreE'      => 'required|string|max:20',
            'apellidoE'    => 'required|string|max:20',
            'nroContacto'  => 'required|integer',
        ]);

        Empleado::create($data);
        return redirect()->route('empleados.index');
    }

    public function show(Empleado $empleado)
    {
        return view('empleados.show', compact('empleado'));
    }

    public function edit(Empleado $empleado)
    {
        return view('empleados.edit', compact('empleado'));
    }

    public function update(Request $request, Empleado $empleado)
    {
        $data = $request->validate([
            'rol_empleado' => 'required|string|max:20',
            'nombreE'      => 'required|string|max:20',
            'apellidoE'    => 'required|string|max:20',
            'nroContacto'  => 'required|integer',
        ]);

        $empleado->update($data);
        return redirect()->route('empleados.index');
    }

    public function destroy(Empleado $empleado)
    {
        $empleado->delete();
        return redirect()->route('empleados.index');
    }
}