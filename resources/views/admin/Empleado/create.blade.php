@extends('adminlte::page')

@section('content_header')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb" style="font-size: 1rem;">
                <li class="breadcrumb-item"><a href="{{ url('/admin') }}">INICIO</a></li>
                <li class="breadcrumb-item"><a href="{{ url('/admin/empleados') }}">Empleados</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ isset($empleado) ? 'Editar' : 'Crear' }} Empleado</li>
            </ol>
        </nav>
        <div class="hr"></div>
    </div>
@stop

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow rounded-2xl">
            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                <h3 class="card-title mb-0">Datos del Empleado</h3>
            </div>
            <div class="card-body">
                <form action="{{url('/admin/empleados/create')}}" method="POST">
                    @csrf
                    <div class="row g-3">
                        {{-- CI --}}
                        <div class="col-md-6">
                            <label for="ci" class="form-label">CI</label>
                            <input type="number" class="form-control" id="ci" name="ci" placeholder="Cédula de identidad"
                                value="{{ old('ci', $empleado->ci ?? '') }}">
                            @error('ci')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        {{-- Nombre --}}
                        <div class="col-md-6">
                            <label for="nombreE" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombreE" name="nombreE" placeholder="Nombre"
                                value="{{ old('nombreE', $empleado->nombreE ?? '') }}">
                            @error('nombreE')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        {{-- Apellido --}}
                        <div class="col-md-6">
                            <label for="apellidoE" class="form-label">Apellido</label>
                            <input type="text" class="form-control" id="apellidoE" name="apellidoE" placeholder="Apellido"
                                value="{{ old('apellidoE', $empleado->apellidoE ?? '') }}">
                            @error('apellidoE')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        {{-- Rol --}}
                        <div class="col-md-6">
                            <label for="rol_empleado" class="form-label">Rol</label>
                            <input type="text" class="form-control" id="rol_empleado" name="rol_empleado" placeholder="Rol"
                                value="{{ old('rol_empleado', $empleado->rol_empleado ?? '') }}">
                            @error('rol_empleado')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        {{-- Contacto --}}
                        <div class="col-md-6">
                            <label for="nroContacto" class="form-label">Contacto</label>
                            <input type="text" class="form-control" id="nroContacto" name="nroContacto" placeholder="Número de contacto"
                                value="{{ old('nroContacto', $empleado->nroContacto ?? '') }}">
                            @error('nroContacto')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-4">
                            <!-- <div class="action-buttons"> -->
                                <a href="{{url('/admin/empleados')}}" class="btn-outline">
                                    <i class="bi bi-x-lg me-2"></i> Cancelar
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-check-lg me-2"></i> Registrar Cliente
                                </button>
                            <!-- </div> -->
                    </div>
                </form>
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
            color: white;
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