@extends('adminlte::page')

@section('title', 'Users')

@section('content_header')
    <h1 class="m-0 text-dark">Data Pengguna</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-end">
                        <div class="d-flex justify-content-end">
                        {{-- tombol/modal dari partial --}}
                        @include('users._form')
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>NO</th>
                            <th>Nama Lengkap</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>

                        @php
                            $no = 1;
                        @endphp

                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEditUser">
                                    <i class="fas fa-edit"></i> Edit
                                </button>
                                @include('users._edit_modal')

                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-danger">
                                      <i class="fas fa-trash"></i> Hapus
                                  </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>
@stop
