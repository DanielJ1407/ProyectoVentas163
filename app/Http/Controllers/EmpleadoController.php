<?php
namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    public function index()
    {
        $empleados = Empleado::all();
        return view('admin.Empleado.index', compact('empleados'));
    }

    public function create()
    {

        return view('admin.Empleado.create');
    }

    public function store(Request $request)
    {
        // return response()->json($request);
        $data = $request->validate([
            // 'idEmpleado'   => 'required|integer|unique:EMPLEADO,idEmpleado',
            'ci'           => 'required|integer',
            'rol_empleado' => 'required|string|max:20',
            'nombreE'      => 'required|string|max:20',
            'apellidoE'    => 'required|string|max:20',
            'nroContacto'  => 'required|integer',
        ]);
        // return response()->json($data);
        Empleado::create($data);
        return redirect()->route('empleados.index')
        ->with('mensaje', 'Empleado creado exitosamente')
        ->with('icono', 'success');
    }

    public function show($idEmpleado)
    {
        $empleado = Empleado::findOrFail($idEmpleado);
        return view('admin.Empleado.show', compact('empleado'));
    }

    public function edit($idEmpleado)
    {
        $empleado = Empleado::findOrFail($idEmpleado);
        return view('admin.Empleado.edit', compact('empleado'));
    }

    public function update(Request $request, $idEmpleado)
    {
        $data = $request->validate([
            'rol_empleado' => 'required|string|max:20',
            'nombreE'      => 'required|string|max:20',
            'apellidoE'    => 'required|string|max:20',
            'nroContacto'  => 'required|integer',
        ]);

        $empleado = Empleado::findOrFail($idEmpleado);
        $empleado->update($data);
        return redirect()->route('empleados.index')
        ->with('mensaje', 'Empleado actualizado exitosamente')
        ->with('icono', 'success');
    }

    public function destroy($idEmpleado)
    {
        $empleado = Empleado::findOrFail($idEmpleado);
        $empleado->delete();
        return redirect()->route('empleados.index')
        ->with('mensaje', 'Empleado eliminado exitosamente')
        ->with('icono', 'success');
    }
}