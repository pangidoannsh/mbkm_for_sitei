@extends('layouts.main')

@php
    use Carbon\Carbon;
@endphp

@section('title')
    SITEI | Data Kerja Praktek Mahasiswa
@endsection

@section('sub-title')
    Data Kerja Praktek Mahasiswa
@endsection

@section('content')

    @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('message') }}
        </div>
    @endif



    <div class="container card p-4">

        <ol class="breadcrumb col-lg-12">

            @if (Str::length(Auth::guard('dosen')->user()) > 0)
                @if (Auth::guard('dosen')->user()->role_id == 5 ||
                        Auth::guard('dosen')->user()->role_id == 6 ||
                        Auth::guard('dosen')->user()->role_id == 7 ||
                        Auth::guard('dosen')->user()->role_id == 8 ||
                        Auth::guard('dosen')->user()->role_id == 9 ||
                        Auth::guard('dosen')->user()->role_id == 10 ||
                        Auth::guard('dosen')->user()->role_id == 11)
                    <li><a href="/prodi/kp-skripsi/seminar" class="px-1">Seminar
                            (<span>{{ $jml_seminar_kp + $jml_sempro + $jml_sidang }}</span>) </a></li>

                    <span class="px-2">|</span>
                    <li><a href="/kerja-praktek" class="breadcrumb-item active fw-bold text-success px-1">Data KP
                            (<span>{{ $jml_prodi_kp }}</span>)</a></li>

                    <span class="px-2">|</span>
                    <li><a href="/skripsi" class="px-1">Data Skripsi (<span>{{ $jml_prodi_skripsi }}</span>)</a></li>


                    <span class="px-2">|</span>
                    <li><a href="/prodi/riwayat" class="px-1">Riwayat
                            (<span>{{ $jml_riwayat_prodi_kp + $jml_riwayat_prodi_skripsi + $jml_riwayat_seminar_kp + $jml_riwayat_sempro + $jml_riwayat_skripsi }}</span>)</a>
                    </li>
                    <span class="px-2">|</span>
                    <li><a href="/statistik" class="px-1">Statistik (All)</a></li>
                @endif
            @endif


        </ol>

        <div class="container-fluid">
            
            @php
                // Kumpulkan semua status KP
                $all_statuses = [];
                foreach ($pendaftaran_kp as $kp) {
                    $all_statuses[] = $kp->status_kp;
                }
                // Hapus duplikat status dan urutkan
                $unique_statuses = array_unique($all_statuses);
                sort($unique_statuses);
            @endphp

            <!-- Desktop Version -->
            <div class="d-none d-md-flex justify-content-between mb-3 filter">
                <div class="d-flex align-items-center">
                    <div class="dataTables_length input-group" style="width: max-content;">
                        <label class="pt-2 pr-2" for="lengthMenuDataKPProdi">Tampilkan</label>
                        <select id="lengthMenuDataKPProdi" class="custom-select custom-select-md rounded-3 py-1" style="width: 55px;">
                            <option value="50">50</option>
                            <option value="100">100</option>
                            <option value="150">150</option>
                            <option value="200">200</option>
                            <option value="250">250</option>
                        </select>
                    </div>
                    <div class="input-group ml-3" style="width: max-content;">
                        <label class="pt-2 pr-2" for="statusFilterDataKPProdi">Status</label>
                        <select id="statusFilterDataKPProdi" class="custom-select custom-select-md rounded-3 py-1" style="width: 83px;">
                            <option value="">Semua</option>
                            @foreach ($unique_statuses as $status)
                                <option value="{{ $status }}">{{ $status }}</option>
                            @endforeach
                        </select>                    
                    </div>
                </div>
                <div class="dataTables_filter input-group" style="width: max-content;">
                    <label class="pt-2 pr-2" for="searchFilterDataKPProdi">Cari</label>
                    <input type="search" class="form-control form-control-md rounded-3 py-1" id="searchFilterDataKPProdi" placeholder="">
                </div>
            </div>

            <!-- Tablet & Mobile Version -->
            <div class="d-flex flex-wrap justify-content-center gap-3 filter d-block d-md-none">
                <div class="dataTables_length input-group" style="width: max-content;">
                    <label class="pt-2 pr-2" for="lengthMenuMobileDataKPProdi">Tampilkan</label>
                    <select id="lengthMenuMobileDataKPProdi" class="custom-select custom-select-md rounded-3 py-1" style="width: 55px;">
                        <option value="50">50</option>
                        <option value="100">100</option>
                        <option value="150">150</option>
                        <option value="200">200</option>
                        <option value="250">250</option>
                    </select>
                </div>
                <div class="input-group" style="width: max-content;">
                    <label class="pt-2 pr-2" for="statusFilterMobileDataKPProdi">Status</label>
                    <select id="statusFilterMobileDataKPProdi" class="custom-select custom-select-md rounded-3 py-1" style="width: 83px;">
                        <option value="">Semua</option>
                        @foreach ($unique_statuses as $status)
                            <option value="{{ $status }}">{{ $status }}</option>
                        @endforeach
                    </select>                    
                </div>
            </div>
            <div class="d-flex flex-wrap justify-content-center gap-3 mb-3 filter d-block d-md-none">
                <div class="dataTables_filter input-group mt-3" style="width: max-content;">
                    <label class="pt-2 pr-2" for="searchFilterMobileDataKPProdi">Cari</label>
                    <input type="search" class="form-control form-control-md rounded-3 py-1" id="searchFilterMobileDataKPProdi" placeholder="">
                </div>
            </div>

            <table class="table table-responsive-lg table-bordered table-striped" width="100%" id="datatablesdatakpprodi">
                <thead class="table-dark">
                    <tr>
                        <!--<th class="text-center px-0" scope="col">No.</th>-->
                        <th class="text-center" scope="col">NIM</th>
                        <th class="text-center" scope="col">Nama</th>
                        <th class="text-center" scope="col">Status KP</th>
                        <th class="text-center" scope="col">Tanggal Penting</th>
                        <!-- <th class="text-center" scope="col">Batas Waktu</th> -->
                        <th class="text-center" scope="col">Durasi</th>
                        <th class="text-center" scope="col">Keterangan</th>
                        <th class="text-center" scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($pendaftaran_kp as $kp)
                        <div></div>
                        <tr>
                            <!--<td class="text-center px-1 py-2 ">{{ $loop->iteration }}</td>-->
                            <td class="text-center px-1 py-2">{{ $kp->mahasiswa->nim }}</td>
                            <td class="text-left pl-3 pr-1 py-2 fw-bold">{{ $kp->mahasiswa->nama }}</td>
                            @if (
                                $kp->status_kp == 'USULAN KP' ||
                                    $kp->status_kp == 'SURAT PERUSAHAAN' ||
                                    $kp->status_kp == 'DAFTAR SEMINAR KP' ||
                                    $kp->status_kp == 'BUKTI PENYERAHAN LAPORAN')
                                <td class="text-center px-1 py-2 bg-secondary">{{ $kp->status_kp }}</td>
                            @endif
                            @if (
                                $kp->status_kp == 'USULAN KP DITERIMA' ||
                                    $kp->status_kp == 'KP DISETUJUI' ||
                                    $kp->status_kp == 'DAFTAR SEMINAR KP DISETUJUI' ||
                                    $kp->status_kp == 'SEMINAR KP SELESAI' ||
                                    $kp->status_kp == 'KP SELESAI')
                                <td class="text-center px-1 py-2 bg-info">{{ $kp->status_kp }}</td>
                            @endif
                            @if ($kp->status_kp == 'SEMINAR KP DIJADWALKAN')
                                <td class="text-center px-1 py-2 bg-success">{{ $kp->status_kp }}</td>
                            @endif
                            @if (
                                $kp->status_kp == 'SURAT PERUSAHAAN DITOLAK' ||
                                    $kp->status_kp == 'DAFTAR SEMINAR KP DITOLAK' ||
                                    $kp->status_kp == 'DAFTAR SEMINAR KP ULANG' ||
                                    $kp->status_kp == 'BUKTI PENYERAHAN LAPORAN DITOLAK')
                                <td class="text-center px-1 py-2 bg-danger">{{ $kp->status_kp }}</td>
                            @endif

                            @if ($kp->status_kp == 'USULAN KP')
                                <td class="text-center px-1 py-2"><small class="text-muted"> Tanggal Usulan: </small>
                                    <br>{{ Carbon::parse($kp->tgl_created_usulan)->translatedFormat(' d F Y') }}</td>
                            @endif
                            @if ($kp->status_kp == 'USULAN KP DITERIMA')
                                <td class="text-center px-1 py-2"><small class="text-muted"> Tanggal Diterima: </small>
                                    <br>{{ Carbon::parse($kp->tgl_disetujui_usulankp_kaprodi)->translatedFormat(' d F Y') }}
                                    <br>
                                         <!-- @if(Carbon::parse($kp->tgl_disetujui_usulankp_kaprodi)->addMonths(1) < now())
                                    <small class="text-danger"><i class="fas fa-exclamation-triangle"></i> Lewat Batas Unggah Surat Perusahaan: <br></small>
                                    <span class="text-danger">{{ Carbon::parse($kp->tgl_disetujui_usulankp_kaprodi)->addMonths(1)->translatedFormat('d F Y')}}</span>
                                    @else
                                    <small class="text-dark"> Batas Unggah Surat Perusahaan: <br></small>
                                    {{ Carbon::parse($kp->tgl_disetujui_usulankp_kaprodi)->addMonths(1)->translatedFormat('d F Y')}}
                                    @endif -->
                                </td>
                            @endif

                            @if ($kp->status_kp == 'SURAT PERUSAHAAN' || $kp->status_kp == 'SURAT PERUSAHAAN DITOLAK')
                                <td class="text-center px-1 py-2"><small class="text-muted"> Tanggal Usulan: </small>
                                    <br>{{ Carbon::parse($kp->tgl_created_balasan)->translatedFormat(' d F Y') }}</td>
                            @endif

                            @if ($kp->status_kp == 'KP DISETUJUI')
                                <td class="text-center px-1 py-2"><small class="text-muted"> Tanggal Mulai: </small>
                                    <br>{{ Carbon::parse($kp->tanggal_mulai)->translatedFormat(' d F Y') }}
                                    <br>
                                         @if(Carbon::parse($kp->tanggal_mulai)->addMonths(3) < now())
                                    <small class="text-danger"><i class="fas fa-exclamation-triangle"></i> Lewat Batas Daftar Seminar: <br></small>
                                    <span class="text-danger">{{ Carbon::parse($kp->tanggal_mulai)->addMonths(3)->translatedFormat('d F Y')}}</span>
                                    @else
                                    <small class="text-dark"> Batas Daftar Seminar: <br></small>
                                    {{ Carbon::parse($kp->tanggal_mulai)->addMonths(3)->translatedFormat('d F Y')}}
                                    @endif
                                </td>
                            @endif

                            @if (
                                $kp->status_kp == 'DAFTAR SEMINAR KP' ||
                                    $kp->status_kp == 'DAFTAR SEMINAR KP DITOLAK' ||
                                    $kp->status_kp == 'DAFTAR SEMINAR KP ULANG')
                                <td class="text-center px-1 py-2"><small class="text-muted"> Tanggal Usulan: </small>
                                    <br>{{ Carbon::parse($kp->tgl_created_semkp)->translatedFormat(' d F Y') }}</td>
                            @endif
                            @if ($kp->status_kp == 'DAFTAR SEMINAR KP DISETUJUI')
                                <td class="text-center px-1 py-2"><small class="text-muted"> Tanggal Disetujui: </small>
                                    <br>{{ Carbon::parse($kp->tgl_disetujui_semkp_kaprodi)->translatedFormat(' d F Y') }}
                                </td>
                            @endif
                            @if ($kp->status_kp == 'SEMINAR KP DIJADWALKAN')
                                <td class="text-center px-1 py-2"><small class="text-muted"> Tanggal Dijadwalkan: </small>
                                    <br>{{ Carbon::parse($kp->tgl_dijadwalkan)->translatedFormat(' d F Y') }}</td>
                            @endif
                            @if ($kp->status_kp == 'SEMINAR KP SELESAI')
                                <td class="text-center px-1 py-2"><small class="text-muted"> Tanggal Selesai: </small>
                                    <br>{{ Carbon::parse($kp->tgl_selesai_semkp)->translatedFormat(' d F Y') }}
                                    <br>
                                         @if(Carbon::parse($kp->tgl_selesai_semkp)->addMonths(1) < now())
                                    <small class="text-danger"><i class="fas fa-exclamation-triangle"></i> Lewat Batas Penyerahan Laporan: <br></small>
                                    <span class="text-danger">{{ Carbon::parse($kp->tgl_selesai_semkp)->addMonths(1)->translatedFormat('d F Y')}}</span>
                                    @else
                                    <small class="text-dark"> Batas Penyerahan Laporan: <br></small>
                                    {{ Carbon::parse($kp->tgl_selesai_semkp)->addMonths(1)->translatedFormat('d F Y')}}
                                    @endif
                                </td>
                            @endif
                            @if ($kp->status_kp == 'BUKTI PENYERAHAN LAPORAN' || $kp->status_kp == 'BUKTI PENYERAHAN LAPORAN DITOLAK')
                                <td class="text-center px-1 py-2"><small class="text-muted"> Tanggal Usulan: </small>
                                    <br>{{ Carbon::parse($kp->tgl_created_kpti10)->translatedFormat(' d F Y') }}
                                    <br>
                                    @if(Carbon::parse($kp->tgl_selesai_semkp)->addMonths(1) < now())
                                    <small class="text-danger"><i class="fas fa-exclamation-triangle"></i> Lewat Batas Penyerahan Laporan: <br></small>
                                    <span class="text-danger">{{ Carbon::parse($kp->tgl_selesai_semkp)->addMonths(1)->translatedFormat('d F Y')}}</span>
                                    @else
                                    <small class="text-dark"> Batas Penyerahan Laporan: <br></small>
                                    {{ Carbon::parse($kp->tgl_selesai_semkp)->addMonths(1)->translatedFormat('d F Y')}}
                                    @endif
                                    </td>
                            @endif
                            

                            <!-- DURASI -->
                            @php
                                $tanggalMulaiKP = Carbon::parse($kp->tanggal_mulai);

                                $tanggalSelesai = Carbon::now();

                                $durasiKP = $tanggalMulaiKP ? $tanggalMulaiKP->diffInMonths($tanggalSelesai) : null;
                                $bulan = $durasiKP ? floor($durasiKP) : null;
                                $hari = $tanggalMulaiKP ? $tanggalMulaiKP->addMonths($bulan)->diffInDays($tanggalSelesai) : null;
                            @endphp

                            <td class="text-center px-1 py-2">
                                          <b>{{ $bulan ?? 0}} </b> <small>Bulan</small> <br> <b>{{ $hari }} </b> <small>Hari</small>
                                </td>


                            @if (
                                $kp->status_kp == 'SURAT PERUSAHAAN DITOLAK' ||
                                    $kp->status_kp == 'DAFTAR SEMINAR KP DITOLAK' ||
                                    $kp->status_kp == 'BUKTI PENYERAHAN LAPORAN DITOLAK' ||
                                    $kp->status_kp == 'DAFTAR SEMINAR KP ULANG')
                                <td class="text-center px-1 py-2 text-danger">{{ $kp->keterangan }}</td>
                            @elseif(
                                ($kp->keterangan == 'Menunggu persetujuan Koordinator KP' && Auth::guard('dosen')->user()->role_id == 9) ||
                                    ($kp->keterangan == 'Menunggu persetujuan Koordinator KP' && Auth::guard('dosen')->user()->role_id == 10) ||
                                    ($kp->keterangan == 'Menunggu persetujuan Koordinator KP' && Auth::guard('dosen')->user()->role_id == 11))
                                <td class="text-center px-1 py-2 text-success">
                                    <i class="fas fa-circle small-icon"></i> {{ $kp->keterangan }}
                                </td>
                            @elseif(
                                ($kp->keterangan == 'Menunggu persetujuan Koordinator Program Studi' &&
                                    Auth::guard('dosen')->user()->role_id == 6) ||
                                    ($kp->keterangan == 'Menunggu persetujuan Koordinator Program Studi' &&
                                        Auth::guard('dosen')->user()->role_id == 7) ||
                                    ($kp->keterangan == 'Menunggu persetujuan Koordinator Program Studi' &&
                                        Auth::guard('dosen')->user()->role_id == 8))
                                <td class="text-center px-1 py-2 text-success">
                                    <i class="fas fa-circle small-icon"></i> {{ $kp->keterangan }}
                                </td>
                            @else
                                <td class="text-center px-1 py-2">{{ $kp->keterangan }}</td>
                            @endif

                            @if ($kp->status_kp == 'USULAN KP')
                                <td class="text-center px-1 py-2">
                                    <a href="/usulan/detail/{{ $kp->id }}" class="badge btn btn-info p-1"
                                        data-bs-toggle="tooltip" title="Lihat Detail"><i class="fas fa-info-circle"></i></a>
                                </td>
                            @endif
                            
                            @if ($kp->status_kp == 'USULAN KP DITERIMA')
                                <td class="text-center px-1 py-2">
                                    <a href="/usulan/detail/{{ $kp->id }}" class="badge btn btn-info p-1"
                                        data-bs-toggle="tooltip" title="Lihat Detail"><i class="fas fa-info-circle"></i></a>
                                
                                @if (Str::length(Auth::guard('dosen')->user()) > 0)
                                @if (Auth::guard('dosen')->user()->role_id == 9 ||
                                        Auth::guard('dosen')->user()->role_id == 10 ||
                                        Auth::guard('dosen')->user()->role_id == 11)
                                    @if($kp->status_kp == 'USULAN KP DITERIMA')
                                    <br>
                                    <a href="#ModalGagal" data-toggle="modal"
                                        class="badge btn btn-danger p-2 mt-2"><i class="fas fa-trash fa-lg"></i></a>

                                    <div class="modal fade"id="ModalGagal">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <div class="container px-5 pt-5 pb-2">
                                                        <h3 class="text-center">Apakah Anda Yakin?</h3>
                                                        <p class="text-center">Mahasiswa akan dihapus dari Data Kerja Praktek. Data tidak bisa dikembalikan!</p>
                                                        <div class="row mb-3 justify-content-center text-center">
                                                           
                                                            <div class="col-3">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Tidak</button>
                                                            </div>
                                                            <div class="col-3">
                                                                <form
                                                                    action="/lewat-batas-balasan/hapus/{{ $kp->id }}"
                                                                    method="POST">
                                                                    @method('put')
                                                                    @csrf
                                                                    <button type="submit"
                                                                        class="btn btn-danger">Hapus</button>
                                                                </form>
                                                            </div>
                                                           
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @endif
                                    @endif

                                </td>
                            @endif

                            @if (
                                $kp->status_kp == 'SURAT PERUSAHAAN' ||
                                    $kp->status_kp == 'KP DISETUJUI' ||
                                    $kp->status_kp == 'SURAT PERUSAHAAN DITOLAK')
                                <td class="text-center px-1 py-2">
                                    <a href="/balasan-kp/detail/ {{ $kp->id }}" class="badge btn btn-info p-1"
                                        data-bs-toggle="tooltip" title="Lihat Detail"><i class="fas fa-info-circle"></i></a>
                                </td>
                            @endif
                            @if (
                                $kp->status_kp == 'DAFTAR SEMINAR KP' ||
                                    $kp->status_kp == 'DAFTAR SEMINAR KP DISETUJUI' ||
                                    $kp->status_kp == 'SEMINAR KP DIJADWALKAN' ||
                                    $kp->status_kp == 'SEMINAR KP SELESAI' ||
                                    $kp->status_kp == 'DAFTAR SEMINAR KP DITOLAK' ||
                                    $kp->status_kp == 'DAFTAR SEMINAR KP ULANG')
                                <td class="text-center px-1 py-2">
                                    <a href="/daftar-semkp/detail/{{ $kp->id }}" class="badge btn btn-info p-1"
                                        data-bs-toggle="tooltip" title="Lihat Detail"><i class="fas fa-info-circle"></i></a>
                                </td>
                            @endif

                            @if (
                                $kp->status_kp == 'BUKTI PENYERAHAN LAPORAN' ||
                                    $kp->status_kp == 'KP SELESAI' ||
                                    $kp->status_kp == 'BUKTI PENYERAHAN LAPORAN DITOLAK')
                                <td class="text-center px-1 py-2">
                                    <a href="/kpti10-kp/detail/{{ $kp->id }}" class="badge btn btn-info p-1"
                                        data-bs-toggle="tooltip" title="Lihat Detail"><i class="fas fa-info-circle"></i></a>
                                </td>
                            @endif

                        </tr>
                    @endforeach
                </tbody>


            </table>
        </div>
    </div>

<br>
    <br>
    <br>
@endsection

@section('footer')
    <section class="bg-dark p-1">
        <div class="container">
            <p class="developer">Dikembangkan oleh Prodi Teknik Informatika UNRI <a class="text-success fw-bold"
                    formtarget="_blank" target="_blank" href="/developer/m-seprinaldi">( M. Seprinaldi )</a></p>
        </div>
    </section>
@endsection


@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const waitingApprovalCount = {!! json_encode($jml_prodi_kp) !!};
            const batasCount = {!! json_encode($status_daftar1 + $status_daftar2) !!};
            
            if (waitingApprovalCount > 0 && batasCount == 0) {
                Swal.fire({
                    title: 'Ini adalah halaman Kerja Praktek',
                    html: `Ada <strong class="text-info"> ${waitingApprovalCount} Mahasiswa</strong> yang melaksanakan Kerja Praktek.`,
                    icon: 'info',
                    showConfirmButton: true,
                    confirmButtonColor: '#28a745',
                    allowOutsideClick: false,
                });
            } 
            else if (batasCount > 0) {
    Swal.fire({
        title: 'Ini adalah halaman Kerja Praktek',
        html: `Ada <strong class="text-info"> ${waitingApprovalCount} Mahasiswa</strong> yang melaksanakan Kerja Praktek.
        Dan <strong class="text-danger"> ${batasCount} Mahasiswa</strong> Lewat Batas Waktu. <br>
        
        @if (Str::length(Auth::guard('dosen')->user()) > 0)
       Berikut adalah mahasiswa yang lewat batas waktu : 
       <br>
       <br>
       <div>
        <table class="table table-responsive-lg table-bordered table-striped" width="100%" id="">
        <tbody class="bg-light">
            @foreach ($batas_kp as $kp)
                <tr class="bg-danger">
                    <td class="text-center text-light px-1 py-2">{{ $kp->mahasiswa->nim }}</td>
                    <td class="text-left text-light pl-3 pr-1 py-2">{{ $kp->mahasiswa->nama }}</td>
                    @if ($kp->status_kp == 'KP DISETUJUI')
                        <td class="text-center px-1 py-2 text-light">Lewat Batas Daftar Seminar KP</td>
                    @endif
                    @if ($kp->status_kp == 'SEMINAR KP SELESAI')
                        <td class="text-center px-1 py-2 text-light">Lewat Batas Penyerahan Laporan KP</td>
                    @endif
            @endforeach
        </tbody>
    </table>
            </div>
            <br>
        @foreach ($batas_kp as $kp)
        <form action="/lewat-batas-kp/hapus/{{ $kp->id }}" method="POST">
        @endforeach
            @method('put')
            @csrf
            <button type="submit" class="btn px-4 py-2 fw-bold btn-success">OK</button>
        </form>
        @endif
        `,
        icon: 'info',
        showConfirmButton: false,
        confirmButtonColor: '#28a745',
        width: '800px',
        allowOutsideClick: false,
    });
} 
            else {
                Swal.fire({
                    title: 'Ini adalah halaman Kerja Praktek',
                    html: `Belum ada mahasiswa yang melaksanakan Kerja Praktek.`,
                    icon: 'info',
                    showConfirmButton: true,
                    confirmButtonColor: '#28a745',
                    allowOutsideClick: false,
                });
            }
        });
    </script>
@endpush


@push('scripts')
    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(1000, 0).slideUp(1000, function() {
                $(this).remove();
            });
        }, 5000);
    </script>
@endpush()
