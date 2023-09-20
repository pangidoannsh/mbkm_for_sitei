@extends('layouts.main')

@php
    Use Carbon\Carbon;
@endphp

@section('title')
    Kerja Praktek | SIA ELEKTRO
@endsection

@section('sub-title')
Beban Bimbingan Skripsi Dosen
@endsection

@section('content')

@if (session()->has('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{session('message')}}
</div>
@endif

<div class="container pb-4 ">

<div class="container-fluid card p-4">

          <table class="table table-responsive-lg table-bordered table-striped" width="100%" id="datatables">
  <thead class="table-dark">
    <tr>      
        <th class="text-center" scope="col">No.</th>
        <th class="text-center" scope="col">Kode Dosen</th>
        <th class="text-center" scope="col">Nama Dosen</th>

        <th class="text-center" scope="col">Sebagai Pembimbing 1</th>
        <th class="text-center" scope="col">Sebagai Pembimbing 2</th>
        <th class="text-center" scope="col">Total Bimbingan Skripsi</th>
    </tr>
  </thead>
  <tbody>

    @foreach ($dosen as $dosen)
<div></div>
        <tr>        
            <td class="text-center">{{$loop->iteration}}</td>                             
            <td class="text-center">{{$dosen->nama_singkat}}</td>                             
            <td >{{$dosen->nama}}</td>                             

                <td class="text-center">{{ $dosen->pendaftaran_skripsi1_count }}</td>  
                <td class="text-center">{{ $dosen->pendaftaran_skripsi2_count }}</td>  

                <td class="text-center @if(($dosen->pendaftaran_skripsi1_count + $dosen->pendaftaran_skripsi2_count) >= 10) bg-danger @endif bg-info">{{ $dosen->pendaftaran_skripsi1_count + $dosen->pendaftaran_skripsi2_count }}</td>
    @endforeach
  </tbody>
</table>

</div>


<div class="card pb-5">
  <div class="card-body">
    <h5 class="card-title fw-bold mb-1">Keterangan :</h5>
    <p class="card-text">Kuota maksimal Bimbingan Skripsi adalah <b>10 Orang.</b></p>
  </div>
</div>

</div>

@endsection