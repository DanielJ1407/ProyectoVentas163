@extends('adminlte::page')

@section('content_header')
    <nav aria-label="breadcrumb" style = "font-size: 18pt">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/admin')}}">INICIO</a></li>
        <!-- <li class="breadcrumb-item"><a href="{{url('/admin/empleados')}}">Empleados</a></li>
        <li class="breadcrumb-item active" aria-current="page">Listado</li> -->
    </ol>
    </nav>
    <div class="hr"></div>
@stop

@section('content')
<div class="row" style="justify-content: center">
    <div class="col-md-10">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"> Datos del Empleado </h3>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="display: block;">
                <form action="{{url('/admin/empleados/create')}}" method="POST">
                    @csrf   <!-- token -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="idEmpleado"><b>ID de Empleado</b></label>
                                <input type="number" class="form-control" id="idEmpleado" name="idEmpleado" placeholder="Ingrese el ID del Empleado">
                            </div>
                            @error('idEmpleado')
                                <small style='color: red'> {{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="ci"><b>CI del Empleado</b></label>
                                <input type="number" class="form-control" id="ci" name="ci" placeholder="Ingrese el CI del Empleado">
                            </div>
                        </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nombreE"><b>Nombre del Empleado</b></label>
                                    <input type="text" class="form-control" id="nombreE" name="nombreE" placeholder="Ingrese el nombre del Empleado">
                                </div>
                            </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="apellidoE"><b>Apellido del Empleado</b></label>
                                <input type="text" class="form-control" id="apellidoE" name="apellidoE" placeholder="Ingrese el apellido del Empleado">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="rol_empleado"><b>Rol del Empleado</b></label>
                                <input type="text" class="form-control" id="rol_empleado" name="rol_empleado" placeholder="Ingrese el rol del Empleado">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nroContacto"><b>Número de Contacto</b></label>
                                <input type="number" class="form-control" id="nroContacto" name="nroContacto" placeholder="Ingrese el número de contacto del Empleado">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="col-md-10">
                        <div class="form-group" style="justify-content: center">
                            <a href="{{url('/admin/empleados')}}">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
                </form>

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
@stop