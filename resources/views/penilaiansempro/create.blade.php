@extends('layouts.main')

@php
    use Carbon\Carbon;
@endphp

@section('header')
    SITEI | Penilaian Seminar Proposal
@endsection

@section('sub-title')
    Penilaian Seminar Proposal
@endsection

@section('content')

    @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('message') }}
        </div>
    @endif
    <div class="container">
        <a href="/kp-skripsi/seminar-pembimbing-penguji" class="btn btn-success py-1 px-2 mb-3"> <i
                class="fas fa-arrow-left fa-xs"></i> Kembali<a>
    </div>

    <div class="container">
        <div class="row rounded shadow-sm">
            <div class="col-lg-4 col-md-12 bg-white rounded-start px-4 py-3 mb-2">

                <h5 class="text-bold">Mahasiswa</h5>
                <hr>
                <p class="card-title text-secondary text-sm ">Nama</p>
                <p class="card-text  text-start">{{ $sempro->mahasiswa->nama }}</p>
                <p class="card-title text-secondary text-sm ">NIM</p>
                <p class="card-text  text-start">{{ $sempro->mahasiswa->nim }}</p>
                <p class="card-title text-secondary text-sm ">Program Studi</p>
                <p class="card-text  text-start">{{ $sempro->mahasiswa->prodi->nama_prodi }}</p>
                <p class="card-title text-secondary text-sm ">Konsentrasi</p>
                <p class="card-text  text-start">{{ $sempro->mahasiswa->konsentrasi->nama_konsentrasi }}</p>

            </div>
            <div class="col-lg-4 col-md-12 bg-white  px-4 py-3 mb-2">

                <h5 class="text-bold">Dosen Pembimbing</h5>
                <hr>
                @if ($sempro->pembimbingdua_nip == null)
                    <p class="card-title text-secondary text-sm">Nama</p>
                    <p class="card-text  text-start">{{ $sempro->pembimbingsatu->nama }}</p>
                @elseif($sempro->pembimbingdua_nip !== null)
                    <p class="card-title text-secondary text-sm">Nama Pembimbing 1</p>
                    <p class="card-text  text-start">{{ $sempro->pembimbingsatu->nama ?? '-' }}</p>

                    <p class="card-title text-secondary text-sm">Nama Pembimbing 2</p>
                    <p class="card-text  text-start">{{ $sempro->pembimbingdua->nama }}</p>
                @endif

            </div>
            <div class="col-lg-4 col-md-12 bg-white rounded-end px-4 py-3 mb-2">

                <h5 class="text-bold">Dosen Penguji</h5>
                <hr>

                <p class="card-title text-secondary text-sm">Nama Penguji 1</p>
                <p class="card-text  text-start">{{ $sempro->pengujisatu->nama }}</p>



                <p class="card-title text-secondary text-sm">Nama Penguji 2</p>
                <p class="card-text  text-start">{{ $sempro->pengujidua->nama }}</p>
                @if ($sempro->pengujitiga == !null)
                    <p class="card-title text-secondary text-sm">Nama Penguji 3</p>
                    <p class="card-text  text-start">{{ $sempro->pengujitiga->nama }}</p>
                @endif

            </div>
        </div>
    </div>

    <div class="container">
        <div class="row rounded shadow-sm">
            <div class="col-lg-6 col-md-12 bg-white rounded-start px-4 py-3 mb-2">
                <h5 class="text-bold">Judul Proposal</h5>
                <hr>

                <p class="card-title text-secondary text-sm">Judul</p>
                <p class="card-text text-start">
                    {{ $sempro->revisi_proposal != null ? $sempro->revisi_proposal : $sempro->judul_proposal }}</p>

                <p class="card-title text-secondary text-sm">Proposal</p>
                <p class="card-text  text-start"><a formtarget="_blank" target="_blank"
                        href="{{ asset('storage/' . $proposal->naskah_proposal) }}" class="badge bg-dark px-3 py-2">Buka</a></p>
            </div>
            <div class="col-lg-6 col-md-12 bg-white rounded-end px-4 py-3 mb-2">
                <h5 class="text-bold">Jadwal Seminar Proposal</h5>
                <hr>

                <p class="card-title text-secondary text-sm">Hari/Tanggal</p>
                <p class="card-text text-start">{{ Carbon::parse($sempro->tanggal)->translatedFormat('l, d F Y') }}</p>
                <p class="card-title text-secondary text-sm">Pukul</p>
                <p class="card-text text-start">{{ $sempro->waktu }}</p>
                <p class="card-title text-secondary text-sm">Lokasi</p>
                <p class="card-text text-start">{{ $sempro->lokasi }}</p>
            </div>
        </div>
    </div>



    <div>


        @if (auth()->user()->nip == $sempro->pembimbingsatu_nip || auth()->user()->nip == $sempro->pembimbingdua_nip)
            <div class="card card-success card-tabs">
                <div class="card-header p-0">
                    <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill"
                                href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home"
                                aria-selected="true">Form Nilai</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-one-tabContent">
                        <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel"
                            aria-labelledby="custom-tabs-one-home-tab">
                            <form action="/penilaian-sempro-pembimbing/create/{{ $sempro->id }}" class="simpan-nilai-pembimbing" method="POST">
                                @csrf

                                <div class="mb-3 gridratakiri ">
                                    <label for="penguasaan_dasar_teori" class="col-form-label">1). Penguasaan Dasar
                                        Teori</label>
                                    <div class="radio1 d-inline">
                                        <hr>

                                        <input type="radio"
                                            class="btn-check @error('penguasaan_dasar_teori') is-invalid @enderror"
                                            name="penguasaan_dasar_teori" id="penguasaan_dasar_teori1" value="1.8"
                                            onclick="hasil()"
                                            {{ old('penguasaan_dasar_teori', $sempro->penguasaan_dasar_teori) == '1.8' ? 'checked' : null }} required>
                                        <label class="btn tombol shadow-sm btn-danger fw-normal"
                                            for="penguasaan_dasar_teori1">Sangat Kurang Baik</label>

                                        <input type="radio"
                                            class="btn-check @error('penguasaan_dasar_teori') is-invalid @enderror"
                                            name="penguasaan_dasar_teori" id="penguasaan_dasar_teori2" value="3.6"
                                            onclick="hasil()"
                                            {{ old('penguasaan_dasar_teori', $sempro->penguasaan_dasar_teori) == '3.6' ? 'checked' : null }} required>
                                        <label class="btn tombol shadow-sm btn-warning fw-normal "
                                            for="penguasaan_dasar_teori2">Kurang Baik</label>

                                        <input type="radio"
                                            class="btn-check @error('penguasaan_dasar_teori') is-invalid @enderror"
                                            name="penguasaan_dasar_teori" id="penguasaan_dasar_teori3" value="5.4"
                                            onclick="hasil()"
                                            {{ old('penguasaan_dasar_teori', $sempro->penguasaan_dasar_teori) == '5.4' ? 'checked' : null }} required>
                                        <label class="btn tombol shadow-sm btn-info fw-normal "
                                            for="penguasaan_dasar_teori3">Biasa</label>

                                        <input type="radio"
                                            class="btn-check @error('penguasaan_dasar_teori') is-invalid @enderror"
                                            name="penguasaan_dasar_teori" id="penguasaan_dasar_teori4" value="7.2"
                                            onclick="hasil()"
                                            {{ old('penguasaan_dasar_teori', $sempro->penguasaan_dasar_teori) == '7.2' ? 'checked' : null }} required>
                                        <label class="btn tombol shadow-sm btn-primary fw-normal "
                                            for="penguasaan_dasar_teori4">Baik</label>

                                        <input type="radio"
                                            class="btn-check @error('penguasaan_dasar_teori') is-invalid @enderror"
                                            name="penguasaan_dasar_teori" id="penguasaan_dasar_teori5" value="9"
                                            onclick="hasil()"
                                            {{ old('penguasaan_dasar_teori', $sempro->penguasaan_dasar_teori) == '9' ? 'checked' : null }} required>
                                        <label class="btn tombol shadow-sm btn-success fw-normal "
                                            for="penguasaan_dasar_teori5">Sangat Baik</label>

                                    </div>
                                </div>
                                @error('penguasaan_dasar_teori')
                                    <div class="invalid-feedback">
                                        Error
                                    </div>
                                @enderror

                                <div class="mb-3 gridratakiri">
                                    <label for="tingkat_penguasaan_materi" class="col-form-label">2). Tingkat Penguasaan
                                        Materi</label>
                                    <div class="radio2 d-inline">
                                        <hr>
                                        <input type="radio"
                                            class="btn-check @error('tingkat_penguasaan_materi') is-invalid @enderror"
                                            name="tingkat_penguasaan_materi" id="tingkat_penguasaan_materi1"
                                            value="1.8" onclick="hasil()"
                                            {{ old('tingkat_penguasaan_materi', $sempro->tingkat_penguasaan_materi) == '1.8' ? 'checked' : null }} required>
                                        <label class="btn tombol shadow-sm btn-danger fw-normal "
                                            for="tingkat_penguasaan_materi1">Sangat Kurang Baik</label>

                                        <input type="radio"
                                            class="btn-check @error('tingkat_penguasaan_materi') is-invalid @enderror"
                                            name="tingkat_penguasaan_materi" id="tingkat_penguasaan_materi2"
                                            value="3.6" onclick="hasil()"
                                            {{ old('tingkat_penguasaan_materi', $sempro->tingkat_penguasaan_materi) == '3.6' ? 'checked' : null }} required>
                                        <label class="btn tombol shadow-sm btn-warning fw-normal "
                                            for="tingkat_penguasaan_materi2">Kurang Baik</label>

                                        <input type="radio"
                                            class="btn-check @error('tingkat_penguasaan_materi') is-invalid @enderror"
                                            name="tingkat_penguasaan_materi" id="tingkat_penguasaan_materi3"
                                            value="5.4" onclick="hasil()"
                                            {{ old('tingkat_penguasaan_materi', $sempro->tingkat_penguasaan_materi) == '5.4' ? 'checked' : null }} required>
                                        <label class="btn tombol shadow-sm btn-info fw-normal "
                                            for="tingkat_penguasaan_materi3">Biasa</label>

                                        <input type="radio"
                                            class="btn-check @error('tingkat_penguasaan_materi') is-invalid @enderror"
                                            name="tingkat_penguasaan_materi" id="tingkat_penguasaan_materi4"
                                            value="7.2" onclick="hasil()"
                                            {{ old('tingkat_penguasaan_materi', $sempro->tingkat_penguasaan_materi) == '7.2' ? 'checked' : null }} required>
                                        <label class="btn tombol shadow-sm btn-primary fw-normal "
                                            for="tingkat_penguasaan_materi4">Baik</label>

                                        <input type="radio"
                                            class="btn-check @error('tingkat_penguasaan_materi') is-invalid @enderror"
                                            name="tingkat_penguasaan_materi" id="tingkat_penguasaan_materi5"
                                            value="9" onclick="hasil()"
                                            {{ old('tingkat_penguasaan_materi', $sempro->tingkat_penguasaan_materi) == '9' ? 'checked' : null }} required>
                                        <label class="btn tombol shadow-sm btn-success fw-normal "
                                            for="tingkat_penguasaan_materi5">Sangat Baik</label>

                                    </div>
                                </div>
                                @error('tingkat_penguasaan_materi')
                                    <div class="invalid-feedback">
                                        Error
                                    </div>
                                @enderror

                                <div class="mb-3 gridratakiri">
                                    <label for="tinjauan_pustaka" class="col-form-label">3). Tinjauan Pustaka</label>
                                    <div class="radio3 d-inline">
                                        <hr>

                                        <input type="radio"
                                            class="btn-check @error('tinjauan_pustaka') is-invalid @enderror"
                                            name="tinjauan_pustaka" id="tinjauan_pustaka1" value="1.8"
                                            onclick="hasil()"
                                            {{ old('tinjauan_pustaka', $sempro->tinjauan_pustaka) == '1.8' ? 'checked' : null }} required>
                                        <label class="btn tombol shadow-sm btn-danger fw-normal "
                                            for="tinjauan_pustaka1">Sangat Kurang Baik</label>

                                        <input type="radio"
                                            class="btn-check @error('tinjauan_pustaka') is-invalid @enderror"
                                            name="tinjauan_pustaka" id="tinjauan_pustaka2" value="3.6"
                                            onclick="hasil()"
                                            {{ old('tinjauan_pustaka', $sempro->tinjauan_pustaka) == '3.6' ? 'checked' : null }} required>
                                        <label class="btn tombol shadow-sm btn-warning fw-normal "
                                            for="tinjauan_pustaka2">Kurang Baik</label>

                                        <input type="radio"
                                            class="btn-check @error('tinjauan_pustaka') is-invalid @enderror"
                                            name="tinjauan_pustaka" id="tinjauan_pustaka3" value="5.4"
                                            onclick="hasil()"
                                            {{ old('tinjauan_pustaka', $sempro->tinjauan_pustaka) == '5.4' ? 'checked' : null }} required>
                                        <label class="btn tombol shadow-sm btn-info fw-normal "
                                            for="tinjauan_pustaka3">Biasa</label>

                                        <input type="radio"
                                            class="btn-check @error('tinjauan_pustaka') is-invalid @enderror"
                                            name="tinjauan_pustaka" id="tinjauan_pustaka4" value="7.2"
                                            onclick="hasil()"
                                            {{ old('tinjauan_pustaka', $sempro->tinjauan_pustaka) == '7.2' ? 'checked' : null }} required>
                                        <label class="btn tombol shadow-sm btn-primary fw-normal "
                                            for="tinjauan_pustaka4">Baik</label>

                                        <input type="radio"
                                            class="btn-check @error('tinjauan_pustaka') is-invalid @enderror"
                                            name="tinjauan_pustaka" id="tinjauan_pustaka5" value="9"
                                            onclick="hasil()"
                                            {{ old('tinjauan_pustaka', $sempro->tinjauan_pustaka) == '9' ? 'checked' : null }} required>
                                        <label class="btn tombol shadow-sm btn-success fw-normal "
                                            for="tinjauan_pustaka5">Sangat Baik</label>

                                    </div>
                                </div>
                                @error('tinjauan_pustaka')
                                    <div class="invalid-feedback">
                                        Error
                                    </div>
                                @enderror

                                <div class="mb-3 gridratakiri">
                                    <label for="tata_tulis" class="col-form-label">4). Tata Tulis</label>
                                    <div class="radio4 d-inline">
                                        <hr>

                                        <input type="radio" class="btn-check @error('tata_tulis') is-invalid @enderror"
                                            name="tata_tulis" id="tata_tulis1" value="1.8" onclick="hasil()"
                                            {{ old('tata_tulis', $sempro->tata_tulis) == '1.8' ? 'checked' : null }} required>
                                        <label class="btn tombol shadow-sm btn-danger fw-normal " for="tata_tulis1">Sangat
                                            Kurang Baik</label>

                                        <input type="radio" class="btn-check @error('tata_tulis') is-invalid @enderror"
                                            name="tata_tulis" id="tata_tulis2" value="3.6" onclick="hasil()"
                                            {{ old('tata_tulis', $sempro->tata_tulis) == '3.6' ? 'checked' : null }} required>
                                        <label class="btn tombol shadow-sm btn-warning fw-normal "
                                            for="tata_tulis2">Kurang Baik</label>

                                        <input type="radio" class="btn-check @error('tata_tulis') is-invalid @enderror"
                                            name="tata_tulis" id="tata_tulis3" value="5.4" onclick="hasil()"
                                            {{ old('tata_tulis', $sempro->tata_tulis) == '5.4' ? 'checked' : null }} required>
                                        <label class="btn tombol shadow-sm btn-info fw-normal "
                                            for="tata_tulis3">Biasa</label>

                                        <input type="radio" class="btn-check @error('tata_tulis') is-invalid @enderror"
                                            name="tata_tulis" id="tata_tulis4" value="7.2" onclick="hasil()"
                                            {{ old('tata_tulis', $sempro->tata_tulis) == '7.2' ? 'checked' : null }} required>
                                        <label class="btn tombol shadow-sm btn-primary fw-normal "
                                            for="tata_tulis4">Baik</label>

                                        <input type="radio" class="btn-check @error('tata_tulis') is-invalid @enderror"
                                            name="tata_tulis" id="tata_tulis5" value="9" onclick="hasil()"
                                            {{ old('tata_tulis', $sempro->tata_tulis) == '9' ? 'checked' : null }} required>
                                        <label class="btn tombol shadow-sm btn-success fw-normal "
                                            for="tata_tulis5">Sangat Baik</label>

                                    </div>
                                </div>
                                @error('tata_tulis')
                                    <div class="invalid-feedback">
                                        Error
                                    </div>
                                @enderror

                                <div class="mb-3 gridratakiri">
                                    <label for="sikap_dan_kepribadian" class="col-form-label">5). Sikap dan Kepribadian
                                        Ketika Bimbingan</label>
                                    <div class="radio5 d-inline">
                                        <hr>

                                        <input type="radio"
                                            class="btn-check @error('sikap_dan_kepribadian') is-invalid @enderror"
                                            name="sikap_dan_kepribadian" id="sikap_dan_kepribadian1" value="1.8"
                                            onclick="hasil()"
                                            {{ old('sikap_dan_kepribadian', $sempro->sikap_dan_kepribadian) == '1.8' ? 'checked' : null }} required>
                                        <label class="btn tombol shadow-sm btn-danger fw-normal "
                                            for="sikap_dan_kepribadian1">Sangat Kurang Baik</label>

                                        <input type="radio"
                                            class="btn-check @error('sikap_dan_kepribadian') is-invalid @enderror"
                                            name="sikap_dan_kepribadian" id="sikap_dan_kepribadian2" value="3.6"
                                            onclick="hasil()"
                                            {{ old('sikap_dan_kepribadian', $sempro->sikap_dan_kepribadian) == '3.6' ? 'checked' : null }} required>
                                        <label class="btn tombol shadow-sm btn-warning fw-normal "
                                            for="sikap_dan_kepribadian2">Kurang Baik</label>

                                        <input type="radio"
                                            class="btn-check @error('sikap_dan_kepribadian') is-invalid @enderror"
                                            name="sikap_dan_kepribadian" id="sikap_dan_kepribadian3" value="5.4"
                                            onclick="hasil()"
                                            {{ old('sikap_dan_kepribadian', $sempro->sikap_dan_kepribadian) == '5.4' ? 'checked' : null }} required>
                                        <label class="btn tombol shadow-sm btn-info fw-normal "
                                            for="sikap_dan_kepribadian3">Biasa</label>

                                        <input type="radio"
                                            class="btn-check @error('sikap_dan_kepribadian') is-invalid @enderror"
                                            name="sikap_dan_kepribadian" id="sikap_dan_kepribadian4" value="7.2"
                                            onclick="hasil()"
                                            {{ old('sikap_dan_kepribadian', $sempro->sikap_dan_kepribadian) == '7.2' ? 'checked' : null }} required>
                                        <label class="btn tombol shadow-sm btn-primary fw-normal "
                                            for="sikap_dan_kepribadian4">Baik</label>

                                        <input type="radio"
                                            class="btn-check @error('sikap_dan_kepribadian') is-invalid @enderror"
                                            name="sikap_dan_kepribadian" id="sikap_dan_kepribadian5" value="9"
                                            onclick="hasil()"
                                            {{ old('sikap_dan_kepribadian', $sempro->sikap_dan_kepribadian) == '9' ? 'checked' : null }} required>
                                        <label class="btn tombol shadow-sm btn-success fw-normal "
                                            for="sikap_dan_kepribadian5">Sangat Baik</label>

                                    </div>
                                </div>
                                @error('sikap_dan_kepribadian')
                                    <div class="invalid-feedback">
                                        Error
                                    </div>
                                @enderror


                                <div class="col-lg-6 mt-5 ml-auto mr-auto">
                                    <table class="table table-bordered bg-success">
                                        <tbody>
                                            <tr class="text-center">
                                                <td style="width: 250px; padding-top:1.5rem; font-weight:bold;">TOTAL NILAI
                                                    (ANGKA)</td>
                                                <td class="bg-success text-center">
                                                    <input type="text" id="total_nilai_angka"
                                                        class="form-control text-bold text-center ml-auto mr-auto"
                                                        name="total_nilai_angka"
                                                        style=" width: 50px;
                  background-color: rgb(255, 255, 255);                                                
                "
                                                        readonly>
                                                    </h3>
                                                </td>
                                            </tr>
                                            <tr class="text-center">
                                                <td style="width: 250px; padding-top:1.3rem; font-weight:bold;">TOTAL NILAI
                                                    (HURUF)</td>

                                                <td class="bg-success text-center">
                                                    <input type="text" id="total_nilai_huruf"
                                                        class="form-control text-bold text-center ml-auto mr-auto"
                                                        name="total_nilai_huruf"
                                                        style=" width: 50px;
                  background-color: rgb(255, 255, 255);
                "
                                                        readonly>
                                                    </h3>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <button type="submit"
                                    class="btn btn-lg btnsimpan btn-success float-right">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if (auth()->user()->nip == $sempro->pengujisatu_nip ||
                auth()->user()->nip == $sempro->pengujidua_nip ||
                auth()->user()->nip == $sempro->pengujitiga_nip)

            <div class="card card-success card-tabs">
                <div class="card-header p-0 pt-1">
                    <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill"
                                href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home"
                                aria-selected="true">Form Nilai</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill"
                                href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile"
                                aria-selected="false">Saran Perbaikan</a>
                        </li>
                        @if (auth()->user()->nip == $sempro->pengujisatu_nip)
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-one-form-tab" data-toggle="pill"
                                    href="#custom-tabs-one-form" role="tab" aria-controls="custom-tabs-one-form"
                                    aria-selected="false">Revisi Judul</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-one-setting-tab" data-toggle="pill"
                                    href="#custom-tabs-one-setting" role="tab"
                                    aria-controls="custom-tabs-one-setting" aria-selected="false">Berita Acara</a>
                            </li>
                        @endif
                    </ul>
                </div>

                <div class="card-body">
                    <form action="/penilaian-sempro-penguji/create/{{ $sempro->id }}" class="simpan-nilai-penguji" method="POST">
                        @csrf
                        <div class="tab-content" id="custom-tabs-one-tabContent">

                            <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel"
                                aria-labelledby="custom-tabs-one-home-tab">

                                <div class="mb-3 gridratakiri">
                                    <label for="presentasi" class="col-form-label">1). Presentasi</label>
                                    <div class="radio6 d-inline">
                                        <hr>

                                        <input type="radio" class="btn-check @error('presentasi') is-invalid @enderror"
                                            name="presentasi" id="presentasi1" value="1" onclick="total()"
                                            {{ old('presentasi', $sempro->presentasi) == '1' ? 'checked' : null }} required>
                                        <label class="btn tombol shadow-sm btn-danger fw-normal" for="presentasi1">Sangat
                                            Kurang Baik</label>

                                        <input type="radio" class="btn-check @error('presentasi') is-invalid @enderror"
                                            name="presentasi" id="presentasi2" value="2" onclick="total()"
                                            {{ old('presentasi', $sempro->presentasi) == '2' ? 'checked' : null }} required>
                                        <label class="btn tombol shadow-sm btn-warning fw-normal "
                                            for="presentasi2">Kurang Baik</label>

                                        <input type="radio" class="btn-check @error('presentasi') is-invalid @enderror"
                                            name="presentasi" id="presentasi3" value="3" onclick="total()"
                                            {{ old('presentasi', $sempro->presentasi) == '3' ? 'checked' : null }} required>
                                        <label class="btn tombol shadow-sm btn-info fw-normal "
                                            for="presentasi3">Biasa</label>

                                        <input type="radio" class="btn-check @error('presentasi') is-invalid @enderror"
                                            name="presentasi" id="presentasi4" value="4" onclick="total()"
                                            {{ old('presentasi', $sempro->presentasi) == '4' ? 'checked' : null }} required>
                                        <label class="btn tombol shadow-sm btn-primary fw-normal "
                                            for="presentasi4">Baik</label>

                                        <input type="radio" class="btn-check @error('presentasi') is-invalid @enderror"
                                            name="presentasi" id="presentasi5" value="5" onclick="total()"
                                            {{ old('presentasi', $sempro->presentasi) == '5' ? 'checked' : null }} required>
                                        <label class="btn tombol shadow-sm btn-success fw-normal "
                                            for="presentasi5">Sangat Baik</label>

                                    </div>
                                </div>
                                @error('presentasi')
                                    <div class="invalid-feedback">
                                        Error
                                    </div>
                                @enderror

                                <div class="mb-3 gridratakiri">
                                    <label for="tingkat_penguasaan_materi" class="col-form-label">2). Tingkat Penguasaan
                                        Materi</label>
                                    <div class="radio7 d-inline">
                                        <hr>

                                        <input type="radio"
                                            class="btn-check @error('tingkat_penguasaan_materi') is-invalid @enderror"
                                            name="tingkat_penguasaan_materi" id="tingkat_penguasaan_materi1"
                                            value="1.6" onclick="total()"
                                            {{ old('tingkat_penguasaan_materi', $sempro->tingkat_penguasaan_materi) == '1.6' ? 'checked' : null }} required>
                                        <label class="btn tombol shadow-sm btn-danger fw-normal "
                                            for="tingkat_penguasaan_materi1">Sangat Kurang Baik</label>

                                        <input type="radio"
                                            class="btn-check @error('tingkat_penguasaan_materi') is-invalid @enderror"
                                            name="tingkat_penguasaan_materi" id="tingkat_penguasaan_materi2"
                                            value="3.2" onclick="total()"
                                            {{ old('tingkat_penguasaan_materi', $sempro->tingkat_penguasaan_materi) == '3.2' ? 'checked' : null }} required>
                                        <label class="btn tombol shadow-sm btn-warning fw-normal "
                                            for="tingkat_penguasaan_materi2">Kurang Baik</label>

                                        <input type="radio"
                                            class="btn-check @error('tingkat_penguasaan_materi') is-invalid @enderror"
                                            name="tingkat_penguasaan_materi" id="tingkat_penguasaan_materi3"
                                            value="4.8" onclick="total()"
                                            {{ old('tingkat_penguasaan_materi', $sempro->tingkat_penguasaan_materi) == '4.8' ? 'checked' : null }} required>
                                        <label class="btn tombol shadow-sm btn-info fw-normal "
                                            for="tingkat_penguasaan_materi3">Biasa</label>

                                        <input type="radio"
                                            class="btn-check @error('tingkat_penguasaan_materi') is-invalid @enderror"
                                            name="tingkat_penguasaan_materi" id="tingkat_penguasaan_materi4"
                                            value="6.4" onclick="total()"
                                            {{ old('tingkat_penguasaan_materi', $sempro->tingkat_penguasaan_materi) == '6.4' ? 'checked' : null }} required>
                                        <label class="btn tombol shadow-sm btn-primary fw-normal "
                                            for="tingkat_penguasaan_materi4">Baik</label>

                                        <input type="radio"
                                            class="btn-check @error('tingkat_penguasaan_materi') is-invalid @enderror"
                                            name="tingkat_penguasaan_materi" id="tingkat_penguasaan_materi5"
                                            value="8" onclick="total()"
                                            {{ old('tingkat_penguasaan_materi', $sempro->tingkat_penguasaan_materi) == '8' ? 'checked' : null }} required>
                                        <label class="btn tombol shadow-sm btn-success fw-normal "
                                            for="tingkat_penguasaan_materi5">Sangat Baik</label>

                                    </div>
                                </div>
                                @error('tingkat_penguasaan_materi')
                                    <div class="invalid-feedback">
                                        Error
                                    </div>
                                @enderror

                                <div class="mb-3 gridratakiri">
                                    <label for="keaslian" class="col-form-label">3). Keaslian</label>
                                    <div class="radio8 d-inline">
                                        <hr>


                                        <input type="radio" class="btn-check @error('keaslian') is-invalid @enderror"
                                            name="keaslian" id="keaslian1" value="1" onclick="total()"
                                            {{ old('keaslian', $sempro->keaslian) == '1' ? 'checked' : null }} required>
                                        <label class="btn tombol shadow-sm btn-danger fw-normal " for="keaslian1">Sangat
                                            Kurang Baik</label>

                                        <input type="radio" class="btn-check @error('keaslian') is-invalid @enderror"
                                            name="keaslian" id="keaslian2" value="2" onclick="total()"
                                            {{ old('keaslian', $sempro->keaslian) == '2' ? 'checked' : null }} required>
                                        <label class="btn tombol shadow-sm btn-warning fw-normal " for="keaslian2">Kurang
                                            Baik</label>

                                        <input type="radio" class="btn-check @error('keaslian') is-invalid @enderror"
                                            name="keaslian" id="keaslian3" value="3" onclick="total()"
                                            {{ old('keaslian', $sempro->keaslian) == '3' ? 'checked' : null }} required>
                                        <label class="btn tombol shadow-sm btn-info fw-normal "
                                            for="keaslian3">Biasa</label>

                                        <input type="radio" class="btn-check @error('keaslian') is-invalid @enderror"
                                            name="keaslian" id="keaslian4" value="4" onclick="total()"
                                            {{ old('keaslian', $sempro->keaslian) == '4' ? 'checked' : null }} required>
                                        <label class="btn tombol shadow-sm btn-primary fw-normal "
                                            for="keaslian4">Baik</label>

                                        <input type="radio" class="btn-check @error('keaslian') is-invalid @enderror"
                                            name="keaslian" id="keaslian5" value="5" onclick="total()"
                                            {{ old('keaslian', $sempro->keaslian) == '5' ? 'checked' : null }} required>
                                        <label class="btn tombol shadow-sm btn-success fw-normal " for="keaslian5">Sangat
                                            Baik</label>

                                    </div>
                                </div>
                                @error('keaslian')
                                    <div class="invalid-feedback">
                                        Error
                                    </div>
                                @enderror

                                <div class="mb-3 gridratakiri">
                                    <label for="ketepatan_metodologi" class="col-form-label">4). Ketepatan
                                        Metodologi</label>
                                    <div class="radio9 d-inline">
                                        <hr>

                                        <input type="radio"
                                            class="btn-check @error('ketepatan_metodologi') is-invalid @enderror"
                                            name="ketepatan_metodologi" id="ketepatan_metodologi1" value="1.4"
                                            onclick="total()"
                                            {{ old('ketepatan_metodologi', $sempro->ketepatan_metodologi) == '1.4' ? 'checked' : null }} required>
                                        <label class="btn tombol shadow-sm btn-danger fw-normal "
                                            for="ketepatan_metodologi1">Sangat Kurang Baik</label>

                                        <input type="radio"
                                            class="btn-check @error('ketepatan_metodologi') is-invalid @enderror"
                                            name="ketepatan_metodologi" id="ketepatan_metodologi2" value="2.8"
                                            onclick="total()"
                                            {{ old('ketepatan_metodologi', $sempro->ketepatan_metodologi) == '2.8' ? 'checked' : null }} required>
                                        <label class="btn tombol shadow-sm btn-warning fw-normal "
                                            for="ketepatan_metodologi2">Kurang Baik</label>

                                        <input type="radio"
                                            class="btn-check @error('ketepatan_metodologi') is-invalid @enderror"
                                            name="ketepatan_metodologi" id="ketepatan_metodologi3" value="4.2"
                                            onclick="total()"
                                            {{ old('ketepatan_metodologi', $sempro->ketepatan_metodologi) == '4.2' ? 'checked' : null }} required>
                                        <label class="btn tombol shadow-sm btn-info fw-normal "
                                            for="ketepatan_metodologi3">Biasa</label>

                                        <input type="radio"
                                            class="btn-check @error('ketepatan_metodologi') is-invalid @enderror"
                                            name="ketepatan_metodologi" id="ketepatan_metodologi4" value="5.6"
                                            onclick="total()"
                                            {{ old('ketepatan_metodologi', $sempro->ketepatan_metodologi) == '5.6' ? 'checked' : null }} required>
                                        <label class="btn tombol shadow-sm btn-primary fw-normal "
                                            for="ketepatan_metodologi4">Baik</label>

                                        <input type="radio"
                                            class="btn-check @error('ketepatan_metodologi') is-invalid @enderror"
                                            name="ketepatan_metodologi" id="ketepatan_metodologi5" value="7"
                                            onclick="total()"
                                            {{ old('ketepatan_metodologi', $sempro->ketepatan_metodologi) == '7' ? 'checked' : null }} required>
                                        <label class="btn tombol shadow-sm btn-success fw-normal "
                                            for="ketepatan_metodologi5">Sangat Baik</label>

                                    </div>
                                </div>
                                @error('ketepatan_metodologi')
                                    <div class="invalid-feedback">
                                        Error
                                    </div>
                                @enderror

                                <div class="mb-3 gridratakiri">
                                    <label for="penguasaan_dasar_teori" class="col-form-label">5). Penguasaan Dasar
                                        Teori</label>
                                    <div class="radio10 d-inline">
                                        <hr>

                                        <input type="radio"
                                            class="btn-check @error('penguasaan_dasar_teori') is-invalid @enderror"
                                            name="penguasaan_dasar_teori" id="penguasaan_dasar_teori1" value="1.2"
                                            onclick="total()"
                                            {{ old('penguasaan_dasar_teori', $sempro->penguasaan_dasar_teori) == '1.2' ? 'checked' : null }} required>
                                        <label class="btn tombol shadow-sm btn-danger fw-normal "
                                            for="penguasaan_dasar_teori1">Sangat Kurang Baik</label>

                                        <input type="radio"
                                            class="btn-check @error('penguasaan_dasar_teori') is-invalid @enderror"
                                            name="penguasaan_dasar_teori" id="penguasaan_dasar_teori2" value="2.4"
                                            onclick="total()"
                                            {{ old('penguasaan_dasar_teori', $sempro->penguasaan_dasar_teori) == '2.4' ? 'checked' : null }} required>
                                        <label class="btn tombol shadow-sm btn-warning fw-normal "
                                            for="penguasaan_dasar_teori2">Kurang Baik</label>

                                        <input type="radio"
                                            class="btn-check @error('penguasaan_dasar_teori') is-invalid @enderror"
                                            name="penguasaan_dasar_teori" id="penguasaan_dasar_teori3" value="3.6"
                                            onclick="total()"
                                            {{ old('penguasaan_dasar_teori', $sempro->penguasaan_dasar_teori) == '3.6' ? 'checked' : null }} required>
                                        <label class="btn tombol shadow-sm btn-info fw-normal "
                                            for="penguasaan_dasar_teori3">Biasa</label>

                                        <input type="radio"
                                            class="btn-check @error('penguasaan_dasar_teori') is-invalid @enderror"
                                            name="penguasaan_dasar_teori" id="penguasaan_dasar_teori4" value="4.8"
                                            onclick="total()"
                                            {{ old('penguasaan_dasar_teori', $sempro->penguasaan_dasar_teori) == '4.8' ? 'checked' : null }} required>
                                        <label class="btn tombol shadow-sm btn-primary fw-normal "
                                            for="penguasaan_dasar_teori4">Baik</label>

                                        <input type="radio"
                                            class="btn-check @error('penguasaan_dasar_teori') is-invalid @enderror"
                                            name="penguasaan_dasar_teori" id="penguasaan_dasar_teori5" value="6"
                                            onclick="total()"
                                            {{ old('penguasaan_dasar_teori', $sempro->penguasaan_dasar_teori) == '6' ? 'checked' : null }} required>
                                        <label class="btn tombol shadow-sm btn-success fw-normal "
                                            for="penguasaan_dasar_teori5">Sangat Baik</label>

                                    </div>
                                </div>
                                @error('penguasaan_dasar_teori')
                                    <div class="invalid-feedback">
                                        Error
                                    </div>
                                @enderror

                                <div class="mb-3 gridratakiri">
                                    <label for="kecermatan_perumusan_masalah" class="col-form-label">6). Kecermatan
                                        Perumusan Masalah</label>
                                    <div class="radio11 d-inline">
                                        <hr>

                                        <input type="radio"
                                            class="btn-check @error('kecermatan_perumusan_masalah') is-invalid @enderror"
                                            name="kecermatan_perumusan_masalah" id="kecermatan_perumusan_masalah1"
                                            value="1.2" onclick="total()"
                                            {{ old('kecermatan_perumusan_masalah', $sempro->kecermatan_perumusan_masalah) == '1.2' ? 'checked' : null }} required>
                                        <label class="btn tombol shadow-sm btn-danger fw-normal "
                                            for="kecermatan_perumusan_masalah1">Sangat Kurang Baik</label>

                                        <input type="radio"
                                            class="btn-check @error('kecermatan_perumusan_masalah') is-invalid @enderror"
                                            name="kecermatan_perumusan_masalah" id="kecermatan_perumusan_masalah2"
                                            value="2.4" onclick="total()"
                                            {{ old('kecermatan_perumusan_masalah', $sempro->kecermatan_perumusan_masalah) == '2.4' ? 'checked' : null }} required>
                                        <label class="btn tombol shadow-sm btn-warning fw-normal "
                                            for="kecermatan_perumusan_masalah2">Kurang Baik</label>

                                        <input type="radio"
                                            class="btn-check @error('kecermatan_perumusan_masalah') is-invalid @enderror"
                                            name="kecermatan_perumusan_masalah" id="kecermatan_perumusan_masalah3"
                                            value="3.6" onclick="total()"
                                            {{ old('kecermatan_perumusan_masalah', $sempro->kecermatan_perumusan_masalah) == '3.6' ? 'checked' : null }} required>
                                        <label class="btn tombol shadow-sm btn-info fw-normal "
                                            for="kecermatan_perumusan_masalah3">Biasa</label>

                                        <input type="radio"
                                            class="btn-check @error('kecermatan_perumusan_masalah') is-invalid @enderror"
                                            name="kecermatan_perumusan_masalah" id="kecermatan_perumusan_masalah4"
                                            value="4.8" onclick="total()"
                                            {{ old('kecermatan_perumusan_masalah', $sempro->kecermatan_perumusan_masalah) == '4.8' ? 'checked' : null }} required>
                                        <label class="btn tombol shadow-sm btn-primary fw-normal "
                                            for="kecermatan_perumusan_masalah4">Baik</label>

                                        <input type="radio"
                                            class="btn-check @error('kecermatan_perumusan_masalah') is-invalid @enderror"
                                            name="kecermatan_perumusan_masalah" id="kecermatan_perumusan_masalah5"
                                            value="6" onclick="total()"
                                            {{ old('kecermatan_perumusan_masalah', $sempro->kecermatan_perumusan_masalah) == '6' ? 'checked' : null }} required>
                                        <label class="btn tombol shadow-sm btn-success fw-normal "
                                            for="kecermatan_perumusan_masalah5">Sangat Baik</label>

                                    </div>
                                </div>
                                @error('kecermatan_perumusan_masalah')
                                    <div class="invalid-feedback">
                                        Error
                                    </div>
                                @enderror

                                <div class="mb-3 gridratakiri">
                                    <label for="tinjauan_pustaka" class="col-form-label">7). Tinjauan Pustaka</label>
                                    <div class="radio12 d-inline">
                                        <hr>

                                        <input type="radio"
                                            class="btn-check @error('tinjauan_pustaka') is-invalid @enderror"
                                            name="tinjauan_pustaka" id="tinjauan_pustaka1" value="1.4"
                                            onclick="total()"
                                            {{ old('tinjauan_pustaka', $sempro->tinjauan_pustaka) == '1.4' ? 'checked' : null }} required>
                                        <label class="btn tombol shadow-sm btn-danger fw-normal "
                                            for="tinjauan_pustaka1">Sangat Kurang Baik</label>

                                        <input type="radio"
                                            class="btn-check @error('tinjauan_pustaka') is-invalid @enderror"
                                            name="tinjauan_pustaka" id="tinjauan_pustaka2" value="2.8"
                                            onclick="total()"
                                            {{ old('tinjauan_pustaka', $sempro->tinjauan_pustaka) == '2.8' ? 'checked' : null }} required>
                                        <label class="btn tombol shadow-sm btn-warning fw-normal "
                                            for="tinjauan_pustaka2">Kurang Baik</label>

                                        <input type="radio"
                                            class="btn-check @error('tinjauan_pustaka') is-invalid @enderror"
                                            name="tinjauan_pustaka" id="tinjauan_pustaka3" value="4.2"
                                            onclick="total()"
                                            {{ old('tinjauan_pustaka', $sempro->tinjauan_pustaka) == '4.2' ? 'checked' : null }} required>
                                        <label class="btn tombol shadow-sm btn-info fw-normal "
                                            for="tinjauan_pustaka3">Biasa</label>

                                        <input type="radio"
                                            class="btn-check @error('tinjauan_pustaka') is-invalid @enderror"
                                            name="tinjauan_pustaka" id="tinjauan_pustaka4" value="5.6"
                                            onclick="total()"
                                            {{ old('tinjauan_pustaka', $sempro->tinjauan_pustaka) == '5.6' ? 'checked' : null }} required>
                                        <label class="btn tombol shadow-sm btn-primary fw-normal "
                                            for="tinjauan_pustaka4">Baik</label>

                                        <input type="radio"
                                            class="btn-check @error('tinjauan_pustaka') is-invalid @enderror"
                                            name="tinjauan_pustaka" id="tinjauan_pustaka5" value="7"
                                            onclick="total()"
                                            {{ old('tinjauan_pustaka', $sempro->tinjauan_pustaka) == '7' ? 'checked' : null }} required>
                                        <label class="btn tombol shadow-sm btn-success fw-normal "
                                            for="tinjauan_pustaka5">Sangat Baik</label>

                                    </div>
                                </div>
                                @error('tinjauan_pustaka')
                                    <div class="invalid-feedback">
                                        Error
                                    </div>
                                @enderror

                                <div class="mb-3 gridratakiri">
                                    <label for="tata_tulis" class="col-form-label">8). Tata Tulis</label>
                                    <div class="radio13 d-inline">
                                        <hr>

                                        <input type="radio" class="btn-check @error('tata_tulis') is-invalid @enderror"
                                            name="tata_tulis" id="tata_tulis1" value="1" onclick="total()"
                                            {{ old('tata_tulis', $sempro->tata_tulis) == '1' ? 'checked' : null }} required>
                                        <label class="btn tombol shadow-sm btn-danger fw-normal " for="tata_tulis1">Sangat
                                            Kurang Baik</label>

                                        <input type="radio" class="btn-check @error('tata_tulis') is-invalid @enderror"
                                            name="tata_tulis" id="tata_tulis2" value="2" onclick="total()"
                                            {{ old('tata_tulis', $sempro->tata_tulis) == '2' ? 'checked' : null }} required>
                                        <label class="btn tombol shadow-sm btn-warning fw-normal "
                                            for="tata_tulis2">Kurang Baik</label>

                                        <input type="radio" class="btn-check @error('tata_tulis') is-invalid @enderror"
                                            name="tata_tulis" id="tata_tulis3" value="3" onclick="total()"
                                            {{ old('tata_tulis', $sempro->tata_tulis) == '3' ? 'checked' : null }} required>
                                        <label class="btn tombol shadow-sm btn-info fw-normal "
                                            for="tata_tulis3">Biasa</label>

                                        <input type="radio" class="btn-check @error('tata_tulis') is-invalid @enderror"
                                            name="tata_tulis" id="tata_tulis4" value="4" onclick="total()"
                                            {{ old('tata_tulis', $sempro->tata_tulis) == '4' ? 'checked' : null }} required>
                                        <label class="btn tombol shadow-sm btn-primary fw-normal "
                                            for="tata_tulis4">Baik</label>

                                        <input type="radio" class="btn-check @error('tata_tulis') is-invalid @enderror"
                                            name="tata_tulis" id="tata_tulis5" value="5" onclick="total()"
                                            {{ old('tata_tulis', $sempro->tata_tulis) == '5' ? 'checked' : null }} required>
                                        <label class="btn tombol shadow-sm btn-success fw-normal "
                                            for="tata_tulis5">Sangat Baik</label>

                                    </div>
                                </div>
                                @error('tata_tulis')
                                    <div class="invalid-feedback">
                                        Error
                                    </div>
                                @enderror

                                <div class="mb-3 gridratakiri">
                                    <label for="sumbangan_pemikiran" class="col-form-label">9). Sumbangan Pemikiran
                                        Terhadap Ilmu Pengetahuan</label>
                                    <div class="radio14 d-inline">
                                        <hr>

                                        <input type="radio"
                                            class="btn-check @error('sumbangan_pemikiran') is-invalid @enderror"
                                            name="sumbangan_pemikiran" id="sumbangan_pemikiran1" value="1.2"
                                            onclick="total()"
                                            {{ old('sumbangan_pemikiran', $sempro->sumbangan_pemikiran) == '1.2' ? 'checked' : null }} required>
                                        <label class="btn tombol shadow-sm btn-danger fw-normal "
                                            for="sumbangan_pemikiran1">Sangat Kurang Baik</label>

                                        <input type="radio"
                                            class="btn-check @error('sumbangan_pemikiran') is-invalid @enderror"
                                            name="sumbangan_pemikiran" id="sumbangan_pemikiran2" value="2.4"
                                            onclick="total()"
                                            {{ old('sumbangan_pemikiran', $sempro->sumbangan_pemikiran) == '2.4' ? 'checked' : null }} required>
                                        <label class="btn tombol shadow-sm btn-warning fw-normal "
                                            for="sumbangan_pemikiran2">Kurang Baik</label>

                                        <input type="radio"
                                            class="btn-check @error('sumbangan_pemikiran') is-invalid @enderror"
                                            name="sumbangan_pemikiran" id="sumbangan_pemikiran3" value="3.6"
                                            onclick="total()"
                                            {{ old('sumbangan_pemikiran', $sempro->sumbangan_pemikiran) == '3.6' ? 'checked' : null }} required>
                                        <label class="btn tombol shadow-sm btn-info fw-normal "
                                            for="sumbangan_pemikiran3">Biasa</label>

                                        <input type="radio"
                                            class="btn-check @error('sumbangan_pemikiran') is-invalid @enderror"
                                            name="sumbangan_pemikiran" id="sumbangan_pemikiran4" value="4.8"
                                            onclick="total()"
                                            {{ old('sumbangan_pemikiran', $sempro->sumbangan_pemikiran) == '4.8' ? 'checked' : null }} required>
                                        <label class="btn tombol shadow-sm btn-primary fw-normal "
                                            for="sumbangan_pemikiran4">Baik</label>

                                        <input type="radio"
                                            class="btn-check @error('sumbangan_pemikiran') is-invalid @enderror"
                                            name="sumbangan_pemikiran" id="sumbangan_pemikiran5" value="6"
                                            onclick="total()"
                                            {{ old('sumbangan_pemikiran', $sempro->sumbangan_pemikiran) == '6' ? 'checked' : null }} required>
                                        <label class="btn tombol shadow-sm btn-success fw-normal "
                                            for="sumbangan_pemikiran5">Sangat Baik</label>

                                    </div>
                                </div>
                                @error('sumbangan_pemikiran')
                                    <div class="invalid-feedback">
                                        Error
                                    </div>
                                @enderror

                                <div class="col-lg-6 mt-5 ml-auto mr-auto">
                                    <table class="table table-bordered bg-success">
                                        <tbody>
                                            <tr class="text-center">
                                                <td style="width: 250px; padding-top:1.5rem; font-weight:bold;">TOTAL NILAI
                                                    (ANGKA)</td>
                                                <td class="bg-success text-center">
                                                    <input type="text" id="total_nilai_angka"
                                                        class="form-control text-bold text-center ml-auto mr-auto"
                                                        name="total_nilai_angka"
                                                        style=" width: 50px;
                  background-color: rgb(255, 255, 255);                                                
                "
                                                        readonly>
                                                    </h3>
                                                </td>
                                            </tr>
                                            <tr class="text-center">
                                                <td style="width: 250px; padding-top:1.5rem; font-weight:bold;">TOTAL NILAI (HURUF)</td>

                                                <td class="bg-success text-center">
                                                    <input type="text" id="total_nilai_huruf"
                                                        class="form-control text-bold text-center ml-auto mr-auto"
                                                        name="total_nilai_huruf"
                                                        style=" width: 50px;
                  background-color: rgb(255, 255, 255);
                "
                                                        readonly>
                                                    </h3>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <button type="submit"
                                    class="btn btn-lg btnsimpan btn-success float-right">Simpan</button>

                                </form>
                            </div>

                            <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel"
                                aria-labelledby="custom-tabs-one-profile-tab">
                                <form action="/penilaian-sempro-penguji/create/{{ $sempro->id }}" class="simpan-nilai-penguji" method="POST">
                                @csrf
                                <div class="mb-3 gridratakiri">
                                    <div class="fw-bold mb-2">Perbaikan 1</div>
                                    <input type="text" name="revisi_naskah1" class="form-control"
                                        value="{{ $sempro->revisi_naskah1 != null ? $sempro->revisi_naskah1 : '' }}" required>
                                </div>

                                <div class="mb-3 gridratakiri">
                                    <div class="fw-bold mb-2">Perbaikan 2</div>
                                    <input type="text" name="revisi_naskah2" class="form-control"
                                        value="{{ $sempro->revisi_naskah2 != null ? $sempro->revisi_naskah2 : '' }}">
                                </div>

                                <div class="mb-3 gridratakiri">
                                    <div class="fw-bold mb-2">Perbaikan 3</div>
                                    <input type="text" name="revisi_naskah3" class="form-control"
                                        value="{{ $sempro->revisi_naskah3 != null ? $sempro->revisi_naskah3 : '' }}">
                                </div>

                                <div class="mb-3 gridratakiri">
                                    <div class="fw-bold mb-2">Perbaikan 4</div>
                                    <input type="text" name="revisi_naskah4" class="form-control"
                                        value="{{ $sempro->revisi_naskah4 != null ? $sempro->revisi_naskah4 : '' }}">
                                </div>

                                <div class="mb-3 gridratakiri">
                                    <div class="fw-bold mb-2">Perbaikan 5</div>
                                    <input type="text" name="revisi_naskah5" class="form-control"
                                        value="{{ $sempro->revisi_naskah5 != null ? $sempro->revisi_naskah5 : '' }}">
                                </div>

                                <button type="submit" class="btn btn-lg btn-success float-right">Simpan</button>
                    </form>
                </div>

                @if (auth()->user()->nip == $sempro->pengujisatu_nip)

                    <div class="tab-pane fade" id="custom-tabs-one-form" role="tabpanel"
                        aria-labelledby="custom-tabs-one-form-tab">

                        <form action="/revisi-proposal/create/{{ $sempro->id }}" class="simpan-nilai-penguji1" method="POST">
                            @csrf
                            <div class="mb-3 gridratakiri">
                                <label class="form-label">Judul Lama</label>
                                <input type="text" class="form-control" value="{{ $sempro->judul_proposal }}"
                                    readonly>
                            </div>
                            <div class="mb-3 gridratakiri">
                                <label class="form-label">Judul Baru</label>
                                <input type="text" name="revisi_proposal" class="form-control"
                                    value="{{ $sempro->revisi_proposal != null ? $sempro->revisi_proposal : '' }}" required>
                            </div>
                            <button type="submit" class="btn btn-lg btn-success float-right">Perbarui</button>
                        </form>

                    </div>

                    <div class="tab-pane fade" id="custom-tabs-one-setting" role="tabpanel"
                        aria-labelledby="custom-tabs-one-setting-tab">
                        <div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <table class="table table-bordered table-responsive-md">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th style="width: 200px">Penilaian Penguji</th>
                                                <!-- <th class="bg-success text-center">B</th> -->
                                                <th class="text-center">Penguji 1</th>
                                                <th class="text-center">Penguji 2</th>
                                                <th class="text-center">Penguji 3</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Presentasi</td>
                                                <!-- <td class="bg-secondary text-center">5</td> -->
                                                <td class="text-center">
                                                    @if ($nilaipenguji1 != '' && $nilaipenguji1->presentasi !== null)
                                                        <i class="fas fa-check fa-lg "></i>
                                                    @else
                                                        -
                                                    @endif
                                                </td>

                                                <td class="text-center">
                                                    @if ($nilaipenguji2 != '' && $nilaipenguji2->presentasi !== null)
                                                        <i class="fas fa-check fa-lg "></i>
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if ($nilaipenguji3 != '' && $nilaipenguji3->presentasi !== null)
                                                        <i class="fas fa-check fa-lg"></i>
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Tingkat Penguasaan Materi</td>
                                                <!-- <td class="bg-secondary text-center">8</td> -->
                                                <td class="text-center">
                                                    @if ($nilaipenguji1 != '' && $nilaipenguji1->tingkat_penguasaan_materi !== null)
                                                        <i class="fas fa-check fa-lg"></i>
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if ($nilaipenguji2 != '' && $nilaipenguji2->tingkat_penguasaan_materi !== null)
                                                        <i class="fas fa-check fa-lg"></i>
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if ($nilaipenguji3 != '' && $nilaipenguji3->tingkat_penguasaan_materi !== null)
                                                        <i class="fas fa-check fa-lg"></i>
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Keaslian</td>
                                                <!-- <td class="bg-secondary text-center">5</td> -->
                                                <td class="text-center">
                                                    @if ($nilaipenguji1 != '' && $nilaipenguji1->keaslian !== null)
                                                        <i class="fas fa-check fa-lg"></i>
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if ($nilaipenguji2 != '' && $nilaipenguji2->keaslian !== null)
                                                        <i class="fas fa-check fa-lg"></i>
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if ($nilaipenguji3 != '' && $nilaipenguji3->keaslian !== null)
                                                        <i class="fas fa-check fa-lg"></i>
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Ketepatan Metodologi</td>
                                                <!-- <td class="bg-secondary text-center">7</td> -->
                                                <td class="text-center">
                                                    @if ($nilaipenguji1 != '' && $nilaipenguji1->ketepatan_metodologi !== null)
                                                        <i class="fas fa-check fa-lg"></i>
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if ($nilaipenguji2 != '' && $nilaipenguji2->ketepatan_metodologi !== null)
                                                        <i class="fas fa-check fa-lg"></i>
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if ($nilaipenguji3 != '' && $nilaipenguji3->ketepatan_metodologi !== null)
                                                        <i class="fas fa-check fa-lg"></i>
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>Penguasaan Dasar Teori</td>
                                                <!-- <td class="bg-secondary text-center">6</td> -->
                                                <td class="text-center">
                                                    @if ($nilaipenguji1 != '' && $nilaipenguji1->penguasaan_dasar_teori !== null)
                                                        <i class="fas fa-check fa-lg"></i>
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if ($nilaipenguji2 != '' && $nilaipenguji2->penguasaan_dasar_teori !== null)
                                                        <i class="fas fa-check fa-lg"></i>
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if ($nilaipenguji3 != '' && $nilaipenguji3->penguasaan_dasar_teori !== null)
                                                        <i class="fas fa-check fa-lg"></i>
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>Kecermatan Perumusan Masalah</td>
                                                <!-- <td class="bg-secondary text-center">6</td> -->
                                                <td class="text-center">
                                                    @if ($nilaipenguji1 != '' && $nilaipenguji1->kecermatan_perumusan_masalah !== null)
                                                        <i class="fas fa-check fa-lg"></i>
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if ($nilaipenguji2 != '' && $nilaipenguji2->kecermatan_perumusan_masalah !== null)
                                                        <i class="fas fa-check fa-lg"></i>
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if ($nilaipenguji3 != '' && $nilaipenguji3->kecermatan_perumusan_masalah !== null)
                                                        <i class="fas fa-check fa-lg"></i>
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td>Tinjauan Pustaka</td>
                                                <!-- <td class="bg-secondary text-center">7</td> -->
                                                <td class="text-center">
                                                    @if ($nilaipenguji1 != '' && $nilaipenguji1->tinjauan_pustaka !== null)
                                                        <i class="fas fa-check fa-lg"></i>
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if ($nilaipenguji2 != '' && $nilaipenguji2->tinjauan_pustaka !== null)
                                                        <i class="fas fa-check fa-lg"></i>
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if ($nilaipenguji3 != '' && $nilaipenguji3->tinjauan_pustaka !== null)
                                                        <i class="fas fa-check fa-lg"></i>
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>8</td>
                                                <td>Tata Tulis</td>
                                                <!-- <td class="bg-secondary text-center">5</td> -->
                                                <td class="text-center">
                                                    @if ($nilaipenguji1 != '' && $nilaipenguji1->tata_tulis !== null)
                                                        <i class="fas fa-check fa-lg"></i>
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if ($nilaipenguji2 != '' && $nilaipenguji2->tata_tulis !== null)
                                                        <i class="fas fa-check fa-lg"></i>
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if ($nilaipenguji3 != '' && $nilaipenguji3->tata_tulis !== null)
                                                        <i class="fas fa-check fa-lg"></i>
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>9</td>
                                                <td>Sumbangan Pemikiran Terhadap Ilmu Pengetahuan dan Penerapannya</td>
                                                <!-- <td class="bg-secondary text-center">6</td> -->
                                                <td class="text-center">
                                                    @if ($nilaipenguji1 != '' && $nilaipenguji1->sumbangan_pemikiran !== null)
                                                        <i class="fas fa-check fa-lg"></i>
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if ($nilaipenguji2 != '' && $nilaipenguji2->sumbangan_pemikiran !== null)
                                                        <i class="fas fa-check fa-lg"></i>
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if ($nilaipenguji3 != '' && $nilaipenguji3->sumbangan_pemikiran !== null)
                                                        <i class="fas fa-check fa-lg"></i>
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="col-lg-6">
                                    <table class="table table-bordered table-responsive-md">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th style="width: 200px">Penilaian Pembimbing</th>
                                                <!-- <th class="bg-success text-center">B</th> -->
                                                <th class="text-center">Pembimbing 1</th>
                                                <th class="text-center">Pembimbing 2</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Penguasaan Dasar Teori</td>
                                                <!-- <td class="bg-secondary text-center">9</td> -->
                                                <td class="text-center">
                                                    @if ($nilaipembimbing1 != '' && $nilaipembimbing1->penguasaan_dasar_teori !== null)
                                                        <i class="fas fa-check fa-lg"></i>
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if ($nilaipembimbing2 != '' && $nilaipembimbing2->penguasaan_dasar_teori !== null)
                                                        <i class="fas fa-check fa-lg"></i>
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Tingkat Penguasaan Materi</td>
                                                <!-- <td class="bg-secondary text-center">9</td> -->
                                                <td class="text-center">
                                                    @if ($nilaipembimbing1 != '' && $nilaipembimbing1->tingkat_penguasaan_materi !== null)
                                                        <i class="fas fa-check fa-lg"></i>
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if ($nilaipembimbing2 != '' && $nilaipembimbing2->tingkat_penguasaan_materi !== null)
                                                        <i class="fas fa-check fa-lg"></i>
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Tinjauan Pustaka</td>
                                                <!-- <td class="bg-secondary text-center">9</td> -->
                                                <td class="text-center">
                                                    @if ($nilaipembimbing1 != '' && $nilaipembimbing1->tinjauan_pustaka !== null)
                                                        <i class="fas fa-check fa-lg"></i>
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if ($nilaipembimbing2 != '' && $nilaipembimbing2->tinjauan_pustaka !== null)
                                                        <i class="fas fa-check fa-lg"></i>
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Tata Tulis</td>
                                                <!-- <td class="bg-secondary text-center">9</td> -->
                                                <td class="text-center">
                                                    @if ($nilaipembimbing1 != '' && $nilaipembimbing1->tata_tulis !== null)
                                                        <i class="fas fa-check fa-lg"></i>
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if ($nilaipembimbing2 != '' && $nilaipembimbing2->tata_tulis !== null)
                                                        <i class="fas fa-check fa-lg"></i>
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>Sikap dan Kepribadian Ketika Bimbingan</td>
                                                <!-- <td class="bg-secondary text-center">9</td> -->
                                                <td class="text-center">
                                                    @if ($nilaipembimbing1 != '' && $nilaipembimbing1->sikap_dan_kepribadian !== null)
                                                        <i class="fas fa-check fa-lg"></i>
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if ($nilaipembimbing2 != '' && $nilaipembimbing2->sikap_dan_kepribadian !== null)
                                                        <i class="fas fa-check fa-lg"></i>
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>

                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td style="width: 250px">NILAI AKHIR</td>
                                                <td class="bg-success text-center">
                                                    <h3 class="text-bold">
                                                        @if (
                                                            $nilaipenguji1 == '' &&
                                                                $nilaipenguji2 == '' &&
                                                                $nilaipenguji3 == '' &&
                                                                $nilaipembimbing1 == '' &&
                                                                $nilaipembimbing2 == '')
                                                            -
                                                        @else
                                                            <?php
                                                            $nilai_masuk = 0;
                                                            if (!empty($nilaipenguji1)) {
                                                                $nilai_masuk = $nilai_masuk + 1;
                                                                $penguji1 = $nilaipenguji1->total_nilai_angka;
                                                            } else {
                                                                $penguji1 = 0;
                                                            }
                                                            if (!empty($nilaipenguji2)) {
                                                                $nilai_masuk = $nilai_masuk + 1;
                                                                $penguji2 = $nilaipenguji2->total_nilai_angka;
                                                            } else {
                                                                $penguji2 = 0;
                                                            }
                                                            if (!empty($nilaipenguji3)) {
                                                                $nilai_masuk = $nilai_masuk + 1;
                                                                $penguji3 = $nilaipenguji3->total_nilai_angka;
                                                            } else {
                                                                $penguji3 = 0;
                                                            }
                                                            if ($nilai_masuk == 0) {
                                                                $nilai_masuk = 1;
                                                            }
                                                            $nilaitotalpenguji = round(($penguji1 + $penguji2 + $penguji3) / $nilai_masuk);
                                                            $nilai_masuk = 0;
                                                            
                                                            if (!empty($nilaipembimbing1)) {
                                                                $nilai_masuk = $nilai_masuk + 1;
                                                                $pembimbing1 = $nilaipembimbing1->total_nilai_angka;
                                                            } else {
                                                                $pembimbing1 = 0;
                                                            }
                                                            if (!empty($nilaipembimbing2)) {
                                                                $nilai_masuk = $nilai_masuk + 1;
                                                                $pembimbing2 = $nilaipembimbing2->total_nilai_angka;
                                                            } else {
                                                                $pembimbing2 = 0;
                                                            }
                                                            if ($nilai_masuk == 0) {
                                                                $nilai_masuk = 1;
                                                            }
                                                            $nilaitotalpembimbing = round(($pembimbing1 + $pembimbing2) / $nilai_masuk);
                                                            $nilai_masuk_akhir = 0;
                                                            if ($nilaitotalpenguji != 0) {
                                                                $nilai_masuk_akhir = $nilai_masuk_akhir + 1;
                                                                $penguji = $nilaitotalpenguji;
                                                            } else {
                                                                $penguji = 0;
                                                            }
                                                            if ($nilaitotalpembimbing != 0) {
                                                                $nilai_masuk_akhir = $nilai_masuk_akhir + 1;
                                                                $pembimbing = $nilaitotalpembimbing;
                                                            } else {
                                                                $pembimbing = 0;
                                                            }
                                                            $total_nilai = $penguji + $pembimbing;
                                                            ?>
                                                            {{ $total_nilai }}
                                                        @endif

                                                    </h3>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 250px">NILAI HURUF</td>

                                                <td class="bg-success text-center">
                                                    <h3 class="text-bold">
                                                        <?php
                                                        $nilai_masuk = 0;
                                                        if (!empty($nilaipenguji1)) {
                                                            $nilai_masuk = $nilai_masuk + 1;
                                                            $penguji1 = $nilaipenguji1->total_nilai_angka;
                                                        } else {
                                                            $penguji1 = 0;
                                                        }
                                                        if (!empty($nilaipenguji2)) {
                                                            $nilai_masuk = $nilai_masuk + 1;
                                                            $penguji2 = $nilaipenguji2->total_nilai_angka;
                                                        } else {
                                                            $penguji2 = 0;
                                                        }
                                                        if (!empty($nilaipenguji3)) {
                                                            $nilai_masuk = $nilai_masuk + 1;
                                                            $penguji3 = $nilaipenguji3->total_nilai_angka;
                                                        } else {
                                                            $penguji3 = 0;
                                                        }
                                                        if ($nilai_masuk == 0) {
                                                            $nilai_masuk = 1;
                                                        }
                                                        $nilaitotalpenguji = round(($penguji1 + $penguji2 + $penguji3) / $nilai_masuk);
                                                        $nilai_masuk = 0;
                                                        
                                                        if (!empty($nilaipembimbing1)) {
                                                            $nilai_masuk = $nilai_masuk + 1;
                                                            $pembimbing1 = $nilaipembimbing1->total_nilai_angka;
                                                        } else {
                                                            $pembimbing1 = 0;
                                                        }
                                                        if (!empty($nilaipembimbing2)) {
                                                            $nilai_masuk = $nilai_masuk + 1;
                                                            $pembimbing2 = $nilaipembimbing2->total_nilai_angka;
                                                        } else {
                                                            $pembimbing2 = 0;
                                                        }
                                                        if ($nilai_masuk == 0) {
                                                            $nilai_masuk = 1;
                                                        }
                                                        $nilaitotalpembimbing = round(($pembimbing1 + $pembimbing2) / $nilai_masuk);
                                                        $nilai_masuk_akhir = 0;
                                                        if ($nilaitotalpenguji != 0) {
                                                            $nilai_masuk_akhir = $nilai_masuk_akhir + 1;
                                                            $penguji = $nilaitotalpenguji;
                                                        } else {
                                                            $penguji = 0;
                                                        }
                                                        if ($nilaitotalpembimbing != 0) {
                                                            $nilai_masuk_akhir = $nilai_masuk_akhir + 1;
                                                            $pembimbing = $nilaitotalpembimbing;
                                                        } else {
                                                            $pembimbing = 0;
                                                        }
                                                        if ($nilai_masuk_akhir == 0) {
                                                            $nilai_masuk_akhir = 1;
                                                        }
                                                        $total_nilai = $penguji + $pembimbing;
                                                        ?>

                                                        @if ($total_nilai == 0)
                                                            -
                                                        @else
                                                            @if ($total_nilai >= 85)
                                                                A
                                                            @elseif ($total_nilai >= 80)
                                                                A-
                                                            @elseif ($total_nilai >= 75)
                                                                B+
                                                            @elseif ($total_nilai >= 70)
                                                                B
                                                            @elseif ($total_nilai >= 65)
                                                                B-
                                                            @elseif ($total_nilai >= 60)
                                                                C+
                                                            @elseif ($total_nilai >= 55)
                                                                C
                                                            @elseif ($total_nilai >= 40)
                                                                D
                                                            @else
                                                                E
                                                            @endif
                                                        @endif
                                                    </h3>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 250px">KETERANGAN</td>

                                                <td class="bg-success text-center">
                                                    <h3 class="text-bold">
                                                        @if ($total_nilai == 0)
                                                            -
                                                        @else
                                                            @if ($total_nilai >= 55)
                                                                LULUS
                                                            @else
                                                                TIDAK LULUS
                                                            @endif
                                                        @endif
                                                    </h3>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        @if ($penjadwalan->status_seminar == 0)
                            @if ($penjadwalan->cek($penjadwalan->id) == $penjadwalan->jmlpenilaian($penjadwalan->id))
                                @if ($penjadwalan->pengujisatu_nip == auth()->user()->nip)
                                @endif
                            @endif
                        @endif

                        @if ($nilaipembimbing1 == null && $nilaipembimbing2 == null)
                            <a href="#ModalApprove1" data-toggle="modal"
                                class="btn btn-lg btn-danger float-right">Selesai Seminar</a>
                            <div class="modal fade"id="ModalApprove1">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content shadow-sm">
                                        <div class="modal-body">
                                            <div class="container p-5 text-center">
                                                <h1 class="text-danger"><i
                                                        class="fas fa-exclamation-triangle fa-lg"></i> </h1>
                                                <h5><b>Pembimbing</b> belum melakukan Input Nilai</h5>
                                                <button type="button" class="btn mt-3 btn-secondary"
                                                    data-dismiss="modal">Kembali</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @elseif ($nilaipembimbing1 == null && $sempro->pembimbingsatu_nip == !null)
                                <a href="#ModalApprove1" data-toggle="modal"
                                    class="btn btn-lg btn-danger mt-5 float-right">Selesai Seminar</a>
                                <div class="modal fade"id="ModalApprove1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <div class="container px-5 pt-5 pb-2 text-center">
                                                    <h1 class="text-danger"><i
                                                            class="fas fa-exclamation-triangle fa-lg"></i> </h1>
                                                    <h5><b>Pembimbing 1</b> belum melakukan Input Nilai</h5>
                                                    <button type="button" class="btn mt-3 btn-secondary"
                                                        data-dismiss="modal">Kembali</button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                @elseif ($nilaipembimbing2 == null && $sempro->pembimbingdua_nip == !null)
                                <a href="#ModalApprove1" data-toggle="modal"
                                    class="btn btn-lg btn-danger mt-5 float-right">Selesai Seminar</a>
                                <div class="modal fade"id="ModalApprove1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <div class="container px-5 pt-5 pb-2 text-center">
                                                    <h1 class="text-danger"><i
                                                            class="fas fa-exclamation-triangle fa-lg"></i> </h1>
                                                    <h5><b>Pembimbing 2</b> belum melakukan Input Nilai</h5>
                                                    <button type="button" class="btn mt-3 btn-secondary"
                                                        data-dismiss="modal">Kembali</button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        @elseif($nilaipenguji2 == null && $nilaipenguji3 == null)
                            <a href="#ModalApprove2" data-toggle="modal"
                                class="btn mt-5 btn-lg btn-danger float-right">Selesai Seminar</a>
                            <div class="modal fade"id="ModalApprove2">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content shadow-sm">
                                        <div class="modal-body">
                                            <div class="container px-5 pt-5 pb-2 text-center">
                                                <h1 class="text-danger"><i
                                                        class="fas fa-exclamation-triangle fa-lg"></i> </h1>
                                                <h5><b>Penguji 2 & 3</b> belum melakukan Input Nilai</h5>
                                                <button type="button" class="btn mt-3 btn-secondary"
                                                    data-dismiss="modal">Kembali</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @elseif($nilaipenguji2 == null)
                            <a href="#ModalApprove3" data-toggle="modal"
                                class="btn mt-5 btn-lg btn-danger float-right">Selesai Seminar</a>
                            <div class="modal fade"id="ModalApprove3">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content shadow-sm">
                                        <div class="modal-body">
                                            <div class="container px-5 pt-5 pb-2 text-center">
                                                <h1 class="text-danger"><i
                                                        class="fas fa-exclamation-triangle fa-lg"></i> </h1>
                                                <h5><b>Penguji 2</b> belum melakukan Input Nilai</h5>
                                                <button type="button" class="btn mt-3 btn-secondary"
                                                    data-dismiss="modal">Kembali</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @elseif($nilaipenguji3 == null && $sempro->pengujitiga !== null)
                            <a href="#ModalApprove4" data-toggle="modal"
                                class="btn mt-5 btn-lg btn-danger float-right">Selesai Seminar</a>
                            <div class="modal fade"id="ModalApprove4">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content shadow-sm">
                                        <div class="modal-body">
                                            <div class="container px-5 pt-5 pb-2 text-center">
                                                <h1 class="text-danger"><i
                                                        class="fas fa-exclamation-triangle fa-lg"></i> </h1>
                                                <h5><b>Penguji 3</b> belum melakukan Input Nilai</h5>
                                                <button type="button" class="btn mt-3 btn-secondary"
                                                    data-dismiss="modal">Kembali</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @elseif($total_nilai < 55)
                            <a href="#ModalApprove5" data-toggle="modal"
                                class="btn mt-5 btn-lg btn-danger float-right">Selesai Seminar</a>
                            <div class="modal fade"id="ModalApprove5">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content shadow-sm">
                                        <div class="modal-body">
                                            <div class="container px-5 pt-5 pb-2 text-center">
                                                <h1 class="text-danger"><i
                                                        class="fas fa-exclamation-triangle fa-lg"></i> </h1>
                                                <h5>Nilai Seminar Belum Mencukupi</h5>
                                                <button type="button" class="btn mt-3 btn-secondary"
                                                    data-dismiss="modal">Kembali</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @elseif($nilaipenguji1 == null)
                                <a href="#ModalApprove10" data-toggle="modal"
                                    class="btn mt-5 btn-lg btn-danger float-right">Selesai Seminar</a>
                                <div class="modal fade"id="ModalApprove10">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <div class="container px-5 pt-5 pb-2 text-center">
                                                    <h1 class="text-danger"><i
                                                            class="fas fa-exclamation-triangle fa-lg"></i> </h1>
                                                    <h5><b>Anda</b> belum melakukan Input Nilai</h5>
                                                    <button type="button" class="btn mt-3 btn-secondary"
                                                        data-dismiss="modal">Kembali</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        @elseif($sempro->status_seminar > 0)
                            <a href="#ModalApprove6" data-toggle="modal"
                                class="btn mt-5 btn-lg btn-success float-right">Seminar telah Selesai <i
                                    class="fas fa-check fa-lg"></i> </a>
                            <div class="modal fade"id="ModalApprove6">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content shadow-sm">
                                        <div class="modal-body">
                                            <div class="container px-5 pt-5 pb-2 text-center">
                                                <h1 class="text-success"><i class="fas fa-check-circle fa-lg"></i> </h1>
                                                <h5>Seminar telah disetujui</h5>
                                                <button type="button" class="btn mt-3 btn-secondary"
                                                    data-dismiss="modal">Kembali</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <a href="#ModalApprove7" data-toggle="modal"
                                class="btn mt-5 btn-lg btn-danger float-right">Selesai Seminar</a>

                            <div class="modal fade"id="ModalApprove7">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content shadow-sm">
                                        <div class="modal-body">
                                            <div class="container px-5 pt-5 pb-2">
                                                <h3 class="text-center">Apakah Anda Yakin?</h3>
                                                <p class="text-center">Data Tidak Bisa Dikembalikan!</p>
                                                <div class="row text-center">
                                                    <div class="col-4">
                                                    </div>
                                                    <div class="col-2">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Tidak</button>
                                                    </div>
                                                    <div class="col-2">
                                                        <form action="/penilaian-sempro/approve/{{ $penjadwalan->id }}"
                                                            method="POST">
                                                            @method('put')
                                                            @csrf
                                                            <button type="submit" class="btn btn-success">
                                                                Selesai</button>
                                                        </form>
                                                    </div>
                                                    <div class="col-4">
                                                    </div>
                                                </div>


                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>

                @endif
            </div>
    </div>

    </div>

    @endif
    <br>
    <br>
    <br>
@endsection

@section('footer')
    <section class="bg-dark p-1">
        <div class="container">
            <p class="developer">Dikembangkan oleh Prodi Teknik Informatika UNRI <small> <span
                        class="text-success fw-bold">(</span><a class="text-success fw-bold" formtarget="_blank"
                        target="_blank" href="https://fahrilhadi.com">Fahril Hadi, </a>
                    <a class="text-success fw-bold" formtarget="_blank" target="_blank"
                        href="/developer/rahul-ilsa-tajri-mukhti">Rahul Ilsa Tajri Mukhti </a> <span
                        class="text-success fw-bold">&</span>
                    <a class="text-success fw-bold" formtarget="_blank" target="_blank"
                        href="/developer/m-seprinaldi"> M. Seprinaldi</a><span
                        class="text-success fw-bold">)</span></small></p>
        </div>
    </section>
@endsection


<!-- //HASIL DAN TOTAL -->

@push('scripts')
    <script>
        function hasil() {

            var nilai_penguasaan_dasar_teori;
            var nilai_tingkat_penguasaan_materi;
            var nilai_tinjauan_pustaka;
            var nilai_tata_tulis;
            var nilai_sikap_dan_kepribadian;
            var penguasaan_dasar_teori = $('input[name="penguasaan_dasar_teori"]:checked').val();
            var tingkat_penguasaan_materi = $('input[name="tingkat_penguasaan_materi"]:checked').val();
            var tinjauan_pustaka = $('input[name="tinjauan_pustaka"]:checked').val();
            var tata_tulis = $('input[name="tata_tulis"]:checked').val();
            var sikap_dan_kepribadian = $('input[name="sikap_dan_kepribadian"]:checked').val();

            if (isNaN(parseFloat(penguasaan_dasar_teori))) {
                nilai_penguasaan_dasar_teori = parseFloat(0);
            } else {
                nilai_penguasaan_dasar_teori = parseFloat(penguasaan_dasar_teori);
            }

            if (isNaN(parseFloat(tingkat_penguasaan_materi))) {
                nilai_tingkat_penguasaan_materi = parseFloat(0);
            } else {
                nilai_tingkat_penguasaan_materi = parseFloat(tingkat_penguasaan_materi);
            }

            if (isNaN(parseFloat(tinjauan_pustaka))) {
                nilai_tinjauan_pustaka = parseFloat(0);
            } else {
                nilai_tinjauan_pustaka = parseFloat(tinjauan_pustaka);
            }

            if (isNaN(parseFloat(tata_tulis))) {
                nilai_tata_tulis = parseFloat(0);
            } else {
                nilai_tata_tulis = parseFloat(tata_tulis);
            }

            if (isNaN(parseFloat(sikap_dan_kepribadian))) {
                nilai_sikap_dan_kepribadian = parseFloat(0);
            } else {
                nilai_sikap_dan_kepribadian = parseFloat(sikap_dan_kepribadian);
            }

            var total = parseFloat(nilai_penguasaan_dasar_teori) + parseFloat(nilai_tingkat_penguasaan_materi) + parseFloat(
                nilai_tinjauan_pustaka) + parseFloat(nilai_tata_tulis) + parseFloat(nilai_sikap_dan_kepribadian);
            var total_angka = parseFloat(total);

            $('input[name="total_nilai_angka"]').val(Math.round(total_angka));
            if (total_angka >= 39) {
                $('input[name="total_nilai_huruf"]').val("A");
            } else if (total_angka >= 36) {
                $('input[name="total_nilai_huruf"]').val("A-");
            } else if (total_angka >= 34) {
                $('input[name="total_nilai_huruf"]').val("B+");
            } else if (total_angka >= 32) {
                $('input[name="total_nilai_huruf"]').val("B");
            } else if (total_angka >= 30) {
                $('input[name="total_nilai_huruf"]').val("B-");
            } else if (total_angka >= 27) {
                $('input[name="total_nilai_huruf"]').val("C+");
            } else if (total_angka >= 25) {
                $('input[name="total_nilai_huruf"]').val("C");
            } else if (total_angka >= 18) {
                $('input[name="total_nilai_huruf"]').val("D");
            } else if (total_angka >= 0) {
                $('input[name="total_nilai_huruf"]').val("E");
            }
        }

        function total() {
            var nilai_presentasi;
            var nilai_tingkat_penguasaan_materi;
            var nilai_keaslian;
            var nilai_ketepatan_metodologi;
            var nilai_penguasaan_dasar_teori;
            var nilai_kecermatan_perumusan_masalah;
            var nilai_tinjauan_pustaka;
            var nilai_tata_tulis;
            var nilai_sumbangan_pemikiran;
            var presentasi = $('input[name="presentasi"]:checked').val();
            var tingkat_penguasaan_materi = $('input[name="tingkat_penguasaan_materi"]:checked').val();
            var keaslian = $('input[name="keaslian"]:checked').val();
            var ketepatan_metodologi = $('input[name="ketepatan_metodologi"]:checked').val();
            var penguasaan_dasar_teori = $('input[name="penguasaan_dasar_teori"]:checked').val();
            var kecermatan_perumusan_masalah = $('input[name="kecermatan_perumusan_masalah"]:checked').val();
            var tinjauan_pustaka = $('input[name="tinjauan_pustaka"]:checked').val();
            var tata_tulis = $('input[name="tata_tulis"]:checked').val();
            var sumbangan_pemikiran = $('input[name="sumbangan_pemikiran"]:checked').val();

            if (isNaN(parseFloat(presentasi))) {
                nilai_presentasi = parseFloat(0);
            } else {
                nilai_presentasi = parseFloat(presentasi);
            }

            if (isNaN(parseFloat(tingkat_penguasaan_materi))) {
                nilai_tingkat_penguasaan_materi = parseFloat(0);
            } else {
                nilai_tingkat_penguasaan_materi = parseFloat(tingkat_penguasaan_materi);
            }

            if (isNaN(parseFloat(keaslian))) {
                nilai_keaslian = parseFloat(0);
            } else {
                nilai_keaslian = parseFloat(keaslian);
            }

            if (isNaN(parseFloat(ketepatan_metodologi))) {
                nilai_ketepatan_metodologi = parseFloat(0);
            } else {
                nilai_ketepatan_metodologi = parseFloat(ketepatan_metodologi);
            }

            if (isNaN(parseFloat(penguasaan_dasar_teori))) {
                nilai_penguasaan_dasar_teori = parseFloat(0);
            } else {
                nilai_penguasaan_dasar_teori = parseFloat(penguasaan_dasar_teori);
            }

            if (isNaN(parseFloat(kecermatan_perumusan_masalah))) {
                nilai_kecermatan_perumusan_masalah = parseFloat(0);
            } else {
                nilai_kecermatan_perumusan_masalah = parseFloat(kecermatan_perumusan_masalah);
            }

            if (isNaN(parseFloat(tinjauan_pustaka))) {
                nilai_tinjauan_pustaka = parseFloat(0);
            } else {
                nilai_tinjauan_pustaka = parseFloat(tinjauan_pustaka);
            }

            if (isNaN(parseFloat(tata_tulis))) {
                nilai_tata_tulis = parseFloat(0);
            } else {
                nilai_tata_tulis = parseFloat(tata_tulis);
            }

            if (isNaN(parseFloat(sumbangan_pemikiran))) {
                nilai_sumbangan_pemikiran = parseFloat(0);
            } else {
                nilai_sumbangan_pemikiran = parseFloat(sumbangan_pemikiran);
            }

            var hasil = parseFloat(nilai_presentasi) + parseFloat(nilai_tingkat_penguasaan_materi) + parseFloat(
                    nilai_keaslian) + parseFloat(nilai_ketepatan_metodologi) + parseFloat(nilai_penguasaan_dasar_teori) +
                parseFloat(nilai_kecermatan_perumusan_masalah) + parseFloat(nilai_tinjauan_pustaka) + parseFloat(
                    nilai_tata_tulis) + parseFloat(nilai_sumbangan_pemikiran);
            var angka = parseFloat(hasil);

            $('input[name="total_nilai_angka"]').val(Math.round(angka));
            if (angka >= 47) {
                $('input[name="total_nilai_huruf"]').val("A");
            } else if (angka >= 44) {
                $('input[name="total_nilai_huruf"]').val("A-");
            } else if (angka >= 42) {
                $('input[name="total_nilai_huruf"]').val("B+");
            } else if (angka >= 39) {
                $('input[name="total_nilai_huruf"]').val("B");
            } else if (angka >= 36) {
                $('input[name="total_nilai_huruf"]').val("B-");
            } else if (angka >= 33) {
                $('input[name="total_nilai_huruf"]').val("C+");
            } else if (angka >= 31) {
                $('input[name="total_nilai_huruf"]').val("C");
            } else if (angka >= 22) {
                $('input[name="total_nilai_huruf"]').val("D");
            } else if (angka >= 0) {
                $('input[name="total_nilai_huruf"]').val("E");
            }
        }
    </script>
@endpush


@push('scripts')
    <script>
        $(document).ready(function() {
        $('.simpan-nilai-pembimbing').submit(function(event) {
            event.preventDefault();
            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: "Silahkan periksa kembali data yang akan Anda kirim.",
                icon: 'question',
                showCancelButton: true,
                cancelButtonText: 'Kembali',
                confirmButtonColor: '#28a745',
                cancelButtonColor: 'grey',
                confirmButtonText: 'Simpan'
            }).then((result) => {
                if (result.isConfirmed) {
                    event.currentTarget.submit();
                }
            });
        });
    });
    </script>
@endpush

@push('scripts')
    <script>
        $(document).ready(function() {
        $('.simpan-nilai-penguji').submit(function(event) {
            event.preventDefault();
            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: "Silahkan periksa kembali data yang akan Anda kirim.",
                icon: 'question',
                showCancelButton: true,
                cancelButtonText: 'Kembali',
                confirmButtonColor: '#28a745',
                cancelButtonColor: 'grey',
                confirmButtonText: 'Simpan'
            }).then((result) => {
                if (result.isConfirmed) {
                    event.currentTarget.submit();
                }
            });
        });
    });
    </script>
@endpush

@push('scripts')
    <script>
        $(document).ready(function() {
        $('.simpan-nilai-penguji1').submit(function(event) {
            event.preventDefault();
            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: "Silahkan periksa kembali data yang akan Anda kirim.",
                icon: 'question',
                showCancelButton: true,
                cancelButtonText: 'Kembali',
                confirmButtonColor: '#28a745',
                cancelButtonColor: 'grey',
                confirmButtonText: 'Simpan'
            }).then((result) => {
                if (result.isConfirmed) {
                    event.currentTarget.submit();
                }
            });
        });
    });
    </script>
@endpush