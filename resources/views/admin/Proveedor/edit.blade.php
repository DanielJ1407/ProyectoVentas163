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
<div class="row" style="justify-content: center">
    <div class="col-md-10">
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title"> Editar datos del Proveedor </h3>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="display: block;">
                <form action="{{url('/admin/proveedores/'.$proveedor->idProveedor)}}" method="POST">
                    @csrf   <!-- token -->
                    @method('PUT') <!-- Método para actualizar -->
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="idProveedor"><b>ID del Proveedor</b></label>
                                <input type="text" class="form-control" id="idProveedor" name="idProveedor" placeholder="Ingrese el ID del proveedor" value = "{{ $proveedor->idProveedor }}">
                            </div>
                            @error('idProveedor')
                                <small style='color: red'> {{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nombreProv"><b>Nombre del Proveedor</b></label>
                                <input type="text" class="form-control" id="nombreProv" name="nombreProv" placeholder="Ingrese el nombre del proveedor" value = "{{ $proveedor->nombreProv }}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="tipo"><b>Tipo del Proveedor</b></label>
                                <input type="text" class="form-control" id="tipo" name="tipo" placeholder="Ingrese el tipo del proveedor" value = "{{ $proveedor->tipo }}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nroContacto"><b>Número de Contacto</b></label>
                                <input type="number" class="form-control" id="nroContacto" name="nroContacto" placeholder="Ingrese el número de contacto" value = "{{ $proveedor->nroContacto }}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="ubicacion"><b>Ubicación</b></label>
                                <input type="text" class="form-control" id="ubicacion" name="ubicacion" placeholder="Ingrese la ubicación" value = "{{ $proveedor->ubicacion }}">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="col-md-10">
                        <div class="form-group" style="justify-content: center">
                            <a href="{{url('/admin/proveedores')}}">Cancelar</a>
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