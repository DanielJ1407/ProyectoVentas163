<?php

namespace App\Http\Controllers;

use App\Models\Administrador;
use App\Models\Empleado;
use Illuminate\Http\Request;

class AdministradorController extends Controller
{
    public function index()
    {   
        // obtener al administrador y sus datos como empleado
        $admins = Administrador::with('empleado')->get();
        // return response()->json($admins);
        return view('admin.usuarios.index', compact('admins'));
    }

    public function create()
    {   
        $admins = Administrador::all();
        $empleados = Empleado::all();
        return view('admin.usuarios.create', compact('admins', 'empleados'));
    }
// {
//   "_token": "S3rhfx2Eask4wrCRqMMlb00CnoYJXFhW9BpsR2IA",
//   "ci": "123",
//   "nombre": "123",
//   "apellido": "12",
//   "nroContacto": "123",
//   "userAdmi": "123",
//   "passwordAdmi": "12543"
// }
    public function store(Request $request)
    {
        // return response()->json($request);
        $data = $request->validate([
            'idEmpleado'   => 'required|integer|unique:empleado,idEmpleado',
            'userAdmi'     => 'required|string|max:50',
            'passwordAdmi' => 'required|string|max:100',
            'ci'           => 'required|integer',
            'nombreE'     => 'required|string|max:20',
            'apellidoE'   => 'required|string|max:20',
            'nroContacto' => 'required|integer',
        ]);
        // return response()->json($data);
        $empleado = Empleado::create([
            'idEmpleado'  => $data['idEmpleado'],
            'ci'           => $data['ci'],
            'nombreE'     => $data['nombreE'],
            'apellidoE'   => $data['apellidoE'],
            'nroContacto' => $data['nroContacto'],
            'rol_empleado'          => 'Administrador',
        ]);
        $empleado->administrador()->create([
            'userAdmi'     => $data['userAdmi'],
            'passwordAdmi' => $data['passwordAdmi'],
        ]);
        return redirect()->route('usuarios.index')
        ->with('mensaje', 'Administrador creado exitosamente')
        ->with('icono', 'success');
    }

    public function show($idEmpleado)
    {
        $empleado = Empleado::findOrFail($idEmpleado);
        $administrador = Administrador::where('idEmpleado', $idEmpleado)->firstOrFail();
        return view('admin.usuarios.show', compact('administrador', 'empleado')); 
    }

    public function edit($idEmpleado)
    {
        $empleado = Empleado::findOrFail($idEmpleado);
        $administrador = Administrador::where('idEmpleado', $idEmpleado)->firstOrFail();
        return view('admin.usuarios.edit', compact('administrador'));
    }
// {
//   "_token": "S3rhfx2Eask4wrCRqMMlb00CnoYJXFhW9BpsR2IA",
//   "_method": "PUT",
//   "idEmpleado": "500",
//   "ci": "92240",
//   "nombreE": "Daniel",
//   "apellidoE": "Valencia",
//   "nroContacto": "76508001",
//   "userAdmi": "daniel@gmail.com",
//   "passwordAdmi": "12345"
// }
    public function update(Request $request, $idEmpleado)
    {
        // return response()->json($request->all());
        $data = $request->validate([
            'idEmpleado'   => 'required|integer|exists:empleado,idEmpleado',
            'userAdmi'     => 'required|string|max:50',
            'passwordAdmi' => 'required|string|max:100',
            'ci'           => 'required|integer',
            'nombreE'     => 'required|string|max:20',
            'apellidoE'   => 'required|string|max:20',
            'nroContacto' => 'required|integer',
        ]);
        // return response()->json($data);

        // actulizar empleado
        $empleado = Empleado::findOrFail($administrador->idEmpleado);
        $empleado->update([
            'idEmpleado'  => $data['idEmpleado'],
            'ci'           => $data['ci'],
            'nombreE'     => $data['nombreE'],
            'apellidoE'   => $data['apellidoE'],
            'nroContacto' => $data['nroContacto'],
            'rol_empleado'          => 'Administrador',
        ]);
        // actualizar administrador
        $administrador->update([
            'userAdmi'     => $data['userAdmi'],
            'passwordAdmi' => $data['passwordAdmi'],
        ]);
        return response()->json($data);
        return redirect()->route('usuarios.index')
        ->with('mensaje', 'Administrador actualizado exitosamente')
        ->with('icono', 'success');
    }

    public function destroy(Administrador $administrador)
    {
        $administrador->delete();
        return redirect()->route('usuarios.index');
    }
}