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
<div class="row" style="justify-content: center">
    <div class="col-md-10">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"> Datos del Proveedor </h3>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="display: block;">
                <form action="{{url('/admin/proveedores/create')}}" method="POST">
                    @csrf   <!-- token -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="idProveedor"><b>ID Proveedor</b></label>
                                <!-- <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-tags"></i></span>
                                    </div>
                                </div> -->
                                <input type="text" class="form-control" id="idProveedor" name="idProveedor" placeholder="Ingrese el ID del proveedor">
                            </div>
                            @error('idProveedor')
                                <small style='color: red'> {{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nombreProv"><b>Nombre del Proveedor</b></label>
                                <input type="text" class="form-control" id="nombreProv" name="nombreProv" placeholder="Ingrese el nombre del proveedor">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="tipo"><b>Tipo del Proveedor</b></label>
                                <input type="text" class="form-control" id="tipo" name="tipo" placeholder="Ingrese el tipo del proveedor">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nroContacto"><b>Número de Contacto</b></label>
                                <input type="number" class="form-control" id="nroContacto" name="nroContacto" placeholder="Ingrese el número de contacto">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="ubicacion"><b>Ubicación</b></label>
                                <input type="text" class="form-control" id="ubicacion" name="ubicacion" placeholder="Ingrese la ubicación">
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