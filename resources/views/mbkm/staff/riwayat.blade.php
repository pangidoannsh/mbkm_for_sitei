@extends('layouts.main')

@php
    use Carbon\Carbon;
@endphp

@section('title')
    SITEI MBKM | MBKM Staff
@endsection

@section('sub-title')
    MBKM Mahasiswa Staff
@endsection

@section('content')
    <div class="container card p-4">
        <ol class="breadcrumb col-lg-12">
            <li class="breadcrumb-item"><a class="breadcrumb-item " href="{{ route('staff') }}">MBKM</a></li>
            <li class="breadcrumb-item"><a class="breadcrumb-item active fw-bold text-black" href="#">Riwayat</a></li>
        </ol>
        <div class="container-fluid">
            <table class="table table-responsive-lg table-bordered " id="datatables">
                <thead class="table-dark">
                    <tr>
                        <th class="text-center" scope="col">NO</th>
                        <th class="text-center" scope="col">NIM</th>
                        <th class="text-center" scope="col">Nama</th>
                        <th class="text-center" scope="col">Periode Semester</th>
                        <th class="text-center" scope="col">Jenis MBKM</th>
                        <th class="text-center" scope="col">Lokasi MBKM</th>
                        <th class="text-center" scope="col">Judul MBKM</th>
                        <th class="text-center" scope="col">Status</th>
                        <th class="text-center" scope="col">Periode Kegiatan</th>
                        <th class="text-center px-5" scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mbkm as $km)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $km->mahasiswa->nim }}</td>
                            <td class="text-center" style="overflow: hidden">
                                <div class="ellipsis-2">
                                    {{ $km->mahasiswa->nama }}
                                </div>
                            </td>
                            <td class="text-center">{{ $km->periode_mbkm }}</td>
                            <td class="text-center">{{ $km->program->name }}</td>
                            <td class="text-center">{{ $km->perusahaan }}</td>
                            <td class="text-center" style="overflow: hidden">
                                <div class="ellipsis-2">
                                    {{ $km->judul }}
                                </div>
                            </td>
                            @if ($km->status == 'Nilai sudah keluar')
                                <td class="text-center bg-success">{{ $km->status }}</td>
                            @elseif($km->status == 'Ditolak')
                                <td class="text-center bg-danger">{{ $km->status }}</td>
                            @elseif(in_array($km->status, ['Konversi Ditolak', 'Mengundurkan diri']))
                                <td class="text-center bg-danger">{{ $km->status }}</td>
                            @else
                                <td class="text-center bg-warning">{{ $km->status }}</td>
                            @endif
                            <td class="text-center" style="overflow: hidden;">
                                <div class="ellipsis-2">
                                    {{ Carbon::parse($km->mulai_kegiatan)->translatedFormat('d F Y') }} -
                                    {{ Carbon::parse($km->selesai_kegiatan)->translatedFormat('d F Y') }}
                                </div>
                            </td>
                            <td class="text-center">
                                @if ($km->status == 'Konversi diterima')
                                    <form action="{{ route('staff.approve', $km->id) }}" method="POST">
                                        @csrf
                                        <a href="{{ route('mbkm.detail', $km->id) }}" class="badge btn btn-info p-1 mb-1"
                                            data-bs-toggle="tooltip" title="Lihat Detail"><i
                                                class="fas fa-info-circle"></i></a>
                                        <a href="{{ route('pdf', $km->id) }}" target="_blank"
                                            class="badge btn btn-info p-1 mb-1" data-bs-toggle="tooltip"
                                            title="Print Surat Konversi"><i class="fas fa-print"></i></a>
                                        <button type="submit" class="badge btn btn-info p-1 mb-1"><i class="fas fa-check"
                                                title="Selesaikan MBKM"></i></button>
                                    </form>
                                @else
                                    <a href="{{ route('mbkm.detail', $km->id) }}" class="badge btn btn-info p-1 mb-1"
                                        data-bs-toggle="tooltip" title="Lihat Detail"><i class="fas fa-info-circle"></i></a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
