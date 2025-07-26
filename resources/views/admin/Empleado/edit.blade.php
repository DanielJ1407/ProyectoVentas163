@extends('adminlte::page')

@section('content_header')
    <nav aria-label="breadcrumb" style = "font-size: 18pt">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/admin')}}">INICIO</a></li>
        <!-- <li class="breadcrumb-item"><a href="{{url('/admin/empleados')}}">Productos</a></li>
        <li class="breadcrumb-item active" aria-current="page">Listado</li> -->
    </ol>
    </nav>
    <div class="hr"></div>
@stop

@section('content')
<div class="row" style="justify-content: center">
    <div class="col-md-10">
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title"> Editar datos del Empleado </h3>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="display: block;">
                <form action="{{url('/admin/empleados/'.$empleado->idEmpleado)}}" method="POST">
                    @csrf   <!-- token -->
                    @method('PUT') <!-- Método para actualizar -->
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="idEmpleado"><b>ID Empleado</b></label>
                                <input type="text" class="form-control" id="idEmpleado" name="idEmpleado" value = "{{ $empleado->idEmpleado }}" placeholder="Ingrese el ID del Empleado">
                            </div>
                            @error('idEmpleado')
                                <small style='color: red'> {{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="ci"><b>CI del Empleado</b></label>
                                <input type="text" class="form-control" id="ci" name="ci" value = "{{ $empleado->ci }}" placeholder="Ingrese el CI del Empleado" name="nombreE" value="{{ $empleado->nombreE }}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nombreE"><b>Nombre del Empleado</b></label>
                                <input type="text" class="form-control" id="nombreE" name="nombreE" value="{{ $empleado->nombreE }}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="apellidoE"><b>Apellido del Empleado</b></label>
                                <input type="text" class="form-control" id="apellidoE" name="apellidoE" value="{{ $empleado->apellidoE }}">
                            </div>
                        </div>
                       <div class="col-md-12">
                           <div class="form-group">
                               <label for="rol_empleado"><b>Rol del Empleado</b></label>
                               <input type="text" class="form-control" id="rol_empleado" name="rol_empleado" value="{{ $empleado->rol_empleado }}">
                           </div>
                       </div>
                       <div class="col-md-12">
                           <div class="form-group">
                               <label for="nroContacto"><b>Numero de contacto del Empleado</b></label>
                               <input type="text" class="form-control" id="nroContacto" name="nroContacto" value="{{ $empleado->nroContacto }}">
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