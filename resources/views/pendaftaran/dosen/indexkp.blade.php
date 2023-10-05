@extends('layouts.main')

@php
    Use Carbon\Carbon;
@endphp

@section('title')
    SITEI ELEKTRO | Kerja Praktek Prodi
@endsection

@section('sub-title')
    Kerja Praktek Mahasiswa Prodi
@endsection

@section('content')

@if (session()->has('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{session('message')}}
</div>
@endif



<div class="container card p-4">
  
<ol class="breadcrumb col-lg-12">
 
<div class="btn-group menu-dosen scrollable-btn-group col-md-12">

   <a href="/kp-skripsi/persetujuan-kp"  class="btn bg-light border  border-bottom-0"  style="border-top-left-radius: 15px;" >Persetujuan (<strong id="persetujuanKPCount"></strong>)</a>
       <a href="/kp-skripsi/penilaian-kp"  class="btn bg-light border  border-bottom-0 " >
  <span class="button-text">Seminar (<strong id="seminarKPCount"></strong>)</span>
  <span class="badge-link">
    <a href="/kp-skripsi/riwayat-penilaian-kp" class="sejarah pt-2 bg-light "> <span class="p-1" data-bs-toggle="tooltip" title="Riwayat Seminar"><i class="fas fa-history"></i></i></span>
    </a>
  </span>
</a>

  @if (Str::length(Auth::guard('dosen')->user()) > 0)
          @if ( Auth::guard('dosen')->user()->role_id == 6 || Auth::guard('dosen')->user()->role_id == 6 || Auth::guard('dosen')->user()->role_id == 7 || Auth::guard('dosen')->user()->role_id == 8 || Auth::guard('dosen')->user()->role_id == 9 || Auth::guard('dosen')->user()->role_id == 10 || Auth::guard('dosen')->user()->role_id == 11 )
  <a href="/kerja-praktek" class="btn btn-outline-success border  border-bottom-0 active">
   <span class="button-text">KP Prodi (<strong id="waitingApprovalCount"></strong>) </span>
  <span class="badge-link">
    <a href="/kerja-praktek/nilai-keluar" class="sejarah pt-2 bg-light ">
       <span class=" p-1" data-bs-toggle="tooltip" title="Riwayat KP"><i class="fas fa-history"></i></i></span>
    </a>
  </span>
</a>
  @endif
@endif
<a href="/pembimbing/kerja-praktek"  class="btn bg-light border  border-bottom-0 "  >
  <span class="button-text">Bimbingan KP (<strong id="bimbinganKPCount"></strong>)</span>
  <span class="badge-link">
    <a href="/kerja-praktek/pembimbing/nilai-keluar" class="sejarah pt-2 bg-light " style="border-top-right-radius: 15px;">
      <span class="p-1" data-bs-toggle="tooltip" title="Riwayat KP"><i class="fas fa-history"></i></i></span>
    </a>
  </span>
</a>

</div>

</ol>

<div class="container-fluid">

          <table class="table table-responsive-lg table-bordered table-striped" width="100%" id="datatables">
  <thead class="table-dark">
    <tr>      
        <th class="text-center px-0" scope="col">No.</th>
        <th class="text-center" scope="col">NIM</th>
        <th class="text-center" scope="col">Nama</th>
        <th class="text-center" scope="col">Status KP</th>
        <th class="text-center" scope="col">Tanggal Penting</th>
        <th class="text-center" scope="col">Keterangan</th>   
        <th class="text-center" scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>

    @foreach ($pendaftaran_kp as $kp)
@php
  $tanggalDisetujui = $kp->tgl_disetujui_usulankp;
@endphp
@php
  $tanggalSaatIni = date('Y-m-d');
@endphp

<!-- Menghitung selisih hari -->
@php
  $waktuTersisa = strtotime($tanggalSaatIni) - strtotime($tanggalDisetujui);
  $selisihHari = floor($waktuTersisa / (60 * 60 * 24));
  $selisihHari30 = 31;
  $waktuMuncul = $selisihHari + $selisihHari30;
@endphp

<div></div>
        <tr>        
            <td class="text-center ">{{$loop->iteration}}</td>                             
            <td class="text-center">{{$kp->mahasiswa->nim}}</td>                             
            <td class="text-center">{{$kp->mahasiswa->nama}}</td>
            @if ($kp->status_kp == 'USULAN KP' || $kp->status_kp == 'SURAT PERUSAHAAN'|| $kp->status_kp == 'DAFTAR SEMINAR KP' ||$kp->status_kp == 'BUKTI PENYERAHAN LAPORAN' )           
            <td class="text-center bg-secondary">{{$kp->status_kp}}</td>
            @endif
            @if ($kp->status_kp == 'USULAN KP DITERIMA' || $kp->status_kp == 'KP DISETUJUI'|| $kp->status_kp == 'SEMINAR KP SELESAI' ||$kp->status_kp == 'KP SELESAI')           
            <td class="text-center bg-info">{{$kp->status_kp}}</td>
            @endif
            @if ( $kp->status_kp == 'SEMINAR KP DIJADWALKAN')           
            <td class="text-center bg-success">{{$kp->status_kp}}</td>
            @endif
            @if ( $kp->status_kp == 'SURAT PERUSAHAAN DITOLAK' || $kp->status_kp == 'DAFTAR SEMINAR KP DITOLAK' || $kp->status_kp == 'BUKTI PENYERAHAN LAPORAN DITOLAK' )           
            <td class="text-center bg-danger">{{$kp->status_kp}}</td>
            @endif
            
            @if ($kp->status_kp == 'USULAN KP')           
            <td class="text-center"> Tanggal Usulan: <br>{{Carbon::parse($kp->tgl_created_usulan)->translatedFormat('l, d F Y')}}</td>
            @endif
            @if ($kp->status_kp == 'USULAN KP DITERIMA')           
            <td class="text-center"> Batas Unggah Surat Balasan: <br>
@if ($waktuMuncul >= 0)
    <span class="text-danger"> {{ $waktuMuncul }}  hari lagi</span> ({{Carbon::parse($kp->tgl_disetujui_usulankp)->translatedFormat('l, d F Y')}})
  @else
    Batas Waktu Unggah Surat Balasan telah habis
  @endif
</td>
            @endif
            
            @if ( $kp->status_kp == 'SURAT PERUSAHAAN DITOLAK' || $kp->status_kp == 'DAFTAR SEMINAR KP DITOLAK' || $kp->status_kp == 'BUKTI PENYERAHAN LAPORAN DITOLAK')           
             <td class="text-center text-danger">{{$kp->keterangan}}</td>
             @else
              <td class="text-center">{{$kp->keterangan}}</td>
            @endif
       
                               
             

            @if ($kp->status_kp == 'USULAN KP' || $kp->status_kp == 'USULAN KP DITERIMA' )
            <td class="text-center">
              <a href="/usulan/detail/{{($kp->id)}}" class="badge btn btn-info p-1" data-bs-toggle="tooltip" title="Lihat Detail"><i class="fas fa-info-circle"></i></a>
            <!-- <a href="/usulan/detail/ {{($kp->id)}}" class="badge bg-success rounded-pill p-2 fas fa-eye"> Lihat Detail</a> -->
            </td>
            @endif
            
            @if ($kp->status_kp == 'SURAT PERUSAHAAN' || $kp->status_kp == 'KP DISETUJUI' || $kp->status_kp == 'SURAT PERUSAHAAN DITOLAK')
            <td class="text-center">
            <a href="/balasan-kp/detail/ {{($kp->id)}}" class="badge btn btn-info p-1" data-bs-toggle="tooltip" title="Lihat Detail"><i class="fas fa-info-circle"></i></a>
            </td>
            @endif
            @if ($kp->status_kp == 'DAFTAR SEMINAR KP' || $kp->status_kp == 'SEMINAR KP DIJADWALKAN'|| $kp->status_kp == 'SEMINAR KP SELESAI' || $kp->status_kp == 'DAFTAR SEMINAR KP DITOLAK')
            <td class="text-center">
            <a href="/daftar-semkp/detail/{{($kp->id)}}" class="badge btn btn-info p-1" data-bs-toggle="tooltip" title="Lihat Detail"><i class="fas fa-info-circle"></i></a>
            </td>
            @endif

            @if ($kp->status_kp == 'BUKTI PENYERAHAN LAPORAN' || $kp->status_kp == 'KP SELESAI' || $kp->status_kp == 'BUKTI PENYERAHAN LAPORAN DITOLAK')
            <td class="text-center">
            <a href="/kpti10-kp/detail/{{($kp->id)}}" class="badge btn btn-info p-1" data-bs-toggle="tooltip" title="Lihat Detail"><i class="fas fa-info-circle"></i></a>
            </td>
            @endif  

        </tr>

    @endforeach
  </tbody>


</table>
</div>
</div>


@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const waitingApprovalCount = {!! json_encode($pendaftaran_kp->count()) !!};
    const waitingApprovalElement = document.getElementById('waitingApprovalCount');
    if (waitingApprovalCount > 0) {
      waitingApprovalElement.innerText = waitingApprovalCount;
        Swal.fire({
            title: 'Ini adalah halaman Kerja Praktek Program Studi',
            html: `Ada <strong> ${waitingApprovalCount} Mahasiswa</strong> Program Studi sedang melaksanakan Kerja Praktek.`,
            icon: 'info',
            showConfirmButton: false,
            timer: 5000,
        });
    } else {
      waitingApprovalElement.innerText = '0';
        Swal.fire({
            title: 'Ini adalah halaman Kerja Praktek Program Studi',
            html: `Tidak ada mahasiswa dibawah bimbingan.`,
            icon: 'info',
            showConfirmButton: false,
            timer: 5000,
        });
    }
});
</script>
@endpush()

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const persetujuanKPCount = {!! json_encode($jml_persetujuankp->count()) !!};
    const persetujuanKPElement = document.getElementById('persetujuanKPCount');
       persetujuanKPElement.innerText = persetujuanKPCount;
});
</script>
@endpush()

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const bimbinganKPCount = {!! json_encode($jml_bimbingankp->count()) !!};
    const bimbinganKPElement = document.getElementById('bimbinganKPCount');
       bimbinganKPElement.innerText = bimbinganKPCount;
});
</script>
@endpush()

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const seminarKPCount = {!! json_encode($jml_seminarkp->count()) !!};
    const seminarKPElement = document.getElementById('seminarKPCount');
       seminarKPElement.innerText = seminarKPCount;
});
</script>
@endpush()

