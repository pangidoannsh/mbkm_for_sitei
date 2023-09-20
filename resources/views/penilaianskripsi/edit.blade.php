@extends('layouts.main')

@php
use Carbon\Carbon;
@endphp

@section('header')
Penilaian Skripsi | SIA Elektro
@endsection

@section('sub-title')
Edit Penilaian Sidang Skripsi
@endsection

@section('content')

@if (session()->has('message'))
<div class="swal" data-swal="{{session('message')}}"></div>
@endif

<div>

    <a href="/penilaian" class="btn btn-success mb-3"> <- Kembali <a>

    <div class="row">
        <div class="col mb-3">
        <ol class="list-group" style="box-shadow: 1px 1px 1px 1px #dbdbdb; border-radius:5px;">
        <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto gridratakiri">
                    <div class="fw-bold ">NIM</div>
                    <span>{{ $skripsi->penjadwalan_skripsi->mahasiswa->nim }}</span>
                </div>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto gridratakiri">
                    <div class="fw-bold ">Nama</div>
                    <span>{{ $skripsi->penjadwalan_skripsi->mahasiswa->nama }}</span>
                </div>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto gridratakiri">
                    <div class="fw-bold ">Konsentrasi</div>
                    <span>{{ $skripsi->penjadwalan_skripsi->mahasiswa->konsentrasi->nama_konsentrasi}}</span>
                </div>
            </li>
        </ol>
        </div>
        <div class="col-md">
        <ol class="list-group" style="box-shadow: 1px 1px 1px 1px #dbdbdb; border-radius:5px;">
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto gridratakiri">
                    <div class="fw-bold ">Pembimbing</div>
                    <span
                        >1. {{ $skripsi->penjadwalan_skripsi->pembimbingsatu->nama }}</span>
                    @if ($skripsi->penjadwalan_skripsi->pembimbingdua != null)
                        <br>
                        <span
                            >2. {{ $skripsi->penjadwalan_skripsi->pembimbingdua->nama }}</span>
                    @endif
                </div>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto gridratakiri">
                    <div class="fw-bold ">Penguji</div>
                    <span
                        >1. {{ $skripsi->penjadwalan_skripsi->pengujisatu->nama }}</span>
                    <br>
                    <span
                        >2. {{ $skripsi->penjadwalan_skripsi->pengujidua->nama }}</span>
                    <br>
                    @if ($skripsi->penjadwalan_skripsi->pengujitiga != null)
                    <span
                        >3. {{ $skripsi->penjadwalan_skripsi->pengujitiga->nama }}</span>
                    @endif
                </div>
            </li>
        </ol>
        </div>
    </div>
</div>

<div class="kol-judul mt-3">
    <div class="row">
        <div class="col">
        <ol class="list-group" style="box-shadow: 1px 1px 1px 1px #dbdbdb; border-radius:5px;">
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto gridratakiri">
                    <div class="fw-bold ">Judul</div>
                    <span>{{ $skripsi->penjadwalan_skripsi->revisi_skripsi != null ? $skripsi->penjadwalan_skripsi->revisi_skripsi : $skripsi->penjadwalan_skripsi->judul_skripsi }}</span>
                </div>
            </li>
        </ol>
        </div>
    </div>
</div>

<div class="kol-jadwal mt-3 mb-3">
    <div class="row">
        <div class="col mb-3 kol-jadwal">
        <ol class="list-group" style="box-shadow: 1px 1px 1px 1px #dbdbdb; border-radius:5px;">
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto gridratakiri">
                    <div class="fw-bold ">Jadwal</div>
                    <span>{{Carbon::parse($skripsi->tanggal)->translatedFormat('l, d F Y')}}, {{$skripsi->waktu}}</span>
                </div>
            </li>
        </ol>
        </div>
        <div class="col-md">
        <ol class="list-group" style="box-shadow: 1px 1px 1px 1px #dbdbdb; border-radius:5px;">
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto gridratakiri">
                    <div class="fw-bold ">Lokasi</div>
                    <span>{{ $skripsi->penjadwalan_skripsi->lokasi }}</span>
                </div>
            </li>
        </ol>
        </div>
    </div>
</div>

@if (auth()->user()->nip == $skripsi->penjadwalan_skripsi->pembimbingsatu_nip ||
    auth()->user()->nip == $skripsi->penjadwalan_skripsi->pembimbingdua_nip)
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
                    <form action="/penilaian-skripsi-pembimbing/edit/{{ $skripsi->id }}" method="POST">
                        @method('put')
                        @csrf

                        <div class="mb-3 gridratakiri">
                            <label for="penguasaan_dasar_teori" class="col-form-label">1). Penguasaan Dasar Teori</label>
                            <div class="radio1 d-inline">
                                <hr>

                            <input type="radio" class="btn-check @error ('penguasaan_dasar_teori') is-invalid @enderror" name="penguasaan_dasar_teori" id="penguasaan_dasar_teori1" value="2" onclick="hasil()" {{ old('penguasaan_dasar_teori', $skripsi->penguasaan_dasar_teori) == '2' ? 'checked' : null }} >
            <label class="btn tombol btn-danger fw-normal " for="penguasaan_dasar_teori1">Sangat Kurang Baik</label>

            <input type="radio" class="btn-check @error ('penguasaan_dasar_teori') is-invalid @enderror" name="penguasaan_dasar_teori" id="penguasaan_dasar_teori2" value="4" onclick="hasil()" {{ old('penguasaan_dasar_teori', $skripsi->penguasaan_dasar_teori) == '4' ? 'checked' : null }} >
            <label class="btn tombol btn-warning fw-normal " for="penguasaan_dasar_teori2">Kurang Baik</label>

            <input type="radio" class="btn-check @error ('penguasaan_dasar_teori') is-invalid @enderror" name="penguasaan_dasar_teori" id="penguasaan_dasar_teori3" value="6" onclick="hasil()" {{ old('penguasaan_dasar_teori', $skripsi->penguasaan_dasar_teori) == '6' ? 'checked' : null }} >
            <label class="btn tombol btn-info fw-normal " for="penguasaan_dasar_teori3">Biasa</label>

            <input type="radio" class="btn-check @error ('penguasaan_dasar_teori') is-invalid @enderror" name="penguasaan_dasar_teori" id="penguasaan_dasar_teori4" value="8" onclick="hasil()" {{ old('penguasaan_dasar_teori', $skripsi->penguasaan_dasar_teori) == '8' ? 'checked' : null }} >
            <label class="btn tombol btn-primary fw-normal " for="penguasaan_dasar_teori4">Baik</label>

            <input type="radio" class="btn-check @error ('penguasaan_dasar_teori') is-invalid @enderror" name="penguasaan_dasar_teori" id="penguasaan_dasar_teori5" value="10" onclick="hasil()" {{ old('penguasaan_dasar_teori', $skripsi->penguasaan_dasar_teori) == '10' ? 'checked' : null }} >
            <label class="btn tombol btn-success fw-normal " for="penguasaan_dasar_teori5">Sangat Baik</label>

                            </div>
                        </div>

                        <div class="mb-3 gridratakiri">
                            <label for="tingkat_penguasaan_materi" class="col-form-label">2). Tingkat Penguasaan
                                Materi</label>
                            <div class="radio2 d-inline">
                                <hr>

                            <input type="radio" class="btn-check @error ('tingkat_penguasaan_materi') is-invalid @enderror" name="tingkat_penguasaan_materi" id="tingkat_penguasaan_materi1" value="2" onclick="hasil()" {{ old('tingkat_penguasaan_materi', $skripsi->tingkat_penguasaan_materi) == '2' ? 'checked' : null }} >
            <label class="btn tombol btn-danger fw-normal " for="tingkat_penguasaan_materi1">Sangat Kurang Baik</label>

            <input type="radio" class="btn-check @error ('tingkat_penguasaan_materi') is-invalid @enderror" name="tingkat_penguasaan_materi" id="tingkat_penguasaan_materi2" value="4" onclick="hasil()" {{ old('tingkat_penguasaan_materi', $skripsi->tingkat_penguasaan_materi) == '4' ? 'checked' : null }} >
            <label class="btn tombol btn-warning fw-normal " for="tingkat_penguasaan_materi2">Kurang Baik</label>

            <input type="radio" class="btn-check @error ('tingkat_penguasaan_materi') is-invalid @enderror" name="tingkat_penguasaan_materi" id="tingkat_penguasaan_materi3" value="6" onclick="hasil()" {{ old('tingkat_penguasaan_materi', $skripsi->tingkat_penguasaan_materi) == '6' ? 'checked' : null }} >
            <label class="btn tombol btn-info fw-normal " for="tingkat_penguasaan_materi3">Biasa</label>

            <input type="radio" class="btn-check @error ('tingkat_penguasaan_materi') is-invalid @enderror" name="tingkat_penguasaan_materi" id="tingkat_penguasaan_materi4" value="8" onclick="hasil()" {{ old('tingkat_penguasaan_materi', $skripsi->tingkat_penguasaan_materi) == '8' ? 'checked' : null }} >
            <label class="btn tombol btn-primary fw-normal " for="tingkat_penguasaan_materi4">Baik</label>

            <input type="radio" class="btn-check @error ('tingkat_penguasaan_materi') is-invalid @enderror" name="tingkat_penguasaan_materi" id="tingkat_penguasaan_materi5" value="10" onclick="hasil()" {{ old('tingkat_penguasaan_materi', $skripsi->tingkat_penguasaan_materi) == '10' ? 'checked' : null }} >
            <label class="btn tombol btn-success fw-normal " for="tingkat_penguasaan_materi5">Sangat Baik</label>
                            </div>
                        </div>

                        <div class="mb-3 gridratakiri">
                            <label for="tinjauan_pustaka" class="col-form-label">3). Tinjauan Pustaka</label>
                            <div class="radio3 d-inline">
                                <hr>

                            <input type="radio" class="btn-check @error ('tinjauan_pustaka') is-invalid @enderror" name="tinjauan_pustaka" id="tinjauan_pustaka1" value="1.8" onclick="hasil()" {{ old('tinjauan_pustaka', $skripsi->tinjauan_pustaka) == '1.8' ? 'checked' : null }}>
            <label class="btn tombol btn-danger fw-normal " for="tinjauan_pustaka1">Sangat Kurang Baik</label>

            <input type="radio" class="btn-check @error ('tinjauan_pustaka') is-invalid @enderror" name="tinjauan_pustaka" id="tinjauan_pustaka2" value="3.6" onclick="hasil()" {{ old('tinjauan_pustaka', $skripsi->tinjauan_pustaka) == '3.6' ? 'checked' : null }}>
            <label class="btn tombol btn-warning fw-normal " for="tinjauan_pustaka2">Kurang Baik</label>

            <input type="radio" class="btn-check @error ('tinjauan_pustaka') is-invalid @enderror" name="tinjauan_pustaka" id="tinjauan_pustaka3" value="5.4" onclick="hasil()" {{ old('tinjauan_pustaka', $skripsi->tinjauan_pustaka) == '5.4' ? 'checked' : null }}>
            <label class="btn tombol btn-info fw-normal " for="tinjauan_pustaka3">Biasa</label>

            <input type="radio" class="btn-check @error ('tinjauan_pustaka') is-invalid @enderror" name="tinjauan_pustaka" id="tinjauan_pustaka4" value="7.2" onclick="hasil()" {{ old('tinjauan_pustaka', $skripsi->tinjauan_pustaka) == '7.2' ? 'checked' : null }}>
            <label class="btn tombol btn-primary fw-normal " for="tinjauan_pustaka4">Baik</label>

            <input type="radio" class="btn-check @error ('tinjauan_pustaka') is-invalid @enderror" name="tinjauan_pustaka" id="tinjauan_pustaka5" value="9" onclick="hasil()" {{ old('tinjauan_pustaka', $skripsi->tinjauan_pustaka) == '9' ? 'checked' : null }}>
            <label class="btn tombol btn-success fw-normal " for="tinjauan_pustaka5">Sangat Baik</label>

                            </div>
                        </div>

                        <div class="mb-3 gridratakiri">
                            <label for="penguasaan_dasar_teori" class="col-form-label">4). Tata Tulis</label>
                            <div class="radio4 d-inline">
                                <hr>

                            <input type="radio" class="btn-check @error ('tata_tulis') is-invalid @enderror" name="tata_tulis" id="tata_tulis1" value="1.6" onclick="hasil()" {{ old('tata_tulis', $skripsi->tata_tulis) == '1.6' ? 'checked' : null }}>
            <label class="btn tombol btn-danger fw-normal " for="tata_tulis1">Sangat Kurang Baik</label>

            <input type="radio" class="btn-check @error ('tata_tulis') is-invalid @enderror" name="tata_tulis" id="tata_tulis2" value="3.2" onclick="hasil()" {{ old('tata_tulis', $skripsi->tata_tulis) == '3.2' ? 'checked' : null }}>
            <label class="btn tombol btn-warning fw-normal " for="tata_tulis2">Kurang Baik</label>

            <input type="radio" class="btn-check @error ('tata_tulis') is-invalid @enderror" name="tata_tulis" id="tata_tulis3" value="4.8" onclick="hasil()" {{ old('tata_tulis', $skripsi->tata_tulis) == '4.8' ? 'checked' : null }}>
            <label class="btn tombol btn-info fw-normal " for="tata_tulis3">Biasa</label>

            <input type="radio" class="btn-check @error ('tata_tulis') is-invalid @enderror" name="tata_tulis" id="tata_tulis4" value="6.4" onclick="hasil()" {{ old('tata_tulis', $skripsi->tata_tulis) == '6.4' ? 'checked' : null }}>
            <label class="btn tombol btn-primary fw-normal " for="tata_tulis4">Baik</label>

            <input type="radio" class="btn-check @error ('tata_tulis') is-invalid @enderror" name="tata_tulis" id="tata_tulis5" value="8" onclick="hasil()" {{ old('tata_tulis', $skripsi->tata_tulis) == '8' ? 'checked' : null }}>
            <label class="btn tombol btn-success fw-normal " for="tata_tulis5">Sangat Baik</label>

                            </div>
                        </div>

                        <div class="mb-3 gridratakiri">
                            <label for="hasil_dan_pembahasan" class="col-form-label">5). Hasil dan Pembahasan</label>
                            <div class="radio15 d-inline">
                                <hr>

            <input type="radio" class="btn-check @error ('hasil_dan_pembahasan') is-invalid @enderror" name="hasil_dan_pembahasan" id="hasil_dan_pembahasan1" value="1.6" onclick="hasil()" {{ old('hasil_dan_pembahasan', $skripsi->hasil_dan_pembahasan) == '1.6' ? 'checked' : null }}>
            <label class="btn tombol btn-danger fw-normal " for="hasil_dan_pembahasan1">Sangat Kurang Baik</label>

            <input type="radio" class="btn-check @error ('hasil_dan_pembahasan') is-invalid @enderror" name="hasil_dan_pembahasan" id="hasil_dan_pembahasan2" value="4" onclick="hasil()" {{ old('hasil_dan_pembahasan', $skripsi->hasil_dan_pembahasan) == '4' ? 'checked' : null }}>
            <label class="btn tombol btn-warning fw-normal " for="hasil_dan_pembahasan2">Kurang Baik</label>

            <input type="radio" class="btn-check @error ('hasil_dan_pembahasan') is-invalid @enderror" name="hasil_dan_pembahasan" id="hasil_dan_pembahasan3" value="6" onclick="hasil()" {{ old('hasil_dan_pembahasan', $skripsi->hasil_dan_pembahasan) == '6' ? 'checked' : null }}>
            <label class="btn tombol btn-info fw-normal " for="hasil_dan_pembahasan3">Biasa</label>

            <input type="radio" class="btn-check @error ('hasil_dan_pembahasan') is-invalid @enderror" name="hasil_dan_pembahasan" id="hasil_dan_pembahasan4" value="8" onclick="hasil()" {{ old('hasil_dan_pembahasan', $skripsi->hasil_dan_pembahasan) == '8' ? 'checked' : null }}>
            <label class="btn tombol btn-primary fw-normal " for="hasil_dan_pembahasan4">Baik</label>

            <input type="radio" class="btn-check @error ('hasil_dan_pembahasan') is-invalid @enderror" name="hasil_dan_pembahasan" id="hasil_dan_pembahasan5" value="10" onclick="hasil()" {{ old('hasil_dan_pembahasan', $skripsi->hasil_dan_pembahasan) == '10' ? 'checked' : null }}>
            <label class="btn tombol btn-success fw-normal " for="hasil_dan_pembahasan5">Sangat Baik</label>

                            </div>
                        </div>

                        <div class="mb-3 gridratakiri">
                            <label for="hasil_dan_pembahasan" class="col-form-label">6). Sikap dan Kepribadian Ketika
                                Bimbingan</label>
                            <div class="radio5 d-inline">
                                <hr>

                            <input type="radio" class="btn-check @error ('sikap_dan_kepribadian') is-invalid @enderror" name="sikap_dan_kepribadian" id="sikap_dan_kepribadian1" value="1.6" onclick="hasil()" {{ old('sikap_dan_kepribadian', $skripsi->sikap_dan_kepribadian) == '1.6' ? 'checked' : null }}>
            <label class="btn tombol btn-danger fw-normal " for="sikap_dan_kepribadian1">Sangat Kurang Baik</label>

            <input type="radio" class="btn-check @error ('sikap_dan_kepribadian') is-invalid @enderror" name="sikap_dan_kepribadian" id="sikap_dan_kepribadian2" value="3.2" onclick="hasil()" {{ old('sikap_dan_kepribadian', $skripsi->sikap_dan_kepribadian) == '3.2' ? 'checked' : null }}>
            <label class="btn tombol btn-warning fw-normal " for="sikap_dan_kepribadian2">Kurang Baik</label>

            <input type="radio" class="btn-check @error ('sikap_dan_kepribadian') is-invalid @enderror" name="sikap_dan_kepribadian" id="sikap_dan_kepribadian3" value="4.8" onclick="hasil()" {{ old('sikap_dan_kepribadian', $skripsi->sikap_dan_kepribadian) == '4.8' ? 'checked' : null }}>
            <label class="btn tombol btn-info fw-normal " for="sikap_dan_kepribadian3">Biasa</label>

            <input type="radio" class="btn-check @error ('sikap_dan_kepribadian') is-invalid @enderror" name="sikap_dan_kepribadian" id="sikap_dan_kepribadian4" value="6.4" onclick="hasil()" {{ old('sikap_dan_kepribadian', $skripsi->sikap_dan_kepribadian) == '6.4' ? 'checked' : null }}>
            <label class="btn tombol btn-primary fw-normal " for="sikap_dan_kepribadian4">Baik</label>

            <input type="radio" class="btn-check @error ('sikap_dan_kepribadian') is-invalid @enderror" name="sikap_dan_kepribadian" id="sikap_dan_kepribadian5" value="8" onclick="hasil()" {{ old('sikap_dan_kepribadian', $skripsi->sikap_dan_kepribadian) == '8' ? 'checked' : null }}>
            <label class="btn tombol btn-success fw-normal " for="sikap_dan_kepribadian5">Sangat Baik</label>

                            </div>
                        </div>

                        <div class="col-lg-6 mt-5 ml-auto mr-auto">
                      <table class="table table-bordered bg-success">
                        <tbody>
                            <tr>
                                <td style="width: 250px">TOTAL NILAI (ANGKA)</td>
                                <td class="bg-success text-center">
                                    <input type="text" id="total_nilai_angka" class="form-control text-bold text-center ml-auto mr-auto" name="total_nilai_angka" style=" width: 50px;
                  background-color: rgb(255, 255, 255);                                                
                " readonly value="{{ $skripsi->total_nilai_angka }}">
                                    </h3>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 250px">TOTAL NILAI (HURUF)</td>

                                <td class="bg-success text-center">
                                    <input type="text" id="total_nilai_huruf" class="form-control text-bold text-center ml-auto mr-auto" name="total_nilai_huruf" style=" width: 50px;
                  background-color: rgb(255, 255, 255);
                " readonly value="{{ $skripsi->total_nilai_huruf }}">
                                    </h3>
                                </td>
                            </tr>
                        </tbody>
                      </table>
            </div>

                        <button type="submit" class="btn btnsimpan btn-success float-right">Perbarui</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endif

@if (auth()->user()->nip == $skripsi->penjadwalan_skripsi->pengujisatu_nip ||
    auth()->user()->nip == $skripsi->penjadwalan_skripsi->pengujidua_nip ||
    auth()->user()->nip == $skripsi->penjadwalan_skripsi->pengujitiga_nip)

    <form action="/penilaian-skripsi-penguji/edit/{{ $skripsi->id }}" method="POST">
        @method('put')
        @csrf
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
                    @if (auth()->user()->nip == $skripsi->penjadwalan_skripsi->pengujisatu_nip)
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
                <div class="tab-content" id="custom-tabs-one-tabContent">
                    <input type="hidden" name="penjadwalan_skripsi_id"
                        value="{{ $skripsi->penjadwalan_skripsi_id }}">
                    <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel"
                        aria-labelledby="custom-tabs-one-home-tab">

                        <div class="mb-3 gridratakiri">
                            <label for="presentasi" class="col-form-label">1). Presentasi</label>
                            <div class="radio6 d-inline">
                                <hr>

                            <input type="radio" class="btn-check @error ('presentasi') is-invalid @enderror" name="presentasi" id="presentasi1" value="0.4" onclick="total()" {{ old('presentasi', $skripsi->presentasi) == '0.4' ? 'checked' : null }} >
            <label class="btn tombol btn-danger fw-normal " for="presentasi1">Sangat Kurang Baik</label>

            <input type="radio" class="btn-check @error ('presentasi') is-invalid @enderror" name="presentasi" id="presentasi2" value="0.8" onclick="total()" {{ old('presentasi', $skripsi->presentasi) == '0.8' ? 'checked' : null }}>
            <label class="btn tombol btn-warning fw-normal " for="presentasi2">Kurang Baik</label>
            
            <input type="radio" class="btn-check @error ('presentasi') is-invalid @enderror" name="presentasi" id="presentasi3" value="1.2" onclick="total()" {{ old('presentasi', $skripsi->presentasi) == '1.2' ? 'checked' : null }}>
            <label class="btn tombol btn-info fw-normal " for="presentasi3">Biasa</label>

            <input type="radio" class="btn-check @error ('presentasi') is-invalid @enderror" name="presentasi" id="presentasi4" value="1.6" onclick="total()" {{ old('presentasi', $skripsi->presentasi) == '1.6' ? 'checked' : null }}>
            <label class="btn tombol btn-primary fw-normal " for="presentasi4">Baik</label>

            <input type="radio" class="btn-check @error ('presentasi') is-invalid @enderror" name="presentasi" id="presentasi5" value="2" onclick="total()" {{ old('presentasi', $skripsi->presentasi) == '2' ? 'checked' : null }}>
            <label class="btn tombol btn-success fw-normal " for="presentasi5">Sangat Baik</label>

                            </div>
                        </div>

                        <div class="mb-3 gridratakiri">
                            <label for="tingkat_penguasaan_materi" class="col-form-label">2). Tingkat Penguasaan
                                Materi</label>
                            <div class="radio7 d-inline">
                                <hr>

                            <input type="radio" class="btn-check @error ('tingkat_penguasaan_materi') is-invalid @enderror" name="tingkat_penguasaan_materi" id="tingkat_penguasaan_materi1" value="0.6" onclick="total()" {{ old('tingkat_penguasaan_materi', $skripsi->tingkat_penguasaan_materi) == '0.6' ? 'checked' : null }} >
            <label class="btn tombol btn-danger fw-normal " for="tingkat_penguasaan_materi1">Sangat Kurang Baik</label>

            <input type="radio" class="btn-check @error ('tingkat_penguasaan_materi') is-invalid @enderror" name="tingkat_penguasaan_materi" id="tingkat_penguasaan_materi2" value="1.2" onclick="total()" {{ old('tingkat_penguasaan_materi', $skripsi->tingkat_penguasaan_materi) == '1.2' ? 'checked' : null }} >
            <label class="btn tombol btn-warning fw-normal " for="tingkat_penguasaan_materi2">Kurang Baik</label>

            <input type="radio" class="btn-check @error ('tingkat_penguasaan_materi') is-invalid @enderror" name="tingkat_penguasaan_materi" id="tingkat_penguasaan_materi3" value="1.8" onclick="total()" {{ old('tingkat_penguasaan_materi', $skripsi->tingkat_penguasaan_materi) == '1.8' ? 'checked' : null }} >
            <label class="btn tombol btn-info fw-normal " for="tingkat_penguasaan_materi3">Biasa</label>

            <input type="radio" class="btn-check @error ('tingkat_penguasaan_materi') is-invalid @enderror" name="tingkat_penguasaan_materi" id="tingkat_penguasaan_materi4" value="2.4" onclick="total()" {{ old('tingkat_penguasaan_materi', $skripsi->tingkat_penguasaan_materi) == '2.4' ? 'checked' : null }} >
            <label class="btn tombol btn-primary fw-normal " for="tingkat_penguasaan_materi4">Baik</label>

            <input type="radio" class="btn-check @error ('tingkat_penguasaan_materi') is-invalid @enderror" name="tingkat_penguasaan_materi" id="tingkat_penguasaan_materi5" value="3" onclick="total()" {{ old('tingkat_penguasaan_materi', $skripsi->tingkat_penguasaan_materi) == '3' ? 'checked' : null }} >
            <label class="btn tombol btn-success fw-normal " for="tingkat_penguasaan_materi5">Sangat Baik</label>

                            </div>
                        </div>

                        <div class="mb-3 gridratakiri">
                            <label for="keaslian" class="col-form-label">3). Keaslian</label>
                            <div class="radio8 d-inline">
                                <hr>

                            <input type="radio" class="btn-check @error ('keaslian') is-invalid @enderror" name="keaslian" id="keaslian1" value="0.4" onclick="total()" {{ old('keaslian', $skripsi->keaslian) == '0.4' ? 'checked' : null }} >
            <label class="btn tombol btn-danger fw-normal " for="keaslian1">Sangat Kurang Baik</label>

            <input type="radio" class="btn-check @error ('keaslian') is-invalid @enderror" name="keaslian" id="keaslian2" value="0.8" onclick="total()" {{ old('keaslian', $skripsi->keaslian) == '0.8' ? 'checked' : null }} >
            <label class="btn tombol btn-warning fw-normal " for="keaslian2">Kurang Baik</label>

            <input type="radio" class="btn-check @error ('keaslian') is-invalid @enderror" name="keaslian" id="keaslian3" value="1.2" onclick="total()" {{ old('keaslian', $skripsi->keaslian) == '1.2' ? 'checked' : null }} >
            <label class="btn tombol btn-info fw-normal " for="keaslian3">Biasa</label>

            <input type="radio" class="btn-check @error ('keaslian') is-invalid @enderror" name="keaslian" id="keaslian4" value="1.6" onclick="total()" {{ old('keaslian', $skripsi->keaslian) == '1.6' ? 'checked' : null }} >
            <label class="btn tombol btn-primary fw-normal " for="keaslian4">Baik</label>

            <input type="radio" class="btn-check @error ('keaslian') is-invalid @enderror" name="keaslian" id="keaslian5" value="2" onclick="total()" {{ old('keaslian', $skripsi->keaslian) == '2' ? 'checked' : null }} >
            <label class="btn tombol btn-success fw-normal " for="keaslian5">Sangat Baik</label>

                            </div>
                        </div>

                        <div class="mb-3 gridratakiri">
                            <label for="ketepatan_metodologi" class="col-form-label">4). Ketepatan Metodologi</label>
                            <div class="radio9 d-inline">
                                <hr>

                            <input type="radio" class="btn-check @error ('ketepatan_metodologi') is-invalid @enderror" name="ketepatan_metodologi" id="ketepatan_metodologi1" value="0.8" onclick="total()" {{ old('ketepatan_metodologi', $skripsi->ketepatan_metodologi) == '0.8' ? 'checked' : null }} >
            <label class="btn tombol btn-danger fw-normal " for="ketepatan_metodologi1">Sangat Kurang Baik</label>

            <input type="radio" class="btn-check @error ('ketepatan_metodologi') is-invalid @enderror" name="ketepatan_metodologi" id="ketepatan_metodologi2" value="1.6" onclick="total()" {{ old('ketepatan_metodologi', $skripsi->ketepatan_metodologi) == '1.6' ? 'checked' : null }} >
            <label class="btn tombol btn-warning fw-normal " for="ketepatan_metodologi2">Kurang Baik</label>

            <input type="radio" class="btn-check @error ('ketepatan_metodologi') is-invalid @enderror" name="ketepatan_metodologi" id="ketepatan_metodologi3" value="2.4" onclick="total()" {{ old('ketepatan_metodologi', $skripsi->ketepatan_metodologi) == '2.4' ? 'checked' : null }} >
            <label class="btn tombol btn-info fw-normal " for="ketepatan_metodologi3">Biasa</label>

            <input type="radio" class="btn-check @error ('ketepatan_metodologi') is-invalid @enderror" name="ketepatan_metodologi" id="ketepatan_metodologi4" value="3.2" onclick="total()" {{ old('ketepatan_metodologi', $skripsi->ketepatan_metodologi) == '3.2' ? 'checked' : null }} >
            <label class="btn tombol btn-primary fw-normal " for="ketepatan_metodologi4">Baik</label>

            <input type="radio" class="btn-check @error ('ketepatan_metodologi') is-invalid @enderror" name="ketepatan_metodologi" id="ketepatan_metodologi5" value="4" onclick="total()" {{ old('ketepatan_metodologi', $skripsi->ketepatan_metodologi) == '4' ? 'checked' : null }} >
            <label class="btn tombol btn-success fw-normal " for="ketepatan_metodologi5">Sangat Baik</label>
                            </div>
                        </div>

                        <div class="mb-3 gridratakiri">
                            <label for="penguasaan_dasar_teori" class="col-form-label">5). Penguasaan Dasar Teori</label>
                            <div class="radio10 d-inline">
                                <hr>

                            <input type="radio" class="btn-check @error ('penguasaan_dasar_teori') is-invalid @enderror" name="penguasaan_dasar_teori" id="penguasaan_dasar_teori1" value="0.8" onclick="total()" {{ old('penguasaan_dasar_teori', $skripsi->penguasaan_dasar_teori) == '0.8' ? 'checked' : null }} >
            <label class="btn tombol btn-danger fw-normal " for="penguasaan_dasar_teori1">Sangat Kurang Baik</label>

            <input type="radio" class="btn-check @error ('penguasaan_dasar_teori') is-invalid @enderror" name="penguasaan_dasar_teori" id="penguasaan_dasar_teori2" value="1.6" onclick="total()" {{ old('penguasaan_dasar_teori', $skripsi->penguasaan_dasar_teori) == '1.6' ? 'checked' : null }} >
            <label class="btn tombol btn-warning fw-normal " for="penguasaan_dasar_teori2">Kurang Baik</label>

            <input type="radio" class="btn-check @error ('penguasaan_dasar_teori') is-invalid @enderror" name="penguasaan_dasar_teori" id="penguasaan_dasar_teori3" value="2.4" onclick="total()" {{ old('penguasaan_dasar_teori', $skripsi->penguasaan_dasar_teori) == '2.4' ? 'checked' : null }} >
            <label class="btn tombol btn-info fw-normal " for="penguasaan_dasar_teori3">Biasa</label>

            <input type="radio" class="btn-check @error ('penguasaan_dasar_teori') is-invalid @enderror" name="penguasaan_dasar_teori" id="penguasaan_dasar_teori4" value="3.2" onclick="total()" {{ old('penguasaan_dasar_teori', $skripsi->penguasaan_dasar_teori) == '3.2' ? 'checked' : null }} >
            <label class="btn tombol btn-primary fw-normal " for="penguasaan_dasar_teori4">Baik</label>

            <input type="radio" class="btn-check @error ('penguasaan_dasar_teori') is-invalid @enderror" name="penguasaan_dasar_teori" id="penguasaan_dasar_teori5" value="4" onclick="total()" {{ old('penguasaan_dasar_teori', $skripsi->penguasaan_dasar_teori) == '4' ? 'checked' : null }} >
            <label class="btn tombol btn-success fw-normal " for="penguasaan_dasar_teori5">Sangat Baik</label>

                            </div>
                        </div>

                        <div class="mb-3 gridratakiri">
                            <label for="kecermatan_perumusan_masalah" class="col-form-label">6). Kecermatan Perumusan
                                Masalah</label>
                            <div class="radio11 d-inline">
                                <hr>

                            <input type="radio" class="btn-check @error ('kecermatan_perumusan_masalah') is-invalid @enderror" name="kecermatan_perumusan_masalah" id="kecermatan_perumusan_masalah1" value="0.6" onclick="total()" {{ old('kecermatan_perumusan_masalah', $skripsi->kecermatan_perumusan_masalah) == '0.6' ? 'checked' : null }} >
            <label class="btn tombol btn-danger fw-normal " for="kecermatan_perumusan_masalah1">Sangat Kurang Baik</label>

            <input type="radio" class="btn-check @error ('kecermatan_perumusan_masalah') is-invalid @enderror" name="kecermatan_perumusan_masalah" id="kecermatan_perumusan_masalah2" value="1.2" onclick="total()" {{ old('kecermatan_perumusan_masalah', $skripsi->kecermatan_perumusan_masalah) == '1.2' ? 'checked' : null }} >
            <label class="btn tombol btn-warning fw-normal " for="kecermatan_perumusan_masalah2">Kurang Baik</label>

            <input type="radio" class="btn-check @error ('kecermatan_perumusan_masalah') is-invalid @enderror" name="kecermatan_perumusan_masalah" id="kecermatan_perumusan_masalah3" value="1.8" onclick="total()" {{ old('kecermatan_perumusan_masalah', $skripsi->kecermatan_perumusan_masalah) == '1.8' ? 'checked' : null }} >
            <label class="btn tombol btn-info fw-normal " for="kecermatan_perumusan_masalah3">Biasa</label>

            <input type="radio" class="btn-check @error ('kecermatan_perumusan_masalah') is-invalid @enderror" name="kecermatan_perumusan_masalah" id="kecermatan_perumusan_masalah4" value="2.4" onclick="total()" {{ old('kecermatan_perumusan_masalah', $skripsi->kecermatan_perumusan_masalah) == '2.4' ? 'checked' : null }} >
            <label class="btn tombol btn-primary fw-normal " for="kecermatan_perumusan_masalah4">Baik</label>

            <input type="radio" class="btn-check @error ('kecermatan_perumusan_masalah') is-invalid @enderror" name="kecermatan_perumusan_masalah" id="kecermatan_perumusan_masalah5" value="3" onclick="total()" {{ old('kecermatan_perumusan_masalah', $skripsi->kecermatan_perumusan_masalah) == '3' ? 'checked' : null }} >
            <label class="btn tombol btn-success fw-normal " for="kecermatan_perumusan_masalah5">Sangat Baik</label>

                            </div>
                        </div>

                        <div class="mb-3 gridratakiri">
                            <label for="tinjauan_pustaka" class="col-form-label">7). Tinjauan Pustaka</label>
                            <div class="radio12 d-inline">
                                <hr>

                            <input type="radio" class="btn-check @error ('tinjauan_pustaka') is-invalid @enderror" name="tinjauan_pustaka" id="tinjauan_pustaka1" value="0.6" onclick="total()" {{ old('tinjauan_pustaka', $skripsi->tinjauan_pustaka) == '0.6' ? 'checked' : null }} >
            <label class="btn tombol btn-danger fw-normal " for="tinjauan_pustaka1">Sangat Kurang Baik</label>

            <input type="radio" class="btn-check @error ('tinjauan_pustaka') is-invalid @enderror" name="tinjauan_pustaka" id="tinjauan_pustaka2" value="1.2" onclick="total()" {{ old('tinjauan_pustaka', $skripsi->tinjauan_pustaka) == '1.2' ? 'checked' : null }} >
            <label class="btn tombol btn-warning fw-normal " for="tinjauan_pustaka2">Kurang Baik</label>

            <input type="radio" class="btn-check @error ('tinjauan_pustaka') is-invalid @enderror" name="tinjauan_pustaka" id="tinjauan_pustaka3" value="1.8" onclick="total()" {{ old('tinjauan_pustaka', $skripsi->tinjauan_pustaka) == '1.8' ? 'checked' : null }} >
            <label class="btn tombol btn-info fw-normal " for="tinjauan_pustaka3">Biasa</label>

            <input type="radio" class="btn-check @error ('tinjauan_pustaka') is-invalid @enderror" name="tinjauan_pustaka" id="tinjauan_pustaka4" value="2.4" onclick="total()" {{ old('tinjauan_pustaka', $skripsi->tinjauan_pustaka) == '2.4' ? 'checked' : null }} >
            <label class="btn tombol btn-primary fw-normal " for="tinjauan_pustaka4">Baik</label>

            <input type="radio" class="btn-check @error ('tinjauan_pustaka') is-invalid @enderror" name="tinjauan_pustaka" id="tinjauan_pustaka5" value="3" onclick="total()" {{ old('tinjauan_pustaka', $skripsi->tinjauan_pustaka) == '3' ? 'checked' : null }} >
            <label class="btn tombol btn-success fw-normal " for="tinjauan_pustaka5">Sangat Baik</label>

                            </div>
                        </div>

                        <div class="mb-3 gridratakiri">
                            <label for="tata_tulis" class="col-form-label">8). Tata Tulis</label>
                            <div class="radio13 d-inline">
                                <hr>

                            <input type="radio" class="btn-check @error ('tata_tulis') is-invalid @enderror" name="tata_tulis" id="tata_tulis1" value="0.4" onclick="total()" {{ old('tata_tulis', $skripsi->tata_tulis) == '0.4' ? 'checked' : null }} >
            <label class="btn tombol btn-danger fw-normal " for="tata_tulis1">Sangat Kurang Baik</label>

            <input type="radio" class="btn-check @error ('tata_tulis') is-invalid @enderror" name="tata_tulis" id="tata_tulis2" value="0.8" onclick="total()" {{ old('tata_tulis', $skripsi->tata_tulis) == '0.8' ? 'checked' : null }} >
            <label class="btn tombol btn-warning fw-normal " for="tata_tulis2">Kurang Baik</label>

            <input type="radio" class="btn-check @error ('tata_tulis') is-invalid @enderror" name="tata_tulis" id="tata_tulis3" value="1.2" onclick="total()" {{ old('tata_tulis', $skripsi->tata_tulis) == '1.2' ? 'checked' : null }} >
            <label class="btn tombol btn-info fw-normal " for="tata_tulis3">Biasa</label>

            <input type="radio" class="btn-check @error ('tata_tulis') is-invalid @enderror" name="tata_tulis" id="tata_tulis4" value="1.6" onclick="total()" {{ old('tata_tulis', $skripsi->tata_tulis) == '1.6' ? 'checked' : null }} >
            <label class="btn tombol btn-primary fw-normal " for="tata_tulis4">Baik</label>

            <input type="radio" class="btn-check @error ('tata_tulis') is-invalid @enderror" name="tata_tulis" id="tata_tulis5" value="2" onclick="total()" {{ old('tata_tulis', $skripsi->tata_tulis) == '2' ? 'checked' : null }} >
            <label class="btn tombol btn-success fw-normal " for="tata_tulis5">Sangat Baik</label>

                            </div>
                        </div>

                        <div class="mb-3 gridratakiri">
                            <label for="tools" class="col-form-label">9). Tools yang digunakan</label>
                            <div class="radio16 d-inline">
                                <hr>

                            <input type="radio" class="btn-check @error ('tools') is-invalid @enderror" name="tools" id="tools1" value="0.4" onclick="total()" {{ old('tools', $skripsi->tools) == '0.4' ? 'checked' : null }} >
            <label class="btn tombol btn-danger fw-normal " for="tools1">Sangat Kurang Baik</label>

            <input type="radio" class="btn-check @error ('tools') is-invalid @enderror" name="tools" id="tools2" value="0.8" onclick="total()" {{ old('tools', $skripsi->tools) == '0.8' ? 'checked' : null }} >
            <label class="btn tombol btn-warning fw-normal " for="tools2">Kurang Baik</label>

            <input type="radio" class="btn-check @error ('tools') is-invalid @enderror" name="tools" id="tools3" value="1.2" onclick="total()" {{ old('tools', $skripsi->tools) == '1.2' ? 'checked' : null }} >
            <label class="btn tombol btn-info fw-normal " for="tools3">Biasa</label>

            <input type="radio" class="btn-check @error ('tools') is-invalid @enderror" name="tools" id="tools4" value="1.6" onclick="total()" {{ old('tools', $skripsi->tools) == '1.6' ? 'checked' : null }} >
            <label class="btn tombol btn-primary fw-normal " for="tools4">Baik</label>

            <input type="radio" class="btn-check @error ('tools') is-invalid @enderror" name="tools" id="tools5" value="2" onclick="total()" {{ old('tools', $skripsi->tools) == '2' ? 'checked' : null }} >
            <label class="btn tombol btn-success fw-normal " for="tools5">Sangat Baik</label>

                            </div>
                        </div>

                        <div class="mb-3 gridratakiri">
                            <label for="penyajian_data" class="col-form-label">10). Penyajian Data</label>
                            <div class="radio17 d-inline">
                                <h1></h1>

                            <input type="radio" class="btn-check @error ('penyajian_data') is-invalid @enderror" name="penyajian_data" id="penyajian_data1" value="0.6" onclick="total()" {{ old('penyajian_data', $skripsi->penyajian_data) == '0.6' ? 'checked' : null }} >
            <label class="btn tombol btn-danger fw-normal " for="penyajian_data1">Sangat Kurang Baik</label>

            <input type="radio" class="btn-check @error ('penyajian_data') is-invalid @enderror" name="penyajian_data" id="penyajian_data2" value="1.2" onclick="total()" {{ old('penyajian_data', $skripsi->penyajian_data) == '1.2' ? 'checked' : null }} >
            <label class="btn tombol btn-warning fw-normal " for="penyajian_data2">Kurang Baik</label>

            <input type="radio" class="btn-check @error ('penyajian_data') is-invalid @enderror" name="penyajian_data" id="penyajian_data3" value="1.8" onclick="total()" {{ old('penyajian_data', $skripsi->penyajian_data) == '1.8' ? 'checked' : null }} >
            <label class="btn tombol btn-info fw-normal " for="penyajian_data3">Biasa</label>

            <input type="radio" class="btn-check @error ('penyajian_data') is-invalid @enderror" name="penyajian_data" id="penyajian_data4" value="2.4" onclick="total()" {{ old('penyajian_data', $skripsi->penyajian_data) == '2.4' ? 'checked' : null }} >
            <label class="btn tombol btn-primary fw-normal " for="penyajian_data4">Baik</label>

            <input type="radio" class="btn-check @error ('penyajian_data') is-invalid @enderror" name="penyajian_data" id="penyajian_data5" value="3" onclick="total()" {{ old('penyajian_data', $skripsi->penyajian_data) == '3' ? 'checked' : null }} >
            <label class="btn tombol btn-success fw-normal " for="penyajian_data5">Sangat Baik</label>

                            </div>
                        </div>

                        <div class="mb-3 gridratakiri">
                            <label for="hasil" class="col-form-label">11). Hasil</label>
                            <div class="radio18 d-inline">
                                <hr>

                            <input type="radio" class="btn-check @error ('hasil') is-invalid @enderror" name="hasil" id="hasil1" value="0.8" onclick="total()" {{ old('hasil', $skripsi->hasil) == '0.8' ? 'checked' : null }} >
            <label class="btn tombol btn-danger fw-normal " for="hasil1">Sangat Kurang Baik</label>

            <input type="radio" class="btn-check @error ('hasil') is-invalid @enderror" name="hasil" id="hasil2" value="1.6" onclick="total()" {{ old('hasil', $skripsi->hasil) == '1.6' ? 'checked' : null }} >
            <label class="btn tombol btn-warning fw-normal " for="hasil2">Kurang Baik</label>

            <input type="radio" class="btn-check @error ('hasil') is-invalid @enderror" name="hasil" id="hasil3" value="2.4" onclick="total()" {{ old('hasil', $skripsi->hasil) == '2.4' ? 'checked' : null }} >
            <label class="btn tombol btn-info fw-normal " for="hasil3">Biasa</label>

            <input type="radio" class="btn-check @error ('hasil') is-invalid @enderror" name="hasil" id="hasil4" value="3.2" onclick="total()" {{ old('hasil', $skripsi->hasil) == '3.2' ? 'checked' : null }} >
            <label class="btn tombol btn-primary fw-normal " for="hasil4">Baik</label>

            <input type="radio" class="btn-check @error ('hasil') is-invalid @enderror" name="hasil" id="hasil5" value="4" onclick="total()" {{ old('hasil', $skripsi->hasil) == '4' ? 'checked' : null }} >
            <label class="btn tombol btn-success fw-normal " for="hasil5">Sangat Baik</label>

                            </div>
                        </div>

                        <div class="mb-3 gridratakiri">
                            <label for="pembahasan" class="col-form-label">12). Pembahasan</label>
                            <div class="radio19 d-inline">
                                <hr>

                            <input type="radio" class="btn-check @error ('pembahasan') is-invalid @enderror" name="pembahasan" id="pembahasan1" value="0.8" onclick="total()" {{ old('pembahasan', $skripsi->pembahasan) == '0.8' ? 'checked' : null }} >
            <label class="btn tombol btn-danger fw-normal " for="pembahasan1">Sangat Kurang Baik</label>

            <input type="radio" class="btn-check @error ('pembahasan') is-invalid @enderror" name="pembahasan" id="pembahasan2" value="1.6" onclick="total()" {{ old('pembahasan', $skripsi->pembahasan) == '1.6' ? 'checked' : null }} >
            <label class="btn tombol btn-warning fw-normal " for="pembahasan2">Kurang Baik</label>

            <input type="radio" class="btn-check @error ('pembahasan') is-invalid @enderror" name="pembahasan" id="pembahasan3" value="2.4" onclick="total()" {{ old('pembahasan', $skripsi->pembahasan) == '2.4' ? 'checked' : null }} >
            <label class="btn tombol btn-info fw-normal " for="pembahasan3">Biasa</label>

            <input type="radio" class="btn-check @error ('pembahasan') is-invalid @enderror" name="pembahasan" id="pembahasan4" value="3.2" onclick="total()" {{ old('pembahasan', $skripsi->pembahasan) == '3.2' ? 'checked' : null }} >
            <label class="btn tombol btn-primary fw-normal " for="pembahasan4">Baik</label>

            <input type="radio" class="btn-check @error ('pembahasan') is-invalid @enderror" name="pembahasan" id="pembahasan5" value="4" onclick="total()" {{ old('pembahasan', $skripsi->pembahasan) == '4' ? 'checked' : null }} >
            <label class="btn tombol btn-success fw-normal " for="pembahasan5">Sangat Baik</label>

                            </div>
                        </div>

                        <div class="mb-3 gridratakiri">
                            <label for="kesimpulan" class="col-form-label">13). Kesimpulan</label>
                            <div class="radio20 d-inline">
                                <hr>

                            <input type="radio" class="btn-check @error ('kesimpulan') is-invalid @enderror" name="kesimpulan" id="kesimpulan1" value="0.6" onclick="total()" {{ old('kesimpulan', $skripsi->kesimpulan) == '0.6' ? 'checked' : null }} >
            <label class="btn tombol btn-danger fw-normal " for="kesimpulan1">Sangat Kurang Baik</label>

            <input type="radio" class="btn-check @error ('kesimpulan') is-invalid @enderror" name="kesimpulan" id="kesimpulan2" value="1.2" onclick="total()" {{ old('kesimpulan', $skripsi->kesimpulan) == '1.2' ? 'checked' : null }} >
            <label class="btn tombol btn-warning fw-normal " for="kesimpulan2">Kurang Baik</label>

            <input type="radio" class="btn-check @error ('kesimpulan') is-invalid @enderror" name="kesimpulan" id="kesimpulan3" value="1.8" onclick="total()" {{ old('kesimpulan', $skripsi->kesimpulan) == '1.8' ? 'checked' : null }} >
            <label class="btn tombol btn-info fw-normal " for="kesimpulan3">Biasa</label>

            <input type="radio" class="btn-check @error ('kesimpulan') is-invalid @enderror" name="kesimpulan" id="kesimpulan4" value="2.4" onclick="total()" {{ old('kesimpulan', $skripsi->kesimpulan) == '2.4' ? 'checked' : null }} >
            <label class="btn tombol btn-primary fw-normal " for="kesimpulan4">Baik</label>

            <input type="radio" class="btn-check @error ('kesimpulan') is-invalid @enderror" name="kesimpulan" id="kesimpulan5" value="3" onclick="total()" {{ old('kesimpulan', $skripsi->kesimpulan) == '3' ? 'checked' : null }} >
            <label class="btn tombol btn-success fw-normal " for="kesimpulan5">Sangat Baik</label>

                            </div>
                        </div>

                        <div class="mb-3 gridratakiri">
                            <label for="luaran" class="col-form-label">14). Luaran</label>
                            <div class="radio21 d-inline">
                                <hr>

                            <input type="radio" class="btn-check @error ('luaran') is-invalid @enderror" name="luaran" id="luaran1" value="0.6" onclick="total()" {{ old('luaran', $skripsi->luaran) == '0.6' ? 'checked' : null }} >
            <label class="btn tombol btn-danger fw-normal " for="luaran1">Sangat Kurang Baik</label>

            <input type="radio" class="btn-check @error ('luaran') is-invalid @enderror" name="luaran" id="luaran2" value="1.2" onclick="total()" {{ old('luaran', $skripsi->luaran) == '1.2' ? 'checked' : null }} >
            <label class="btn tombol btn-warning fw-normal " for="luaran2">Kurang Baik</label>

            <input type="radio" class="btn-check @error ('luaran') is-invalid @enderror" name="luaran" id="luaran3" value="1.8" onclick="total()" {{ old('luaran', $skripsi->luaran) == '1.8' ? 'checked' : null }} >
            <label class="btn tombol btn-info fw-normal " for="luaran3">Biasa</label>

            <input type="radio" class="btn-check @error ('luaran') is-invalid @enderror" name="luaran" id="luaran4" value="2.4" onclick="total()" {{ old('luaran', $skripsi->luaran) == '2.4' ? 'checked' : null }} >
            <label class="btn tombol btn-primary fw-normal " for="luaran4">Baik</label>

            <input type="radio" class="btn-check @error ('luaran') is-invalid @enderror" name="luaran" id="luaran5" value="3" onclick="total()" {{ old('luaran', $skripsi->luaran) == '3' ? 'checked' : null }} >
            <label class="btn tombol btn-success fw-normal " for="luaran5">Sangat Baik</label>

                            </div>
                        </div>

                        <div class="mb-3 gridratakiri">
                            <label for="sumbangan_pemikiran" class="col-form-label">15). Sumbangan Pemikiran Terhadap Ilmu
                                Pengetahuan</label>
                            <div class="radio14 d-inline">
                                <hr>

                            <input type="radio" class="btn-check @error ('sumbangan_pemikiran') is-invalid @enderror" name="sumbangan_pemikiran" id="sumbangan_pemikiran1" value="0.6" onclick="total()" {{ old('sumbangan_pemikiran', $skripsi->sumbangan_pemikiran) == '0.6' ? 'checked' : null }} >
            <label class="btn tombol btn-danger fw-normal " for="sumbangan_pemikiran1">Sangat Kurang Baik</label>

            <input type="radio" class="btn-check @error ('sumbangan_pemikiran') is-invalid @enderror" name="sumbangan_pemikiran" id="sumbangan_pemikiran2" value="1.2" onclick="total()" {{ old('sumbangan_pemikiran', $skripsi->sumbangan_pemikiran) == '1.2' ? 'checked' : null }} >
            <label class="btn tombol btn-warning fw-normal " for="sumbangan_pemikiran2">Kurang Baik</label>

            <input type="radio" class="btn-check @error ('sumbangan_pemikiran') is-invalid @enderror" name="sumbangan_pemikiran" id="sumbangan_pemikiran3" value="1.8" onclick="total()" {{ old('sumbangan_pemikiran', $skripsi->sumbangan_pemikiran) == '1.8' ? 'checked' : null }} >
            <label class="btn tombol btn-info fw-normal " for="sumbangan_pemikiran3">Biasa</label>

            <input type="radio" class="btn-check @error ('sumbangan_pemikiran') is-invalid @enderror" name="sumbangan_pemikiran" id="sumbangan_pemikiran4" value="2.4" onclick="total()" {{ old('sumbangan_pemikiran', $skripsi->sumbangan_pemikiran) == '2.4' ? 'checked' : null }} >
            <label class="btn tombol btn-primary fw-normal " for="sumbangan_pemikiran4">Baik</label>

            <input type="radio" class="btn-check @error ('sumbangan_pemikiran') is-invalid @enderror" name="sumbangan_pemikiran" id="sumbangan_pemikiran5" value="3" onclick="total()" {{ old('sumbangan_pemikiran', $skripsi->sumbangan_pemikiran) == '3' ? 'checked' : null }} >
            <label class="btn tombol btn-success fw-normal " for="sumbangan_pemikiran5">Sangat Baik</label>

                            </div>
                        </div>

                        <div class="col-lg-6 mt-5 ml-auto mr-auto">
                      <table class="table table-bordered bg-success">
                        <tbody>
                            <tr>
                                <td style="width: 250px">TOTAL NILAI (ANGKA)</td>
                                <td class="bg-success text-center">
                                    <input type="text" id="total_nilai_angka" class="form-control text-bold text-center ml-auto mr-auto" name="total_nilai_angka" style=" width: 50px;
                  background-color: rgb(255, 255, 255);                                                
                " readonly value="{{ $skripsi->total_nilai_angka }}">
                                    </h3>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 250px">TOTAL NILAI (HURUF)</td>

                                <td class="bg-success text-center">
                                    <input type="text" id="total_nilai_huruf" class="form-control text-bold text-center ml-auto mr-auto" name="total_nilai_huruf" style=" width: 50px;
                  background-color: rgb(255, 255, 255);
                " readonly value="{{ $skripsi->total_nilai_huruf }}">
                                    </h3>
                                </td>
                            </tr>
                        </tbody>
                      </table>
            </div>

                        <button type="submit" class="btn btnsimpan btn-success float-right">Perbarui</button>

                    </div>

                    <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel"
                        aria-labelledby="custom-tabs-one-profile-tab">

                        <div class="mb-3 gridratakiri">                      
                        <div class="fw-bold mb-2">Perbaikan 1</div>
                      <input type="text" name="revisi_naskah1" class="form-control" value="{{ $skripsi->revisi_naskah1 != null ? $skripsi->revisi_naskah1 : '' }}">
                    </div>
                    
                    <div class="mb-3 gridratakiri">                      
                    <div class="fw-bold mb-2">Perbaikan 2</div>
                      <input type="text" name="revisi_naskah2" class="form-control" value="{{ $skripsi->revisi_naskah2 != null ? $skripsi->revisi_naskah2 : '' }}">
                    </div>

                    <div class="mb-3 gridratakiri">                      
                    <div class="fw-bold mb-2">Perbaikan 3</div>
                      <input type="text" name="revisi_naskah3" class="form-control" value="{{ $skripsi->revisi_naskah3 != null ? $skripsi->revisi_naskah3 : '' }}">
                    </div>

                    <div class="mb-3 gridratakiri">                      
                    <div class="fw-bold mb-2">Perbaikan 4</div>
                      <input type="text" name="revisi_naskah4" class="form-control" value="{{ $skripsi->revisi_naskah4 != null ? $skripsi->revisi_naskah4 : '' }}">
                    </div>

                    <div class="mb-3 gridratakiri">                      
                    <div class="fw-bold mb-2">Perbaikan 5</div>
                      <input type="text" name="revisi_naskah5" class="form-control" value="{{ $skripsi->revisi_naskah5 != null ? $skripsi->revisi_naskah5 : '' }}">
                    </div>
                        <button type="submit" class="btn btn-success float-right">Perbarui</button>
                    </form>
                    </div>

                    @if (auth()->user()->nip == $skripsi->penjadwalan_skripsi->pengujisatu_nip)
                    <div class="tab-pane fade" id="custom-tabs-one-form" role="tabpanel"
                        aria-labelledby="custom-tabs-one-form-tab">

                        <form action="/revisi-skripsi/create/{{$skripsi->penjadwalan_skripsi->id}}" method="POST">
                            @csrf
                            <div class="mb-3 gridratakiri">
                            <label class="form-label">Judul Lama</label>
                            <input type="text" class="form-control" value="{{$skripsi->penjadwalan_skripsi->judul_skripsi}}" readonly>  
                            </div>
                            <div class="mb-3 gridratakiri">
                            <label class="form-label">Judul Baru</label>
                            <input type="text" name="revisi_skripsi" class="form-control" value="{{ $skripsi->penjadwalan_skripsi->revisi_skripsi != null ? $skripsi->penjadwalan_skripsi->revisi_skripsi : '' }}">
                            </div>              
                            <button type="submit" class="btn btn-success float-right">Perbarui</button>
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
                                                    <th class="bg-success text-center">B</th>
                                                    <th class="text-center">Penguji 1</th>
                                                    <th class="text-center">Penguji 2</th>
                                                    <th class="text-center">Penguji 3</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Presentasi</td>
                                                    <td class="bg-secondary text-center">2</td>
                                                    <td class="text-center">{{ $nilaipenguji1 != '' ? $nilaipenguji1->presentasi : '-' }}
                                                    </td>

                                                    <td class="text-center">{{ $nilaipenguji2 != '' ? $nilaipenguji2->presentasi : '-' }}
                                                    </td>
                                                    <td class="text-center">{{ $nilaipenguji3 != '' ? $nilaipenguji3->presentasi : '-' }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Tingkat Penguasaan Materi</td>
                                                    <td class="bg-secondary text-center">3</td>
                                                    <td class="text-center">{{ $nilaipenguji1 != '' ? $nilaipenguji1->tingkat_penguasaan_materi : '-' }}
                                                    </td>
                                                    <td class="text-center">{{ $nilaipenguji2 != '' ? $nilaipenguji2->tingkat_penguasaan_materi : '-' }}
                                                    </td>
                                                    <td class="text-center">{{ $nilaipenguji3 != '' ? $nilaipenguji3->tingkat_penguasaan_materi : '-' }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>Keaslian</td>
                                                    <td class="bg-secondary text-center">2</td>
                                                    <td class="text-center">{{ $nilaipenguji1 != '' ? $nilaipenguji1->keaslian : '-' }}
                                                    </td>
                                                    <td class="text-center">{{ $nilaipenguji2 != '' ? $nilaipenguji2->keaslian : '-' }}
                                                    </td>
                                                    <td class="text-center">{{ $nilaipenguji3 != '' ? $nilaipenguji3->keaslian : '-' }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>4</td>
                                                    <td>Ketepatan Metodologi</td>
                                                    <td class="bg-secondary text-center">4</td>
                                                    <td class="text-center">{{ $nilaipenguji1 != '' ? $nilaipenguji1->ketepatan_metodologi : '-' }}
                                                    </td>
                                                    <td class="text-center">{{ $nilaipenguji2 != '' ? $nilaipenguji2->ketepatan_metodologi : '-' }}
                                                    </td>
                                                    <td class="text-center">{{ $nilaipenguji3 != '' ? $nilaipenguji3->ketepatan_metodologi : '-' }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>5</td>
                                                    <td>Penguasaan Dasar Teori</td>
                                                    <td class="bg-secondary text-center">4</td>
                                                    <td class="text-center">{{ $nilaipenguji1 != '' ? $nilaipenguji1->penguasaan_dasar_teori : '-' }}
                                                    </td>
                                                    <td class="text-center">{{ $nilaipenguji2 != '' ? $nilaipenguji2->penguasaan_dasar_teori : '-' }}
                                                    </td>
                                                    <td class="text-center">{{ $nilaipenguji3 != '' ? $nilaipenguji3->penguasaan_dasar_teori : '-' }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>6</td>
                                                    <td>Kecermatan Perumusan Masalah</td>
                                                    <td class="bg-secondary text-center">3</td>
                                                    <td class="text-center">{{ $nilaipenguji1 != '' ? $nilaipenguji1->kecermatan_perumusan_masalah : '-' }}
                                                    </td>
                                                    <td class="text-center">{{ $nilaipenguji2 != '' ? $nilaipenguji2->kecermatan_perumusan_masalah : '-' }}
                                                    </td>
                                                    <td class="text-center">{{ $nilaipenguji3 != '' ? $nilaipenguji3->kecermatan_perumusan_masalah : '-' }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>7</td>
                                                    <td>Tinjauan Pustaka</td>
                                                    <td class="bg-secondary text-center">3</td>
                                                    <td class="text-center">{{ $nilaipenguji1 != '' ? $nilaipenguji1->tinjauan_pustaka : '-' }}
                                                    </td>
                                                    <td class="text-center">{{ $nilaipenguji2 != '' ? $nilaipenguji2->tinjauan_pustaka : '-' }}
                                                    </td>
                                                    <td class="text-center">{{ $nilaipenguji3 != '' ? $nilaipenguji3->tinjauan_pustaka : '-' }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>8</td>
                                                    <td>Tata Tulis</td>
                                                    <td class="bg-secondary text-center">2</td>
                                                    <td class="text-center">{{ $nilaipenguji1 != '' ? $nilaipenguji1->tata_tulis : '-' }}
                                                    </td>
                                                    <td class="text-center">{{ $nilaipenguji2 != '' ? $nilaipenguji2->tata_tulis : '-' }}
                                                    </td>
                                                    <td class="text-center">{{ $nilaipenguji3 != '' ? $nilaipenguji3->tata_tulis : '-' }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>9</td>
                                                    <td>Tools Yang Digunakan</td>
                                                    <td class="bg-secondary text-center">2</td>
                                                    <td class="text-center">{{ $nilaipenguji1 != '' ? $nilaipenguji1->tools : '-' }}</td>
                                                    <td class="text-center">{{ $nilaipenguji2 != '' ? $nilaipenguji2->tools : '-' }}</td>
                                                    <td class="text-center">{{ $nilaipenguji3 != '' ? $nilaipenguji3->tools : '-' }}</td>
                                                </tr>
                                                <tr>
                                                    <td>10</td>
                                                    <td>Penyajian Data</td>
                                                    <td class="bg-secondary text-center">3</td>
                                                    <td class="text-center">{{ $nilaipenguji1 != '' ? $nilaipenguji1->penyajian_data : '-' }}
                                                    </td>
                                                    <td class="text-center">{{ $nilaipenguji2 != '' ? $nilaipenguji2->penyajian_data : '-' }}
                                                    </td>
                                                    <td class="text-center">{{ $nilaipenguji3 != '' ? $nilaipenguji3->penyajian_data : '-' }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>11</td>
                                                    <td>Hasil</td>
                                                    <td class="bg-secondary text-center">4</td>
                                                    <td class="text-center">{{ $nilaipenguji1 != '' ? $nilaipenguji1->hasil : '-' }}</td>
                                                    <td class="text-center">{{ $nilaipenguji2 != '' ? $nilaipenguji2->hasil : '-' }}</td>
                                                    <td class="text-center">{{ $nilaipenguji3 != '' ? $nilaipenguji3->hasil : '-' }}</td>
                                                </tr>
                                                <tr>
                                                    <td>12</td>
                                                    <td>Pembahasan</td>
                                                    <td class="bg-secondary text-center">4</td>
                                                    <td class="text-center">{{ $nilaipenguji1 != '' ? $nilaipenguji1->pembahasan : '-' }}
                                                    </td>
                                                    <td class="text-center">{{ $nilaipenguji2 != '' ? $nilaipenguji2->pembahasan : '-' }}
                                                    </td>
                                                    <td class="text-center">{{ $nilaipenguji3 != '' ? $nilaipenguji3->pembahasan : '-' }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>13</td>
                                                    <td>Kesimpulan</td>
                                                    <td class="bg-secondary text-center">3</td>
                                                    <td class="text-center">{{ $nilaipenguji1 != '' ? $nilaipenguji1->pembahasan : '-' }}
                                                    </td>
                                                    <td class="text-center">{{ $nilaipenguji2 != '' ? $nilaipenguji2->pembahasan : '-' }}
                                                    </td>
                                                    <td class="text-center">{{ $nilaipenguji3 != '' ? $nilaipenguji1->pembahasan : '-' }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>14</td>
                                                    <td>Luaran</td>
                                                    <td class="bg-secondary text-center">3</td>
                                                    <td class="text-center">{{ $nilaipenguji1 != '' ? $nilaipenguji1->luaran : '-' }}</td>
                                                    <td class="text-center">{{ $nilaipenguji2 != '' ? $nilaipenguji2->luaran : '-' }}</td>
                                                    <td class="text-center">{{ $nilaipenguji3 != '' ? $nilaipenguji3->luaran : '-' }}</td>
                                                </tr>
                                                <tr>
                                                    <td>15</td>
                                                    <td>Sumbangan Pemikiran Terhadap Ilmu Pengetahuan dan Penerapannya
                                                    </td>
                                                    <td class="bg-secondary text-center">3</td>
                                                    <td class="text-center">{{ $nilaipenguji1 != '' ? $nilaipenguji1->sumbangan_pemikiran : '-' }}
                                                    </td>
                                                    <td class="text-center">{{ $nilaipenguji2 != '' ? $nilaipenguji2->sumbangan_pemikiran : '-' }}
                                                    </td>
                                                    <td class="text-center">{{ $nilaipenguji3 != '' ? $nilaipenguji3->sumbangan_pemikiran : '-' }}
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td colspan="2">Total Nilai Penguji</td>
                                                    <td class="bg-success text-center">45</td>
                                                    <td class="text-center">{{ $nilaipenguji1 != '' ? $nilaipenguji1->total_nilai_angka : '-' }}
                                                    </td>
                                                    <td class="text-center">{{ $nilaipenguji2 != '' ? $nilaipenguji2->total_nilai_angka : '-' }}
                                                    </td>
                                                    <td class="text-center">{{ $nilaipenguji3 != '' ? $nilaipenguji3->total_nilai_angka : '-' }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3">Nilai Huruf Penguji</td>
                                                    <td class="text-center">{{ $nilaipenguji1 != '' ? $nilaipenguji1->total_nilai_huruf : '-' }}
                                                    </td>
                                                    <td class="text-center">{{ $nilaipenguji2 != '' ? $nilaipenguji2->total_nilai_huruf : '-' }}
                                                    </td>
                                                    <td class="text-center">{{ $nilaipenguji3 != '' ? $nilaipenguji3->total_nilai_huruf : '-' }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3">Rata Rata Nilai Penguji</td>
                                                    <td class="text-center" colspan="3">
                                                        <h3 class="text-bold">
                                                        @if ($nilaipenguji1 == '' && $nilaipenguji2 == '' && $nilaipenguji3 == '')
                                          -
                                          @else
                                              <?php
                                                $nilai_masuk=0;
                                                if(!empty($nilaipenguji1)){
                                                  $nilai_masuk=$nilai_masuk+1;
                                                  $penguji1=$nilaipenguji1->total_nilai_angka;
                                                }
                                                else{
                                                  $penguji1=0;
                                                }
                                                if(!empty($nilaipenguji2)){
                                                  $nilai_masuk=$nilai_masuk+1;
                                                  $penguji2=$nilaipenguji2->total_nilai_angka;
                                                }
                                                else{
                                                  $penguji2=0;
                                                }
                                                if(!empty($nilaipenguji3)){
                                                  $nilai_masuk=$nilai_masuk+1;
                                                  $penguji3=$nilaipenguji3->total_nilai_angka;
                                                }
                                                else{
                                                  $penguji3=0;
                                                }
                                                $nilaitotalpenguji=round(($penguji1+$penguji2+$penguji3)/$nilai_masuk);
                                                ?>
                                            {{ $nilaitotalpenguji }}
                                          @endif
                                                        </h3>
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
                                                    <th class="bg-success text-center">B</th>
                                                    <th class="text-center">Pembimbing 1</th>
                                                    <th class="text-center">Pembimbing 2</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Penguasaan Dasar Teori</td>
                                                    <td class="bg-secondary text-center">10</td>
                                                    <td class="text-center">{{ $nilaipembimbing1 != '' ? $nilaipembimbing1->penguasaan_dasar_teori : '-' }}
                                                    </td>
                                                    <td class="text-center">{{ $nilaipembimbing2 != '' ? $nilaipembimbing2->penguasaan_dasar_teori : '-' }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Tingkat Penguasaan Materi</td>
                                                    <td class="bg-secondary text-center">10</td>
                                                    <td class="text-center">{{ $nilaipembimbing1 != '' ? $nilaipembimbing1->tingkat_penguasaan_materi : '-' }}
                                                    </td>
                                                    <td class="text-center">{{ $nilaipembimbing2 != '' ? $nilaipembimbing2->tingkat_penguasaan_materi : '-' }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>Tinjauan Pustaka</td>
                                                    <td class="bg-secondary text-center">9</td>
                                                    <td class="text-center">{{ $nilaipembimbing1 != '' ? $nilaipembimbing1->tinjauan_pustaka : '-' }}
                                                    </td>
                                                    <td class="text-center">{{ $nilaipembimbing2 != '' ? $nilaipembimbing2->tinjauan_pustaka : '-' }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>4</td>
                                                    <td>Tata Tulis</td>
                                                    <td class="bg-secondary text-center">8</td>
                                                    <td class="text-center">{{ $nilaipembimbing1 != '' ? $nilaipembimbing1->tata_tulis : '-' }}
                                                    </td>
                                                    <td class="text-center">{{ $nilaipembimbing2 != '' ? $nilaipembimbing2->tata_tulis : '-' }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>5</td>
                                                    <td>Hasil dan Pembahasan</td>
                                                    <td class="bg-secondary text-center">10</td>
                                                    <td class="text-center">{{ $nilaipembimbing1 != '' ? $nilaipembimbing1->hasil_dan_pembahasan : '-' }}
                                                    </td>
                                                    <td class="text-center">{{ $nilaipembimbing2 != '' ? $nilaipembimbing2->hasil_dan_pembahasan : '-' }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>6</td>
                                                    <td>Sikap dan Kepribadian Ketika Bimbingan</td>
                                                    <td class="bg-secondary text-center">8</td>
                                                    <td class="text-center">{{ $nilaipembimbing1 != '' ? $nilaipembimbing1->sikap_dan_kepribadian : '-' }}
                                                    </td>
                                                    <td class="text-center">{{ $nilaipembimbing2 != '' ? $nilaipembimbing2->sikap_dan_kepribadian : '-' }}
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td colspan="2">Total Nilai Pembimbing</td>
                                                    <td class="bg-success text-center">55</td>
                                                    <td class="text-center">{{ $nilaipembimbing1 != '' ? $nilaipembimbing1->total_nilai_angka : '-' }}
                                                    </td>
                                                    <td class="text-center">{{ $nilaipembimbing2 != '' ? $nilaipembimbing2->total_nilai_angka : '-' }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3">Nilai Huruf Pembimbing</td>
                                                    <td class="text-center">{{ $nilaipembimbing1 != '' ? $nilaipembimbing1->total_nilai_huruf : '-' }}
                                                    </td>
                                                    <td class="text-center">{{ $nilaipembimbing2 != '' ? $nilaipembimbing2->total_nilai_huruf : '-' }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3">Rata Rata Nilai Pembimbing</td>
                                                    <td class="text-center" colspan="2">
                                                        <h3 class="text-bold">
                                                        @if ($nilaipembimbing1 == '' && $nilaipembimbing2 == '')
                                          -
                                          @else
                                              <?php
                                                $nilai_masuk1=0;
                                                
                                                if(!empty($nilaipembimbing1)){
                                                  $nilai_masuk1=$nilai_masuk1+1;
                                                  $pembimbing1=$nilaipembimbing1->total_nilai_angka;
                                                }
                                                else{
                                                  $pembimbing1=0;
                                                }
                                                if(!empty($nilaipembimbing2)){
                                                  $nilai_masuk1=$nilai_masuk1+1;
                                                  $pembimbing2=$nilaipembimbing2->total_nilai_angka;
                                                }
                                                else{
                                                  $pembimbing2=0;
                                                }
                                                $nilaitotalpembimbing = round(($pembimbing1+$pembimbing2)/$nilai_masuk1);
                                              ?>
                                          {{ $nilaitotalpembimbing }}
                                          @endif
                                                        </h3>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>

                                        <table class="table table-bordered table-responsive-md">
                                            <tbody>
                                                <tr>
                                                    <td style="width: 250px">NILAI AKHIR</td>
                                                    <td class="bg-success text-center">
                                                        <h3 class="text-bold">
                                                        @if ($nilaipenguji1 == '' && $nilaipenguji2 == '' && $nilaipenguji3 == '' && $nilaipembimbing1 =='' && $nilaipembimbing2 == '')
                                  -
                                  @else
                                        <?php
                                          $nilai_masuk=0;
                                          if(!empty($nilaipenguji1)){
                                            $nilai_masuk=$nilai_masuk+1;
                                            $penguji1=$nilaipenguji1->total_nilai_angka;
                                          }
                                          else{
                                            $penguji1=0;
                                          }
                                          if(!empty($nilaipenguji2)){
                                            $nilai_masuk=$nilai_masuk+1;
                                            $penguji2=$nilaipenguji2->total_nilai_angka;
                                          }
                                          else{
                                            $penguji2=0;
                                          }
                                          if(!empty($nilaipenguji3)){
                                            $nilai_masuk=$nilai_masuk+1;
                                            $penguji3=$nilaipenguji3->total_nilai_angka;
                                          }
                                          else{
                                            $penguji3=0;
                                          }
                                          $nilaitotalpenguji=round(($penguji1+$penguji2+$penguji3)/$nilai_masuk);
                                          $nilai_masuk=0;
                                          
                                          if(!empty($nilaipembimbing1)){
                                            $nilai_masuk=$nilai_masuk+1;
                                            $pembimbing1=$nilaipembimbing1->total_nilai_angka;
                                          }
                                          else{
                                            $pembimbing1=0;
                                          }
                                          if(!empty($nilaipembimbing2)){
                                            $nilai_masuk=$nilai_masuk+1;
                                            $pembimbing2=$nilaipembimbing2->total_nilai_angka;
                                          }
                                          else{
                                            $pembimbing2=0;
                                          }
                                          if($nilai_masuk== 0){
                                            $nilai_masuk=1;
                                          }
                                          $nilaitotalpembimbing = round(($pembimbing1+$pembimbing2)/$nilai_masuk);
                                          $nilai_masuk_akhir=0;
                                          if($nilaitotalpenguji != 0){
                                            $nilai_masuk_akhir=$nilai_masuk_akhir+1;
                                            $penguji=$nilaitotalpenguji;
                                          }
                                          else{
                                            $penguji=0;
                                          }
                                          if($nilaitotalpembimbing != 0){
                                            $nilai_masuk_akhir=$nilai_masuk_akhir+1;
                                            $pembimbing=$nilaitotalpembimbing;
                                          }
                                          else{
                                            $pembimbing=0;
                                          }
                                          $total_nilai = ($penguji+$pembimbing);
                                          ?>
                                          {{$total_nilai}}
                                    @endif

                                                        </h3>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 250px">NILAI HURUF</td>

                                                    <td class="bg-success text-center">
                                                        <h3 class="text-bold">
                                    @if ($nilaitotalpenguji == '' && $nilaitotalpembimbing == '')
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
                                                        @if ($nilaitotalpenguji == '' && $nilaitotalpembimbing == '')
                                    -
                                    @else
                                    
                                    @if ($total_nilai >= 60)
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

                        @if ($total_nilai <= 60)
                        <form action="/catatanskripsi/create/{{$skripsi->penjadwalan_skripsi->id}}" method="POST">
                              @csrf                              
                              <div class="mb-3 gridratakiri">
                                <label class="form-label">Catatan</label>
                                <input type="text" name="catatan" class="form-control" value="{{ $skripsi->penjadwalan_skripsi->catatan != null ? $skripsi->penjadwalan_skripsi->catatan : '' }}">
                              </div>                                            
                              <button type="submit" class="btn btn-success float-left">+ Catatan</button>
                        </form>
                        @else
                        @endif
                
                        <a href="#ModalApprove"  data-toggle="modal" class="btn btn-lg btn-danger float-right">Selesai Seminar</a>

    </div>

    </div>
    </div>

@endif

</div>
</div>
<!-- </div> -->
<!-- /.card -->
</div>

<div class="modal fade"id="ModalApprove">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Apakah Anda Yakin?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Data Tidak Bisa Dikembalikan!</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
        <form action="/penilaian-skripsi/approve/{{ $penjadwalan->id }}" method="POST">
          @method('put')
          @csrf
          <button type="submit" class="btn btn-success"> Selesai</button>
        </form>        
      </div>
    </div>
  </div>
    </div>

@endif



@endsection

@push('scripts')
<script>
    
    function hasil(){

var nilai_penguasaan_dasar_teori;
var nilai_tingkat_penguasaan_materi;
var nilai_tinjauan_pustaka;
var nilai_tata_tulis;
var nilai_hasil_dan_pembahasan;
var nilai_sikap_dan_kepribadian;
var penguasaan_dasar_teori = $('input[name="penguasaan_dasar_teori"]:checked').val();
var tingkat_penguasaan_materi = $('input[name="tingkat_penguasaan_materi"]:checked').val();
var tinjauan_pustaka = $('input[name="tinjauan_pustaka"]:checked').val();
var tata_tulis = $('input[name="tata_tulis"]:checked').val();
var hasil_dan_pembahasan = $('input[name="hasil_dan_pembahasan"]:checked').val();
var sikap_dan_kepribadian = $('input[name="sikap_dan_kepribadian"]:checked').val();

  if(isNaN(parseFloat(penguasaan_dasar_teori))){
    nilai_penguasaan_dasar_teori=parseFloat(0);
  }
  else{
    nilai_penguasaan_dasar_teori=parseFloat(penguasaan_dasar_teori);
  }

  if(isNaN(parseFloat(tingkat_penguasaan_materi))){
    nilai_tingkat_penguasaan_materi=parseFloat(0);
  }
  else{
    nilai_tingkat_penguasaan_materi=parseFloat(tingkat_penguasaan_materi);
  }

  if(isNaN(parseFloat(tinjauan_pustaka))){
    nilai_tinjauan_pustaka=parseFloat(0);
  }
  else{
    nilai_tinjauan_pustaka=parseFloat(tinjauan_pustaka);
  }

  if(isNaN(parseFloat(tata_tulis))){
    nilai_tata_tulis=parseFloat(0);
  }
  else{
    nilai_tata_tulis=parseFloat(tata_tulis);
  }

  if(isNaN(parseFloat(hasil_dan_pembahasan))){
    nilai_hasil_dan_pembahasan=parseFloat(0);
  }
  else{
    nilai_hasil_dan_pembahasan=parseFloat(hasil_dan_pembahasan);
  }

  if(isNaN(parseFloat(sikap_dan_kepribadian))){
    nilai_sikap_dan_kepribadian=parseFloat(0);
  }
  else{
    nilai_sikap_dan_kepribadian=parseFloat(sikap_dan_kepribadian);
  }


var total = parseFloat(nilai_penguasaan_dasar_teori) + parseFloat(nilai_tingkat_penguasaan_materi) + parseFloat(nilai_tinjauan_pustaka) + parseFloat(nilai_tata_tulis) + parseFloat(nilai_hasil_dan_pembahasan) + parseFloat(nilai_sikap_dan_kepribadian);
var total_angka = parseFloat(total);

$('input[name="total_nilai_angka"]').val(Math.round(total_angka));
      if (total_angka >= 47) {
        $('input[name="total_nilai_huruf"]').val("A");
      }
      else if(total_angka >= 44){
        $('input[name="total_nilai_huruf"]').val("A-");
      }
      else if(total_angka >= 42){
        $('input[name="total_nilai_huruf"]').val("B+");
      }   
      else if(total_angka >= 39){
        $('input[name="total_nilai_huruf"]').val("B");
      } 
      else if(total_angka >= 36){
        $('input[name="total_nilai_huruf"]').val("B-");
      }  
      else if(total_angka >= 33){
        $('input[name="total_nilai_huruf"]').val("C+");
      }
      else if(total_angka >= 31){
        $('input[name="total_nilai_huruf"]').val("C");
      }
      else if(total_angka >= 22){
        $('input[name="total_nilai_huruf"]').val("D");
      }
      else if(total_angka >= 0){
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
    var nilai_tools;
    var nilai_penyajian_data;
    var nilai_hasil;
    var nilai_pembahasan;
    var nilai_kesimpulan;
    var nilai_luaran;
    var nilai_sumbangan_pemikiran;
    var presentasi = $('input[name="presentasi"]:checked').val();
    var tingkat_penguasaan_materi = $('input[name="tingkat_penguasaan_materi"]:checked').val();
    var keaslian = $('input[name="keaslian"]:checked').val();
    var ketepatan_metodologi = $('input[name="ketepatan_metodologi"]:checked').val();
    var penguasaan_dasar_teori = $('input[name="penguasaan_dasar_teori"]:checked').val();
    var kecermatan_perumusan_masalah = $('input[name="kecermatan_perumusan_masalah"]:checked').val();
    var tinjauan_pustaka = $('input[name="tinjauan_pustaka"]:checked').val();
    var tata_tulis = $('input[name="tata_tulis"]:checked').val();
    var tools = $('input[name="tools"]:checked').val();
    var penyajian_data = $('input[name="penyajian_data"]:checked').val();
    var hasil = $('input[name="hasil"]:checked').val();
    var pembahasan = $('input[name="pembahasan"]:checked').val();
    var kesimpulan = $('input[name="kesimpulan"]:checked').val();
    var luaran = $('input[name="luaran"]:checked').val();
    var sumbangan_pemikiran = $('input[name="sumbangan_pemikiran"]:checked').val();

      if(isNaN(parseFloat(presentasi))){
        nilai_presentasi=parseFloat(0);
      }
      else{
        nilai_presentasi=parseFloat(presentasi);
      }

      if(isNaN(parseFloat(tingkat_penguasaan_materi))){
        nilai_tingkat_penguasaan_materi=parseFloat(0);
      }
      else{
        nilai_tingkat_penguasaan_materi=parseFloat(tingkat_penguasaan_materi);
      }

      if(isNaN(parseFloat(keaslian))){
        nilai_keaslian=parseFloat(0);
      }
      else{
        nilai_keaslian=parseFloat(keaslian);
      }

      if(isNaN(parseFloat(ketepatan_metodologi))){
        nilai_ketepatan_metodologi=parseFloat(0);
      }
      else{
        nilai_ketepatan_metodologi=parseFloat(ketepatan_metodologi);
      }

      if(isNaN(parseFloat(penguasaan_dasar_teori))){
        nilai_penguasaan_dasar_teori=parseFloat(0);
      }
      else{
        nilai_penguasaan_dasar_teori=parseFloat(penguasaan_dasar_teori);
      }

      if(isNaN(parseFloat(kecermatan_perumusan_masalah))){
        nilai_kecermatan_perumusan_masalah=parseFloat(0);
      }
      else{
        nilai_kecermatan_perumusan_masalah=parseFloat(kecermatan_perumusan_masalah);
      }

      if(isNaN(parseFloat(tinjauan_pustaka))){
        nilai_tinjauan_pustaka=parseFloat(0);
      }
      else{
        nilai_tinjauan_pustaka=parseFloat(tinjauan_pustaka);
      }

      if(isNaN(parseFloat(tata_tulis))){
        nilai_tata_tulis=parseFloat(0);
      }
      else{
        nilai_tata_tulis=parseFloat(tata_tulis);
      }

      if(isNaN(parseFloat(tools))){
        nilai_tools=parseFloat(0);
      }
      else{
        nilai_tools=parseFloat(tools);
      }

      if(isNaN(parseFloat(penyajian_data))){
        nilai_penyajian_data=parseFloat(0);
      }
      else{
        nilai_penyajian_data=parseFloat(penyajian_data);
      }

      if(isNaN(parseFloat(hasil))){
        nilai_hasil=parseFloat(0);
      }
      else{
        nilai_hasil=parseFloat(hasil);
      }

      if(isNaN(parseFloat(pembahasan))){
        nilai_pembahasan=parseFloat(0);
      }
      else{
        nilai_pembahasan=parseFloat(pembahasan);
      }

      if(isNaN(parseFloat(kesimpulan))){
        nilai_kesimpulan=parseFloat(0);
      }
      else{
        nilai_kesimpulan=parseFloat(kesimpulan);
      }

      if(isNaN(parseFloat(luaran))){
        nilai_luaran=parseFloat(0);
      }
      else{
        nilai_luaran=parseFloat(luaran);
      }

      if(isNaN(parseFloat(sumbangan_pemikiran))){
        nilai_sumbangan_pemikiran=parseFloat(0);
      }
      else{
        nilai_sumbangan_pemikiran=parseFloat(sumbangan_pemikiran);
      }

    var jumlah = parseFloat(nilai_presentasi) + parseFloat(nilai_tingkat_penguasaan_materi) + parseFloat(nilai_keaslian) + parseFloat(nilai_ketepatan_metodologi) + parseFloat(nilai_penguasaan_dasar_teori) +parseFloat(nilai_kecermatan_perumusan_masalah) + parseFloat(nilai_tinjauan_pustaka) + parseFloat(nilai_tata_tulis) + parseFloat(nilai_tools) + parseFloat(nilai_penyajian_data) + parseFloat(nilai_hasil) + parseFloat(nilai_pembahasan) + parseFloat(nilai_kesimpulan) + parseFloat(nilai_luaran) +parseFloat(nilai_sumbangan_pemikiran);
    var angka = parseFloat(jumlah);

    $('input[name="total_nilai_angka"]').val(Math.round(angka));
      if (angka >= 39) {
        $('input[name="total_nilai_huruf"]').val("A");
      }
      else if(angka >= 36){
        $('input[name="total_nilai_huruf"]').val("A-");
      }
      else if(angka >= 34){
        $('input[name="total_nilai_huruf"]').val("B+");
      }   
      else if(angka >= 32){
        $('input[name="total_nilai_huruf"]').val("B");
      } 
      else if(angka >= 30){
        $('input[name="total_nilai_huruf"]').val("B-");
      }  
      else if(angka >= 27){
        $('input[name="total_nilai_huruf"]').val("C+");
      }
      else if(angka >= 25){
        $('input[name="total_nilai_huruf"]').val("C");
      }
      else if(angka >= 18){
        $('input[name="total_nilai_huruf"]').val("D");
      }
      else if(angka >= 0){
        $('input[name="total_nilai_huruf"]').val("E");
      }
  }
  
</script>
@endpush

@push('scripts')
<script>
window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
    $(this).remove(); 
    });
}, 2000);
</script>
@endpush()

@push('scripts')
<script>
  const swal= $('.swal').data('swal');
  if (swal) {
    Swal.fire({
      title : 'Berhasil',
      text : swal,
      confirmButtonColor: '#28A745',
      icon : 'success'
    })    
  }
</script>
@endpush()