@extends('adminlte::page')

@section('content_header')
    <div class="container">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/admin') }}">INICIO</a></li>
                <li class="breadcrumb-item active" aria-current="page">Compras de Productos</li>
            </ol>
        </nav>
        <div class="hr"></div>
    </div>
@stop

@section('content')
<div class="row mb-4">
    <div class="col-md-3">
        <div class="stats-card">
            <i class="bi bi-cart-check"></i>
            <h3>{{ count($compras) }}</h3>
            <p>Registros de Compra</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stats-card">
            <i class="bi bi-box-seam"></i>
            <h3>{{ $compras->unique('idProducto')->count() }}</h3>
            <p>Productos Distintos</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stats-card">
            <i class="bi bi-receipt"></i>
            <h3>{{ $compras->unique('idDetalle_venta')->count() }}</h3>
            <p>Ventas Relacionadas</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stats-card">
            <i class="bi bi-hash"></i>
            <h3>{{ $compras->sum('cantidad') }}</h3>
            <p>Total Cantidad</p>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title"><i class="bi bi-cart-check me-2"></i> Compras de Productos</h3>
        <a class="btn btn-primary" href="{{ url('/admin/compras_productos/create') }}">
            <i class="bi bi-plus-lg"></i> Nuevo Registro
        </a>
    </div>
    <div class="table-container">
        <div class="search-container">
            <div class="search-box">
                <i class="bi bi-search"></i>
                <input type="text" placeholder="Buscar registros...">
            </div>
            <button class="filter-btn">
                <i class="bi bi-funnel"></i> Filtros
            </button>
        </div>
        <div class="table-responsive">
            <table class="table" id="example1">
                <thead>
                    <tr>
                        <th>Producto ID</th>
                        <th>Detalle Venta ID</th>
                        <th>Cantidad</th>
                        <th style="text-align: center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($compras as $compra)
                        <tr>
                            <td>{{ $compra->idProducto }}</td>
                            <td>{{ $compra->idDetalle_venta }}</td>
                            <td>{{ $compra->cantidad }}</td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ url('/admin/compras_productos/'.$compra->idProducto.'/'.$compra->idDetalle_venta) }}" class="btn btn-info btn-action">
                                        <i class="bi bi-eye"></i> Ver
                                    </a>
                                    <a href="{{ url('/admin/compras_productos/'.$compra->idProducto.'/'.$compra->idDetalle_venta.'/edit') }}" class="btn btn-warning btn-action">
                                        <i class="bi bi-pencil"></i> Editar
                                    </a>
                                    <form action="{{ url('/admin/compras_productos/'.$compra->idProducto.'/'.$compra->idDetalle_venta) }}" method="POST" class="d-inline" id="form-delete-{{ $compra->idProducto }}-{{ $compra->idDetalle_venta }}">
                                        @csrf @method('DELETE')
                                        <button type="button" class="btn btn-danger btn-action" onclick="confirmDelete('{{ $compra->idProducto }}-{{ $compra->idDetalle_venta }}')">
                                            <i class="bi bi-trash"></i> Eliminar
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
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
        
        .table tbody td:first-child {
            font-weight: 500;
            color: var(--primary-color);
        }
        
        .action-buttons {
            display: flex;
            gap: 8px;
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
        
        .badge-tag {
            background-color: #e1f0ff;
            color: var(--primary-color);
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
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
        
        .search-box {
            flex: 1;
            position: relative;
        }
        
        .search-box i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #a0aec0;
        }
        
        .search-box input {
            width: 100%;
            padding: 12px 20px 12px 45px;
            border-radius: 8px;
            border: 1px solid var(--border-color);
            font-size: 0.95rem;
            transition: all 0.2s;
        }
        
        .search-box input:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.15);
            outline: none;
        }
        
        .filter-btn {
            background-color: white;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            padding: 0 15px;
            display: flex;
            align-items: center;
            color: var(--text-secondary);
            transition: all 0.2s;
        }
        
        .filter-btn:hover {
            border-color: var(--primary-color);
            color: var(--primary-color);
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
        }
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
@stop

@section('js')
<script>
    function confirmDelete(key) {
        Swal.fire({
            title: '¿Eliminar registro de compra?',
            text: 'Esta acción no se puede deshacer',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('form-delete-' + key).submit();
            }
        });
    }
    document.querySelector('.search-box input').addEventListener('keyup', function() {
        const term = this.value.toLowerCase();
        document.querySelectorAll('#example1 tbody tr').forEach(row => {
            row.style.display = row.textContent.toLowerCase().includes(term) ? '' : 'none';
        });
    });
    </script>
    <script>
        $(function () {
            $("#example1").DataTable({
                "pageLength": 20,
                "language": {
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Productos",
                    "infoEmpty": "Mostrando 0 a 0 de 0 Productos",
                    "infoFiltered": "(Filtrado de _MAX_ total Productos)",
                    "lengthMenu": "Mostrar _MENU_ Productos",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscador:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                buttons: [
                    { text: '<i class="fas fa-copy"></i> COPIAR', extend: 'copy', className: 'btn btn-default' },
                    { text: '<i class="fas fa-file-pdf"></i> PDF', extend: 'pdf', className: 'btn btn-danger' },
                    { text: '<i class="fas fa-file-csv"></i> CSV', extend: 'csv', className: 'btn btn-info' },
                    { text: '<i class="fas fa-file-excel"></i> EXCEL', extend: 'excel', className: 'btn btn-success' },
                    { text: '<i class="fas fa-print"></i> IMPRIMIR', extend: 'print', className: 'btn btn-warning' }
                ]
            }).buttons().container().appendTo('#example1_wrapper .row:eq(0)');
        });
    </script>
@stop
