@extends('adminlte::page')

@section('title', 'User Dashboard')

{{-- Override Navbar --}}
@section('navbar')
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Custom navbar untuk user -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" >Home</a>
        </li>
    </ul>
</nav>
@endsection

{{-- Bisa override section lain juga --}}
@section('content_header')
    <h1>Halo, Pengguna!</h1>
@endsection

@section('content')
    <p>Ini dashboard pengguna.</p>
@endsection
