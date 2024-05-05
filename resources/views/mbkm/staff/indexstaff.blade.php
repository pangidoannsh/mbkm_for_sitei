@extends('layouts.main')

@php
    Use Carbon\Carbon;
@endphp

@section('title')
    SITEI MBKM | Daftar Mahasiswa
@endsection

@section('sub-title')
    Mahasiswa
@endsection

@section('content')

<a href="{{route('staff.createstaff')}}" class="btn mahasiswa btn-success mb-3">+ Staff</a>
<div class="container card p-4">

    <div class="container-fluid">
        <table class="table table-responsive-lg table-bordered " width="100%" id="datatables">
            <thead class="table-dark">
            <tr>
                <th class="text-center" scope="col">#</th>
                <th class="text-center" scope="col">Username</th>
                <th class="text-center" scope="col">Nama</th>
                <th class="text-center" scope="col">Email</th>
                <th class="text-center" scope="col">Jabatan</th>
                <th class="text-center" scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $user)
                    <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td class="text-center">{{$user->username}}</td>
                    <td class="text-center">{{$user->nama}}</td>
                    <td class="text-center">{{$user->email}}</td>
                    <td class="text-center">{{$user->role->role_akses}}</td>
                    <td class="text-center">
                        <a href="/staff/user/edit/{{$user->id}}" class="badge bg-warning"><i class="fas fa-pen"></i></a>
                        <a href="#ModalDelete" data-toggle="modal" class="badge bg-danger"><i class="fas fa-trash"></i></a>
                    </td>
                    </tr>

                            <div class="modal fade" id="ModalDelete">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Apakah Anda Yakin?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Data Yang Dihapus Tidak Akan Kembali!</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                            <form action="/staff/user/{{$user->id}}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-success">Yakin</button>
                            </form>
                        </div>
                        </div>
                    </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

