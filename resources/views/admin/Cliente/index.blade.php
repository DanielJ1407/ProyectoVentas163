@extends('adminlte::page')

@section('content_header')
    <div class="container">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/admin')}}">INICIO</a></li>
                <li class="breadcrumb-item active" aria-current="page">Clientes</li>
            </ol>
        </nav>
        <div class="hr"></div>
@stop

@section('content')
        
        <!-- Estadísticas -->
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="stats-card">
                    <i class="bi bi-people"></i>
                    <h3>{{ count($clientes) }}</h3>
                    <p>Clientes Registrados</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card">
                    <i class="bi bi-envelope"></i>
                    <h3>{{ $clientes->unique('correo')->count() }}</h3>
                    <p>Correos Únicos</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card">
                    <i class="bi bi-credit-card"></i>
                    <h3>{{ $clientes->unique('nit')->count() }}</h3>
                    <p>NITs Diferentes</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card">
                    <i class="bi bi-person-badge"></i>
                    <h3>{{ $clientes->unique('ci')->count() }}</h3>
                    <p>CIs Únicos</p>
                </div>
            </div>
        </div>
        
        <!-- Tarjeta Principal -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><i class="bi bi-people me-2"></i> Clientes Registrados</h3>
                <a class="btn btn-primary" href="{{url('/admin/clientes/create')}}">
                    <i class="bi bi-plus-lg"></i> Nuevo Cliente
                </a>
            </div>
            
            <div class="table-container">
                <!-- Tabla de Clientes -->
                <table id="example1" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>CI</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Correo</th>
                            <th>NIT</th>
                            <th style="text-align: center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($clientes) > 0)
                            @foreach($clientes as $cliente)
                                <tr>
                                    <td>{{ $cliente->ci }}</td>
                                    <td>{{ $cliente->nombre }}</td>
                                    <td>{{ $cliente->apellido }}</td>
                                    <td>
                                        <a href="mailto:{{ $cliente->correo }}" class="text-decoration-none">
                                            {{ $cliente->correo }}
                                        </a>
                                    </td>
                                    <td>{{ $cliente->nit }}</td>
                                    <td>
                                        <div class="action-buttons">
                                            <a href="{{ url('/admin/clientes/'.$cliente->ci) }}" class="btn btn-info">
                                                <i class="bi bi-eye"></i> Ver
                                            </a>
                                            <a href="{{ url('/admin/clientes/'.$cliente->ci.'/edit') }}" class="btn btn-warning">
                                                <i class="bi bi-pencil"></i> Editar
                                            </a>
                                            <form action="{{ url('/admin/clientes/'.$cliente->ci) }}" id="form-eliminar-{{$cliente->ci}}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="preguntar{{$cliente->ci}}(event)">
                                                    <i class="bi bi-trash"></i> Eliminar
                                                </button>
                                            </form>
                                            <script>
                                                function preguntar{{$cliente->ci}}(event) {
                                                    event.preventDefault();
                                                    Swal.fire({
                                                        title: "¿Eliminar cliente?",
                                                        text: "Esta acción no se puede deshacer",
                                                        icon: "warning",
                                                        showCancelButton: true,
                                                        confirmButtonColor: "#4361ee",
                                                        cancelButtonColor: "#d33",
                                                        confirmButtonText: "Sí, eliminar",
                                                        cancelButtonText: "Cancelar"
                                                    }).then((result) => {
                                                        if (result.isConfirmed) {
                                                            document.getElementById("form-eliminar-{{$cliente->ci}}").submit();
                                                        }
                                                    });
                                                }
                                            </script>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6">
                                    <div class="empty-state">
                                        <i class="bi bi-people"></i>
                                        <h4>No se encontraron clientes</h4>
                                        <p>Comienza agregando nuevos clientes a tu sistema</p>
                                        <a class="btn btn-primary mt-3" href="{{url('/admin/clientes/create')}}">
                                            <i class="bi bi-plus-lg"></i> Crear Primer Cliente
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop

@section('css')
        <style>
        td {
            text-align: center;
        }
        /* Fondo transparente y sin borde en el contenedor */
        #example1_wrapper .dt-buttons {
            background-color: transparent;
            box-shadow: none;
            border: none;
            display: flex;
            justify-content: center; /* Centrar los botones */
            gap: 10px; /* Espaciado entre botones */
            margin-bottom: 15px; /* Separar botones de la tabla */
        }

        /* Estilo personalizado para los botones */
        #example1_wrapper .btn {
            color: #fff; /* Color del texto en blanco */
            border-radius: 4px; /* Bordes redondeados */
            padding: 5px 15px; /* Espaciado interno */
            font-size: 14px; /* TamaÃ±o de fuente */
        }

        /* Colores por tipo de botÃ³n */
        .btn-danger { background-color: #dc3545; border: none; }
        .btn-success { background-color: #28a745; border: none; }
        .btn-info { background-color: #17a2b8; border: none; }
        .btn-warning { background-color: #ffc107; color: #212529; border: none; }
        .btn-default { background-color: #6e7176; color: #212529; border: none; }
    </style>
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
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
            margin: 15px 0;
        }
        
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: var(--card-shadow);
            overflow: hidden;
            margin-bottom: 25px;
        }
        
        .card-header {
            background-color: white;
            border-bottom: 1px solid var(--border-color);
            padding: 20px 25px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        
        .card-title {
            font-weight: 600;
            letter-spacing: -0.2px;
            margin: 0;
            font-size: 1.4rem;
            color: var(--text-primary);
        }
        
        .btn-primary {
            background: linear-gradient(120deg, #4361ee, #3a0ca3);
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            font-weight: 500;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(67, 97, 238, 0.2);
            display: flex;
            align-items: center;
        }
        
        .btn-primary i {
            margin-right: 8px;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 7px 20px rgba(67, 97, 238, 0.3);
        }
        
        .table-container {
            padding: 25px;
            background-color: white;
            border-radius: 0 0 12px 12px;
        }
        
        table.dataTable {
            width: 100% !important;
            border-collapse: separate !important;
            border-spacing: 0;
        }
        
        table.dataTable thead th {
            background-color: #f7f9fc !important;
            color: var(--text-secondary) !important;
            font-weight: 600 !important;
            text-transform: uppercase;
            font-size: 0.8rem !important;
            letter-spacing: 0.5px;
            padding: 15px 20px !important;
            border-bottom: 2px solid var(--border-color) !important;
            border-top: none !important;
        }
        
        table.dataTable tbody tr {
            transition: background-color 0.2s;
            border-bottom: 1px solid var(--border-color);
        }
        
        table.dataTable tbody tr:last-child {
            border-bottom: none;
        }
        
        table.dataTable tbody tr:hover {
            background-color: #f8fafc !important;
        }
        
        table.dataTable tbody td {
            padding: 15px 20px !important;
            vertical-align: middle !important;
            color: var(--text-primary) !important;
            font-size: 0.95rem !important;
        }
        
        .action-buttons {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }
        
        .btn-action {
            padding: 8px 15px;
            border-radius: 6px;
            font-size: 0.85rem;
            display: flex;
            align-items: center;
            transition: all 0.2s;
        }
        
        .btn-action i {
            margin-right: 5px;
        }
        
        .btn-view {
            background-color: #e1f0ff;
            color: var(--primary-color);
            border: 1px solid #d0e4ff;
        }
        
        .btn-view:hover {
            background-color: #d0e4ff;
        }
        
        .btn-edit {
            background-color: #fff8e1;
            color: #e6a700;
            border: 1px solid #ffeeba;
        }
        
        .btn-edit:hover {
            background-color: #ffeeba;
        }
        
        .btn-delete {
            background-color: #fdecea;
            color: #f44336;
            border: 1px solid #f8d7da;
        }
        
        .btn-delete:hover {
            background-color: #f8d7da;
        }
        
        .empty-state {
            text-align: center;
            padding: 50px 20px;
        }
        
        .empty-state i {
            font-size: 4rem;
            color: #cbd5e0;
            margin-bottom: 20px;
        }
        
        .empty-state h4 {
            color: var(--text-secondary);
            font-weight: 500;
        }
        
        .search-container {
            margin-bottom: 20px;
            display: flex;
            gap: 10px;
        }
        
        .stats-card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: var(--card-shadow);
            text-align: center;
            transition: transform 0.3s;
        }
        
        .stats-card:hover {
            transform: translateY(-5px);
        }
        
        .stats-card i {
            font-size: 2rem;
            color: var(--primary-color);
            margin-bottom: 15px;
        }
        
        .stats-card h3 {
            font-size: 1.8rem;
            margin: 0;
            color: var(--text-primary);
        }
        
        .stats-card p {
            color: var(--text-secondary);
            margin-top: 5px;
            font-size: 0.9rem;
        }
        
        /* Estilos para DataTables buttons */
        .dt-buttons .btn {
            border-radius: 8px !important;
            padding: 8px 15px !important;
            font-size: 0.85rem !important;
            font-weight: 500 !important;
            display: inline-flex !important;
            align-items: center !important;
            margin-right: 8px !important;
            margin-bottom: 10px !important;
            transition: all 0.2s !important;
        }
        
        .dt-buttons .btn:hover {
            transform: translateY(-2px) !important;
        }
        
        .dt-buttons .btn i {
            margin-right: 5px !important;
        }
        
        @media (max-width: 768px) {
            .action-buttons {
                flex-direction: column;
            }
            
            .card-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
            
            .btn-primary {
                width: 100%;
            }
            
            .dt-buttons {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .dt-buttons .btn {
                width: 100%;
                margin-right: 0 !important;
            }
        }
    </style>
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- DataTables -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
    
    <script>
        $(function () {
            $("#example1").DataTable({
                "pageLength": 20,
                "language": {
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Clientes",
                    "infoEmpty": "Mostrando 0 a 0 de 0 Clientes",
                    "infoFiltered": "(Filtrado de _MAX_ total Clientes)",
                    "lengthMenu": "Mostrar _MENU_ Clientes",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Último",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                "dom": '<"row"<"col-md-6"B><"col-md-6"f>>rt<"row"<"col-md-6"l><"col-md-6"p>>',
                buttons: [
                    { 
                        extend: 'copy', 
                        text: '<i class="fas fa-copy"></i> Copiar',
                        className: 'btn btn-default',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    { 
                        extend: 'pdf', 
                        text: '<i class="fas fa-file-pdf"></i> PDF',
                        className: 'btn btn-danger',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    { 
                        extend: 'csv', 
                        text: '<i class="fas fa-file-csv"></i> CSV',
                        className: 'btn btn-info',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    { 
                        extend: 'excel', 
                        text: '<i class="fas fa-file-excel"></i> Excel',
                        className: 'btn btn-success',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    { 
                        extend: 'print', 
                        text: '<i class="fas fa-print"></i> Imprimir',
                        className: 'btn btn-warning',
                        exportOptions: {
                            columns: ':visible'
                        }
                    }
                ]
            });
        });
    </script>
@stop