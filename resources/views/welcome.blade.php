@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <style>
        [class*=sidebar-dark-] {
            background-color: #26375eff;
        }
    </style>
    <h1>Dashboard</h1>
@stop

@section('content')
    <p> WELCOME PAGE </p>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop