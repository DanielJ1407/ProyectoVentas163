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
    <div class="col-md-8">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"> Datos del Proveedor </h3>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="display: block;">
                
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="idProveedor"><b>ID del Proveedor</b></label>
                                <input type="text" class="form-control" id="idProveedor" name="idProveedor" placeholder="Ingrese el ID del proveedor" value = "{{ $proveedor->idProveedor }}" readonly>
                            </div>
                            @error('idProveedor')
                                <small style='color: red'> {{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nombreProv"><b>Nombre del Proveedor</b></label>
                                <input type="text" class="form-control" id="nombreProv" name="nombreProv" placeholder="Ingrese el nombre del proveedor" value = "{{ $proveedor->nombreProv }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="tipo"><b>Tipo del Proveedor</b></label>
                                <input type="text" class="form-control" id="tipo" name="tipo" placeholder="Ingrese el tipo del proveedor" value = "{{ $proveedor->tipo }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nroContacto"><b>Número de Contacto</b></label>
                                <input type="number" class="form-control" id="nroContacto" name="nroContacto" placeholder="Ingrese el número de contacto" value = "{{ $proveedor->nroContacto }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="ubicacion"><b>Ubicación</b></label>
                                <input type="text" class="form-control" id="ubicacion" name="ubicacion" placeholder="Ingrese la ubicación" value = "{{ $proveedor->ubicacion }}" readonly>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="col-md-10">
                        <div class="form-group">
                            <a href="{{url('/admin/proveedores')}}"> Volver </a>
                        </div>
                    </div>
                </form>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
    </div>
        <div class="col-md-8">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"> Productos del Proveedor </h3>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="display: block;">
                @if($proveedor->productos->count() > 0)
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID Producto</th>
                                <th>Nombre</th>
                                <th>Precio Unitario</th>
                                <th>Marca</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($proveedor->productos as $producto)
                                <tr>
                                    <td>{{ $producto->idProducto }}</td>
                                    <td>{{ $producto->nombre_producto }}</td>
                                    <td>{{ $producto->precio_unitario }}</td>
                                    <td>{{ $producto->marca }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p>Este proveedor no tiene productos asociados.</p>
                @endif
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