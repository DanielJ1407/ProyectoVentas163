@extends('adminlte::page')

@section('content_header')
    <nav aria-label="breadcrumb" style = "font-size: 18pt">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/admin')}}">INICIO</a></li>
        <!-- <li class="breadcrumb-item"><a href="{{url('/admin/productos')}}">Productos</a></li>
        <li class="breadcrumb-item active" aria-current="page">Listado</li> -->
    </ol>
    </nav>
    <div class="hr"></div>
@stop

@section('content')
<div class="container">
    <form action="{{ url('/admin/ventas/create') }}" method="POST">
        @csrf

        {{-- Sección Cliente --}}
        <div class="card mb-8">
            <div class="card-header bg-white">
                <h4 class="card-title"><i class="bi bi-person"></i> Datos del Cliente</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    {{-- CI --}}
                    <div class="col-md-3 mb-3">
                        <label for="ci" class="form-label">CI</label>
                        <input type="number" class="form-control" id="ci" name="ci">
                    </div>
                    {{-- Nombre --}}
                    <div class="col-md-4 mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre">
                    </div>
                    {{-- Apellido --}}
                    <div class="col-md-5 mb-3">
                        <label for="apellido" class="form-label">Apellido</label>
                        <input type="text" class="form-control" id="apellido" name="apellido">
                    </div>
                    {{-- Correo --}}
                    <div class="col-md-6 mb-3">
                        <label for="correo" class="form-label">Correo</label>
                        <input type="text" class="form-control" id="correo" name="correo">
                    </div>
                    {{-- NIT --}}
                    <div class="col-md-6 mb-3">
                        <label for="nit" class="form-label">NIT</label>
                        <input type="number" class="form-control" id="nit" name="nit">
                    </div>
                </div>
            </div>
        </div>

        {{-- Sección Detalle de Venta --}}
        <div class="card mb-4">
            <div class="card-header bg-white">
                <h4 class="card-title"><i class="bi bi-clipboard-data"></i> Detalle de Venta</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    {{-- ID Detalle Venta --}}
                    <div class="col-md-3 mb-3">
                        <label for="idDetalle_venta" class="form-label">ID Venta</label>
                        <input type="number" class="form-control" id="idDetalle_venta" name="idDetalle_venta" }}">
                    </div>
                    {{-- Nro Venta --}}
                    <div class="col-md-3 mb-3">
                        <label for="nroVenta" class="form-label">Nro Venta</label>
                        <input type="number" class="form-control" id="nroVenta" name="nroVenta">
                    </div>
                    {{-- Método Pago --}}
                    <div class="col-md-3 mb-3">
                        <label for="metodo_pago" class="form-label">Método de Pago</label>
                        <select class="form-select" id="metodo_pago" name="metodo_pago">
                            <option value="" disabled selected>Selecciona...</option>
                            <option value="Efectivo">Efectivo</option>
                            <option value="Tarjeta">Tarjeta</option>
                            <option value="Transferencia">Transferencia</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    {{-- Fecha Venta --}}
                    <div class="col-md-3 mb-3">
                        <label for="fecha_venta" class="form-label">Fecha</label>
                        <input type="date" class="form-control" id="fecha_venta" name="fecha_venta">
                    </div>
                    {{-- Hora Venta --}}
                    <div class="col-md-3 mb-3">
                        <label for="hora_venta" class="form-label">Hora</label>
                        <input type="time" class="form-control" id="hora_venta" name="hora_venta">
                    </div>
                    {{-- Empleado --}}
                    <div class="col-md-3 mb-3">
                        <label for="idEmpleado" class="form-label">Vendedor</label>
                        <select class="form-select" id="idEmpleado" name="idEmpleado">
                            <option value="" disabled selected>Selecciona...</option>
                            @foreach($empleados as $e)
                                <option value="{{ $e->idEmpleado }}">
                                    {{ $e->nombreE }} {{ $e->apellidoE }} (CI: {{ $e->ci }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>

        {{-- Sección Productos --}}
        <div class="card mb-4">
            <div class="card-header bg-white">
                <h4 class="card-title"><i class="bi bi-box-seam"></i> Productos Vendidos</h4>
            </div>
            <div class="card-body">
                <div class="row align-items-end">
                    {{-- Producto --}}
                    <div class="col-md-6 mb-3">
                        <label for="idProducto" class="form-label">Producto</label>
                        <select class="form-select" id="idProducto" name="idProducto">
                            <option value="" disabled selected>Selecciona producto...</option>
                            @foreach($productos as $p)
                                <option value="{{ $p->idProducto }}">
                                    {{ $p->nombre_producto }} — Bs{{ number_format($p->precio_unitario,2) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    {{-- Cantidad --}}
                    <div class="col-md-3 mb-3">
                        <label for="cantidad" class="form-label">Cantidad</label>
                        <input type="number" class="form-control" id="cantidad" name="cantidad" min="1" value="1">
                    </div>
                </div>
            </div>
        </div>

        {{-- Acciones --}}
        <div class="d-flex justify-content-between">
            <a href="{{ url('/admin/ventas') }}" class="btn btn-default">
                <i class="bi bi-arrow-left"></i> Cancelar
            </a>
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-check-lg"></i> Registrar Venta
            </button>
        </div>
    </form>
</div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-color: #4361ee;
            --light-bg: #f8f9fa;
            --card-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            --input-focus: 0 0 0 3px rgba(67, 97, 238, 0.15);
        }
        
        body {
            background-color: #f0f2f5;
            font-family: 'Segoe UI', system-ui, sans-serif;
            padding: 20px 0;
        }
        
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: var(--card-shadow);
            overflow: hidden;
        }
        
        .card-header {
            background: linear-gradient(120deg, #4361ee, #3a0ca3);
            color: white;
            border-bottom: none;
            padding: 20px 25px;
        }
        
        .card-title {
            font-weight: 600;
            letter-spacing: -0.2px;
            margin: 0;
            font-size: 1.5rem;
        }
        
        .card-body {
            padding: 30px;
            background-color: white;
        }
        
        .section-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid rgba(67, 97, 238, 0.15);
            display: flex;
            align-items: center;
        }
        
        .section-title i {
            margin-right: 10px;
            font-size: 1.2rem;
        }
        
        .form-label {
            font-weight: 500;
            color: #495057;
            margin-bottom: 8px;
            font-size: 0.9rem;
        }
        
        .form-control {
            border: 1px solid #e1e5eb;
            border-radius: 8px;
            padding: 12px 15px;
            font-size: 0.95rem;
            height: auto;
            transition: all 0.2s ease;
        }
        
        .form-control:focus {
            border-color: #4361ee;
            box-shadow: var(--input-focus);
        }
        
        .input-group-icon {
            position: relative;
        }
        
        .input-group-icon i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #adb5bd;
            z-index: 5;
        }
        
        .input-group-icon input {
            padding-left: 45px;
        }
        
        .btn-primary {
            background: linear-gradient(120deg, #4361ee, #3a0ca3);
            border: none;
            border-radius: 8px;
            padding: 10px 25px;
            font-weight: 500;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(67, 97, 238, 0.2);
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 7px 20px rgba(67, 97, 238, 0.3);
        }
        
        .cancel-link {
            color: #6c757d;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s;
            display: inline-flex;
            align-items: center;
        }
        
        .cancel-link:hover {
            color: #4361ee;
        }
        
        .cancel-link i {
            margin-right: 5px;
        }
        
        .form-divider {
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(0,0,0,0.1), transparent);
            margin: 30px 0;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        @media (max-width: 768px) {
            .card-body {
                padding: 20px;
            }
        }
        .card-title {
            font-weight: 600;
            letter-spacing: -0.2px;
            margin: 0;
            font-size: 1.5rem;
            color: white;
        }
    </style>
@stop

@section('js')
@stop