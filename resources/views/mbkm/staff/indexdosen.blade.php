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

<a href="{{route('staff.createdsn')}}" class="btn mahasiswa btn-success mb-3">+ Dosen</a>
<div class="container card p-4">

    <div class="container-fluid">
        <table class="table table-responsive-lg table-bordered " width="100%" id="datatables">
            <thead class="table-dark">
                <tr>
                    <th class="text-center" scope="col">#</th>
                    <th class="text-center" scope="col">NIP</th>
                    <th class="text-center" scope="col">Nama</th>
                    <th class="text-center" scope="col">Email</th>
                    <th class="text-center" scope="col">Jabatan</th>
                    <th class="text-center" scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($dosen as $dosen)
                      <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$dosen->nip}}</td>
                        <td>{{$dosen->nama}}</td>
                        <td>{{$dosen->email}}</td>
                        {{-- @if ($dosen->role_id === null)
                        <td> - </td>
                        @endif --}}
                        {{-- @if($dosen->role_id) --}}
                        <td>{{$dosen->role->role_akses}}</td>
                        {{-- @endif --}}
                        <td>
                          <a href="/staff/dosen/edit/{{$dosen->id}}" class="badge bg-warning"><i class="fas fa-pen"></i></a>
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
                              <form action="/staff/dosen/{{$dosen->id}}" method="POST" class="d-inline">
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


