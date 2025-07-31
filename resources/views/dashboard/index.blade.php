@extends('layouts.master')

@section('content_header')
    <h1 class="m-0 text-dark">DASHBOARD</h1>
@endsection

@section('content_title', 'DASHBOARD') {{-- Kalau dipakai di breadcrumb --}}

@section('content')
    <h1>Selamat Datang, {{ auth()->user()->name }}</h1>
@endsection
