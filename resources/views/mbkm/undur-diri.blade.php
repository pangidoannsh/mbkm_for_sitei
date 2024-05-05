@extends('layouts.main')
@php
    use Carbon\Carbon;
@endphp
@section('title')
    Usulan Pengunduran Diri | SIA ELEKTRO
@endsection

@section('sub-title')
    Usulan Pengunduran Diri
@endsection

@section('content')
    <div class="container-fluid">
        <a href="{{ url()->previous() }}" class="badge bg-success p-2 mb-3 "> Kembali <a>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-bold">Data MBKM</h5>
                    <hr>
                    <p class="card-title text-secondary text-sm ">Judul</p>
                    <p class="card-text text-start">{{ $mbkm->judul }}</p>
                    <p class="card-title text-secondary text-sm ">Lokasi</p>
                    <p class="card-text text-start">{{ $mbkm->perusahaan }}
                        <span class="text-secondary" style="font-size: 12px">({{ $mbkm->alamat }})</span>
                    </p>
                    <p class="card-title text-secondary text-sm ">Bidang Usaha/Kegiatan</p>
                    <p class="card-text text-start">{{ $mbkm->bidang_usaha }}</p>
                    <p class="card-title text-secondary text-sm ">Periode Kegiatan</p>
                    <p class="card-text text-start">
                        {{ Carbon::parse($mbkm->mulai_kegiatan)->translatedFormat('d F Y') .
                            ' - ' .
                            Carbon::parse($mbkm->selesai_kegiatan)->translatedFormat('d F Y') }}
                    </p>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <form action="{{ route('mbkm.undurdiri.store', $mbkm->id) }}" id="form" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('post')
                <div class="mb-3">
                    <label for="file" class="form-label">Surat Pengunduran Diri</label>
                    <input class="form-control @error('file') is-invalid @enderror" type="file" accept=".jpg, .png, .pdf"
                        id="file" name="file" required>
                </div>
                <div>
                    <label for="alasan">Alasan Pengunduran Diri</label>
                    <textarea name="alasan" id="alasan" rows="4" class="form-control" required></textarea>
                </div>
                <div class="d-flex justify-content-end mt-3">
                    <button class="btn btn-danger">Ajukan Pengunduran Diri</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $('#form').submit((e) => {
            const form = $(this).closest("form");
            e.preventDefault();
            Swal.fire({
                title: 'Usulan Pengunduran Diri',
                text: 'Apakah anda yakin mengajukan pengunduran diri?',
                icon: 'question',
                showCancelButton: true,
                cancelButtonText: 'Batal',
                confirmButtonText: 'Ajukan',
                confirmButtonColor: '#dc3545'
            }).then((result) => {
                if (result.isConfirmed) {
                    e.currentTarget.submit()
                }
            })
        })
    </script>
@endpush
