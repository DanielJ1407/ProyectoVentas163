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
<div class="row justify-content-center">
    <div class="col-lg-10">

        {{-- Datos del Cliente --}}
        <div class="card mb-4">
            <div class="card-header bg-white">
                <h3 class="card-title"><i class="bi bi-person-badge"></i> Cliente</h3>
            </div>
            <div class="card-body">
                <div class="info-grid">
                    <div class="info-card">
                        <div class="info-label"><i class="bi bi-credit-card"></i> CI</div>
                        <div class="info-value">{{ $cliente->ci }}</div>
                    </div>
                    <div class="info-card">
                        <div class="info-label"><i class="bi bi-person"></i> Nombre</div>
                        <div class="info-value">{{ $cliente->nombre }} {{ $cliente->apellido }}</div>
                    </div>
                    <div class="info-card">
                        <div class="info-label"><i class="bi bi-envelope"></i> Correo</div>
                        <div class="info-value">
                            <div>{{ $cliente->correo }}</div>
                        </div>
                    </div>
                    <div class="info-card">
                        <div class="info-label"><i class="bi bi-file-earmark-text"></i> NIT</div>
                        <div class="info-value">{{ $cliente->nit }}</div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Detalle de Venta --}}
        <div class="card mb-4">
            <div class="card-header bg-white">
                <h3 class="card-title"><i class="bi bi-clipboard-data"></i> Datos de la Venta</h3>
            </div>
            <div class="card-body">
                <div class="info-grid">
                    <div class="info-card">
                        <div class="info-label"><i class="bi bi-hash"></i> ID Detalle</div>
                        <div class="info-value">{{ $detalleVenta->idDetalle_venta }}</div>
                    </div>
                    <div class="info-card">
                        <div class="info-label"><i class="bi bi-credit-card-2-front"></i> Método de Pago</div>
                        <div class="info-value">{{ $detalleVenta->metodo_pago }}</div>
                    </div>
                    <div class="info-card">
                        <div class="info-label"><i class="bi bi-calendar"></i> Fecha</div>
                        <div class="info-value">{{ $detalleVenta->fecha_venta }}</div>
                    </div>
                    <div class="info-card">
                        <div class="info-label"><i class="bi bi-clock"></i> Hora</div>
                        <div class="info-value">{{ $detalleVenta->hora_venta }}</div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Empleado que atendió --}}
        <div class="card mb-4">
            <div class="card-header bg-white">
                <h3 class="card-title"><i class="bi bi-person-badge-fill"></i> Empleado</h3>
            </div>
            <div class="card-body">
                <div class="info-grid">
                    <div class="info-card">
                        <div class="info-label"><i class="bi bi-hash"></i> ID Empleado</div>
                        <div class="info-value">{{ $empleado->idEmpleado }}</div>
                    </div>
                    <div class="info-card">
                        <div class="info-label"><i class="bi bi-credit-card"></i> CI</div>
                        <div class="info-value">{{ $empleado->ci }}</div>
                    </div>
                    <div class="info-card">
                        <div class="info-label"><i class="bi bi-briefcase"></i> Rol</div>
                        <div class="info-value">{{ $empleado->rol_empleado }}</div>
                    </div>
                    <div class="info-card">
                        <div class="info-label"><i class="bi bi-person"></i> Nombre</div>
                        <div class="info-value">{{ $empleado->nombreE }} {{ $empleado->apellidoE }}</div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Productos Comprados --}}
        <div class="card mb-4">
            <div class="card-header bg-white">
                <h3 class="card-title"><i class="bi bi-box-seam"></i> Productos</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID Producto</th>
                            <th>Nombre</th>
                            <th>Precio Unit.</th>
                            <th>Marca</th>
                            <th>Tipo</th>
                            <th>Color</th>
                            <th>Talla</th>
                            <th>Modelo</th>
                            <th>Stock</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($productos as $prod)
                        <tr>
                            <td>{{ $prod->idProducto }}</td>
                            <td>{{ $prod->nombre_producto }}</td>
                            <td>Bs {{ number_format($prod->precio_unitario,2) }}</td>
                            <td>{{ $prod->marca }}</td>
                            <td>{{ $prod->tipo }}</td>
                            <td>{{ $prod->color }}</td>
                            <td>{{ $prod->talla }}</td>
                            <td>{{ $prod->modelo }}</td>
                            <td>{{ $prod->stock }}</td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Botones de Acción --}}
        <div class="d-flex justify-content-between mb-5">
            <a href="{{ url('/admin/ventas') }}" class="btn btn-default">
                <i class="bi bi-arrow-left"></i> Volver a Ventas
            </a>
        </div>

    </div>
</div>
@stop

    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-color: #4361ee;
            --light-bg: #f8f9fa;
            --card-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            --text-primary: #2d3748;
            --text-secondary: #718096;
            --border-color: #e2e8f0;
        }
        
        body {
            background-color: #f0f2f5;
            font-family: 'Segoe UI', system-ui, sans-serif;
            padding: 20px 0;
            color: var(--text-primary);
        }
        
        .breadcrumb {
            background-color: transparent;
            padding: 0;
            font-size: 0.9rem;
        }
        
        .breadcrumb-item a {
            color: var(--primary-color);
            text-decoration: none;
            transition: all 0.2s;
        }
        
        .breadcrumb-item.active {
            color: var(--text-secondary);
        }
        
        .hr {
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(0,0,0,0.1), transparent);
            margin: 15px 0;
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
        
        .info-card {
            background-color: var(--light-bg);
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            border-left: 4px solid var(--primary-color);
        }
        
        .info-label {
            font-size: 0.85rem;
            color: var(--text-secondary);
            margin-bottom: 5px;
            font-weight: 500;
        }
        
        .info-value {
            font-size: 1.1rem;
            font-weight: 500;
            color: var(--text-primary);
        }
        
        .color-indicator {
            display: inline-block;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            margin-right: 10px;
            vertical-align: middle;
            border: 1px solid rgba(0,0,0,0.1);
        }
        
        .btn-back {
            background-color: white;
            color: var(--primary-color);
            border: 1px solid var(--border-color);
            border-radius: 8px;
            padding: 10px 20px;
            font-weight: 500;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            text-decoration: none;
        }
        
        .btn-back:hover {
            background-color: var(--primary-color);
            color: white;
            border-color: var(--primary-color);
        }
        
        .btn-back i {
            margin-right: 8px;
        }
        
        .stock-indicator {
            display: inline-flex;
            align-items: center;
            padding: 5px 15px;
            border-radius: 20px;
            font-weight: 500;
            font-size: 0.9rem;
        }
        
        .stock-low {
            background-color: #fdecea;
            color: #f44336;
        }
        
        .stock-medium {
            background-color: #fff8e1;
            color: #ff9800;
        }
        
        .stock-high {
            background-color: #e8f5e9;
            color: #4caf50;
        }
        
        .detail-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }
        
        @media (max-width: 768px) {
            .card-body {
                padding: 20px;
            }
            
            .detail-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>

@section('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@stop