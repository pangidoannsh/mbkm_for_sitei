@extends('layouts.main')

@php
    Use Carbon\Carbon;
@endphp

@section('title')
    Penilaian | SIA ELEKTRO
@endsection

@section('sub-title')
    Penilaian
@endsection

@section('content')

@if (session()->has('message'))
<div class="swal" data-swal="{{session('message')}}"></div>
@endif 

@if (session()->has('loginError'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{session('loginError')}}        
      </div>
@endif

<div class="container card  p-4">
<ol class="breadcrumb col-lg-12" >
 
<div class="btn-group menu-dosen scrollable-btn-group col-md-12">

   <a href="/kp-skripsi/persetujuan-skripsi" class="btn bg-light border  border-bottom-0"   style="border-top-left-radius: 15px;" >Persetujuan</a>

   <a href="/kp-skripsi/penilaian-skripsi" class="btn btn-outline-success border  border-bottom-0 active">Seminar</a>

  @if (Str::length(Auth::guard('dosen')->user()) > 0)
          @if ( Auth::guard('dosen')->user()->role_id == 6 || Auth::guard('dosen')->user()->role_id == 6 || Auth::guard('dosen')->user()->role_id == 7 || Auth::guard('dosen')->user()->role_id == 8 || Auth::guard('dosen')->user()->role_id == 9 || Auth::guard('dosen')->user()->role_id == 10 || Auth::guard('dosen')->user()->role_id == 11 )
  
<a href="/skripsi"  class="btn bg-light border  border-bottom-0 "  >
  <span class="button-text">Skripsi Prodi</span>
  <span class="badge-link">
    <a href="/skripsi/nilai-keluar" class="sejarah pt-2  bg-light ">      <span class="p-1" data-bs-toggle="tooltip" title="Riwayat Skripsi"><i class="fas fa-history"></i></i></span>
    </a>
  </span>
</a>

  @endif
@endif


<a href="/pembimbing/skripsi" class="btn bg-light border  border-bottom-0">
   <span class="button-text">Bimbingan Skripsi</span>
  <span class="badge-link">
    <a href="/skripsi/pembimbing/nilai-keluar" class="sejarah pt-2  bg-light " style="border-top-right-radius: 15px;">
       <span class="p-1" data-bs-toggle="tooltip" title="Riwayat Skripsi"><i class="fas fa-history"></i></i></span>
    </a>
  </span>
</a>

</div>
</ol>

<ol class="breadcrumb col-lg-12">
  <li class="breadcrumb-item"><a class="breadcrumb-item active fw-bold text-black" href="/kp-skripsi/penilaian-skripsi">Jadwal Seminar</a></li>      
  <li class="breadcrumb-item"><a href="/kp-skripsi/riwayat-penilaian-skripsi">Riwayat Penilaian</a></li>  
</ol>

<table class="table table-responsive-lg table-bordered table-striped" style="width:100%" id="datatables">
  <thead class="table-dark">
    <tr>      
      <th class="text-center" scope="col">NIM</th>
      <th class="text-center" scope="col">Nama</th>
      <th class="text-center" scope="col">Seminar</th>
      <th class="text-center" scope="col">Prodi</th>
      <th class="text-center" scope="col">Tanggal</th>
      <th class="text-center" scope="col">Waktu</th>
      <th class="text-center" scope="col">Lokasi</th>              
      <th class="text-center" scope="col">Pembimbing</th>
      <th class="text-center" scope="col">Penguji</th>          
      <th class="text-center"scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody> 
    

    @foreach ($penjadwalan_sempros as $sempro)    
        <tr>                  
          <td class="text-center">{{$sempro->mahasiswa->nim}}</td>                             
          <td class="text-center">{{$sempro->mahasiswa->nama}}</td>                     
          <td class="bg-success text-center">{{$sempro->jenis_seminar}}</td>                     
          <td class="text-center">{{$sempro->prodi->nama_prodi}}</td>          
          <td class="text-center">{{Carbon::parse($sempro->tanggal)->translatedFormat('l, d F Y')}}</td>                   
          <td class="text-center">{{$sempro->waktu}}</td>                   
          <td class="text-center">{{$sempro->lokasi}}</td>               
          <td class="text-center">
            <p>1. {{$sempro->pembimbingsatu->nama_singkat}}</p>
            @if ($sempro->pembimbingdua == !null)
            <p>2. {{$sempro->pembimbingdua->nama_singkat}}</p>                               
            @endif
          </td>         
          <td class="text-center">
            <p>1. {{$sempro->pengujisatu->nama_singkat}}</p>
            <p>2. {{$sempro->pengujidua->nama_singkat}}</p>
            @if ($sempro->pengujitiga == !null)
            <p>3. {{$sempro->pengujitiga->nama_singkat}}</p>                               
            @endif
          </td>                    
          <td class="text-center">
            @if ($sempro->penilaian(Auth::user()->nip, $sempro->id) == false)
              @if (Carbon::now() >= $sempro->tanggal && Carbon::now()->format('H:i:m') >= $sempro->waktu)
              <a href="/penilaian-sempro/create/{{Crypt::encryptString($sempro->id)}}" class="badge bg-primary"style="border-radius:20px; padding:7px;"> Input Nilai<a>          
              @else
              <span class="badge bg-danger"style="border-radius:20px; padding:7px;">Belum Dimulai</span>
              @endif
            @else
              <a href="/penilaian-sempro/edit/{{Crypt::encryptString($sempro->id)}}" class="badge bg-warning" style="border-radius:20px; padding:7px;"> Edit Nilai<a>              
            @endif              
          </td>                        
        </tr>               
    @endforeach

    @foreach ($penjadwalan_skripsis as $skripsi)    
        <tr>               
          <td class="text-center">{{$skripsi->mahasiswa->nim}}</td>                             
          <td class="text-center">{{$skripsi->mahasiswa->nama}}</td>
          <td class="bg-warning text-center">{{$skripsi->jenis_seminar}}</td>                                     
          <td class="text-center">{{$skripsi->prodi->nama_prodi}}</td>          
          <td class="text-center">{{Carbon::parse($skripsi->tanggal)->translatedFormat('l, d F Y')}}</td>                   
          <td class="text-center">{{$skripsi->waktu}}</td>                   
          <td class="text-center">{{$skripsi->lokasi}}</td>               
          <td class="text-center">
            <p>1. {{$skripsi->pembimbingsatu->nama_singkat}}</p>
            @if ($skripsi->pembimbingdua == !null)
            <p>2. {{$skripsi->pembimbingdua->nama_singkat}}</p>                               
            @endif
          </td>         
          <td class="text-center">
            <p>1. {{$skripsi->pengujisatu->nama_singkat}}</p>
            <p>2. {{$skripsi->pengujidua->nama_singkat}}</p>
            @if ($skripsi->pengujitiga == !null)
            <p>3. {{$skripsi->pengujitiga->nama_singkat}}</p>
            @endif
          </td>                    
          <td class="text-center">
            @if ($skripsi->penilaian(Auth::user()->nip, $skripsi->id) == false)
              @if (Carbon::now() >= $skripsi->tanggal && Carbon::now()->format('H:i:m') >= $skripsi->waktu)
              <a href="/penilaian-skripsi/create/{{Crypt::encryptString($skripsi->id)}}" class="badge bg-primary"style="border-radius:20px; padding:7px;"> Input Nilai<a>          
              @else
              <span class="badge bg-danger"style="border-radius:20px; padding:7px;">Belum Dimulai</span>
              @endif
            @else
              <a href="/penilaian-skripsi/edit/{{Crypt::encryptString($skripsi->id)}}" class="badge bg-warning" style="border-radius:20px; padding:7px;"> Edit Nilai<a>              
            @endif              
          </td>                        
        </tr>               
    @endforeach

  </tbody>
</table>
</div>
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