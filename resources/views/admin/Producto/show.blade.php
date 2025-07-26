@extends('adminlte::page')

@section('content_header')
    <nav aria-label="breadcrumb" style = "font-size: 18pt">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/admin')}}">INICIO</a></li>
        <!-- <li class="breadcrumb-item"><a href="{{url('/admin/productos')}}">Productos</a></li>
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
                <h3 class="card-title"> Datos del Producto </h3>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="display: block;">
                
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="idProducto"><b>ID Producto</b></label>
                                <input type="text" class="form-control" id="idProducto" name="idProducto" value = "{{ $producto->idProducto }}" placeholder="Ingrese el ID del producto" readonly>
                            </div>
                            @error('idProducto')
                                <small style='color: red'> {{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nombre_producto"><b>Nombre del Producto</b></label>
                                <input type="text" class="form-control" id="nombre_producto" name="nombre_producto" value="{{ $producto->nombre_producto }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="precio_unitario"><b>Precio Unitario</b></label>
                                <input type="number" class="form-control" id="precio_unitario" name="precio_unitario" value = "{{ $producto->precio_unitario }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="marca"><b>marca</b></label>
                                <input type="text" class="form-control" id="marca" name="marca" placeholder="Ingrese la marca del producto" value = "{{ $producto->marca }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="tipo"><b>Tipo del Producto</b></label>
                                <input type="text" class="form-control" id="tipo" name="tipo" placeholder="Ingrese el tipo del producto" value = "{{ $producto->tipo }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="color"><b>Color del Producto</b></label>
                                <input type="text" class="form-control" id="color" name="color" value = "{{ $producto->color }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="Talla"><b>Talla del Producto</b></label>
                                <input type="text" class="form-control" id="Talla" name="talla" value = "{{ $producto->talla }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="Modelo"><b>Modelo del Producto</b></label>
                                <input type="text" class="form-control" id="Modelo" name="modelo" value = "{{ $producto->modelo }}"  readonly>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="Stock"><b>Stock del Producto</b></label>
                                <input type="number" class="form-control" id="Stock" name="stock" value = "{{ $producto->stock }}"  readonly>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="col-md-10">
                        <div class="form-group">
                            <a href="{{url('/admin/Productos')}}"> Volver </a>
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