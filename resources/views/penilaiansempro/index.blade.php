@extends('layouts.main')

@php
    Use Carbon\Carbon;
@endphp

@section('title')
    Penilaian Sempro | SIA ELEKTRO
@endsection

@section('sub-title')
    Penilaian Seminar Proposal
@endsection

@section('content')

@if (session()->has('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{session('message')}}
</div>
@endif

@if (session()->has('loginError'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{session('loginError')}}        
      </div>
@endif

<ol class="breadcrumb col-lg-12">
  <li class="breadcrumb-item"><a class="breadcrumb-item active" href="/penilaian-sempro">Hari Ini</a></li>
  <li class="breadcrumb-item"><a href="#">Bulan Ini</a></li>  
  <li class="breadcrumb-item"><a href="/riwayat-penilaian-sempro">Riwayat Penilaian</a></li>  
</ol>

<table class="table text-center table-bordered table-striped" id="datatables">
  <thead class="table-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">NIM</th>
      <th scope="col">Nama</th>
      <th scope="col">Prodi</th>
      <th scope="col">Tanggal</th>
      <th scope="col">Waktu</th>
      <th scope="col">Lokasi</th>              
      <th scope="col">Pembimbing</th>
      <th scope="col">Penguji</th>          
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>    
    @foreach ($penjadwalan_sempros as $sempro)    
        <tr>
          <td>{{$loop->iteration}}</td>          
          <td>{{$sempro->nim}}</td>                             
          <td>{{$sempro->nama}}</td>                     
          <td>{{$sempro->prodi->nama_prodi}}</td>          
          <td>{{Carbon::parse($sempro->tanggal)->translatedFormat('l, d F Y')}}</td>                   
          <td>{{$sempro->waktu}}</td>                   
          <td>{{$sempro->lokasi}}</td>               
          <td>
            <p>1. {{$sempro->pembimbingsatu->nama}}</p>
            @if ($sempro->pembimbingdua == !null)
            <p>2. {{$sempro->pembimbingdua->nama}}</p>                               
            @endif
          </td>         
          <td>
            <p>1. {{$sempro->pengujisatu->nama}}</p>
            <p>2. {{$sempro->pengujidua->nama}}</p>
            <p>3. {{$sempro->pengujitiga->nama}}</p>
          </td>                    
          <td>
            @if ($sempro->penilaian(Auth::user()->nip, $sempro->id) == false)
              @if (Carbon::now() >= $sempro->tanggal && Carbon::now()->format('H:i:m') >= $sempro->waktu)
              <a href="/penilaian-sempro/create/{{$sempro->id}}" class="badge bg-primary"style="border-radius:20px; padding:7px;"> Input Nilai<a>          
              @else
              <span class="badge bg-danger"style="border-radius:20px; padding:7px;">Belum Dimulai</span>
              @endif
            @else
              <a href="/penilaian-sempro/edit/{{$sempro->id}}" class="badge bg-warning" style="border-radius:20px; padding:7px;"> Edit Nilai<a>              
            @endif              
          </td>                        
        </tr>               
    @endforeach
  </tbody>
</table>
@endsection

@push('scripts')
<script>
  window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
      $(this).remove(); 
    });
  }, 2000);
</script>
@endpush()