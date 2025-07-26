<?php

namespace App\Http\Controllers;

use App\Models\DetalleVenta;
use App\Models\CompraProducto;
use App\Models\Cliente;
use App\Models\Empleado;
use App\Models\Producto;
use Illuminate\Http\Request;

class DetalleVentaController extends Controller
{
    public function index()
    {   
        $ventas = CompraProducto::with(['productos', 'detalleVenta.cliente', 'detalleVenta.empleado'])->get();
        return view('admin.ventas.index', compact('ventas'));
    }

    public function create()
    {
        $productos = Producto::all();
        $empleados = Empleado::all();
        $detalleVenta = new DetalleVenta();
        return view('admin.ventas.create', compact('productos','empleados', 'detalleVenta'));
    }


//     {
//   "_token": "S3rhfx2Eask4wrCRqMMlb00CnoYJXFhW9BpsR2IA",
//   "ci": "1",
//   "nombre": "2",
//   "apellido": "3",
//   "correo": "4",
//   "nit": "5",
//   "nroVenta": "6",
//   "metodo_pago": "Efectivo",
//   "fecha_venta": "2025-07-23",
//   "hora_venta": "13:35",
//   "idEmpleado": "702",
//   "idProducto": "107",
//   "cantidad": "1"
// }
    public function store(Request $request)
    {
        $data = $request->validate([
            'ci'               => 'required|integer|exists:CLIENTE,ci',
            'nombre'           => 'required|string|max:20',
            'apellido'         => 'required|string|max:20',
            'correo'           => 'nullable|string',
            'nit'              => 'nullable|integer',
            'idDetalle_venta'  => 'required|integer',
            'nroVenta'         => 'required|integer',
            'metodo_pago'      => 'required|string',
            'fecha_venta'      => 'required|string',
            'hora_venta'       => 'required|string',
            'idEmpleado'       => 'required|integer|exists:EMPLEADO,idEmpleado',
            'idProducto'       => 'required|integer|exists:PRODUCTO,idProducto',
            'cantidad'         => 'required|integer|min:1',
        ]);
    
        
        // return response()->json($request->all());
        // 1) crear o actualizar cliente
        Cliente::updateOrCreate(['ci'=>$data['ci']], [
            'nombre'=>$data['nombre'],
            'apellido'=>$data['apellido'],
            'correo'=>$data['correo']??null,
            'nit'=>$data['nit']??null,
        ]);

        // 2) crear DetalleVenta
        DetalleVenta::create([
            'idDetalle_venta'=>$data['idDetalle_venta'],
            'nroVenta'=>$data['nroVenta'],
            'metodo_pago'=>$data['metodo_pago'],
            'fecha_venta'=>$data['fecha_venta'],
            'hora_venta'=>$data['hora_venta'],
            'ci'=>$data['ci'],
            'idEmpleado'=>$data['idEmpleado'],
        ]);

        // 3) registrar pivot COMPRA_PRODUCTO
        CompraProducto::create([
            'idProducto'=>$data['idProducto'],
            'idDetalle_venta'=>$data['idDetalle_venta'],
            'cantidad'=>$data['cantidad'],
        ]);

        return redirect()->route('ventas.index')
        ->with('mensaje', 'Venta creada exitosamente')
        ->with('icono', 'success');
    }
// Necesito acceder y mandar los datos solo en la funcion 'show':
    public function show($idProducto, $idDetalle_venta)
    {   
        $compraProducto = CompraProducto::where('idProducto', $idProducto)
            ->where('idDetalle_venta', $idDetalle_venta)
            ->firstOrFail();
        $detalleVenta = DetalleVenta::findOrFail($idDetalle_venta);
        $productos = Producto::where('idProducto', $idProducto)->get();
        $cliente = Cliente::where('ci', $detalleVenta->ci)->first();
        $empleado = Empleado::where('idEmpleado', $detalleVenta->idEmpleado)->first();
        return view('admin.ventas.show', compact('detalleVenta', 'productos', 'cliente', 'empleado'));
    }

    public function edit($idProducto, $idDetalle_venta)
    {
        $compraProducto = CompraProducto::where('idProducto', $idProducto)
            ->where('idDetalle_venta', $idDetalle_venta)
            ->firstOrFail();
        $detalleVenta = DetalleVenta::findOrFail($idDetalle_venta);
        $producto = Producto::where('idProducto', $idProducto)->get()->first();
        $cliente = Cliente::where('ci', $detalleVenta->ci)->first();
        $empleados = Empleado::where('idEmpleado', $detalleVenta->idEmpleado)->get();
        $productos = Producto::all();
        // return response()->json($empleado);
        return view('admin.ventas.edit', compact('detalleVenta', 'producto', 'cliente', 'empleados', 'productos'));
    }

// {
//   "ci": "1",
//   "nombre": "2",
//   "apellido": "3",
//   "correo": "4",
//   "nit": "5",
//   "idDetalle_venta": "2",
//   "nroVenta": "2",
//   "metodo_pago": "Efectivo",
//   "fecha_venta": "2025-07-10",
//   "hora_venta": "12:01",
//   "idEmpleado": "703",
//   "idProducto": "1"
// }

    public function update(Request $request, $idProducto, $idDetalle_venta)
    {
        $data = $request->validate([
            'ci'               => 'required|integer|exists:CLIENTE,ci',
            'nombre'           => 'required|string|max:20',
            'apellido'         => 'required|string|max:20',
            'correo'           => 'nullable|string',
            'nit'              => 'nullable|integer',
            'idDetalle_venta'  => 'required|integer',
            'nroVenta'         => 'required|integer',
            'metodo_pago'      => 'required|string',
            'fecha_venta'      => 'required|string',
            'hora_venta'       => 'required|string',
            'idEmpleado'       => 'required|integer|exists:EMPLEADO,idEmpleado',
            'idProducto'       => 'required|integer|exists:PRODUCTO,idProducto',
        ]);
        // return response()->json($data);
        // 2) actualizar Cliente
       Cliente::where('ci', $data['ci'])->update([
            'nombre'=>$data['nombre'],
            'apellido'=>$data['apellido'],
            'correo'=>$data['correo']??null,
            'nit'=>$data['nit']??null,
        ]);

        // 2) actualizar DetalleVenta
        DetalleVenta::where('idDetalle_venta', $data['idDetalle_venta'])->update([
            'nroVenta'=>$data['nroVenta'],
            'metodo_pago'=>$data['metodo_pago'],
            'fecha_venta'=>$data['fecha_venta'],
            'hora_venta'=>$data['hora_venta'],
            'ci'=>$data['ci'],
            'idEmpleado'=>$data['idEmpleado'],
        ]);

        // 3) actualizar COMPRA_PRODUCTO
        CompraProducto::where('idDetalle_venta', $data['idDetalle_venta'])->update([
            'idProducto'=>$data['idProducto']
        ]);

        return redirect()->route('ventas.index')
        ->with('mensaje', 'Venta actualizada exitosamente')
        ->with('icono', 'success');
    }

    public function destroy($idProducto, $idDetalle_venta)
    {
        $detalleVenta = DetalleVenta::findOrFail($idDetalle_venta);
        $compraProducto = CompraProducto::where('idProducto', $idProducto)
            ->where('idDetalle_venta', $idDetalle_venta)
            ->firstOrFail();
        
        return redirect()->route('ventas.index');
    }
}