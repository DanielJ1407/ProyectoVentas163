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
                <li class="breadcrumb-item"><a href="{{url('/admin/proveedores')}}">Proveedores</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar</li>
            </ol>
        </nav>
        <div class="hr"></div>
        
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><i class="bi bi-truck"></i> Editar Proveedor</h3>
                    </div>
                    
                    <div class="card-body">
                        <form action="{{url('/admin/proveedores/'.$proveedor->idProveedor)}}" method="POST">
                            @csrf
                            @method('PUT')
                            
                            <div class="section-title">
                                <i class="bi bi-info-circle"></i> Información del Proveedor
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="idProveedor" class="form-label">ID Proveedor</label>
                                        <div class="input-group-icon">
                                            <i class="bi bi-upc"></i>
                                            <input type="text" class="form-control" id="idProveedor" name="idProveedor" 
                                                value="{{ $proveedor->idProveedor }}" placeholder="ID único">
                                        </div>
                                        @error('idProveedor')
                                            <div class="error-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nombreProv" class="form-label">Nombre del Proveedor</label>
                                        <div class="input-group-icon">
                                            <i class="bi bi-building"></i>
                                            <input type="text" class="form-control" id="nombreProv" name="nombreProv" 
                                                value="{{ $proveedor->nombreProv }}" placeholder="Nombre completo">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nroContacto" class="form-label">Número de Contacto</label>
                                        <div class="input-group-icon">
                                            <i class="bi bi-telephone"></i>
                                            <input type="text" class="form-control" id="nroContacto" name="nroContacto" 
                                                value="{{ $proveedor->nroContacto }}" placeholder="Número de teléfono">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="ubicacion" class="form-label">Ubicación</label>
                                        <div class="input-group-icon">
                                            <i class="bi bi-geo-alt"></i>
                                            <input type="text" class="form-control" id="ubicacion" name="ubicacion" 
                                                value="{{ $proveedor->ubicacion }}" placeholder="Dirección o ciudad">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="section-title">
                                <i class="bi bi-tags"></i> Tipo de Proveedor
                            </div>
                            <div>
                                <input type="text" class="form-control" id="tipo" name="tipo" placeholder="Tipo de proveedor" value="{{ $proveedor->tipo }}">
                            </div>                            
                            <!-- <div class="form-group">
                                <div class="provider-type-selector">
                                    <div class="type-option" data-type="equipamiento" onclick="selectType(this, 'equipamiento')">
                                        <i class="bi bi-tools"></i>
                                        <span>Equipamiento</span>
                                    </div>
                                    <div class="type-option" data-type="ropa" onclick="selectType(this, 'ropa')">
                                        <i class="bi bi-person-standing-dress"></i>
                                        <span>Ropa</span>
                                    </div>
                                    <div class="type-option" data-type="electronica" onclick="selectType(this, 'electronica')">
                                        <i class="bi bi-cpu"></i>
                                        <span>Electrónica</span>
                                    </div>
                                    <div class="type-option" data-type="alimentos" onclick="selectType(this, 'alimentos')">
                                        <i class="bi bi-cup-hot"></i>
                                        <span>Alimentos</span>
                                    </div>
                                    <div class="type-option" data-type="otros" onclick="selectType(this, 'otros')">
                                        <i class="bi bi-boxes"></i>
                                        <span>Otros</span>
                                    </div>
                                </div>
                                <input type="hidden" id="tipo" name="tipo" value="{{ $proveedor->tipo }}">
                            </div> -->
                            
                            <div class="action-buttons">
                                <a href="{{url('/admin/proveedores')}}" class="btn-outline">
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
        
        .action-buttons {
            display: flex;
            justify-content: flex-end;
            gap: 15px;
            margin-top: 20px;
        }
        
        .error-message {
            font-size: 0.85rem;
            color: #f44336;
            margin-top: 5px;
        }
        
        .provider-type-selector {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
            gap: 10px;
            margin-top: 10px;
        }
        
        .type-option {
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            padding: 15px 10px;
            text-align: center;
            cursor: pointer;
            transition: all 0.2s;
        }
        
        .type-option:hover {
            border-color: var(--primary-color);
            background-color: #f0f5ff;
        }
        
        .type-option.selected {
            border-color: var(--primary-color);
            background-color: #e1f0ff;
        }
        
        .type-option i {
            font-size: 1.5rem;
            margin-bottom: 8px;
            display: block;
            color: var(--primary-color);
        }
        
        .type-option span {
            font-size: 0.85rem;
            font-weight: 500;
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
    <script>
        // Función para seleccionar el tipo de proveedor
        function selectType(element, type) {
            // Deseleccionar todos los elementos
            document.querySelectorAll('.type-option').forEach(opt => {
                opt.classList.remove('selected');
            });
            
            // Seleccionar el elemento clickeado
            element.classList.add('selected');
            
            // Actualizar el valor del campo oculto
            document.getElementById('tipo').value = type;
        }
        
        // Seleccionar el tipo actual al cargar la página
        document.addEventListener('DOMContentLoaded', function() {
            const currentType = "{{ $proveedor->tipo }}".toLowerCase();
            const selector = document.querySelector(`.type-option[data-type="${currentType}"]`);
            
            if (selector) {
                selector.classList.add('selected');
            } else {
                // Si no coincide exactamente, intentar coincidencia parcial
                const options = document.querySelectorAll('.type-option');
                for (let option of options) {
                    const type = option.getAttribute('data-type');
                    if (currentType.includes(type)) {
                        option.classList.add('selected');
                        document.getElementById('tipo').value = type;
                        break;
                    }
                }
            }
        });
    </script>
@stop