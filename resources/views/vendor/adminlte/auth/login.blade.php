@extends('adminlte::auth.auth-page', ['authType' => 'login'])

@section('css')
        <style>
        /* Fondo general y centrado */
        .login-page, .register-page, .lockscreen-page {
            background-color: #eef2f6 !important;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 30px;
        }

        /* Tarjeta grande y minimalista */
        .login-card-body {
            background: #ffffff;
            border-radius: 20px;
            box-shadow: 0 16px 48px rgba(0,0,0,0.08);
            padding: 3.5rem;
            width: 100%;
            max-width: 800px;         /* ancho aumentado */
            position: relative;
            overflow: hidden;
            transition: transform .2s, box-shadow .2s;
        }
        .login-card-body:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 64px rgba(0,0,0,0.12);
        }

        /* Logo y título */
        .login-logo, .login-logo a {
            font-size: 2.25rem;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 2rem;
            text-align: center;
            display: block;
        }

        /* Encabezado de auth */
        .auth-header {
            font-size: 1.5rem;
            font-weight: 600;
            text-align: center;
            margin-bottom: 2rem;
            color: #2d3748;
        }

        /* Inputs más grandes y limpios */
        .login-card-body .form-control {
            border-radius: 10px;
            border: 2px solid #d1d5db;
            padding: 2rem 1.25rem;
            font-size: 1rem;
            /* width: 100%; */
            background-color: #fafbfc;
            transition: border-color .2s, box-shadow .2s;
        }
        .login-card-body .form-control:focus {
            border-color: #3182ce;
            box-shadow: 0 0 0 4px rgba(49,130,206,0.15);
            background-color: #ffffff;
        }

        /* Iconos de campo */
        .input-group-text {
            background: #9bb4c5ff;
            border: solid 2px #d1d5db;
            padding: 0 0.75rem;
            color: #718096;
        }

        /* Botón principal ampliado */
        .login-card-body .btn-primary {
            background-color: #3182ce;
            border: none;
            border-radius: 6px;
            padding: 1rem 0;
            font-size: 1.1rem;
            font-weight: 600;
            width: 150%;
            transition: background-color .2s, transform .2s;
            margin-top: 1.5rem;
            /* forzar desplazamiento a la izquierda */
            transform: translateX(-25%);
        }
        .login-card-body .btn-primary:hover {
            background-color: #2b6cb0;
            transform: translateY(-2px);
        }

        /* Enlaces secundarios centrados */
        .login-card-body p.mb-0 {
            text-align: center;
            margin-top: 1.5rem !important;
            font-size: 0.9rem;
        }
        .login-card-body a {
            color: #3182ce;
            text-decoration: none;
            transition: color .2s;
        }
        .login-card-body a:hover {
            color: #2b6cb0;
        }

        @media (max-width: 768px) {
            .login-card-body {
                padding: 2.5rem;
            }
        }
    </style>
@stop

@section('adminlte_css_pre')
    <link rel="stylesheet" href="{{ asset('vendor/icheck-bootstrap/icheck-bootstrap.min.css') }}">
@stop

@php
    $loginUrl = View::getSection('login_url') ?? config('adminlte.login_url', 'login');
    $registerUrl = View::getSection('register_url') ?? config('adminlte.register_url', 'register');
    $passResetUrl = View::getSection('password_reset_url') ?? config('adminlte.password_reset_url', 'password/reset');

    if (config('adminlte.use_route_url', false)) {
        $loginUrl = $loginUrl ? route($loginUrl) : '';
        $registerUrl = $registerUrl ? route($registerUrl) : '';
        $passResetUrl = $passResetUrl ? route($passResetUrl) : '';
    } else {
        $loginUrl = $loginUrl ? url($loginUrl) : '';
        $registerUrl = $registerUrl ? url($registerUrl) : '';
        $passResetUrl = $passResetUrl ? url($passResetUrl) : '';
    }
@endphp

@section('auth_header', __('Iniciar sesión'))



<!-- @section('auth_footer')
    {{-- Password reset link --}}
    @if($passResetUrl)
        <p class="my-0">
            <a href="{{ $passResetUrl }}">
                {{ __('adminlte::adminlte.i_forgot_my_password') }}
            </a>
        </p>
    @endif

    {{-- Register link --}}
    @if($registerUrl)
        <p class="my-0">
            <a href="{{ $registerUrl }}">
                {{ __('adminlte::adminlte.register_a_new_membership') }}
            </a>
        </p>
    @endif
@stop -->
