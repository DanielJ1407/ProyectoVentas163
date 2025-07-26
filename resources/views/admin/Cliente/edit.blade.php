@extends('adminlte::page')

@section('content_header')
    <div class="container">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/admin')}}">INICIO</a></li>
                <li class="breadcrumb-item"><a href="{{url('/admin/clientes')}}">Clientes</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detalle</li>
            </ol>
        </nav>
        <div class="hr"></div>
@stop

@section('content')
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><i class="bi bi-person-plus"></i> Registrar Nuevo Cliente</h3>
                    </div>
                    
                    <div class="card-body">
                        <form action="{{url('/admin/clientes/'.$cliente->ci)}}" method="POST">
                            @csrf
                            @method('PUT')
                            
                            <div class="section-title">
                                <i class="bi bi-person-badge"></i> Información Personal
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="ci" class="form-label">Cédula de Identidad</label>
                                        <div class="input-group-icon">
                                            <i class="bi bi-credit-card"></i>
                                            <input type="text" class="form-control" id="ci" name="ci" 
                                                placeholder="Ej: 12345678" value="{{ $cliente->ci }}">
                                        </div>
                                        @error('ci')
                                            <div class="error-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nit" class="form-label">NIT</label>
                                        <div class="input-group-icon">
                                            <i class="bi bi-file-earmark-text"></i>
                                            <input type="text" class="form-control" id="nit" name="nit" 
                                                placeholder="Número de identificación tributaria" value="{{ $cliente->nit }}">
                                        </div>
                                        @error('nit')
                                            <div class="error-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nombre" class="form-label">Nombre</label>
                                        <div class="input-group-icon">
                                            <i class="bi bi-person"></i>
                                            <input type="text" class="form-control" id="nombre" name="nombre" 
                                                placeholder="Nombre(s) del cliente" value="{{ $cliente->nombre }}">
                                        </div>
                                        @error('nombre')
                                            <div class="error-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="apellido" class="form-label">Apellido</label>
                                        <div class="input-group-icon">
                                            <i class="bi bi-person"></i>
                                            <input type="text" class="form-control" id="apellido" name="apellido" 
                                                placeholder="Apellido(s) del cliente" value="{{ $cliente->apellido }}">
                                        </div>
                                        @error('apellido')
                                            <div class="error-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <div class="section-title">
                                <i class="bi bi-envelope"></i> Información de Contacto
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="correo" class="form-label">Correo Electrónico</label>
                                        <div class="input-group-icon">
                                            <i class="bi bi-envelope"></i>
                                            <input type="text" class="form-control" id="correo" name="correo" 
                                                placeholder="correo@ejemplo.com" value="{{ $cliente->correo }}">
                                        </div>
                                        @error('correo')
                                            <div class="error-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <div class="action-buttons">
                                <a href="{{url('/admin/clientes')}}" class="btn-outline">
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
            --error-color: #dc3545;
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
            border: none;
            border-radius: 12px;
            box-shadow: var(--card-shadow);
            overflow: hidden;
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
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-label {
            font-weight: 500;
            color: var(--text-primary);
            margin-bottom: 8px;
            font-size: 0.9rem;
            display: block;
        }
        
        .form-control {
            display: block;
            width: 100%;
            padding: 12px 15px;
            font-size: 0.95rem;
            line-height: 1.5;
            color: var(--text-primary);
            background-color: white;
            background-clip: padding-box;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }
        
        .form-control:focus {
            border-color: var(--primary-color);
            outline: 0;
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
            color: var(--text-secondary);
            z-index: 5;
        }
        
        .input-group-icon input {
            padding-left: 45px;
        }
        
        .btn-primary {
            background: linear-gradient(120deg, var(--primary-color), var(--primary-dark));
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
        
        .error-message {
            display: block;
            font-size: 0.85rem;
            color: var(--error-color);
            margin-top: 5px;
        }
        
        .action-buttons {
            display: flex;
            justify-content: flex-end;
            gap: 15px;
            margin-top: 30px;
        }
        
        @media (max-width: 768px) {
            .card-body {
                padding: 20px;
            }
            
            .action-buttons {
                flex-direction: column;
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