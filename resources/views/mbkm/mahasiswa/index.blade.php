@extends('layouts.main')

@php
    use Carbon\Carbon;
    $currentMbkm = $mbkm->first();
@endphp

@section('title')
    SITEI MBKM | Usulan MBKM
@endsection

@section('sub-title')
    Usulan MBKM
@endsection

@section('content')
    @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('message') }}
        </div>
    @endif


    <div class="container-fluid">
        @if ($mbkm->count() > 0)
            @if ($currentMbkm)
                <div class="card card-timeline px-2 border-none">
                    <h5 class="text-center">
                        <ul class="bs4-order-tracking my-5">
                            @if ($currentMbkm->status == 'Usulan')
                                <li class="step">
                                    <div>
                                        <i class="fas"></i>
                                    </div>
                                    <p class="mt-3">USULAN MBKM</p>
                                </li>
                                <li class="step">
                                    <div><i class="fas "></i>
                                    </div>
                                    <p class="mt-3">UPLOAD SERTIFIKAT DAN NILAI</p>
                                </li>
                                <li class="step">
                                    <div><i class="fas "></i>
                                    </div>
                                    <p class="mt-3"> KONVERSI NILAI </p>
                                </li>
                                <li class="step">
                                    <div><i class="fas fa-truc"></i>
                                    </div>
                                    <p class="mt-3"> SELESAI PROGRAM </p>
                                </li>
                                {{-- satu terima --}}
                            @elseif ($currentMbkm->status == 'Disetujui')
                                <li class="step active">
                                    <div>
                                        <i class="fas"></i>
                                    </div>
                                    <p class="mt-3"> USULAN MBKM</p>
                                </li>
                                <li class="step">
                                    <div><i class="fas "></i>
                                    </div>
                                    <p class="mt-3">UPLOAD SERTIFIKAT DAN NILAI</p>
                                </li>
                                <li class="step">
                                    <div><i class="fas "></i>
                                    </div>
                                    <p class="mt-3"> KONVERSI NILAI </p>
                                </li>
                                <li class="step">
                                    <div><i class="fas fa-truc"></i>
                                    </div>
                                    <p class="mt-3"> SELESAI PROGRAM </p>
                                </li>
                            @elseif ($currentMbkm->status == 'Ditolak')
                                <li class="step aktip">
                                    <div>
                                        <i class="fas"></i>
                                    </div>
                                    <p class="mt-3"> USULAN MBKM</p>
                                </li>
                                <li class="step">
                                    <div><i class="fas "></i>
                                    </div>
                                    <p class="mt-3">UPLOAD SERTIFIKAT DAN NILAI</p>
                                </li>
                                <li class="step">
                                    <div><i class="fas "></i>
                                    </div>
                                    <p class="mt-3"> KONVERSI NILAI </p>
                                </li>
                                <li class="step">
                                    <div><i class="fas fa-truc"></i>
                                    </div>
                                    <p class="mt-3"> SELESAI PROGRAM </p>
                                </li>
                                {{-- 2 diterima --}}
                            @elseif ($currentMbkm->status == 'Usulan konversi nilai')
                                <li class="step active">
                                    <div>
                                        <i class="fas"></i>
                                    </div>
                                    <p class="mt-3"> USULAN MBKM</p>
                                </li>
                                <li class="step active">
                                    <div><i class="fas "></i>
                                    </div>
                                    <p class="mt-3">UPLOAD SERTIFIKAT DAN NILAI</p>
                                </li>
                                <li class="step">
                                    <div><i class="fas "></i>
                                    </div>
                                    <p class="mt-3"> KONVERSI NILAI </p>
                                </li>
                                <li class="step">
                                    <div><i class="fas fa-truc"></i>
                                    </div>
                                    <p class="mt-3"> SELESAI PROGRAM </p>
                                </li>
                            @elseif ($currentMbkm->status == 'Konversi Ditolak')
                                <li class="step active">
                                    <div>
                                        <i class="fas"></i>
                                    </div>
                                    <p class="mt-3"> USULAN MBKM</p>
                                </li>
                                <li class="step aktip">
                                    <div><i class="fas "></i>
                                    </div>
                                    <p class="mt-3">UPLOAD SERTIFIKAT DAN NILAI</p>
                                </li>
                                <li class="step">
                                    <div><i class="fas "></i>
                                    </div>
                                    <p class="mt-3"> KONVERSI NILAI </p>
                                </li>
                                <li class="step">
                                    <div><i class="fas fa-truc"></i>
                                    </div>
                                    <p class="mt-3"> SELESAI PROGRAM </p>
                                </li>
                            @elseif ($currentMbkm->status == 'Konversi diterima')
                                <li class="step active">
                                    <div>
                                        <i class="fas"></i>
                                    </div>
                                    <p class="mt-3"> USULAN MBKM</p>
                                </li>
                                <li class="step active">
                                    <div><i class="fas "></i>
                                    </div>
                                    <p class="mt-3">UPLOAD SERTIFIKAT DAN NILAI</p>
                                </li>
                                <li class="step active">
                                    <div><i class="fas "></i>
                                    </div>
                                    <p class="mt-3"> KONVERSI NILAI </p>
                                </li>
                                <li class="step ">
                                    <div><i class="fas "></i>
                                    </div>
                                    <p class="mt-3"> SELESAI PROGRAM </p>
                                </li>
                            @elseif ($currentMbkm->status == 'Nilai sudah keluar')
                                <li class="step active">
                                    <div>
                                        <i class="fas"></i>
                                    </div>
                                    <p class="mt-3"> USULAN MBKM</p>
                                </li>
                                <li class="step active">
                                    <div><i class="fas "></i>
                                    </div>
                                    <p class="mt-3">UPLOAD SERTIFIKAT DAN NILAI</p>
                                </li>
                                <li class="step active">
                                    <div><i class="fas "></i>
                                    </div>
                                    <p class="mt-3"> KONVERSI NILAI </p>
                                </li>
                                <li class="step active">
                                    <div><i class="fas fa-truc"></i>
                                    </div>
                                    <p class="mt-3"> SELESAI PROGRAM </p>
                                </li>
                            @else
                                <li class="step">
                                    <div>
                                        <i class="fas"></i>
                                    </div>
                                    <p class="mt-3"> USULAN MBKM</p>
                                </li>
                                <li class="step">
                                    <div><i class="fas "></i>
                                    </div>
                                    <p class="mt-3">UPLOAD SERTIFIKAT DAN NILAI</p>
                                </li>
                                <li class="step">
                                    <div><i class="fas "></i>
                                    </div>
                                    <p class="mt-3"> KONVERSI NILAI </p>
                                </li>
                                <li class="step">
                                    <div><i class="fas fa-truc"></i>
                                    </div>
                                    <p class="mt-3"> SELESAI PROGRAM </p>
                                </li>
                            @endif
                        </ul>
                        <div class="row biru mb-4">
                            <div class="col">
                                <span class="mt-3 "> Tanggal Diterima <br></span>
                                <span class="mt-3  text-warning">{{ $currentMbkm->batas }}</span>
                            </div>
                            <div class="col"><span class="mt-1 text"> Batas Unggah <br></span>
                                <strong class="mt-3 text-danger">Akhir Program<strong class="text-bold"
                                        id="#"></strong><br></strong>
                            </div>
                            <div class="col"><span class="mt-1 text">Status Konversi <br></span>
                                <strong class="mt-3 text-warning">Proses Konversi<strong class="text-bold"
                                        id="#"></strong><br></strong>
                            </div>
                        </div>
                    </h5>
                </div>
            @endif
        @endif
        @if (!$mbkm->pluck('status')->contains('Disetujui'))
            <button type="button" class="btn btn-success float-left mt-4 " data-toggle="modal"
                data-target="#staticBackdrop">
                Tambah Usulan
            </button>
            <br>
            <br>
            <br>
        @else
            @if ($currentMbkm)
                <a href="{{ route('mbkm.logbook', $currentMbkm->id) }}" class="btn btn-success my-3">
                    Logbook
                </a>
            @endif
        @endif

        <div class="card p-4">
            <ul class="breadcrumb col-lg-12">
                <li>
                    <a href="#" class="breadcrumb-item active fw-bold text-success px-1">
                        Usulan
                    </a>
                </li>
                <span class="px-2">|</span>
                <li>
                    <a href="{{ route('mbkm.riwayat') }}" class="px-1">
                        Riwayat
                    </a>
                </li>
            </ul>
            <table class="table table-responsive-lg table-bordered table-striped" width="100%" id="datatables">
                <thead class="table-dark">
                    <tr>
                        <th class="text-center">NIM</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Periode Semester</th>
                        <th class="text-center">Jenis MBKM</th>
                        <th class="text-center">Lokasi MBKM</th>
                        <th class="text-center">Judul MBKM</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Alasan</th>
                        <th class="text-center">Periode Kegiatan</th>
                        <th class="text-center">Batas Waktu</th>
                        <th class="text-center px-5">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mbkm as $km)
                        <tr>
                            <td class="text-center">{{ $km->mahasiswa->nim }}</td>
                            <td class="text-center">{{ $km->mahasiswa->nama }}</td>
                            <td class="text-center">{{ $km->periode_mbkm }}</td>
                            <td class="text-center">{{ $km->program->name }}</td>
                            <td class="text-center">{{ $km->perusahaan }}</td>
                            <td class="text-center ">{{ $km->judul }}</td>

                            @if ($km->status == 'Nilai sudah keluar')
                                <td class="text-center bg-success">{{ $km->status }}</td>
                            @elseif($km->status == 'Ditolak')
                                <td class="text-center bg-danger">{{ $km->status }}</td>
                            @elseif($km->status == 'Konversi Ditolak')
                                <td class="text-center bg-danger">{{ $km->status }}</td>
                            @else
                                <td class="text-center bg-warning">{{ $km->status }}</td>
                            @endif

                            <td class="text-center">{{ $km->catatan }}</td>
                            <td class="text-center">
                                {{ Carbon::parse($km->mulai_kegiatan)->translatedFormat('d/m/Y') .
                                    ' - ' .
                                    Carbon::parse($km->selesai_kegiatan)->translatedFormat('d/m/Y') }}
                            </td>
                            <td class="text-center text-danger text-bold">{{ $km->batas }}</td>

                            <td class="text-center"style="width: 56px">
                                <div class="row row-cols-2 justify-content-center">
                                    <div>
                                        <a href="{{ route('mbkm.detail', $km->id) }}" class="badge btn btn-info p-1 mb-1"
                                            data-bs-toggle="tooltip" title="Lihat Detail"><i
                                                class="fas fa-info-circle"></i></a>
                                    </div>
                                    @switch($km->status)
                                        @case('Usulan')
                                            <form action="{{ route('mbkm.destroy', $km->id) }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="badge btn btn-danger p-1.5 mb-2">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>
                                        @break

                                        @case('Disetujui')
                                            <div>
                                                <a href="{{ route('mbkm.undurdiri', $km->id) }}" class="badge btn-danger"
                                                    data-bs-toggle="tooltip" title="Usulan pengunduran diri">
                                                    <i class="fa-solid fa-file-circle-xmark"></i>
                                                </a>
                                            </div>
                                            <div>
                                                <a href="{{ route('mbkm.sertif.create', $km->id) }}" class="badge  "
                                                    data-bs-toggle="tooltip" title="Unggah Sertifikat"><img height="25"
                                                        width="25" src="/assets/img/add.png" alt="..."
                                                        class="zoom-image"></a>
                                            </div>
                                            <form action="{{ route('mbkm.uploaded', $km->id) }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                <button type="submit" class="badge btn btn-info p-1 mb-1"><i
                                                        class="fas fa-check" title="Ajukan Konversi"></i></button>
                                            </form>
                                        @break

                                        @default
                                    @endswitch
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>


            </table>
        </div>
    </div>
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Usulan MBKM</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('mbkm.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div>
                            <div class="row">
                                <div class="col-6-lg">
                                    <div class="mb-3 field">
                                        <input type="hidden" name="prodi_id" value="3">
                                        <input type="hidden" name="konsentrasi_id" value="4">

                                        <div class="mb-3 field">
                                            <label class="form-label">Periode (Ganjil 2023)</label>
                                            <input type="text" id="periode_mbkm" name="periode_mbkm"
                                                class="form-control " required>

                                        </div>
                                        <label for="program" class="form-label">Program MBKM</label>
                                        <select id="program_id" name="program_id" class="form-select" required>
                                            @foreach ($program as $pro)
                                                <option value="{{ $pro->id }}">{{ $pro->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3 field">
                                        <label class="form-label">Lokasi (Perusahaan/Instansi)</label>
                                        <input type="text" id="perusahaan" name="perusahaan" class="form-control "
                                            required>

                                    </div>
                                    <div class="mb-3 field">
                                        <label class="form-label">Alamat Perusahaan/Instansi</label>
                                        <input type="text" id="alamat" name="alamat" class="form-control "
                                            required>

                                    </div>
                                    <div class="mb-3 field">
                                        <label class="form-label">Bidang Usaha</label>
                                        <input type="text" id="bidang_usaha" name="bidang_usaha"
                                            class="form-control " required>

                                    </div>
                                    <div class="mb-3 field">
                                        <label class="form-label">Judul Kegiatan</label>
                                        <input type="text" id="judul" name="judul" class="form-control"
                                            required>
                                    </div>
                                    <div class="mb-3 field">
                                        <label for="formFile" class="form-label">Rincian Kegiatan (PDF)</label>
                                        <input class="form-control @error('rincian') is-invalid @enderror" type="file"
                                            accept=".jpg, .png, .pdf" id="rincian" name="rincian" required>
                                    </div>
                                    <div class="mb-3 field">
                                        <label class="form-label">Periode Kegiatan</label>
                                        <div class="d-flex align-items-center" style="gap: 8px">
                                            <input type="date" id="mulai_kegiatan" name="mulai_kegiatan"
                                                class="form-control " required>
                                            <span>-</span>
                                            <input type="date" id="selesai_kegiatan" name="selesai_kegiatan"
                                                class="form-control " required>
                                        </div>
                                    </div>
                                    <div class="mb-3 field">
                                        <label class="form-label">Batas Waktu Penawaran</label>
                                        <input type="date" id="batas" name="batas" class="form-control ">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success float-right mt-4">Usulkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    <section class="bg-dark p-1">
        <div class="container d-flex justify-content-center">
            <p class="developer">Dikembangkan oleh Prodi Teknik Informatika UNRI
                (
                <a class="text-success fw-bold" href="https://pangidoannsh.vercel.app" target="_blank">
                    Muhammad Abdullah Qosim
                </a>,
                <a class="text-success fw-bold" href="https://pangidoannsh.vercel.app" target="_blank">
                    Ilmi Fajar Ramadhan
                </a>,dan
                <a class="text-success fw-bold" href="https://pangidoannsh.vercel.app" target="_blank">
                    Fitra Ramadhan
                </a>
                )
            </p>
        </div>
    </section>
@endsection
