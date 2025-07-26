@extends('adminlte::page')

@section('content_header')
    <div class="container">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb" style="font-size: 0.9rem;">
                <li class="breadcrumb-item"><a href="{{ url('/admin') }}">INICIO</a></li>
                <li class="breadcrumb-item"><a href="{{ url('/admin/empleados') }}">Empleados</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar</li>
            </ol>
        </nav>
        <div class="hr"></div>
    </div>
@stop

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><i class="bi bi-pencil"></i> Editar Empleado</h3>
            </div>
            <div class="card-body">
                <form action="{{ url('/admin/empleados/'.$empleado->idEmpleado) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row g-3">
                        {{-- CI --}}
                        <div class="col-md-6">
                            <label for="ci" class="form-label">CI</label>
                            <input type="number" class="form-control" id="ci" name="ci"
                                   value="{{ old('ci', $empleado->ci) }}">
                            @error('ci')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        {{-- Nombre --}}
                        <div class="col-md-6">
                            <label for="nombreE" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombreE" name="nombreE"
                                   value="{{ old('nombreE', $empleado->nombreE) }}">
                            @error('nombreE')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        {{-- Apellido --}}
                        <div class="col-md-6">
                            <label for="apellidoE" class="form-label">Apellido</label>
                            <input type="text" class="form-control" id="apellidoE" name="apellidoE"
                                   value="{{ old('apellidoE', $empleado->apellidoE) }}">
                            @error('apellidoE')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        {{-- Rol --}}
                        <div class="col-md-6">
                            <label for="rol_empleado" class="form-label">Rol</label>
                            <input type="text" class="form-control" id="rol_empleado" name="rol_empleado"
                                   value="{{ old('rol_empleado', $empleado->rol_empleado) }}">
                            @error('rol_empleado')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        {{-- Contacto --}}
                        <div class="col-md-6">
                            <label for="nroContacto" class="form-label">Contacto</label>
                            <input type="text" class="form-control" id="nroContacto" name="nroContacto"
                                   value="{{ old('nroContacto', $empleado->nroContacto) }}">
                            @error('nroContacto')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <a href="{{ url('/admin/empleados') }}" class="btn-back">
                            <i class="bi bi-arrow-left"></i> Cancelar
                        </a>
                        <button type="submit" class="btn btn-primary shadow">
                            <i class="bi bi-check-lg me-1"></i> Guardar Cambios
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" rel="stylesheet">
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
            font-family: 'Segoe UI', sans-serif;
            color: var(--text-primary);
            padding: 20px 0;
        }
        .breadcrumb {
            background: transparent;
            padding: 0;
            font-size: 0.9rem;
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
            margin-bottom: 30px;
        }
        .card-header {
            background: var(--primary-color);
            color: white;
            padding: 20px 25px;
            border-bottom: none;
        }
        .card-title {
            margin: 0;
            font-size: 1.5rem;
        }
        .card-body {
            background: white;
            padding: 30px;
        }
        .form-label {
            font-weight: 500;
            color: var(--text-secondary);
        }
        .form-control {
            border-radius: 8px;
            border: 1px solid var(--border-color);
        }
        .btn-back {
            background: white;
            color: var(--primary-color);
            border: 1px solid var(--border-color);
            border-radius: 8px;
            padding: 10px 20px;
            text-decoration: none;
            transition: all .2s;
        }
        .btn-back:hover {
            background: var(--primary-color);
            color: white;
        }
        .btn-primary {
            background: var(--primary-color);
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            transition: all .2s;
        }
        .btn-primary:hover {
            opacity: .9;
        }
        @media (max-width: 768px) {
            .card-body { padding: 20px; }
        }
    </style>
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@stop
