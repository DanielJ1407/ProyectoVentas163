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
<div class="row">
    <div class="col-md-12">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title"> Productos Registrados </h3>

                <div class="card-tools">
                  <a class="btn btn-primary" href="{{url('/admin/proveedores/create')}}"> Crear Nuevo </a>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="display: block;">
                <table border = "1" class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Numero de Contacto</th>
                            <th>Tipo</th>
                            <th>ubicacion</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($proveedores as $proveedor)
                            <tr>
                                <td>{{ $proveedor-> idProveedor}}</td>
                                <td>{{ $proveedor-> nombreProv }}</td>
                                <td>{{ $proveedor-> nroContacto }}</td>
                                <td>{{ $proveedor-> tipo }}</td>
                                <td>{{ $proveedor-> ubicacion }}</td>
                                <td style="text-align: center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ url('/admin/proveedores/'.$proveedor->idProveedor) }}" class="btn btn-info"><i class="fas fa-eye"></i> Ver </a>
                                        <a href="{{ url('/admin/proveedores/'.$proveedor->idProveedor.'/edit') }}" class="btn btn-warning"><i class="fas fa-eye"></i> Editar </a>
                                        
                                        <form action="{{ url('/admin/proveedores/'.$proveedor->idProveedor) }}" id="form-eliminar-{{$proveedor->idProveedor}}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="preguntar{{$proveedor->idProveedor}}(event)">
                                                <i class="fas fa-trash-alt"></i> Eliminar</button>
                                        </form>
                                        <script>
                                            function preguntar{{$proveedor->idProveedor}}(event) {
                                                event.preventDefault();  // envita el envio del formulario
                                                Swal.fire({
                                                title: "¿Desea eliminar el producto?",
                                                text: "",
                                                icon: "question",
                                                showCancelButton: true,
                                                confirmButtonubicacion: "#3085d6",
                                                cancelButtonubicacion: "#d33",
                                                confirmButtonText: "Sí, eliminar",
                                                denyButtonText: "Cancelar"
                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        document.getElementById("form-eliminar-{{$proveedor->idProveedor}}").submit();
                                                    }
                                                });
                                            }
                                        </script>
                                    </div>
                                    <!-- <a href="{{ url('/admin/proveedores/'.$proveedor->id.'/edit') }}" class="btn btn-warning">Editar</a>
                                    <form action="{{ url('/admin/proveedores/'.$proveedor->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form> -->
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
    </div>
</div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop