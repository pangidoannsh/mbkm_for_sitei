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

  <a href="/kp-skripsi/persetujuan" class="badge bg-success p-2 mb-3 "> Kembali <a>



  @foreach ($pendaftaran_skripsi as $skripsi)

 

  <div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
      <h5 class="text-bold">Mahasiswa</h5>
      <hr>
        <p class="card-title text-secondary text-sm " >Nama</p>
        <p class="card-text text-start" >{{$skripsi->mahasiswa->nama}}</p>
        <p class="card-title text-secondary text-sm " >NIM</p>
        <p class="card-text text-start" >{{$skripsi->mahasiswa->nim}}</p>
         <p class="card-title text-secondary text-sm " >Program Studi</p>
        <p class="card-text text-start" >{{$skripsi->mahasiswa->prodi->nama_prodi}}</p>
        <p class="card-title text-secondary text-sm " >Konsentrasi</p>
        <p class="card-text text-start" >{{$skripsi->mahasiswa->konsentrasi->nama_konsentrasi}}</p>
        
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="text-bold">Calon Dosen Pembimbing</h5>
        <hr>
        @if ($skripsi->pembimbing_2_nip == null )
        <p class="card-title text-secondary text-sm" >Nama</p>
        <p class="card-text text-start" >{{$skripsi->dosen_pembimbing1->nama}}</p>
        <!-- <p class="card-title text-secondary text-sm" >NIP</p>
        <p class="card-text text-start" >{{$skripsi->dosen_pembimbing1->nip}}</p> -->

        @elseif($skripsi->pembimbing_2_nip !== null)
        <p class="card-title text-secondary text-sm" >Nama Pembimbing 1</p>
        <p class="card-text text-start" >{{$skripsi->dosen_pembimbing1->nama}}</p>
        <!-- <p class="card-title text-secondary text-sm" >NIP</p>
        <p class="card-text text-start" >{{$skripsi->dosen_pembimbing1->nip}}</p> -->
        <p class="card-title text-secondary text-sm" >Nama Pembimbing 2</p>
        <p class="card-text text-start" >{{$skripsi->dosen_pembimbing2->nama}}</p>
        <!-- <p class="card-title text-secondary text-sm" >NIP</p>
        <p class="card-text text-start" >{{$skripsi->dosen_pembimbing2->nip}}</p> -->
        @endif
      </div>
    </div>
  </div>
</div>


<div class="card">
      <div class="card-body">
      <h5 class="text-bold">Data Usulan</h5>
      <hr>
      <p class="card-title text-secondary text-sm" >Judul diusulkan</p>
        <p class="card-text text-start" >{{$skripsi->judul_skripsi}}</p>
        <p class="card-title text-secondary text-sm " >KRS Semester Berjalan</p>
        <p class="card-text text-start" ><a formtarget="_blank" target="_blank" href="{{asset('storage/' .$skripsi->krs_berjalan )}}" class="badge bg-dark pr-3 p-2 pl-3">Lihat</a></p>
        <p class="card-title text-secondary text-sm " >Kartu Hasil Studi</p>
        <p class="card-text text-start" ><a formtarget="_blank" target="_blank" href="{{asset('storage/' .$skripsi->khs )}}" class="badge bg-dark pr-3 p-2 pl-3">Lihat</a></p>
        <p class="card-title text-secondary text-sm " >Transkip Nilai</p>
        <p class="card-text text-start" ><a formtarget="_blank" target="_blank" href="{{asset('storage/' .$skripsi->transkip_nilai )}}" class="badge bg-dark pr-3 p-2 pl-3">Lihat</a></p>    
      </div>
    </div>

    <div class="card">
      <div class="card-body">
        <h5 class="text-bold">Keterangan Pendaftaran</h5>
        <hr>
        <p class="card-title text-secondary text-sm" >Jenis Usulan</p>
        <p class="card-text text-start" ><span >{{$skripsi->jenis_usulan}}</span></p>
        @if ($skripsi->status_skripsi == 'USULAN JUDUL')
        <p class="card-title text-secondary text-sm" >Status Skripsi</p>
        <p class="card-text text-start" ><span class="badge p-2 bg-secondary text-bold pr-3 pl-3" style="border-radius:20px;">{{$skripsi->status_skripsi}}</span></p>
        @endif
        @if ($skripsi->status_skripsi == 'JUDUL DISETUJUI' )
        <p class="card-title text-secondary text-sm " >Status KP</p>
        <p class="card-text text-start" ><span class="badge p-2 bg-info text-bold pr-3 pl-3" style="border-radius:20px;">{{$skripsi->status_skripsi}}</span></p>
        @endif
        @if ($skripsi->status_skripsi == 'USULAN JUDUL DITOLAK' )
        <p class="card-title text-secondary text-sm " >Status KP</p>
        <p class="card-text text-start" ><span class="badge p-2 bg-danger text-bold pr-3 pl-3" style="border-radius:20px;">{{$skripsi->status_skripsi}}</span></p>
        @endif
        <p class="card-title text-secondary text-sm" >Keterangan</p>
        <p class="card-text text-start" ><span>{{$skripsi->keterangan}}</span></p>

      </div>
    </div>


    <!-- APPROVAL PEMBIMBING 1 -->
     @if ($skripsi->pembimbing_1_nip == Auth::user()->nip )
      
      @if ($skripsi->status_skripsi == 'USULAN JUDUL' && $skripsi->keterangan == 'Menunggu persetujuan Pembimbing 1'  )
      <div class="mb-5 mt-3 float-right">
        <div class="row row-cols-2">
    <div class="col">
        <button onclick="tolakUsulJudulPemb1()"  class="btn btn-danger badge p-2 px-3" data-bs-toggle="tooltip" title="Tolak" >Tolak</button>
</div>
    <div class="col">
        <form action="/usuljudul/pembimbing1/approve/{{$skripsi->id}}" class="setujui-usuljudul-pemb1" method="POST"> 
    @method('put')
    @csrf
    <button class="btn btn-success badge p-2 px-3">Setujui</i></button>
</form>
    </div>
  </div>
         
@endif
@endif

<!-- APPROVAL PEMBIMBING 2 -->
     @if ($skripsi->pembimbing_2_nip == Auth::user()->nip )  
      @if ($skripsi->status_skripsi == 'USULAN JUDUL' && $skripsi->keterangan == 'Menunggu persetujuan Pembimbing 2'  )
      <div class="mb-5 mt-3 float-right">
        <div class="row row-cols-2">
    <div class="col">
        <button onclick="tolakUsulJudulPemb2()"  class="btn btn-danger badge p-2 px-3" data-bs-toggle="tooltip" title="Tolak" >Tolak</button>
</div>
    <div class="col">
        <form action="/usuljudul/pembimbing2/approve/{{$skripsi->id}}" class="setujui-usuljudul-pemb2" method="POST"> 
    @method('put')
    @csrf
    <button class="btn btn-success badge p-2 px-3">Setujui</i></button>
</form>
    </div>
    </div>
  </div>
@endif         
@endif         

      <!-- APPROVAL KOORDINATOR SKRIPSI -->
    @if (Str::length(Auth::guard('dosen')->user()) > 0)
          @if (Auth::guard('dosen')->user()->role_id == 9 || Auth::guard('dosen')->user()->role_id == 10 || Auth::guard('dosen')->user()->role_id == 11 )

          @if ($skripsi->keterangan == 'Menunggu persetujuan Koordinator Skripsi' && $skripsi->status_skripsi == 'USULAN JUDUL' )
           <div class="mb-5 mt-3 float-right">
        <div class="row row-cols-2">
    <div class="col">
       <button onclick="tolakUsulJudulKoordinator()"  class="btn btn-danger badge p-2 px-3" data-bs-toggle="tooltip" title="Tolak" >Tolak</button>
</div>
    <div class="col">
        <form action="/usuljudul/koordinator/approve/{{$skripsi->id}}" class="setujui-usuljudul-koordinator" method="POST"> 
    @method('put')
    @csrf
    <button class="btn btn-success badge p-2 px-3">Setujui</i></button>
</form>
    </div>
    </div>
  </div>
    @endif
    @endif
    @endif


    @if (Str::length(Auth::guard('dosen')->user()) > 0)
    @if (Auth::guard('dosen')->user()->role_id == 6 || Auth::guard('dosen')->user()->role_id == 7 || Auth::guard('dosen')->user()->role_id == 8 )
     @if ($skripsi->keterangan == 'Menunggu persetujuan Koordinator Program Studi' && $skripsi->status_skripsi == 'USULAN JUDUL' )
    <div class="mb-5 mt-3 float-right">
        <div class="row row-cols-2">
    <div class="col">
        <button onclick="tolakUsulJudulKaprodi()"  class="btn btn-danger badge p-2 px-3" data-bs-toggle="tooltip" title="Tolak" >Tolak</button>
</div>
    <div class="col">
        <form action="/usuljudul/kaprodi/approve/{{$skripsi->id}}" class="setujui-usuljudul-kaprodi" method="POST"> 
    @method('put')
    @csrf
    <button class="btn btn-success badge p-2 px-3">Setujui</i></button>
</form>
    </div>
    </div>
  </div>
    
    @endif
    @endif
    @endif
    <!-- </div>   
  </div> -->

</div>
</div>
@endforeach



<br>
<br>
<br>

@endsection


@push('scripts')
@foreach ($pendaftaran_skripsi as $skripsi)
<script>
//APROVAL SKRIPSI
  //PEMBIMBING 1
$('.setujui-usuljudul-pemb1').submit(function(event) {
    event.preventDefault();
    Swal.fire({
        title: 'Setujui Usulan Judul Skripsi!',
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

function tolakUsulJudulPemb1() {
     Swal.fire({
            title: 'Tolak Usulan Judul Skripsi',
            text: 'Apakah Anda Yakin?',
            icon: 'question',
            showCancelButton: true,
            cancelButtonText: 'Batal',
            confirmButtonText: 'Tolak',
            confirmButtonColor: '#dc3545'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'Tolak Usulan Judul Skripsi',
                    html: `
                        <form id="reasonForm" action="/usuljudul/pembimbing1/tolak/{{$skripsi->id}}" method="POST">
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
//PEMBIMBING 2
$('.setujui-usuljudul-pemb2').submit(function(event) {
    event.preventDefault();
    Swal.fire({
        title: 'Setujui Usulan Judul Skripsi!',
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

function tolakUsulJudulPemb2() {
     Swal.fire({
            title: 'Tolak Usulan Judul Skripsi',
            text: 'Apakah Anda Yakin?',
            icon: 'question',
            showCancelButton: true,
            cancelButtonText: 'Batal',
            confirmButtonText: 'Tolak',
            confirmButtonColor: '#dc3545'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'Tolak Usulan Judul Skripsi',
                    html: `
                        <form id="reasonForm" action="/usuljudul/pembimbing2/tolak/{{$skripsi->id}}" method="POST">
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


$('.setujui-usuljudul-koordinator').submit(function(event) {
    event.preventDefault();
    Swal.fire({
        title: 'Setujui Usulan Judul Skripsi!',
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

function tolakUsulJudulKoordinator() {
     Swal.fire({
            title: 'Tolak Usulan Judul Skripsi',
            text: 'Apakah Anda Yakin?',
            icon: 'question',
            showCancelButton: true,
            cancelButtonText: 'Batal',
            confirmButtonText: 'Tolak',
            confirmButtonColor: '#dc3545'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'Tolak Usulan Judul Skripsi',
                    html: `
                        <form id="reasonForm" action="/usuljudul/koordinator/tolak/{{$skripsi->id}}" method="POST">
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
$('.setujui-usuljudul-kaprodi').submit(function(event) {
    event.preventDefault();
    Swal.fire({
        title: 'Setujui Usulan Judul Skripsi!',
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

function tolakUsulJudulKaprodi() {
     Swal.fire({
            title: 'Tolak Usulan Judul Skripsi',
            text: 'Apakah Anda Yakin?',
            icon: 'question',
            showCancelButton: true,
            cancelButtonText: 'Batal',
            confirmButtonText: 'Tolak',
            confirmButtonColor: '#dc3545'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'Tolak Usulan Judul Skripsi',
                    html: `
                        <form id="reasonForm" action="/usuljudul/kaprodi/tolak/{{$skripsi->id}}" method="POST">
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