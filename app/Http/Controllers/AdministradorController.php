<?php

namespace App\Http\Controllers;

use App\Models\Administrador;
use App\Models\Empleado;
use App\Models\User;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;

class AdministradorController extends Controller
{
    public function index()
    {   
        // obtener al administrador y sus datos como empleado
        $admins = Administrador::with('empleado')->get();
        // return response()->json($users);
        return view('admin.usuarios.index', compact('admins'));
    }

    public function create()
    {   
        $admins = Administrador::all();
        $empleados = Empleado::all();
        $users = User::all();
        return view('admin.usuarios.create', compact('admins', 'empleados', 'users'));
    }
// {
//   "_token": "iBa59gGL9ToW24gNWQ9WS8utlBODYvXvmKompjIX",
//   "idEmpleado": "123",
//   "ci": "123",
//   "nombreE": "123",
//   "apellidoE": "123",
//   "nroContacto": "123",
//   "userAdmi": "123",
//   "passwordAdmi": "12345"
// }
    public function store(Request $request)
    {
        // return response()->json($request);
        $data = $request->validate([
            'idEmpleado'   => 'required|integer|unique:empleado,idEmpleado',
            'userAdmi'     => 'required|string|max:50',
            'passwordAdmi' => 'required|string|min:8|max:250',
            'ci'           => 'required|integer',
            'nombreE'     => 'required|string|max:20',
            'apellidoE'   => 'required|string|max:20',
            'nroContacto' => 'required|integer',
            // 'email'        => 'required|string|max:20',
        ]);
        // return response()->json($data);
        $empleado = Empleado::create([
            'idEmpleado'  => $data['idEmpleado'],
            'ci'           => $data['ci'],
            'nombreE'     => $data['nombreE'],
            'apellidoE'   => $data['apellidoE'],
            'nroContacto' => $data['nroContacto'],
            'rol_empleado' => 'Administrador',
        ]);
        $empleado->administrador()->create([
            'userAdmi'     => $data['userAdmi'],
            'passwordAdmi' => $data['passwordAdmi'],
        ]);
        User::create([
            'name'     => $data['userAdmi'],      // puedes usar su nombre real si prefieres
            'email'    => $data['userAdmi'],
            'password' => $data['passwordAdmi'],  // el cast 'hashed' en el modelo hará bcrypt automáticamente
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
            'passwordAdmi' => 'required|string|min:8|max:250',
            'ci'           => 'required|integer',
            'nombreE'     => 'required|string|max:20',
            'apellidoE'   => 'required|string|max:20',
            'nroContacto' => 'required|integer',
            // 'email'        => 'required|string|max:20',
        ]);
        // return response()->json($data);

        // actulizar empleado
        $empleado = Empleado::findOrFail($idEmpleado);
        $empleado->update([
            'idEmpleado'  => $data['idEmpleado'],
            'ci'           => $data['ci'],
            'nombreE'     => $data['nombreE'],
            'apellidoE'   => $data['apellidoE'],
            'nroContacto' => $data['nroContacto'],
            'rol_empleado'          => 'Administrador',
        ]);
        // actualizar administrador
        $administrador = Administrador::where('idEmpleado', $idEmpleado)->firstOrFail();
        $user = User::where('name', $administrador->userAdmi)->firstOrFail();

        $administrador->update([
            'userAdmi'     => $data['userAdmi'],
            'passwordAdmi' => $data['passwordAdmi'],
        ]);
        $user->update([
            'name'     => $data['userAdmi'],      // puedes usar su nombre real si prefieres
            'email'    => $data['userAdmi'],
            'password' => $data['passwordAdmi'],  // el cast 'hashed' in the model hará bcrypt automáticamente
        ]);

        return redirect()->route('usuarios.index')
        ->with('mensaje', 'Administrador actualizado exitosamente')
        ->with('icono', 'success');
    }

    public function destroy($idEmpleado)
    {
        $empleado = Empleado::findOrFail($idEmpleado);
        $user = User::where('name', $empleado->administrador->userAdmi)->firstOrFail();
        $user->delete();
        // $administrador = Administrador::where('idEmpleado', $idEmpleado)->firstOrFail();
        $empleado->administrador()->delete();
        $empleado->delete();
        // $administrador->delete();
        return redirect()->route('usuarios.index')
        ->with('mensaje', 'Usuario eliminado exitosamente')
        ->with('icono', 'success');
    }
}