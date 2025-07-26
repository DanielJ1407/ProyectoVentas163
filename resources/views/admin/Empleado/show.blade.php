@extends('adminlte::page')

@section('content_header')
    <div class="container">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/admin') }}">INICIO</a></li>
                <li class="breadcrumb-item"><a href="{{ url('/admin/empleados') }}">Empleados</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detalle</li>
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
                    <h3 class="card-title"><i class="bi bi-person-badge"></i> Detalles del Empleado</h3>
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
                            <div class="info-label"><i class="bi bi-person"></i> Nombre</div>
                            <div class="info-value">{{ $empleado->nombreE }}</div>
                        </div>

                        <div class="info-card">
                            <div class="info-label"><i class="bi bi-person"></i> Apellido</div>
                            <div class="info-value">{{ $empleado->apellidoE }}</div>
                        </div>

                        <div class="info-card">
                            <div class="info-label"><i class="bi bi-briefcase"></i> Rol</div>
                            <div class="info-value">{{ $empleado->rol_empleado }}</div>
                        </div>

                        <div class="info-card">
                            <div class="info-label"><i class="bi bi-telephone"></i> Contacto</div>
                            <div class="info-value">{{ $empleado->nroContacto }}</div>
                        </div>
                    </div>

                    <div class="action-buttons">
                        <a href="{{ url('/admin/empleados') }}" class="btn-back">
                            <i class="bi bi-arrow-left"></i> Volver a Empleados
                        </a>
                        <a href="{{ url('/admin/empleados/'.$empleado->idEmpleado.'/edit') }}" class="btn-back">
                            <i class="bi bi-pencil"></i> Editar Empleado
                        </a>
                    </div>
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
            border: none;
            border-radius: 12px;
            box-shadow: var(--card-shadow);
            overflow: hidden;
            margin-bottom: 30px;
        }

        .card-header {
            background: linear-gradient(120deg, var(--primary-color), var(--primary-dark));
            color: white;
            padding: 20px 25px;
            border-bottom: none;
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

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
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

        .action-buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 30px;
        }

        @media (max-width: 768px) {
            .info-grid {
                grid-template-columns: 1fr;
            }
            .action-buttons {
                flex-direction: column;
                gap: 10px;
            }
        }
    </style>
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@stop
