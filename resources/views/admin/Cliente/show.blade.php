@extends('adminlte::page')

@section('content_header')
    <nav aria-label="breadcrumb" style = "font-size: 18pt">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/admin')}}">INICIO</a></li>
        <!-- <li class="breadcrumb-item"><a href="{{url('/admin/Clientes')}}">Clientes</a></li>
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
                <h3 class="card-title"> Datos del Cliente </h3>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="display: block;">
                
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="ci"><b>CI de cliente</b></label>
                                <input type="text" class="form-control" id="ci" name="ci" placeholder="Ingrese el CI del cliente" value="{{ $cliente->ci }}" readonly>
                            </div>
                            @error('ci')
                                <small style='color: red'> {{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nombre"><b>Nombre del cliente</b></label>
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre del cliente" value="{{ $cliente->nombre }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="apellido"><b>Apellido del cliente</b></label>
                                <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Ingrese el apellido del cliente" value="{{ $cliente->apellido }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="correo"><b>correo del cliente</b></label>
                                <input type="text" class="form-control" id="correo" name="correo" placeholder="Ingrese el correo del cliente" value="{{ $cliente->correo }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nit"><b>NIT del cliente</b></label>
                                <input type="text" class="form-control" id="nit" name="nit" placeholder="Ingrese el NIT del cliente"    value="{{ $cliente->nit }}" readonly>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="col-md-10">
                        <div class="form-group">
                            <a href="{{url('/admin/clientes')}}"> Volver </a>
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