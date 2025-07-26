@extends('adminlte::page')

@section('content_header')
    <nav aria-label="breadcrumb" style = "font-size: 18pt">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/admin')}}">INICIO</a></li>
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
                <li class="breadcrumb-item"><a href="{{url('/admin/Productos')}}">Productos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar</li>
            </ol>
        </nav>
        <div class="hr"></div>
        
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><i class="bi bi-pencil-square"></i> Editar Producto</h3>
                    </div>
                    
                    <div class="card-body">
                        <form action="{{url('/admin/Productos/'.$producto->idProducto)}}" method="POST">
                            @csrf
                            @method('PUT')
                            
                            <!-- Sección de Información Básica -->
                            <div class="section-title">
                                <i class="bi bi-info-circle"></i> Información Básica
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="idProducto" class="form-label">ID Producto</label>
                                        <div class="input-group-icon">
                                            <i class="bi bi-upc-scan"></i>
                                            <input type="text" class="form-control" id="idProducto" name="idProducto" value="{{ $producto->idProducto }}" placeholder="ID único del producto">
                                        </div>
                                        @error('idProducto')
                                            <div class="error-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nombre_producto" class="form-label">Nombre del Producto</label>
                                        <div class="input-group-icon">
                                            <i class="bi bi-tag"></i>
                                            <input type="text" class="form-control" id="nombre_producto" name="nombre_producto" value="{{ $producto->nombre_producto }}" placeholder="Nombre descriptivo">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="precio_unitario" class="form-label">Precio Unitario</label>
                                        <div class="input-group-icon">
                                            <i class="bi bi-currency-dollar"></i>
                                            <input type="number" class="form-control" id="precio_unitario" name="precio_unitario" value="{{ $producto->precio_unitario }}" placeholder="0.00">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="marca" class="form-label">Marca</label>
                                        <div class="input-group-icon">
                                            <i class="bi bi-shop"></i>
                                            <input type="text" class="form-control" id="marca" name="marca" value="{{ $producto->marca }}" placeholder="Marca del producto">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Sección de Características -->
                            <div class="section-title">
                                <i class="bi bi-gear"></i> Características del Producto
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tipo" class="form-label">Tipo de Producto</label>
                                        <input type="text" class="form-control" id="tipo" name="tipo" placeholder="Ingrese el tipo del producto" value = "{{ $producto->tipo }}">
                                        <!-- <select class="form-select" id="tipo" name="tipo">
                                            <option value="electronico" {{ $producto->tipo == 'electronico' ? 'selected' : '' }}>Electrónico</option>
                                            <option value="ropa" {{ $producto->tipo == 'ropa' ? 'selected' : '' }}>Ropa</option>
                                            <option value="calzado" {{ $producto->tipo == 'calzado' ? 'selected' : '' }}>Calzado</option>
                                            <option value="hogar" {{ $producto->tipo == 'hogar' ? 'selected' : '' }}>Hogar</option>
                                            <option value="deporte" {{ $producto->tipo == 'deporte' ? 'selected' : '' }}>Deporte</option>
                                            <option value="otro" {{ $producto->tipo == 'otro' ? 'selected' : '' }}>Otro</option>
                                        </select> -->
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="color" class="form-label">Color</label>
                                        <select class="form-select" id="color" name="color">
                                            <option value="negro" {{ $producto->color == 'negro' ? 'selected' : '' }}>Negro</option>
                                            <option value="blanco" {{ $producto->color == 'blanco' ? 'selected' : '' }}>Blanco</option>
                                            <option value="rojo" {{ $producto->color == 'rojo' ? 'selected' : '' }}>Rojo</option>
                                            <option value="azul" {{ $producto->color == 'azul' ? 'selected' : '' }}>Azul</option>
                                            <option value="verde" {{ $producto->color == 'verde' ? 'selected' : '' }}>Verde</option>
                                            <option value="otro" {{ $producto->color == 'otro' ? 'selected' : '' }}>Otro</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="talla" class="form-label">Talla</label>
                                        <select class="form-select" id="talla" name="talla">
                                            <option value="XS" {{ $producto->talla == 'XS' ? 'selected' : '' }}>XS</option>
                                            <option value="S" {{ $producto->talla == 'S' ? 'selected' : '' }}>S</option>
                                            <option value="M" {{ $producto->talla == 'M' ? 'selected' : '' }}>M</option>
                                            <option value="L" {{ $producto->talla == 'L' ? 'selected' : '' }}>L</option>
                                            <option value="XL" {{ $producto->talla == 'XL' ? 'selected' : '' }}>XL</option>
                                            <option value="XXL" {{ $producto->talla == 'XXL' ? 'selected' : '' }}>XXL</option>
                                            <option value="unica" {{ $producto->talla == 'unica' ? 'selected' : '' }}>Única</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="modelo" class="form-label">Modelo</label>
                                        <div class="input-group-icon">
                                            <i class="bi bi-box"></i>
                                            <input type="text" class="form-control" id="modelo" name="modelo" value="{{ $producto->modelo }}" placeholder="Modelo específico">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Sección de Inventario -->
                            <div class="section-title">
                                <i class="bi bi-clipboard-data"></i> Gestión de Inventario
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="stock" class="form-label">Stock Disponible</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" id="stock" name="stock" value="{{ $producto->stock }}" placeholder="Cantidad en inventario">
                                            <span class="input-group-text">unidades</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-divider"></div>
                            
                            <!-- Acciones -->
                            <div class="action-buttons">
                                <a href="{{url('/admin/Productos')}}" class="btn-outline">
                                    <i class="bi bi-x-lg me-2"></i> Cancelar
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-check-lg me-2"></i> Guardar Cambios
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-color: #4361ee;
            --success-color: #4caf50;
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
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.15);
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
            background: linear-gradient(120deg, var(--primary-color), #3a0ca3);
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
        
        .btn-outline {
            background: transparent;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            padding: 10px 25px;
            font-weight: 500;
            color: var(--text-secondary);
            transition: all 0.3s ease;
        }
        
        .btn-outline:hover {
            background-color: #f8f9fa;
            border-color: var(--primary-color);
            color: var(--primary-color);
        }
        
        .cancel-link {
            color: var(--text-secondary);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s;
            display: inline-flex;
            align-items: center;
        }
        
        .cancel-link:hover {
            color: var(--primary-color);
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
        
        .error-message {
            font-size: 0.85rem;
            color: #f44336;
            margin-top: 5px;
        }
        
        .action-buttons {
            display: flex;
            gap: 15px;
            justify-content: flex-end;
        }
        
        @media (max-width: 768px) {
            .card-body {
                padding: 20px;
            }
            
            .action-buttons {
                flex-direction: column;
                gap: 10px;
            }
            
            .action-buttons .btn {
                width: 100%;
            }
        }
    </style>
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@stop