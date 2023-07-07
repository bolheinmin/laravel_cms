@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    {{-- Breadcrumb Start --}}
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
        </ol>
    </nav>
    {{-- Breadcrumb End --}}
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>
    <a href="{{ route('create_department') }}">Create Department</a>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop