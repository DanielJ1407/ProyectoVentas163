@extends('adminlte::page')

@section('content_header')
    <nav aria-label="breadcrumb" style = "font-size: 18pt">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/admin')}}">INICIO</a></li>
        <!-- <li class="breadcrumb-item"><a href="{{url('/admin/proveedores')}}">Productos</a></li>
        <li class="breadcrumb-item active" aria-current="page">Listado</li> -->
    </ol>
    </nav>
    <div class="hr"></div>
@stop

@section('content')
    <div class="container">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/admin')}}">INICIO</a></li>
                <li class="breadcrumb-item"><a href="{{url('/admin/proveedores')}}">Proveedores</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detalle</li>
            </ol>
        </nav>
        <div class="hr"></div>
        
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <!-- Tarjeta de información del proveedor -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><i class="bi bi-truck"></i> Detalles del Proveedor</h3>
                    </div>
                    
                    <div class="card-body">
                        <div class="info-grid">
                            <div class="info-card">
                                <div class="info-label"><i class="bi bi-upc"></i> ID Proveedor</div>
                                <div class="info-value">{{ $proveedor->idProveedor }}</div>
                            </div>
                            
                            <div class="info-card">
                                <div class="info-label"><i class="bi bi-building"></i> Nombre</div>
                                <div class="info-value">{{ $proveedor->nombreProv }}</div>
                            </div>
                            
                            <div class="info-card">
                                <div class="info-label"><i class="bi bi-tag"></i> Tipo</div>
                                <div class="info-value">
                                    <span class="provider-type 
                                        @if(strpos(strtolower($proveedor->tipo), 'equip') !== false) type-equipment
                                        @elseif(strpos(strtolower($proveedor->tipo), 'ropa') !== false) type-clothing
                                        @elseif(strpos(strtolower($proveedor->tipo), 'electr') !== false) type-electronics
                                        @else type-other @endif">
                                        {{ $proveedor->tipo }}
                                    </span>
                                </div>
                            </div>
                            
                            <div class="info-card">
                                <div class="info-label"><i class="bi bi-telephone"></i> Contacto</div>
                                <div class="info-value">
                                    <a href="tel:{{ $proveedor->nroContacto }}" class="text-decoration-none">
                                        {{ $proveedor->nroContacto }}
                                    </a>
                                </div>
                            </div>
                            
                            <div class="info-card">
                                <div class="info-label"><i class="bi bi-geo-alt"></i> Ubicación</div>
                                <div class="info-value">{{ $proveedor->ubicacion }}</div>
                            </div>
                        </div>
                        
                        <div class="d-flex justify-content-between">
                            <a href="{{url('/admin/proveedores')}}" class="btn-back">
                                <i class="bi bi-arrow-left"></i> Volver a Proveedores
                            </a>
                            
                            <div>
                                <a href="{{ url('/admin/proveedores/'.$proveedor->idProveedor.'/edit') }}" class="btn-back">
                                    <i class="bi bi-pencil"></i> Editar Proveedor
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Tarjeta de productos del proveedor -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><i class="bi bi-box-seam"></i> Productos del Proveedor</h3>
                    </div>
                    
                    <div class="table-container">
                        @if($proveedor->productos->count() > 0)
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Precio</th>
                                        <th>Marca</th>
                                        <th>Stock</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($proveedor->productos as $producto)
                                        <tr>
                                            <td>{{ $producto->idProducto }}</td>
                                            <td>{{ $producto->nombre_producto }}</td>
                                            <td>${{ number_format($producto->precio_unitario, 2) }}</td>
                                            <td>{{ $producto->marca }}</td>
                                            <td>
                                                <span class="d-flex align-items-center">
                                                    {{ $producto->stock }} 
                                                    @if($producto->stock < 10)
                                                        <span class="badge bg-danger ms-2">Bajo</span>
                                                    @elseif($producto->stock < 30)
                                                        <span class="badge bg-warning ms-2">Medio</span>
                                                    @else
                                                        <span class="badge bg-success ms-2">Alto</span>
                                                    @endif
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="empty-products">
                                <i class="bi bi-inbox"></i>
                                <h4>Este proveedor no tiene productos asociados</h4>
                                <p class="mt-2">Puedes agregar productos a este proveedor desde la sección de edición</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-color: #4361ee;
            --primary-dark: #3a0ca3;
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
            margin: 15px 0 25px;
        }
        
        .card {
            background-color: white;
            border: none;
            border-radius: 12px;
            box-shadow: var(--card-shadow);
            overflow: hidden;
            margin-bottom: 30px;
        }
        
        .card-header {
            background: linear-gradient(120deg, var(--primary-color), var(--primary-dark));
            color: white;
            border-bottom: none;
            padding: 20px 25px;
        }
        
        .card-title {
            font-weight: 600;
            letter-spacing: -0.2px;
            margin: 0;
            font-size: 1.5rem;
            display: flex;
            align-items: center;
        }
        
        .card-title i {
            margin-right: 10px;
            font-size: 1.2rem;
        }
        
        .card-body {
            padding: 30px;
        }
        
        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .info-card {
            background-color: var(--light-bg);
            border-radius: 10px;
            padding: 20px;
            border-left: 4px solid var(--primary-color);
        }
        
        .info-label {
            font-size: 0.85rem;
            color: var(--text-secondary);
            margin-bottom: 5px;
            font-weight: 500;
            display: flex;
            align-items: center;
        }
        
        .info-label i {
            margin-right: 8px;
        }
        
        .info-value {
            font-size: 1.1rem;
            font-weight: 500;
            color: var(--text-primary);
        }
        
        .provider-type {
            display: inline-flex;
            align-items: center;
            padding: 5px 15px;
            border-radius: 20px;
            font-weight: 500;
            font-size: 0.9rem;
        }
        
        .type-equipment {
            background-color: #e1f0ff;
            color: #4361ee;
        }
        
        .type-clothing {
            background-color: #fdecea;
            color: #f44336;
        }
        
        .type-electronics {
            background-color: #fff8e1;
            color: #ff9800;
        }
        
        .type-other {
            background-color: #e8f5e9;
            color: #4caf50;
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
        
        .table-container {
            background-color: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: var(--card-shadow);
        }
        
        .table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }
        
        .table thead th {
            background-color: #f7f9fc;
            color: var(--text-secondary);
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.8rem;
            letter-spacing: 0.5px;
            padding: 15px 20px;
            border-bottom: 2px solid var(--border-color);
        }
        
        .table tbody tr {
            transition: background-color 0.2s;
            border-bottom: 1px solid var(--border-color);
        }
        
        .table tbody tr:last-child {
            border-bottom: none;
        }
        
        .table tbody tr:hover {
            background-color: #f8fafc;
        }
        
        .table tbody td {
            padding: 15px 20px;
            vertical-align: middle;
            color: var(--text-primary);
            font-size: 0.95rem;
        }
        
        .empty-products {
            padding: 40px 20px;
            text-align: center;
            color: var(--text-secondary);
        }
        
        .empty-products i {
            font-size: 3rem;
            color: #cbd5e0;
            margin-bottom: 15px;
        }
        
        @media (max-width: 768px) {
            .card-body {
                padding: 20px;
            }
            
            .info-grid {
                grid-template-columns: 1fr;
            }
            
            .action-buttons {
                flex-direction: column;
            }
        }
    </style>
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@stop