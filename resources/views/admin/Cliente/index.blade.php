@extends('adminlte::page')

@section('content_header')
    <nav aria-label="breadcrumb" style = "font-size: 18pt">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/admin')}}">INICIO</a></li>
        <!-- <li class="breadcrumb-item"><a href="{{url('/admin/clientes')}}">clientes</a></li>
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
                <h3 class="card-title"> CLIENTES </h3>

                <div class="card-tools">
                  <a class="btn btn-primary" href="{{url('/admin/clientes/create')}}"> Crear Nuevo </a>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="display: block;">
                <table border = "1" class="table table-striped">
                    <thead>
                        <tr>
                            <th>CI</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>correo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($clientes as $cliente)
                        <tr>
                            <td>{{ $cliente-> ci }}</td>
                            <td>{{ $cliente-> nombre }}</td>
                            <td>{{ $cliente-> apellido }}</td>
                            <td>{{ $cliente-> correo }}</td>
                            <td style="text-align: center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ url('/admin/clientes/'.$cliente->ci) }}" class="btn btn-info"><i class="fas fa-eye"></i> Ver </a>
                                        <a href="{{ url('/admin/clientes/'.$cliente->ci.'/edit') }}" class="btn btn-warning"><i class="fas fa-eye"></i> Editar </a>
                                        
                                        <form action="{{ url('/admin/clientes/'.$cliente->ci) }}" id="form-eliminar-{{$cliente->ci}}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="preguntar{{$cliente->ci}}(event)">
                                                <i class="fas fa-trash-alt"></i> Eliminar</button>
                                        </form>
                                        <script>
                                            function preguntar{{$cliente->ci}}(event) {
                                                event.preventDefault();  // envita el envio del formulario
                                                Swal.fire({
                                                title: "¿Desea eliminar el producto?",
                                                text: "",
                                                icon: "question",
                                                showCancelButton: true,
                                                confirmButtonColor: "#3085d6",
                                                cancelButtonColor: "#d33",
                                                confirmButtonText: "Sí, eliminar",
                                                denyButtonText: "Cancelar"
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