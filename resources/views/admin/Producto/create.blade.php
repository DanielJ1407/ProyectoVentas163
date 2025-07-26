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
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><i class="bi bi-box-seam"></i> Gestión de Productos</h3>
                    </div>
                    
                    <div class="card-body">
                        <form action="{{url('/admin/Productos/create')}}" method="POST">
                        @csrf
                            <!-- Sección de Información Básica -->
                            <div class="section-title">
                                <i class="bi bi-info-circle"></i> Información Básica
                            </div>
                            
                            <!-- <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="idProducto" class="form-label">ID Producto</label>
                                        <div class="input-group-icon">
                                            <i class="bi bi-upc-scan"></i>
                                            <input type="text" class="form-control" id="idProducto" name="idProducto" placeholder="ID único del producto">
                                        </div>
                                    </div>
                                </div> -->
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nombre_producto" class="form-label">Nombre del Producto</label>
                                        <div class="input-group-icon">
                                            <i class="bi bi-tag"></i>
                                            <input type="text" class="form-control" id="nombre_producto" name="nombre_producto" placeholder="Nombre descriptivo">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="precio_unitario" class="form-label">Precio Unitario</label>
                                        <div class="input-group-icon">
                                            <i class="bi bi-currency-dollar"></i>
                                            <input type="number" class="form-control" id="precio_unitario" name="precio_unitario" placeholder="0.00">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="marca" class="form-label">Marca</label>
                                        <div class="input-group-icon">
                                            <i class="bi bi-shop"></i>
                                            <input type="text" class="form-control" id="marca" name="marca" placeholder="Marca del producto">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Sección de Características -->
                            <div class="section-title">
                                <i class="bi bi-gear"></i> Características del Producto
                            </div>
                            
                            <div class="row" style="padding: 30px;">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tipo" class="form-label">Tipo de Producto</label>
                                        <input type="text" class="form-control" id="tipo" name="tipo" placeholder="Ingrese el tipo del producto">
                                        <!-- <select class="form-select" id="tipo" name="tipo">
                                            <option value="" selected disabled>Seleccionar tipo</option>
                                            <option value="electronico">Electrónico</option>
                                            <option value="ropa">Ropa</option>
                                            <option value="calzado">Calzado</option>
                                            <option value="hogar">Hogar</option>
                                            <option value="deporte">Deporte</option>
                                            <option value="otro">Otro</option>
                                        </select> -->
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="color" class="form-label">Color</label>
                                        <select class="form-select" id="color" name="color">
                                            <option value="" selected disabled>Seleccionar color</option>
                                            <option value="negro">Negro</option>
                                            <option value="blanco">Blanco</option>
                                            <option value="rojo">Rojo</option>
                                            <option value="azul">Azul</option>
                                            <option value="verde">Verde</option>
                                            <option value="otro">Otro</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="talla" class="form-label">Talla</label>
                                        <select class="form-select" id="talla" name="talla">
                                            <option value="" selected disabled>Seleccionar talla</option>
                                            <option value="XS">XS</option>
                                            <option value="S">S</option>
                                            <option value="M">M</option>
                                            <option value="L">L</option>
                                            <option value="XL">XL</option>
                                            <option value="XXL">XXL</option>
                                            <option value="unica">Única</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="modelo" class="form-label">Modelo</label>
                                        <div class="input-group-icon">
                                            <i class="bi bi-box"></i>
                                            <input type="text" class="form-control" id="modelo" name="modelo" placeholder="Modelo específico">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Sección de Inventario -->
                            <div class="section-title">
                                <i class="bi bi-clipboard-data"></i> Gestión de Inventario
                            </div>
                            
                            <div class="row" style="padding: 30px;">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="stock" class="form-label">Stock Disponible</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" id="stock" name="stock" placeholder="Cantidad en inventario">
                                            <span class="input-group-text">unidades</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="stock_minimo" class="form-label">Stock Mínimo</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" id="stock_minimo" name="stock_minimo" placeholder="Mínimo requerido">
                                            <span class="input-group-text">unidades</span>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                            
                            <div class="form-divider"></div>
                            
                            <!-- Acciones -->
                            <div class="d-flex justify-content-between align-items-center" style="padding: 50px;">
                                <a href="{{url('/admin/Productos')}}" class="cancel-link">
                                    <i class="bi bi-arrow-left"></i> Cancelar y volver
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-check-lg me-2"></i> Guardar Producto
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
            margin: 5;
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
            padding: 30px;
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
    </style>
@stop

@section('js')
@stop