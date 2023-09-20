@extends('layouts.main')

@php
    use Carbon\Carbon;
@endphp

@section('header')
    Penilaian KP | SIA Elektro
@endsection

@section('sub-title')
    Penilaian Seminar KP
@endsection

@section('content')
@if (session()->has('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{session('message')}}
</div>
@endif

<div>
  
  <a href="/penilaian" class="btn btn-success mb-3"> <- Kembali <a>

  <div class="row">
    <div class="col mb-3">
    <ol class="list-group" style="box-shadow: 1px 1px 1px 1px #dbdbdb; border-radius:5px;">
    <li class="list-group-item d-flex justify-content-between align-items-start">
        <div class="ms-2 me-auto">
          <div class="fw-bold  gridratakiri">NIM</div>
          <span>{{$kp->mahasiswa->nim}}</span>
        </div>        
      </li> 
      <li class="list-group-item d-flex justify-content-between align-items-start">
        <div class="ms-2 me-auto field">
          <div class="fw-bold  gridratakiri">Nama</div>
          <span>{{$kp->mahasiswa->nama}}</span>
        </div>        
      </li>   
    </ol>
    </div>
    <div class="col-md">
    <ol class="list-group" style="box-shadow: 1px 1px 1px 1px #dbdbdb; border-radius:5px;">
      <li class="list-group-item d-flex justify-content-between align-items-start">
        <div class="ms-2 me-auto gridratakiri">
          <div class="fw-bold ">Pembimbing</div>
          <span>{{$kp->pembimbing->nama}}</span>
        </div>        
      </li>
      <li class="list-group-item d-flex justify-content-between align-items-start">
        <div class="ms-2 me-auto gridratakiri">
          <div class="fw-bold ">Penguji</div>
          <span>{{$kp->penguji->nama}}</span>
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
          <span>{{$kp->judul_kp}}</span>
        </div>        
      </li>   
    </ol>  
    </div>
  </div>
</div>

<div class="kol-jadwal mt-3 mb-3">
  <div class="row">
    <div class="col-md mb-3">
    <ol class="list-group" style="box-shadow: 1px 1px 1px 1px #dbdbdb; border-radius:5px;">
      <li class="list-group-item d-flex justify-content-between align-items-start">
        <div class="ms-2 me-auto gridratakiri">
        <div class="fw-bold  ">Jadwal</div>          
          <span>{{Carbon::parse($kp->tanggal)->translatedFormat('l, d F Y')}}, : {{$kp->waktu}}</span>             
        </div>        
      </li>   
    </ol>
    </div>
    <div class="col-md">
    <ol class="list-group" style="box-shadow: 1px 1px 1px 1px #dbdbdb; border-radius:5px;">
      <li class="list-group-item d-flex justify-content-between align-items-start">
        <div class="ms-2 me-auto gridratakiri">
        <div class="fw-bold ">Lokasi</div>
          <span>{{$kp->lokasi}}</span>
        </div>        
      </li>   
    </ol>
    </div>
  </div>
</div>

@if (auth()->user()->nip == $kp->penguji_nip)
  <form action="/penilaian-kp-penguji/create/{{$kp->id}}" method="POST">
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
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content" id="custom-tabs-one-tabContent">
                
                <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel"
                    aria-labelledby="custom-tabs-one-home-tab">
                    
                    <div class="mb-3 gridratakiri ">
                      <label for="presentasi" class="col-form-label">1). Presentasi</label>
                      <div class="radio1 d-inline">
                        <hr>
      
                      <input type="radio" class="btn-check @error ('presentasi') is-invalid @enderror" name="presentasi" id="presentasi1" value="2" onclick="hasil()" {{ old('presentasi') == '2' ? 'checked' : null }} >
                      <label class="btn tombol btn-danger fw-normal" for="presentasi1">Sangat Kurang Baik</label>
      
                      <input type="radio" class="btn-check @error ('presentasi') is-invalid @enderror" name="presentasi" id="presentasi2" value="4" onclick="hasil()" {{ old('presentasi') == '4' ? 'checked' : null }} >
                      <label class="btn tombol btn-warning fw-normal " for="presentasi2">Kurang Baik</label>
      
                      <input type="radio" class="btn-check @error ('presentasi') is-invalid @enderror" name="presentasi" id="presentasi3" value="6" onclick="hasil()" {{ old('presentasi') == '6' ? 'checked' : null }} >
                      <label class="btn tombol btn-info fw-normal " for="presentasi3">Biasa</label>
      
                      <input type="radio" class="btn-check @error ('presentasi') is-invalid @enderror" name="presentasi" id="presentasi4" value="8" onclick="hasil()" {{ old('presentasi') == '8' ? 'checked' : null }} >
                      <label class="btn tombol btn-primary fw-normal " for="presentasi4">Baik</label>
      
                      <input type="radio" class="btn-check @error ('presentasi') is-invalid @enderror" name="presentasi" id="presentasi5" value="10" onclick="hasil()" {{ old('presentasi') == '10' ? 'checked' : null }} >
                      <label class="btn tombol btn-success fw-normal " for="presentasi5">Sangat Baik</label>
      
                      </div>                                                         
                    </div>
                    @error('presentasi')
                      <div class="invalid-feedback">
                        Error
                      </div>
                    @enderror

                    <div class="mb-3 gridratakiri ">
                      <label for="materi" class="col-form-label">2). Materi</label>
                      <div class="radio1 d-inline">
                        <hr>
      
                      <input type="radio" class="btn-check @error ('materi') is-invalid @enderror" name="materi" id="materi1" value="2" onclick="hasil()" {{ old('materi') == '2' ? 'checked' : null }} >
                      <label class="btn tombol btn-danger fw-normal" for="materi1">Sangat Kurang Baik</label>
      
                      <input type="radio" class="btn-check @error ('materi') is-invalid @enderror" name="materi" id="materi2" value="4" onclick="hasil()" {{ old('materi') == '4' ? 'checked' : null }} >
                      <label class="btn tombol btn-warning fw-normal " for="materi2">Kurang Baik</label>
      
                      <input type="radio" class="btn-check @error ('materi') is-invalid @enderror" name="materi" id="materi3" value="6" onclick="hasil()" {{ old('materi') == '6' ? 'checked' : null }} >
                      <label class="btn tombol btn-info fw-normal " for="materi3">Biasa</label>
      
                      <input type="radio" class="btn-check @error ('materi') is-invalid @enderror" name="materi" id="materi4" value="8" onclick="hasil()" {{ old('materi') == '8' ? 'checked' : null }} >
                      <label class="btn tombol btn-primary fw-normal " for="materi4">Baik</label>
      
                      <input type="radio" class="btn-check @error ('materi') is-invalid @enderror" name="materi" id="materi5" value="10" onclick="hasil()" {{ old('materi') == '10' ? 'checked' : null }} >
                      <label class="btn tombol btn-success fw-normal " for="materi5">Sangat Baik</label>
      
                      </div>                                                         
                    </div>
                    @error('materi')
                      <div class="invalid-feedback">
                        Error
                      </div>
                    @enderror

                    <div class="mb-3 gridratakiri ">
                      <label for="tanya_jawab" class="col-form-label">3). Tanya Jawab</label>
                      <div class="radio1 d-inline">
                        <hr>
      
                      <input type="radio" class="btn-check @error ('tanya_jawab') is-invalid @enderror" name="tanya_jawab" id="tanya_jawab1" value="2" onclick="hasil()" {{ old('tanya_jawab') == '2' ? 'checked' : null }} >
                      <label class="btn tombol btn-danger fw-normal" for="tanya_jawab1">Sangat Kurang Baik</label>
      
                      <input type="radio" class="btn-check @error ('tanya_jawab') is-invalid @enderror" name="tanya_jawab" id="tanya_jawab2" value="4" onclick="hasil()" {{ old('tanya_jawab') == '4' ? 'checked' : null }} >
                      <label class="btn tombol btn-warning fw-normal " for="tanya_jawab2">Kurang Baik</label>
      
                      <input type="radio" class="btn-check @error ('tanya_jawab') is-invalid @enderror" name="tanya_jawab" id="tanya_jawab3" value="6" onclick="hasil()" {{ old('tanya_jawab') == '6' ? 'checked' : null }} >
                      <label class="btn tombol btn-info fw-normal " for="tanya_jawab3">Biasa</label>
      
                      <input type="radio" class="btn-check @error ('tanya_jawab') is-invalid @enderror" name="tanya_jawab" id="tanya_jawab4" value="8" onclick="hasil()" {{ old('tanya_jawab') == '8' ? 'checked' : null }} >
                      <label class="btn tombol btn-primary fw-normal " for="tanya_jawab4">Baik</label>
      
                      <input type="radio" class="btn-check @error ('tanya_jawab') is-invalid @enderror" name="tanya_jawab" id="tanya_jawab5" value="10" onclick="hasil()" {{ old('tanya_jawab') == '10' ? 'checked' : null }} >
                      <label class="btn tombol btn-success fw-normal " for="tanya_jawab5">Sangat Baik</label>
      
                      </div>                                                         
                    </div>
                    @error('tanya_jawab')
                      <div class="invalid-feedback">
                        Error
                      </div>
                    @enderror

                    <div class="col-lg-6 mt-5 ml-auto mr-auto">
                      <table class="table table-bordered bg-success">
                        <tbody>
                            <tr>
                                <td style="width: 250px">TOTAL NILAI (ANGKA)</td>
                                <td class="bg-success text-center">
                                    <input type="text" id="total_nilai_angka" class="form-control text-bold text-center ml-auto mr-auto" name="total_nilai_angka" style=" width: 50px;
                  background-color: rgb(255, 255, 255);                                                
                " readonly>
                                    </h3>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 250px">TOTAL NILAI (HURUF)</td>

                                <td class="bg-success text-center">
                                    <input type="text" id="total_nilai_huruf" class="form-control text-bold text-center ml-auto mr-auto" name="total_nilai_huruf" style=" width: 50px;
                  background-color: rgb(255, 255, 255);
                " readonly>
                                    </h3>
                                </td>
                            </tr>
                        </tbody>
                      </table>
            </div>
                    
                    <button type="submit" class="btn btnsimpan btn-success float-right">Simpan</button>    
                </div>

                <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel"
                    aria-labelledby="custom-tabs-one-profile-tab">

                    <div class="mb-3 gridratakiri">                      
                    <div class="fw-bold mb-2">Perbaikan 1</div>
                      <input type="text" name="revisi_naskah1" class="form-control" value="{{ $kp->revisi_naskah1 != null ? $kp->revisi_naskah1 : '' }}">
                    </div>
                    
                    <div class="mb-3 gridratakiri">                      
                    <div class="fw-bold mb-2">Perbaikan 2</div>
                      <input type="text" name="revisi_naskah2" class="form-control" value="{{ $kp->revisi_naskah2 != null ? $kp->revisi_naskah2 : '' }}">
                    </div>

                    <div class="mb-3 gridratakiri">                      
                    <div class="fw-bold mb-2">Perbaikan 3</div>
                      <input type="text" name="revisi_naskah3" class="form-control" value="{{ $kp->revisi_naskah3 != null ? $kp->revisi_naskah3 : '' }}">
                    </div>

                    <div class="mb-3 gridratakiri">                      
                    <div class="fw-bold mb-2">Perbaikan 4</div>
                      <input type="text" name="revisi_naskah4" class="form-control" value="{{ $kp->revisi_naskah4 != null ? $kp->revisi_naskah4 : '' }}">
                    </div>

                    <div class="mb-3 gridratakiri">                      
                    <div class="fw-bold mb-2">Perbaikan 5</div>
                      <input type="text" name="revisi_naskah5" class="form-control" value="{{ $kp->revisi_naskah5 != null ? $kp->revisi_naskah5 : '' }}">
                    </div>

                    <button type="submit" class="btn btn-success float-right">Simpan</button>    
                </div>                
                </form>

            </div>
        </div>      
    </div>
@endif

@if (auth()->user()->nip == $kp->pembimbing_nip)
  <form action="/penilaian-kp-pembimbing/create/{{$kp->id}}" method="POST">
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
                aria-selected="false">Nilai Pembimbing Lapangan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="custom-tabs-one-form-tab" data-toggle="pill"
                href="#custom-tabs-one-form" role="tab" aria-controls="custom-tabs-one-form"
                aria-selected="false">Catatan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="custom-tabs-one-setting-tab" data-toggle="pill"
                href="#custom-tabs-one-setting" role="tab" aria-controls="custom-tabs-one-setting"
                aria-selected="false">Berita Acara</a>
          </li>          
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content" id="custom-tabs-one-tabContent">
                
                <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel"
                    aria-labelledby="custom-tabs-one-home-tab">
                    
                    <div class="mb-3 gridratakiri ">
                      <label for="presentasi" class="col-form-label">1). Presentasi</label>
                      <div class="radio1 d-inline">
                        <hr>
      
                      <input type="radio" class="btn-check @error ('presentasi') is-invalid @enderror" name="presentasi" id="presentasi1" value="2" onclick="hasil()" {{ old('presentasi') == '2' ? 'checked' : null }} >
                      <label class="btn tombol btn-danger fw-normal" for="presentasi1">Sangat Kurang Baik</label>
      
                      <input type="radio" class="btn-check @error ('presentasi') is-invalid @enderror" name="presentasi" id="presentasi2" value="4" onclick="hasil()" {{ old('presentasi') == '4' ? 'checked' : null }} >
                      <label class="btn tombol btn-warning fw-normal " for="presentasi2">Kurang Baik</label>
      
                      <input type="radio" class="btn-check @error ('presentasi') is-invalid @enderror" name="presentasi" id="presentasi3" value="6" onclick="hasil()" {{ old('presentasi') == '6' ? 'checked' : null }} >
                      <label class="btn tombol btn-info fw-normal " for="presentasi3">Biasa</label>
      
                      <input type="radio" class="btn-check @error ('presentasi') is-invalid @enderror" name="presentasi" id="presentasi4" value="8" onclick="hasil()" {{ old('presentasi') == '8' ? 'checked' : null }} >
                      <label class="btn tombol btn-primary fw-normal " for="presentasi4">Baik</label>
      
                      <input type="radio" class="btn-check @error ('presentasi') is-invalid @enderror" name="presentasi" id="presentasi5" value="10" onclick="hasil()" {{ old('presentasi') == '10' ? 'checked' : null }} >
                      <label class="btn tombol btn-success fw-normal " for="presentasi5">Sangat Baik</label>
      
                      </div>                                                         
                    </div>
                    @error('presentasi')
                      <div class="invalid-feedback">
                        Error
                      </div>
                    @enderror

                    <div class="mb-3 gridratakiri ">
                      <label for="materi" class="col-form-label">2). Materi</label>
                      <div class="radio1 d-inline">
                        <hr>
      
                      <input type="radio" class="btn-check @error ('materi') is-invalid @enderror" name="materi" id="materi1" value="2" onclick="hasil()" {{ old('materi') == '2' ? 'checked' : null }} >
                      <label class="btn tombol btn-danger fw-normal" for="materi1">Sangat Kurang Baik</label>
      
                      <input type="radio" class="btn-check @error ('materi') is-invalid @enderror" name="materi" id="materi2" value="4" onclick="hasil()" {{ old('materi') == '4' ? 'checked' : null }} >
                      <label class="btn tombol btn-warning fw-normal " for="materi2">Kurang Baik</label>
      
                      <input type="radio" class="btn-check @error ('materi') is-invalid @enderror" name="materi" id="materi3" value="6" onclick="hasil()" {{ old('materi') == '6' ? 'checked' : null }} >
                      <label class="btn tombol btn-info fw-normal " for="materi3">Biasa</label>
      
                      <input type="radio" class="btn-check @error ('materi') is-invalid @enderror" name="materi" id="materi4" value="8" onclick="hasil()" {{ old('materi') == '8' ? 'checked' : null }} >
                      <label class="btn tombol btn-primary fw-normal " for="materi4">Baik</label>
      
                      <input type="radio" class="btn-check @error ('materi') is-invalid @enderror" name="materi" id="materi5" value="10" onclick="hasil()" {{ old('materi') == '10' ? 'checked' : null }} >
                      <label class="btn tombol btn-success fw-normal " for="materi5">Sangat Baik</label>
      
                      </div>                                                         
                    </div>
                    @error('materi')
                      <div class="invalid-feedback">
                        Error
                      </div>
                    @enderror

                    <div class="mb-3 gridratakiri ">
                      <label for="tanya_jawab" class="col-form-label">3). Tanya Jawab</label>
                      <div class="radio1 d-inline">
                        <hr>
      
                      <input type="radio" class="btn-check @error ('tanya_jawab') is-invalid @enderror" name="tanya_jawab" id="tanya_jawab1" value="2" onclick="hasil()" {{ old('tanya_jawab') == '2' ? 'checked' : null }} >
                      <label class="btn tombol btn-danger fw-normal" for="tanya_jawab1">Sangat Kurang Baik</label>
      
                      <input type="radio" class="btn-check @error ('tanya_jawab') is-invalid @enderror" name="tanya_jawab" id="tanya_jawab2" value="4" onclick="hasil()" {{ old('tanya_jawab') == '4' ? 'checked' : null }} >
                      <label class="btn tombol btn-warning fw-normal " for="tanya_jawab2">Kurang Baik</label>
      
                      <input type="radio" class="btn-check @error ('tanya_jawab') is-invalid @enderror" name="tanya_jawab" id="tanya_jawab3" value="6" onclick="hasil()" {{ old('tanya_jawab') == '6' ? 'checked' : null }} >
                      <label class="btn tombol btn-info fw-normal " for="tanya_jawab3">Biasa</label>
      
                      <input type="radio" class="btn-check @error ('tanya_jawab') is-invalid @enderror" name="tanya_jawab" id="tanya_jawab4" value="8" onclick="hasil()" {{ old('tanya_jawab') == '8' ? 'checked' : null }} >
                      <label class="btn tombol btn-primary fw-normal " for="tanya_jawab4">Baik</label>
      
                      <input type="radio" class="btn-check @error ('tanya_jawab') is-invalid @enderror" name="tanya_jawab" id="tanya_jawab5" value="10" onclick="hasil()" {{ old('tanya_jawab') == '10' ? 'checked' : null }} >
                      <label class="btn tombol btn-success fw-normal " for="tanya_jawab5">Sangat Baik</label>
      
                      </div>                                                         
                    </div>
                    @error('tanya_jawab')
                      <div class="invalid-feedback">
                        Error
                      </div>
                    @enderror
                                    
                    <div class="col-lg-6 mt-5 ml-auto mr-auto">
                      <table class="table table-bordered bg-success">
                        <tbody>
                            <tr>
                                <td style="width: 250px">TOTAL NILAI (ANGKA)</td>
                                <td class="bg-success text-center">
                                    <input type="text" id="total_nilai_angka" class="form-control text-bold text-center ml-auto mr-auto" name="total_nilai_angka" style=" width: 50px;
                  background-color: rgb(255, 255, 255);                                                
                " readonly>
                                    </h3>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 250px">TOTAL NILAI (HURUF)</td>

                                <td class="bg-success text-center">
                                    <input type="text" id="total_nilai_huruf" class="form-control text-bold text-center ml-auto mr-auto" name="total_nilai_huruf" style=" width: 50px;
                  background-color: rgb(255, 255, 255);
                " readonly>
                                    </h3>
                                </td>
                            </tr>
                        </tbody>
                      </table>
            </div>
                    <button type="submit" class="btn btnsimpan btn-success float-right">Simpan</button>    
                </div>

                <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel"
                    aria-labelledby="custom-tabs-one-profile-tab">

                    <div class="mb-3 gridratakiri">    
                    <div class="fw-bold mb-2">Input Nilai :</div>                  
                      <input type="text" name="nilai_pembimbing_lapangan" class="form-control" value="{{ $kp->nilai_pembimbing_lapangan != null ? $kp->nilai_pembimbing_lapangan : '' }}">  
                    </div>                                        
                    <button type="submit" class="btn btn-success float-right">Simpan</button>                  
                </div>

                <div class="tab-pane fade" id="custom-tabs-one-form" role="tabpanel"
                    aria-labelledby="custom-tabs-one-form-tab">

                    <div class="mb-3 gridratakiri">                      
                    <div class="fw-bold mb-2">Catatan 1</div>
                      <input type="text" name="catatan1" class="form-control" value="{{ $kp->catatan1 != null ? $kp->catatan1 : '' }}">
                    </div>
                    
                    <div class="mb-3 gridratakiri">                      
                    <div class="fw-bold mb-2">Catatan 2</div>
                      <input type="text" name="catatan2" class="form-control" value="{{ $kp->catatan2 != null ? $kp->catatan2 : '' }}">
                    </div>

                    <div class="mb-3 gridratakiri">                      
                    <div class="fw-bold mb-2">Catatan 3</div>
                      <input type="text" name="catatan3" class="form-control" value="{{ $kp->catatan3 != null ? $kp->catatan3 : '' }}">
                    </div>
                    
                    <button type="submit" class="btn btn-success float-right">Simpan</button>    
                  </form>
                </div>

                <div class="tab-pane fade" id="custom-tabs-one-setting" role="tabpanel"
            aria-labelledby="custom-tabs-one-setting-tab">
            <div>

                    <div class="row">
                      <div class="col-lg-6">
                          <table class="table table-bordered">
                              <thead>
                                  <tr>
                                      <th class="text-center">#</th>
                                      <th style="width: 200px">Penilaian Penguji</th>
                                      <th class="bg-success text-center">B</th>
                                      <th class="text-center">Nilai</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                      <td class="text-center">1</td>  
                                      <td>Presentasi</td>
                                      <td class="bg-secondary text-center">10%</td>
                                      <td class="text-center">{{$nilaipenguji != '' ? $nilaipenguji->presentasi : '-' }}</td>             
                                  </tr>
                                  <tr>
                                    <td class="text-center">2</td>  
                                    <td>Materi</td>
                                    <td class="bg-secondary text-center">10%</td>
                                    <td class="text-center">{{$nilaipenguji != '' ? $nilaipenguji->materi : '-' }}</td>             
                                  </tr> 
                                  <tr>
                                    <td class="text-center">3</td>  
                                    <td>Tanya Jawab</td>
                                    <td class="bg-secondary text-center">10%</td>
                                    <td class="text-center">{{$nilaipenguji != '' ? $nilaipenguji->tanya_jawab : '-' }}</td>             
                                  </tr>                               
              
                                  <tr>
                                      <td colspan="2">Total Nilai Penguji</td>
                                      <td class="bg-success text-center">30%</td>
                                      <td class="text-center">{{$nilaipenguji != '' ?$nilaipenguji->total_nilai_angka : '-'}}</td>
                                  </tr>
                                  <tr>
                                      <td colspan="3">Nilai Huruf Penguji</td>                        
                                      <td class="text-center">{{$nilaipenguji != '' ? $nilaipenguji->total_nilai_huruf : '-'}}</td>
                                  </tr>                                  
                              </tbody>
                          </table>
                      </div>

                      <div class="col-lg-6">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th style="width: 200px">Penilaian Pembimbing</th>
                                    <th class="bg-success text-center">B</th>
                                    <th class="text-center">Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">1</td>  
                                    <td>Presentasi</td>
                                    <td class="bg-secondary text-center">10%</td>
                                    <td class="text-center">{{$nilaipembimbing != '' ? $nilaipembimbing->presentasi : '-' }}</td>             
                                </tr>
                                <tr>
                                  <td class="text-center">2</td>  
                                  <td>Materi</td>
                                  <td class="bg-secondary text-center">10%</td>
                                  <td class="text-center">{{$nilaipembimbing != '' ? $nilaipembimbing->materi : '-' }}</td>             
                                </tr> 
                                <tr>
                                  <td class="text-center">3</td>  
                                  <td>Tanya Jawab</td>
                                  <td class="bg-secondary text-center">10%</td>
                                  <td class="text-center">{{$nilaipembimbing != '' ? $nilaipembimbing->tanya_jawab : '-' }}</td>             
                                </tr>                               
            
                                <tr>
                                    <td colspan="2">Total Nilai Pembimbing</td>
                                    <td class="bg-success text-center">30%</td>
                                    <td class="text-center">{{$nilaipembimbing != '' ?$nilaipembimbing->total_nilai_angka : '-'}}</td>
                                </tr>
                                <tr>
                                    <td colspan="3">Nilai Huruf Pembimbing</td>                        
                                    <td class="text-center">{{$nilaipembimbing != '' ? $nilaipembimbing->total_nilai_huruf : '-'}}</td>
                                </tr>                                  
                            </tbody>
                        </table>
                      </div>
                    </div>

                    <table class="table table-bordered" style="background-color:white;">
                      <thead class="bg-success">
                          <tr>
                              <th style="width: 50px">#</th>
                              <th style="width: 600px">Nilai</th>                
                              <th>Total Nilai</th>                        
                          </tr>
                      </thead>
                      <tbody class="gridratakiri">
                          <tr>
                              <td>1</td>  
                              <td>Nilai Seminar (30%)</td>                
                              <td>{{$nilaipenguji != '' ? $nilaipenguji->total_nilai_angka : '-' }}</td>                        
                          </tr>
                          
                          <tr>
                              <td>2</td>  
                              <td>Nilai Pembimbing Lapangan (40%)</td> 
                              <td>{{$nilaipembimbing != '' ? $nilaipembimbing->nilai_pembimbing_kp : '-' }}</
                          </tr>
                          
                          <tr>
                              <td>3</td>  
                              <td>Nilai Pembimbing KP (30%)</td>                
                              <td>{{$nilaipembimbing != '' ? $nilaipembimbing->total_nilai_angka : '-' }}</td>                        
                          </tr>  
              
                          <tr>
                              <td colspan="2">Total Akhir</td>
                              <td></td>                     
                          </tr>

                      </tbody>
                    </table> 

                    <form action="/penilaian-kp/approve/{{$penjadwalan->id}}" method="POST">
                        @method('put')
                        @csrf
                        <button type="submit" class="btn btn-lg btn-danger float-right" disabled> Selesai Seminar</button>
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

    var nilai_presentasi;
    var nilai_materi;
    var nilai_tanya_jawab;
    var presentasi = $('input[name="presentasi"]:checked').val();
    var materi = $('input[name="materi"]:checked').val();
    var tanya_jawab = $('input[name="tanya_jawab"]:checked').val();

      if(isNaN(parseFloat(presentasi))){
        nilai_presentasi=parseFloat(0);
      }
      else{
        nilai_presentasi=parseFloat(presentasi);
      }

      if(isNaN(parseFloat(materi))){
        nilai_materi=parseFloat(0);
      }
      else{
        nilai_materi=parseFloat(materi);
      }

      if(isNaN(parseFloat(tanya_jawab))){
        nilai_tanya_jawab=parseFloat(0);
      }
      else{
        nilai_tanya_jawab=parseFloat(tanya_jawab);
      }

    var total = parseFloat(nilai_presentasi) + parseFloat(nilai_materi) + parseFloat(nilai_tanya_jawab);
    var total_angka = parseFloat(total) * parseFloat(3.3333);

    $('input[name="total_nilai_angka"]').val(Math.round(total_angka));
      if (total_angka > 85) {
        $('input[name="total_nilai_huruf"]').val("A");
      }
      else if(total_angka > 79){
        $('input[name="total_nilai_huruf"]').val("A-");
      }
      else if(total_angka > 75){
        $('input[name="total_nilai_huruf"]').val("B+");
      }   
      else if(total_angka > 70){
        $('input[name="total_nilai_huruf"]').val("B");
      }   
      else if(total_angka > 65){
        $('input[name="total_nilai_huruf"]').val("B-");
      }
      else if(total_angka > 60){
        $('input[name="total_nilai_huruf"]').val("C+");
      }
      else if(total_angka > 55){
        $('input[name="total_nilai_huruf"]').val("C");
      }
      else if(total_angka > 40){
        $('input[name="total_nilai_huruf"]').val("D");
      } 
      else{
        $('input[name="total_nilai_huruf"]').val("E");
      }

  }

  function total(){
    var nilai_pembimbing_kp = $('input[name="nilai_pembimbing_kp"]').val();
    var nilai_pembimbing_kp1 = parseFloat(nilai_pembimbing_kp) * parseFloat(0.3);
    var nilai_pembimbing_lapangan = $('input[name="nilai_pembimbing_lapangan"]').val();
    var nilai_pembimbing_lapangan1 = parseFloat(nilai_pembimbing_lapangan) * parseFloat(0.4);
    var total_angka = $('input[name="total_nilai_seminar"]').val();    

    var total_akhir = (parseFloat(total_angka) * parseFloat(0.3)) + parseFloat(nilai_pembimbing_kp1) + parseFloat(nilai_pembimbing_lapangan1);

    if (!isNaN(total_akhir)) {
      $('input[name="total_nilai_angka"]').val(Math.round(total_akhir));
      if (total_akhir >= 85) {
        $('input[name="total_nilai_huruf"]').val("A");
      }
      else if(total_akhir > 79){
        $('input[name="total_nilai_huruf"]').val("A-");
      }
      else if(total_akhir >= 75){
        $('input[name="total_nilai_huruf"]').val("B+");
      }   
      else if(total_akhir >= 70){
        $('input[name="total_nilai_huruf"]').val("B");
      }   
      else if(total_akhir >= 65){
        $('input[name="total_nilai_huruf"]').val("B-");
      }
      else if(total_akhir >= 60){
        $('input[name="total_nilai_huruf"]').val("C+");
      }
      else if(total_akhir >= 55){
        $('input[name="total_nilai_huruf"]').val("C");
      }
      else if(total_akhir >= 40){
        $('input[name="total_nilai_huruf"]').val("D");
      } 
      else{
        $('input[name="total_nilai_huruf"]').val("E");
      } 
    }
    else{
      $('input[name="total_nilai_angka"]').val(total_angka | nilai_pembimbing_kp1 | nilai_pembimbing_lapangan1);
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