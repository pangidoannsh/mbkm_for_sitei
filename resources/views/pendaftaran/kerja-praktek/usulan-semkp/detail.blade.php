@extends('layouts.main')

@php
    Use Carbon\Carbon;
@endphp

@section('title')
    Kerja Praktek | SIA ELEKTRO
@endsection

@section('sub-title')
    Detail Mahasiswa
@endsection


@section('content')

@if (session()->has('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{session('message')}}
</div>
@endif


<div class="container-fluid">
<div>
@foreach ($pendaftaran_kp as $kp)

@if (Str::length(Auth::guard('dosen')->user()) > 0)       

  <a href="/kerja-praktek" class="badge bg-success p-2 mb-3  "> Kembali <a>
  @endif

  @if (Str::length(Auth::guard('web')->user()) > 0) 
  <!-- <a href="/kerja-praktek/admin/index" class="bg-secondary rounded-pill p-2 mb-4 "><a> -->
     <a href="/kerja-praktek/admin/index" class="badge bg-success p-2 mb-3  "> Kembali <a>
  @endif

 
  <!-- @if (Str::length(Auth::guard('web')->user()) > 1 )
  @if ($kp->status_kp == 'DAFTAR SEMINAR KP')
  <div class="container">
  <a href="/form-kp/create" class="badge bg-success p-2 mb-3"> Tambah Jadwal KP<a>
  </div>
  @endif
  @endif -->

 
  @if (Str::length(Auth::guard('mahasiswa')->user()) > 0)
              @if (Auth::guard('mahasiswa')->user())
  
  <a href="/usulankp/index" class="badge bg-success p-2 mb-3 "> Kembali <a>

  @if ($kp->status_kp == 'USULAN DISETUJUI' )
  <div class="mb-3">
  <a formtarget="_blank" target="_blank" href="/surat-permohonan-kp/{{Crypt::encryptString($kp->id)}}" class="badge bg-dark p-2 fa fa-download">  Unduh Surat Permohonan KP</a>
  </div>
  @endif

  @endif
  @endif

 <div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
      <h5 class="text-bold">Mahasiswa</h5>
      <hr>
        <p class="card-title text-secondary text-sm " >Nama</p>
        <p class="card-text text-start" >{{$kp->mahasiswa->nama}}</p>
        <p class="card-title text-secondary text-sm " >NIM</p>
        <p class="card-text text-start" >{{$kp->mahasiswa->nim}}</p>
         <p class="card-title text-secondary text-sm " >Program Studi</p>
        <p class="card-text text-start" >{{$kp->mahasiswa->prodi->nama_prodi}}</p>
        <p class="card-title text-secondary text-sm " >Konsentrasi</p>
        <p class="card-text text-start" >{{$kp->mahasiswa->konsentrasi->nama_konsentrasi}}</p>
        
      </div>
    </div>
     <div class="card">
      <div class="card-body">
        <h5 class="text-bold">Dosen Pembimbing</h5>
        <hr>
        <p class="card-title text-secondary text-sm" >Nama</p>
        <p class="card-text text-start" >{{$kp->dosen_pembimbingkp->nama}}</p>
        <!-- <p class="card-title text-secondary text-sm" >NIP</p>
        <p class="card-text text-start" >{{$kp->dosen_pembimbingkp->nip}}</p> -->

      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
<div class="card-body">
      <h5 class="text-bold">Data Usulan</h5>
        <hr>
        <p class="card-title text-secondary text-sm" >Judul Laporan</p>
        <p class="card-text text-start"> {{$kp->judul_laporan}}</p>
        <p class="card-title text-secondary text-sm" >Laporan</p>
       <p class="card-text text-start " ><button  onclick="window.location.href='{{asset('storage/' .$kp->laporan_kp )}}';" formtarget="_blank" target="_blank"class="badge bg-dark px-3 p-1">Buka</button></p>
        <!-- <p class="card-text text-start" > <span><a formtarget="_blank" target="_blank" href="{{asset('storage/' .$kp->laporan_kp)}}" class="badge bg-dark pr-3 p-2 pl-3">Lihat</a></span></p> -->
        <p class="card-title text-secondary text-sm" >KPTI-11/Bukti Mengumpulkan Syarat Pendaftaran Seminar KP</p>
        <p class="card-text text-start " ><button  onclick="window.location.href='{{asset('storage/' .$kp->kpti_11 )}}';" formtarget="_blank" target="_blank"class="badge bg-dark px-3 p-1">Buka</button></p>
        <!-- <p class="card-text text-start" > <span><a formtarget="_blank" target="_blank" href="{{asset('storage/' .$kp->kpti_11)}}" class="badge bg-dark pr-3 p-2 pl-3">Lihat</a></span></p> -->
        <p class="card-title text-secondary text-sm" >STI-31/Surat Persetujuan Sertifikat Pendamping</p>
        <p class="card-text text-start " ><button  onclick="window.location.href='{{asset('storage/' .$kp->sti_31 )}}';" formtarget="_blank" target="_blank"class="badge bg-dark px-3 p-1">Buka</button></p>
        <!-- <p class="card-text text-start" > <span><a formtarget="_blank" target="_blank" href="{{asset('storage/' .$kp->sti_31)}}" class="badge bg-dark pr-3 p-2 pl-3">Lihat</a></span></p> -->

  </div>
  </div>
   
  </div>
</div>



    <div class="card">
      <div class="card-body">
        <h5 class="text-bold">Keterangan Pendaftaran</h5>
        <hr>
        <p class="card-title text-secondary text-sm" >Jenis Usulan</p>
        <p class="card-text text-start" ><span >{{$kp->jenis_usulan}}</span></p>
        @if ($kp->status_kp == 'DAFTAR SEMINAR KP' )
        <p class="card-title text-secondary text-sm" >Status KP</p>
        <p class="card-text text-start" ><span class="badge p-2 bg-secondary text-bold pr-3 pl-3" style="border-radius:20px;">{{$kp->status_kp}}</span></p>
        @endif
        @if ($kp->status_kp == 'DAFTAR SEMINAR KP DITOLAK' )
        <p class="card-title text-secondary text-sm" >Status KP</p>
        <p class="card-text text-start" ><span class="badge p-2 bg-danger text-bold pr-3 pl-3" style="border-radius:20px;">{{$kp->status_kp}}</span></p>
        @endif
        @if ($kp->status_kp == 'SEMINAR KP DIJADWALKAN' )
        <p class="card-title text-secondary text-sm " >Status KP</p>
        <p class="card-text text-start" ><span class="badge p-2 bg-success text-bold pr-3 pl-3" style="border-radius:20px;">{{$kp->status_kp}}</span></p>
        @endif
        @if ($kp->status_kp == 'SEMINAR KP SELESAI' )
        <p class="card-title text-secondary text-sm " >Status KP</p>
        <p class="card-text text-start" ><span class="badge p-2 bg-info text-bold pr-3 pl-3" style="border-radius:20px;">{{$kp->status_kp}}</span></p>
        @endif
        <p class="card-title text-secondary text-sm" >Keterangan</p>
        <p class="card-text text-start" ><span>{{$kp->keterangan}}</span></p>

      </div>
    </div>


  @if (Str::length(Auth::guard('dosen')->user()) > 0)
    @if (Auth::guard('dosen')->user()->role_id == 9 || Auth::guard('dosen')->user()->role_id == 10 || Auth::guard('dosen')->user()->role_id == 11 )
    
    @if ($kp->status_kp == 'DAFTAR SEMINAR KP' && $kp->keterangan == 'Menunggu Jadwal Seminar KP')
   <div class="mb-5 mt-3 float-right">
        <div class="row row-cols-2">
    <div class="col">
        <button onclick="tolakSemKPKoordinator()"  class="btn btn-danger badge p-2 px-3" data-bs-toggle="tooltip" title="Tolak" >Tolak</button> 
</div>
    <div class="col">
        <form action="/usulan-semkp/koordinator/approve/{{$kp->id}}" class="setujui-semkp-koordinator" method="POST"> 
    @method('put')
    @csrf
    <button class="btn btn-success badge p-2 px-3 mb-3">Setujui</i></button>
</form>
    </div>
  </div>
        @endif
  @endif
  @endif

  

 

  @endforeach
<!--</div>-->
</div>

<br>
<br>
<br>




@endsection

@push('scripts')
@foreach ($pendaftaran_kp as $kp)
<script>
   $('.setujui-semkp-koordinator').submit(function(event) {
    event.preventDefault();
    Swal.fire({
        title: 'Setujui Usulan Seminar KP!',
        text: "Apakah Anda Yakin?",
        icon: 'question',
        showCancelButton: true,
        cancelButtonText: 'Batal',
        confirmButtonColor: '#28a745',
        cancelButtonColor: 'grey',
        confirmButtonText: 'Setuju'
    }).then((result) => {
        if (result.isConfirmed) {
            event.currentTarget.submit();
        }
    })
});

 function tolakSemKPKoordinator() {
     Swal.fire({
            title: 'Tolak Usulan Seminar KP',
            text: 'Apakah Anda Yakin?',
            icon: 'question',
            showCancelButton: true,
            cancelButtonText: 'Batal',
            confirmButtonText: 'Tolak',
            confirmButtonColor: '#dc3545'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'Tolak Usulan Seminar KP',
                    html: `
                        <form id="reasonForm" action="/usulan-semkp/koordinator/tolak/{{$kp->id}}" method="POST">
                        @method('put')
                            @csrf
                            <label for="alasan">Alasan Penolakan :</label>
                            <textarea class="form-control" id="alasan" name="alasan" rows="4" cols="50" required></textarea>
                            <br>
                            <button type="submit" class="btn btn-danger p-2 px-3">Kirim</button>
                            <button type="button" onclick="Swal.close();" class="btn btn-secondary p-2 px-3">Batal</button>
                        </form>
                    `,
                    showCancelButton: false,
                    showConfirmButton: false,
                });
            }
        });
    }
</script>
@endforeach
@endpush()