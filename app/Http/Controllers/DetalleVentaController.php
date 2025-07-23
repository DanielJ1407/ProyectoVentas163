<?php

namespace App\Http\Controllers;

use App\Models\DetalleVenta;
use Illuminate\Http\Request;

class DetalleVentaController extends Controller
{
    public function index()
    {
        $ventas = DetalleVenta::with(['cliente', 'empleado', 'productos'])->get();
        return view('detalle_ventas.index', compact('ventas'));
    }

    public function create()
    {
        return view('detalle_ventas.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'idDetalle_venta' => 'required|integer|unique:DETALLE_VENTA,idDetalle_venta',
            'metodo_pago'     => 'required|string|max:20',
            'fecha_venta'     => 'required|date',
            'hora_venta'      => 'required|date_format:H:i:s',
            'nroVenta'        => 'required|integer',
            'ci'              => 'required|integer|exists:CLIENTE,ci',
            'idEmpleado'      => 'required|integer|exists:EMPLEADO,idEmpleado',
        ]);

        $venta = DetalleVenta::create($data);
        return redirect()->route('detalle_ventas.index');
    }

    public function show(DetalleVenta $detalleVenta)
    {
        return view('detalle_ventas.show', compact('detalleVenta'));
    }

    public function edit(DetalleVenta $detalleVenta)
    {
        return view('detalle_ventas.edit', compact('detalleVenta'));
    }

    public function update(Request $request, DetalleVenta $detalleVenta)
    {
        $data = $request->validate([
            'metodo_pago' => 'required|string|max:20',
            'fecha_venta' => 'required|date',
            'hora_venta'  => 'required|date_format:H:i:s',
            'nroVenta'    => 'required|integer',
            'ci'          => 'required|integer|exists:CLIENTE,ci',
            'idEmpleado'  => 'required|integer|exists:EMPLEADO,idEmpleado',
        ]);

        $detalleVenta->update($data);
        return redirect()->route('detalle_ventas.index');
    }

    public function destroy(DetalleVenta $detalleVenta)
    {
        $detalleVenta->delete();
        return redirect()->route('detalle_ventas.index');
    }
}