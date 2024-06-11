<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('/assets/dist/css/bootstrap.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('/assets/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" />

    <!-- <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('/assets/css/mbkm.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/dokumen.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('/assets/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/style.css?v=0.001') }}">
    <!--<link rel="stylesheet" href="{{ asset('/assets/dataTables/datatables.min.css') }}">-->

    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/rowgroup/1.4.0/css/rowGroup.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap4.min.css" rel="stylesheet">

    <script src="https://kit.fontawesome.com/9c94b38548.js" crossorigin="anonymous"></script>

    <!-- <script type="text/javascript">
        function mousedwn(e) {
            try {
                if (event.button == 2 || event.button == 3) return false
            } catch (e) {
                if (e.which == 3) return false
            }
        }
        document.oncontextmenu = function() {
            return false
        };
        document.ondragstart = function() {
            return false
        };
        document.onmousedown = mousedwn
    </script> -->

    <style>
        .dropdown-menu {
            border-left: 0.01px solid rgba(0, 0, 0, 0.05);
            border-right: 0.01px solid rgba(0, 0, 0, 0.05);
            border-bottom: 0.01px solid rgba(0, 0, 0, 0.05);
            border-top: 0.01px solid rgba(0, 0, 0, 0.05);
            /* border: none; */
            box-shadow: none;
            /*padding-left:20px;*/
        }



        .dropdown-menu li:hover {
            background-color: rgba(41, 52, 47, 0.05);
        }

        .dropdown-menu form li:hover {
            background-color: rgba(41, 52, 47, 0.05);
        }


        @media screen and (max-width: 768px) {
            .cardskripsi {
                margin-bottom: 50px;
            }

            .dropdown-menu form li i {
                margin-left: -15px;
            }

            .navbar-collapse {
                /*background: rgba(0, 0, 0, 0.05);*/
                padding-left: 25px;
                padding-right: 25px;
            }

            .dropdown-menu {
                background: radial-gradient(circle at top left, #ffffff, #e5e5e5);

            }

            .navbar-nav li a {
                text-align: center;
            }

            .navbar-nav li button {
                text-align: center;
            }

        }

        .dropdown-item:hover {
            color: #0c8a4f;
            background-color: rgba(41, 52, 47, 0.05);
        }

        form li button:hover {
            color: #0c8a4f;
            background-color: rgba(41, 52, 47, 0.05);
        }

        .cursor-default {
            cursor: default !important;

        }

        .cursor-default:hover {
            cursor: default !important;
            color: #192f59 !important;
            background-color: white !important;
        }

        #datatablesriwayatseminar_length,
        #datatablesriwayatseminar_filter {
            display: none;
        }

        #datatablesriwayatkpdanskripsi_length,
        #datatablesriwayatkpdanskripsi_filter {
            display: none;
        }

        #datatablesbimbinganskripsi_length,
        #datatablesbimbinganskripsi_filter {
            display: none;
        }

        #datatablesbimbingankp_length,
        #datatablesbimbingankp_filter {
            display: none;
        }

        #datatablesjadwalseminarpembimbingpenguji_length,
        #datatablesjadwalseminarpembimbingpenguji_filter {
            display: none;
        }

        #datatablespersetujuankpskripsi_length,
        #datatablespersetujuankpskripsi_filter {
            display: none;
        }

        #datatablesriwayatseminardibatalkan_length,
        #datatablesriwayatseminardibatalkan_filter {
            display: none;
        }

        #datatablesriwayatseminarprodi_length,
        #datatablesriwayatseminarprodi_filter {
            display: none;
        }

        #datatablesriwayatkpskripsiprodi_length,
        #datatablesriwayatkpskripsiprodi_filter {
            display: none;
        }

        #datatablesdataskripsiprodi_length,
        #datatablesdataskripsiprodi_filter {
            display: none;
        }

        #datatablesdatakpprodi_length,
        #datatablesdatakpprodi_filter {
            display: none;
        }

        #datatablesjadwalseminarprodi_length,
        #datatablesjadwalseminarprodi_filter {
            display: none;
        }

        #datatablesdaftarlulusbimbinganskripsi_length,
        #datatablesdaftarlulusbimbinganskripsi_filter {
            display: none;
        }

        #datatablesdaftarbebanbimbinganskripsi_length,
        #datatablesdaftarbebanbimbinganskripsi_filter {
            display: none;
        }

        #datatablesdaftarselesaibimbingankp_length,
        #datatablesdaftarselesaibimbingankp_filter {
            display: none;
        }

        #datatablesdaftarbebanbimbingankp_length,
        #datatablesdaftarbebanbimbingankp_filter {
            display: none;
        }

        #datatablesdataskripsimhsadmin_length,
        #datatablesdataskripsimhsadmin_filter {
            display: none;
        }

        #datatablesdatakpmhsadmin_length,
        #datatablesdatakpmhsadmin_filter {
            display: none;
        }

        #datatablesjadwalseminaradminprodi_length,
        #datatablesjadwalseminaradminprodi_filter {
            display: none;
        }

        #datatablespersetujuankpskripsiadmin_length,
        #datatablespersetujuankpskripsiadmin_filter {
            display: none;
        }

        #datatablesdaftarmhsadmprodi_length,
        #datatablesdaftarmhsadmprodi_filter {
            display: none;
        }

        #datatablesdaftarprodiadmjurusan_length,
        #datatablesdaftarprodiadmjurusan_filter {
            display: none;
        }

        #datatablesdaftarkonsentrasiadmjurusan_length,
        #datatablesdaftarkonsentrasiadmjurusan_filter {
            display: none;
        }

        #datatablesdaftardosenadmjurusan_length,
        #datatablesdaftardosenadmjurusan_filter {
            display: none;
        }

        #datatablesdaftartendikadmjurusan_length,
        #datatablesdaftartendikadmjurusan_filter {
            display: none;
        }

        #datatablesdaftarplpadmjurusan_length,
        #datatablesdaftarplpadmjurusan_filter {
            display: none;
        }

        #datatablesdaftarhakaksesadmjurusan_length,
        #datatablesdaftarhakaksesadmjurusan_filter {
            display: none;
        }

        #datatablesjadwalseminaruntukmhs_length,
        #datatablesjadwalseminaruntukmhs_filter {
            display: none;
        }

        #datatablesjudulskripsiterdaftar_length,
        #datatablesjudulskripsiterdaftar_filter {
            display: none;
        }
    </style>



</head>

<body class="hold-transition layout-top-nav">
    @include('sweetalert::alert')
    <div class="wrapper">

        <div class="atas">
            <nav class="navbar navbar-expand-lg main-header fixed-top bayangan">
                <div class="container judul">
                    <div class="sia-jte">
                        <a>
                            <img src="/assets/dist/img/unri.png" alt="" width="30" height="30"
                                class="d-inline-block mr-2">
                        </a>
                        @if (Str::length(Auth::guard('web')->user()) > 0)
                            <a class="navbar-brand mt-1 " href="/">MBKM
                            @elseif (Str::length(Auth::guard('dosen')->user()) > 0)
                                <a class="navbar-brand mt-1 " href="/persetujuan-kp-skripsi">MBKM
                                @elseif (Str::length(Auth::guard('mahasiswa')->user()) > 0)
                                    <a class="navbar-brand mt-1 " href="/">MBKM
                        @endif
                        </a>
                    </div>

                    <span class="navbar-toggler navbar-light bg-white border border-white" role="button"
                        data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-bars fs-1 fa-lg"></i>
                    </span>



                    <div class="collapse navbar-collapse navbar-toggler-collapse rounded-bottom"
                        id="navbarSupportedContent">
                        <ul class="navbar-nav">

                            {{-- Menu KP/TA Dosen --}}

                            @if (Str::length(Auth::guard('dosen')->user()) > 0)

                                <ul class="navbar-nav">
                                    {{-- PENGUMUMAN --}}

                                    @if (in_array(Auth::guard('dosen')->user()->role_id, [5, 6, 7, 8]))
                                        {{-- <li class="nav-item dropdown ">
                                            <a class="nav-link dropdown-toggle" id="pengumumanDropdown" role="button"
                                                data-bs-toggle="dropdown" class="nav-link ">
                                                <span
                                                    class="fw-bold {{ Request::is('pengumuman*') ? 'text-success' : '' }}">
                                                    PENGUMUMAN
                                                </span>
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="pengumumanDropdown">
                                                <li class="nav-item">
                                                    <a href="{{ route('pengumuman') }}"
                                                        class="nav-link {{ Request::is('pengumuman') || Request::is('pengumuman/arsip') ? 'text-success' : '' }}">Dosen</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link {{ Request::is('pengumuman/pengelola*') ? 'text-success' : '' }}"
                                                        href="{{ route('pengumuman.pengelola') }}">Pengelola</a>
                                                </li>
                                            </ul>
                                        </li> --}}
                                    @else
                                        {{-- <li class="nav-item">
                                            <a class="nav-link {{ Request::is('pengumuman*') ? 'text-success' : '' }} "
                                                aria-current="page" href="{{ route('pengumuman') }}">PENGUMUMAN</a>
                                        </li> --}}
                                    @endif

                                    {{-- END PENGUMUMAN --}}
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle " href="" id="navbarDropdown"
                                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            KP/SKRIPSI
                                        </a>
                                        <div>
                                            <ul class="dropdown-menu dropdown-menu-end"
                                                aria-labelledby="navbarDropdown">

                                                <li>
                                                    <a class="nav-link {{ Request::is('persetujuan-kp-skripsi*') ? 'text-success' : '' }} {{ Request::is('persetujuan-koordinator*') ? 'text-success' : '' }}{{ Request::is('riwayat-koordinator*') ? 'text-success' : '' }}"
                                                        aria-current="page"
                                                        href="/persetujuan-kp-skripsi">Persetujuan</a>
                                                </li>


                                                <li>
                                                    <a class="nav-link" href="/pembimbing/skripsi"
                                                        class="dropdown-item mb-1 {{ Request::is('pembimbing/skripsi*') ? 'text-success' : '' }} {{ Request::is('pembimbing/kerja-praktek*') ? 'text-success' : '' }}">Bimbingan</a>
                                                </li>


                                                <li>
                                                    <a class="nav-link" href="/kp-skripsi/seminar-pembimbing-penguji"
                                                        class="dropdown-item mb-1 {{ Request::is('kp-skripsi*') ? 'text-success' : '' }} ">Seminar</a>
                                                </li>

                                                <li>
                                                    <a class="nav-link" href="/pembimbing-penguji/riwayat-bimbingan"
                                                        class="dropdown-item mb-1 {{ Request::is('pembimbing-penguji*') ? 'text-success' : '' }} ">Riwayat</a>
                                                </li>
                                                <li><a class="nav-link" href="/statistik"
                                                        class="dropdown-item mb-1 {{ Request::is('statistik*') ? 'text-success' : '' }}">Statistik</a>
                                                </li>
                                                @if (Str::length(Auth::guard('dosen')->user()) > 0)
                                                    @if (Auth::guard('dosen')->user()->role_id == 5 ||
                                                            Auth::guard('dosen')->user()->role_id == 9 ||
                                                            Auth::guard('dosen')->user()->role_id == 10 ||
                                                            Auth::guard('dosen')->user()->role_id == 11 ||
                                                            Auth::guard('dosen')->user()->role_id == 6 ||
                                                            Auth::guard('dosen')->user()->role_id == 7 ||
                                                            Auth::guard('dosen')->user()->role_id == 8)
                                                        <li><a class="nav-link" href="/prodi/kp-skripsi/seminar"
                                                                class="dropdown-item mb-1 {{ Request::is('prodi*') ? 'text-success' : '' }} {{ Request::is('kerja-praktek*') ? 'text-success' : '' }} {{ Request::is('skripsi*') ? 'text-success' : '' }}">Pengelola</a>
                                                        </li>
                                                    @endif
                                                @endif
                                            </ul>
                                        </div>
                                    </li>
                                </ul>


                                {{-- <li class="nav-item">
                                    <a class="nav-link {{ Request::is('inventaris*') ? 'text-success' : '' }} "
                                        aria-current="page" href="/inventaris/peminjaman-dosen">INVENTARIS</a>
                                </li> --}}
                                @if (in_array(Auth::guard('dosen')->user()->role_id, [6, 7, 8]))
                                    <li class="nav-item">
                                        <a class="nav-link {{ Request::is('mbkm*') ? 'text-success' : '' }}"
                                            aria-current="page" href="{{ route('mbkm.prodi') }}">MBKM</a>
                                    </li>
                                @endif
                                {{-- DistribusiDokumen --}}
                                @if (in_array(Auth::guard('dosen')->user()->role_id, [5, 6, 7, 8]))
                                    {{-- <li class="nav-item dropdown ">
                                        <a class="nav-link dropdown-toggle" id="dokumenDropdown" role="button"
                                            data-bs-toggle="dropdown" class="nav-link ">
                                            <span
                                                class="fw-bold {{ Request::is('distribusi-dokumen*') ? 'text-success' : '' }}">
                                                DOKUMEN
                                            </span>
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="dokumenDropdown">
                                            <li class="nav-item">
                                                <a href="{{ route('doc.index') }}"
                                                    class="nav-link {{ Request::is('distribusi-dokumen') ? 'text-success' : '' }}">Dosen</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link {{ Request::is('distribusi-dokumen/pengelola*') ? 'text-success' : '' }}"
                                                    href="{{ route('pengelola') }}">Pengelola</a>
                                            </li>
                                        </ul>
                                    </li> --}}
                                @else
                                    {{-- <li class="nav-item dropdown baru">
                                        <a href="{{ route('doc.index') }}"
                                            class="nav-link {{ Request::is('distribusi-dokumen*') ? 'text-success' : '' }}">
                                            DOKUMEN
                                        </a>
                                    </li> --}}
                                @endif

                            @endif

                            {{-- Menu PLP --}}

                            @if (Str::length(Auth::guard('web')->user()) > 0)
                                @if (Auth::guard('web')->user()->role_id == 12)
                                    {{-- <li class="nav-item">
                                        <a class="nav-link {{ Request::is('pengumuman*') ? 'text-success' : '' }} "
                                            aria-current="page" href="{{ route('pengumuman') }}">PENGUMUMAN</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ Request::is('inventaris*') ? 'text-success' : '' }} "
                                            aria-current="page" href="/inventaris/peminjaman-plp">INVENTARIS</a>
                                    </li>
                                    <li class="nav-item dropdown baru">
                                        <a href="{{ route('doc.index') }}"
                                            class="nav-link {{ Request::is('distribusi-dokumen*') ? 'text-success' : '' }}">
                                            DOKUMEN
                                        </a>
                                    </li> --}}
                                @endif
                            @endif

                            {{-- Menu KP/TA Mahasiswa --}}

                            @if (Str::length(Auth::guard('mahasiswa')->user()) > 0)
                                <ul class="navbar-nav">
                                    {{-- <li class="nav-item">
                                        <a class="nav-link {{ Request::is('pengumuman*') ? 'text-success' : '' }} "
                                            aria-current="page" href="{{ route('pengumuman') }}">PENGUMUMAN</a>
                                    </li> --}}
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle " href="" id="navbarDropdown"
                                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            KP/SKRIPSI
                                        </a>
                                        <div>
                                            <ul class="dropdown-menu dropdown-menu-end"
                                                aria-labelledby="navbarDropdown">

                                                <li class="nav-item">
                                                    <a class="nav-link {{ Request::is('kp-skripsi*') ? 'text-success' : '' }}  {{ Request::is('usulankp*') ? 'text-success' : '' }} {{ Request::is('permohonankp*') ? 'text-success' : '' }} {{ Request::is('balasankp*') ? 'text-success' : '' }} {{ Request::is('seminarkp*') ? 'text-success' : '' }} {{ Request::is('usulan-semkp*') ? 'text-success' : '' }} {{ Request::is('kpti10-kp*') ? 'text-success' : '' }} {{ Request::is('usuljudul*') ? 'text-success' : '' }}  "
                                                        aria-current="page" href="/kp-skripsi">Usulan</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link {{ Request::is('jadwal*') ? 'text-success' : '' }} "
                                                        aria-current="page" href="/jadwal">Seminar</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link {{ Request::is('seminar*') ? 'text-success' : '' }} "
                                                        aria-current="page" href="/seminar">Download</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link {{ Request::is('statistik*') ? 'text-success' : '' }} "
                                                        aria-current="page" href="/statistik">Statistik</a>
                                                </li>

                                            </ul>
                                        </div>
                                    </li>
                                </ul>

                                {{-- <li class="nav-item">
                                    <a class="nav-link {{ Request::is('inventaris*') ? 'text-success' : '' }} "
                                        aria-current="page" href="/inventaris/peminjamanmhs">INVENTARIS</a>
                                </li> --}}
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::is('mbkm*') ? 'text-success' : '' }}"
                                        aria-current="page" href="{{ route('mbkm') }}">MBKM</a>
                                </li>
                                {{-- DistribusiDokumen --}}
                                {{-- <li class="nav-item dropdown baru">
                                    <a id="dokumendropdown" href="{{ route('doc.index') }}"
                                        class="nav-link {{ Request::is('distribusi-dokumen*') ? 'text-success' : '' }}">
                                        DOKUMEN
                                    </a>
                                </li> --}}
                            @endif

                            @if (Str::length(Auth::guard('web')->user()) > 0)
                                @if (Auth::guard('web')->user()->role_id == 2 ||
                                        Auth::guard('web')->user()->role_id == 3 ||
                                        Auth::guard('web')->user()->role_id == 4)
                                    <ul class="navbar-nav">
{{-- 
                                        <li class="nav-item">
                                            <a class="nav-link {{ Request::is('pengumuman*') ? 'text-success' : '' }} "
                                                aria-current="page" href="{{ route('pengumuman') }}">PENGUMUMAN</a>
                                        </li> --}}

                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle " href="" id="navbarDropdown"
                                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                KP/SKRIPSI
                                            </a>
                                            <div>
                                                <ul class="dropdown-menu dropdown-menu-end"
                                                    aria-labelledby="navbarDropdown">

                                                    <li class="nav-item">
                                                        <a class="nav-link {{ Request::is('sempro*') ? 'text-success' : '' }}{{ Request::is('daftar-sempro*') ? 'text-success' : '' }}{{ Request::is('persetujuan*') ? 'text-success' : '' }}{{ Request::is('skripsi*') ? 'text-success' : '' }}{{ Request::is('usulan*') ? 'text-success' : '' }}{{ Request::is('daftar-semkp*') ? 'text-success' : '' }}{{ Request::is('suratperusahaan*') ? 'text-success' : '' }}{{ Request::is('usuljudul*') ? 'text-success' : '' }}{{ Request::is('daftar-sidang*') ? 'text-success' : '' }}"
                                                            aria-current="page"
                                                            href="/persetujuan/admin/index">Persetujuan</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link {{ Request::is('form*') ? 'text-success' : '' }}"
                                                            aria-current="page" href="/form">Seminar</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link {{ Request::is('kerja-praktek*') ? 'text-success' : '' }}"
                                                            aria-current="page" href="/kerja-praktek/admin/index">Data
                                                            KP</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link {{ Request::is('sidang*') ? 'text-success' : '' }}"
                                                            aria-current="page" href="/sidang/admin/index">Data
                                                            Skripsi</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link {{ Request::is('prodi*') ? 'text-success' : '' }}"
                                                            aria-current="page" href="/prodi/riwayat">Riwayat</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link {{ Request::is('statistik*') ? 'text-success' : '' }}"
                                                            aria-current="page" href="/statistik">Statistik</a>
                                                    </li>

                                                </ul>
                                            </div>
                                        </li>
                                    </ul>

                                    {{-- <li class="nav-item">
                                        <a class="nav-link {{ Request::is('inventaris*') ? 'text-success' : '' }}"
                                            aria-current="page" href="/inventaris/peminjamanadm">INVENTARIS</a>
                                    </li> --}}
                                    <li class="nav-item">
                                        <a class="nav-link {{ Request::is('mbkm*') ? 'text-success' : '' }}"
                                            aria-current="page" href="{{ route('mbkm.staff') }}">MBKM</a>
                                    </li>

                                    {{-- DistribusiDokumen --}}
                                    <li class="nav-item dropdown baru">
                                        <a id="dokumendropdown" href="{{ route('doc.index') }}"
                                            class="nav-link {{ Request::is('distribusi-dokumen*') ? 'text-success' : '' }}">
                                            DOKUMEN
                                        </a>
                                    </li>
                                @endif

                                @if (Auth::guard('web')->user()->role_id == 1)
                                    <ul class="navbar-nav">

                                        {{-- <li class="nav-item">
                                            <a class="nav-link {{ Request::is('pengumuman*') ? 'text-success' : '' }} "
                                                aria-current="page" href="{{ route('pengumuman') }}">PENGUMUMAN</a>
                                        </li> --}}

                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle " href="" id="navbarDropdown"
                                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                KP/SKRIPSI
                                            </a>
                                            <div>
                                                <ul class="dropdown-menu dropdown-menu-end"
                                                    aria-labelledby="navbarDropdown">

                                                    <li class="nav-item">
                                                        <a class="nav-link {{ Request::is('form*') ? 'text-success' : '' }}"
                                                            aria-current="page" href="/form">Seminar</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link {{ Request::is('kerja-praktek*') ? 'text-success' : '' }}"
                                                            aria-current="page" href="/kerja-praktek/admin/index">Data
                                                            KP</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link {{ Request::is('sidang*') ? 'text-success' : '' }}"
                                                            aria-current="page" href="/sidang/admin/index">Data
                                                            Skripsi</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link {{ Request::is('riwayat-penjadwalan*') ? 'text-success' : '' }}"
                                                            aria-current="page" href="/prodi/riwayat">Riwayat</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link {{ Request::is('statistik*') ? 'text-success' : '' }}"
                                                            aria-current="page" href="/statistik">Statistik</a>
                                                    </li>

                                                </ul>
                                            </div>
                                        </li>
                                    </ul>

                                    {{-- <li class="nav-item">
                                        <a class="nav-link {{ Request::is('inventaris*') ? 'text-success' : '' }}"
                                            aria-current="page" href="/inventaris/peminjamanadm">INVENTARIS</a>
                                    </li> --}}

                                    {{-- DistribusiDokumen --}}
                                    {{-- <li class="nav-item dropdown baru">
                                        <a id="dokumendropdown" href="{{ route('doc.index') }}"
                                            class="nav-link {{ Request::is('distribusi-dokumen*') ? 'text-success' : '' }}">
                                            DOKUMEN
                                        </a>
                                    </li> --}}


                                    <ul class="navbar-nav">
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle " href="" id="navbarDropdown"
                                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                DATA
                                            </a>
                                            <div>
                                                <ul class="dropdown-menu dropdown-menu-end"
                                                    aria-labelledby="navbarDropdown">
                                                    <li class="nav-item"><a href="/prodi"
                                                            class="dropdown-item nav-link {{ Request::is('prodi*') ? 'text-success' : '' }}">Program
                                                            Studi</a></li>
                                                    <li class="nav-item"><a href="/konsentrasi"
                                                            class="dropdown-item nav-link {{ Request::is('konsentrasi*') ? 'text-success' : '' }}">Konsentrasi</a>
                                                    </li>
                                                    <li class="nav-item"><a
                                                            href="/semester"class="dropdown-item nav-link  {{ Request::is('semester*') ? 'text-success' : '' }}">Semester
                                                            (TA)</a></li>
                                                    <li class="nav-item"><a href="/kapasitas-bimbingan/index"
                                                            class="dropdown-item nav-link  {{ Request::is('kapasitas-bimbingan*') ? 'text-success' : '' }}">Kuota
                                                            Bimbingan</a></li>
                                                    <li class="nav-item"><a
                                                            href="/logo"class="dropdown-item nav-link  {{ Request::is('logo*') ? 'text-success' : '' }}">Logo
                                                            Sertifikat</a></li>
                                                    <li class="nav-item"><a href="#"
                                                            class="dropdown-item cursor-default nav-link"><b>AKUN</b></a>
                                                    </li>
                                                    <li class="nav-item"><a href="/dosen"
                                                            class="dropdown-item nav-link {{ Request::is('dosen*') ? 'text-success' : '' }}"><span
                                                                class="ml-2">- Dosen </span></a></li>
                                                    <li class="nav-item"><a href="/user"
                                                            class="dropdown-item nav-link {{ Request::is('user*') ? 'text-success' : '' }}"><span
                                                                class="ml-2">- Tendik </span></a></li>
                                                    <li class="nav-item"><a href="/plp"
                                                            class="dropdown-item nav-link {{ Request::is('plp*') ? 'text-success' : '' }}"><span
                                                                class="ml-2">- PLP </span></a></li>
                                                    <li class="nav-item"><a href="/role"
                                                            class="dropdown-item nav-link {{ Request::is('role*') ? 'text-success' : '' }}"><span
                                                                class="ml-2">- Hak Akses </span></a></li>

                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                @endif



                            @endif

                            @if (Str::length(Auth::guard('web')->user()) > 0)
                                @if (in_array(Auth::guard('web')->user()->role_id, [2, 3]))
                                    <ul class="navbar-nav">
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle " href="" id="navbarDropdown"
                                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                DATA
                                            </a>
                                            <div>
                                                <ul class="dropdown-menu dropdown-menu-end"
                                                    aria-labelledby="navbarDropdown">

                                                    <li class="nav-item"><a class="nav-link" href="/mahasiswa"
                                                            class="dropdown-item mb-1 {{ Request::is('mahasiswa*') ? 'text-success' : '' }}">Mahasiswa</a>
                                                    </li>
                                                    <li class="nav-item"><a href="/program-mbkm"
                                                            class="dropdown-item nav-link {{ Request::is('mahasiswa*') ? 'text-success' : '' }}">Program
                                                            MBKM</a>
                                                    <li class="nav-item"><a href="/matkul"
                                                            class="dropdown-item nav-link {{ Request::is('matkul*') ? 'text-success' : '' }}">Mata
                                                            Kuliah</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                @endif
                            @endif

                            @if (Str::length(Auth::guard('web')->user()) > 0)
                                @if (Auth::guard('web')->user()->role_id == 4)
                                    <ul class="navbar-nav">
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle " href="" id="navbarDropdown"
                                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                DATA
                                            </a>
                                            <div>
                                                <ul class="dropdown-menu dropdown-menu-end"
                                                    aria-labelledby="navbarDropdown">

                                                    <li class="nav-item"><a href="/mahasiswa"
                                                            class="dropdown-item nav-link {{ Request::is('mahasiswa*') ? 'text-success' : '' }}">Mahasiswa</a>
                                                    <li class="nav-item"><a href="/program-mbkm"
                                                            class="dropdown-item nav-link {{ Request::is('mahasiswa*') ? 'text-success' : '' }}">Program
                                                            MBKM</a>
                                                    <li class="nav-item"><a href="/matkul"
                                                            class="dropdown-item nav-link {{ Request::is('matkul*') ? 'text-success' : '' }}">Mata
                                                            Kuliah</a>
                                                    </li>
                                                    <li class="nav-item"><a href="#"
                                                            class="dropdown-item cursor-default nav-link"><b>Backup
                                                                File</b></a> </li>
                                                    <li class="nav-item"><a
                                                            href="https://drive.google.com/drive/folders/1BXXXZdm36DWkm69hI6EZdNznXaGClwL9"
                                                            target="_blank" class="dropdown-item nav-link"><span
                                                                class="ml-2">- Seminar KP </span></a></li>
                                                    <li class="nav-item"><a
                                                            href="https://drive.google.com/drive/folders/1CHKVAqnQqgxeONsETBhuQWbasaVcGcdT"
                                                            target="_blank" class="dropdown-item nav-link"><span
                                                                class="ml-2">- SemPro </span></a></li>
                                                    <li class="nav-item"><a
                                                            href="https://drive.google.com/drive/folders/1BIsESymd0P8k0UBcnDehn70ymNvl4rbi"
                                                            target="_blank" class="dropdown-item nav-link"><span
                                                                class="ml-2">- Sidang Skripsi </span></a></li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                @endif
                            @endif
                        </ul>

                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle " href="" id="navbarDropdown"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <!--@if (Str::length(Auth::guard('dosen')->user()) > 0)
-->
                                    <!--    {{ Auth::guard('dosen')->user()->nama }}-->
                                    <!--
@elseif (Str::length(Auth::guard('web')->user()) > 0)
-->
                                    <!--    {{ Auth::guard('web')->user()->nama }}-->
                                    <!--
@elseif (Str::length(Auth::guard('mahasiswa')->user()) > 0)
-->
                                    <!--    {{ Auth::guard('mahasiswa')->user()->nama }}-->
                                    <!--
@endif-->
                                    AKUN
                                </a>
                                <div>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        @if (Str::length(Auth::guard('dosen')->user()) > 0)
                                            @if (Auth::guard('dosen')->user())
                                                <li>
                                                    <a class="nav-link dropdown-item " href="">
                                                        <b>{{ Auth::guard('dosen')->user()->nama }}</b>
                                                    </a>
                                                </li>
                                                <hr>
                                                <li>
                                                    <a class="nav-link dropdown-item {{ Request::is('profil-dosen*') ? 'text-success' : '' }}"
                                                        href="/profil-dosen/editpassworddsn/">
                                                        Ubah Password
                                                    </a>
                                                </li>
                                            @endif
                                        @endif

                                        @if (Str::length(Auth::guard('mahasiswa')->user()) > 0)
                                            @if (Auth::guard('mahasiswa')->user())
                                                <li>
                                                    <a class="nav-link dropdown-item " href="">
                                                        <b>{{ Auth::guard('mahasiswa')->user()->nama }}</b>
                                                    </a>
                                                </li>
                                                <hr>
                                                <li>
                                                    <a class="nav-link dropdown-item {{ Request::is('profil-mhs*') ? 'text-success' : '' }}"
                                                        href="/profil-mhs/editpasswordmhs/">
                                                        Ubah Password
                                                    </a>
                                                </li>
                                            @endif
                                        @endif

                                        @if (Str::length(Auth::guard('web')->user()) > 0)
                                            @if (Auth::guard('web')->user())
                                                <li>
                                                    <a class="nav-link dropdown-item " href="">
                                                        <b>{{ Auth::guard('web')->user()->nama }}</b>
                                                    </a>
                                                </li>
                                                <hr>
                                                <li>
                                                    <a class="nav-link dropdown-item {{ Request::is('profil-staff*') ? 'text-success' : '' }}"
                                                        href="/profil-staff/editpasswordstaff/">
                                                        Ubah Password
                                                    </a>
                                                </li>
                                            @endif
                                        @endif

                                        <form action="/logout" method="POST">
                                            @csrf
                                            <li>
                                                <button type="submit" class="nav-link dropdown-item">
                                                    Keluar
                                                </button>
                                            </li>
                                        </form>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

        </div>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container">
                    <div>
                        <div class="anak-judul">
                            <h4>@yield('sub-title')</h4>
                            <hr>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container">
                    @yield('content')
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->

        @yield('footer')
        <!-- <div class="footer bg-dark">
        <div class="container">
          <p class="developer">Dikembangkan oleh Prodi Teknik Informatika UNRI</p>
        </div>
      </div> -->


        <!-- ./wrapper -->

        <!-- REQUIRED SCRIPTS -->


        <!-- jQuery -->
        <!--<script src="{{ asset('/assets/plugins/jquery/jquery.min.js') }}"></script>-->
        <!--<script src="{{ asset('/assets/dataTables/datatables.min.js') }}"></script>-->


        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>



        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.bootstrap4.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.colVis.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
        <script src="https://cdn.datatables.net/rowgroup/1.4.0/js/dataTables.rowGroup.min.js"></script>


        {{-- <script type="text/javascript">
$(document).ready(function() {
    var table = $('#datatables').DataTable( {
        "lengthMenu": [ 50, 100, 150, 200, 250 ],
        buttons: [ 'copy', 'excel','print', 'pdf' ],
        dom:
        "<'row'<'col-md-2'l><'col-md-5'B><'col-md-4'f>>" +
        "<'row'<'col-md-12'tr>>" +
        "<'row'<'col-md-5'i><'col-md-7'p>>"
        
    } );
 
    table.buttons().container()
        .appendTo( '#datatables_wrapper .col-md-5:eq(0)' );
} );
</script> --}}

        <script type="text/javascript">
            $(document).ready(function() {
                var table = $('#datatables').DataTable({
                    "lengthMenu": [50, 100, 150, 200, 250],
                    "language": {
                        "sProcessing": "Sedang memproses...",
                        "sLengthMenu": "Tampilkan _MENU_ entri",
                        "sZeroRecords": "Tidak ditemukan data yang sesuai",
                        "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                        "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                        "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                        "sInfoPostFix": "",
                        "sSearch": "Cari:",
                        "sUrl": "",
                        "oPaginate": {
                            "sFirst": "Pertama",
                            "sPrevious": "Sebelumnya",
                            "sNext": "Selanjutnya",
                            "sLast": "Terakhir"
                        }
                    },
                })
            });
        </script>

        <script type="text/javascript">
            $(document).ready(function() {
                var table = $('#datatables2').DataTable({
                    "lengthMenu": [50, 100, 150, 200, 250],
                    "language": {
                        "sProcessing": "Sedang memproses...",
                        "sLengthMenu": "Tampilkan _MENU_ entri",
                        "sZeroRecords": "Tidak ditemukan data yang sesuai",
                        "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                        "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                        "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                        "sInfoPostFix": "",
                        "sSearch": "Cari:",
                        "sUrl": "",
                        "oPaginate": {
                            "sFirst": "Pertama",
                            "sPrevious": "Sebelumnya",
                            "sNext": "Selanjutnya",
                            "sLast": "Terakhir"
                        }
                    }
                })
            });
        </script>

        <script type="text/javascript">
            $(document).ready(function() {
                var table = $('#datatables3').DataTable({
                    "lengthMenu": [50, 100, 150, 200, 250],
                    "language": {
                        "sProcessing": "Sedang memproses...",
                        "sLengthMenu": "Tampilkan _MENU_ entri",
                        "sZeroRecords": "Tidak ditemukan data yang sesuai",
                        "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                        "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                        "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                        "sInfoPostFix": "",
                        "sSearch": "Cari:",
                        "sUrl": "",
                        "oPaginate": {
                            "sFirst": "Pertama",
                            "sPrevious": "Sebelumnya",
                            "sNext": "Selanjutnya",
                            "sLast": "Terakhir"
                        }
                    }
                })
            });
        </script>

        <script type="text/javascript">
            $(document).ready(function() {
                var table = $('#datatables4').DataTable({
                    "lengthMenu": [50, 100, 150, 200, 250],
                    "language": {
                        "sProcessing": "Sedang memproses...",
                        "sLengthMenu": "Tampilkan _MENU_ entri",
                        "sZeroRecords": "Tidak ditemukan data yang sesuai",
                        "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                        "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                        "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                        "sInfoPostFix": "",
                        "sSearch": "Cari:",
                        "sUrl": "",
                        "oPaginate": {
                            "sFirst": "Pertama",
                            "sPrevious": "Sebelumnya",
                            "sNext": "Selanjutnya",
                            "sLast": "Terakhir"
                        }
                    }
                })
            });
        </script>

        <script type="text/javascript">
            $(document).ready(function() {
                var table = $('#datatables5').DataTable({
                    "lengthMenu": [50, 100, 150, 200, 250],
                    "language": {
                        "sProcessing": "Sedang memproses...",
                        "sLengthMenu": "Tampilkan _MENU_ entri",
                        "sZeroRecords": "Tidak ditemukan data yang sesuai",
                        "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                        "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                        "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                        "sInfoPostFix": "",
                        "sSearch": "Cari:",
                        "sUrl": "",
                        "oPaginate": {
                            "sFirst": "Pertama",
                            "sPrevious": "Sebelumnya",
                            "sNext": "Selanjutnya",
                            "sLast": "Terakhir"
                        }
                    }
                })
            });
        </script>

        {{-- Tabel view (statistik judul skripsi terdaftar) judul-skripsi-terdaftar.blade.php --}}
        <script type="text/javascript">
            $(document).ready(function() {
                // Inisialisasi DataTables
                var table = $('#datatablesjudulskripsiterdaftar').DataTable({
                    "lengthMenu": [50, 100, 150, 200, 250],
                    "language": {
                        "sProcessing": "Sedang memproses...",
                        "sLengthMenu": "Tampilkan _MENU_ entri",
                        "sZeroRecords": "Tidak ditemukan data yang sesuai",
                        "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                        "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                        "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                        "sInfoPostFix": "",
                        "sSearch": "Cari:",
                        "sUrl": "",
                        "oPaginate": {
                            "sFirst": "Pertama",
                            "sPrevious": "Sebelumnya",
                            "sNext": "Selanjutnya",
                            "sLast": "Terakhir"
                        }
                    }
                });

                // Filter Prodi
                $('#prodiFilterJudulSkripsiTerdaftar').on('change', function() {
                    var val = $(this).val();
                    if (val) {
                        table.column(2).search(val).draw();
                    } else {
                        table.column(2).search('').draw();
                    }
                });

                // Filter Prodi Mobile
                $('#prodiFilterMobileJudulSkripsiTerdaftar').on('change', function() {
                    var val = $(this).val();
                    if (val) {
                        table.column(2).search(val).draw();
                    } else {
                        table.column(2).search('').draw();
                    }
                });

                // Event handler untuk panjang menu
                $('#lengthMenuJudulSkripsiTerdaftar').on('change', function() {
                    var length = $(this).val();
                    table.page.len(length).draw();
                });

                // Event handler untuk panjang menu Mobile
                $('#lengthMenuMobileJudulSkripsiTerdaftar').on('change', function() {
                    var length = $(this).val();
                    table.page.len(length).draw();
                });

                // Filter Pencarian
                $('#searchFilterJudulSkripsiTerdaftar').on('keyup', function() {
                    var value = $(this).val().toLowerCase();
                    table.search(value).draw();
                });

                // Filter Pencarian Mobile
                $('#searchFilterMobileJudulSkripsiTerdaftar').on('keyup', function() {
                    var value = $(this).val().toLowerCase();
                    table.search(value).draw();
                });

                // Tambahkan filter jenis seminar, bulan, dan tahun di samping tombol Tampilkan
                $('#datatables2_length').after($('.filter'));

            });
        </script>

        {{-- Tabel view (jadwal seminar untuk mahasiswa) jadwal-mahasiswa.blade.php --}}
        <script type="text/javascript">
            $(document).ready(function() {
                // Inisialisasi DataTables
                var table = $('#datatablesjadwalseminaruntukmhs').DataTable({
                    "lengthMenu": [50, 100, 150, 200, 250],
                    "language": {
                        "sProcessing": "Sedang memproses...",
                        "sLengthMenu": "Tampilkan _MENU_ entri",
                        "sZeroRecords": "Tidak ditemukan data yang sesuai",
                        "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                        "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                        "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                        "sInfoPostFix": "",
                        "sSearch": "Cari:",
                        "sUrl": "",
                        "oPaginate": {
                            "sFirst": "Pertama",
                            "sPrevious": "Sebelumnya",
                            "sNext": "Selanjutnya",
                            "sLast": "Terakhir"
                        }
                    }
                });

                // Filter Jenis Seminar
                $('#seminarFilterJadwalSeminarUntukMahasiswa').on('change', function() {
                    var val = $(this).val();
                    if (val) {
                        table.column(2).search(val).draw();
                    } else {
                        table.column(2).search('').draw();
                    }
                });

                // Filter Jenis Seminar Mobile
                $('#seminarFilterMobileJadwalSeminarUntukMahasiswa').on('change', function() {
                    var val = $(this).val();
                    if (val) {
                        table.column(2).search(val).draw();
                    } else {
                        table.column(2).search('').draw();
                    }
                });

                // Event handler untuk panjang menu
                $('#lengthMenuJadwalSeminarUntukMahasiswa').on('change', function() {
                    var length = $(this).val();
                    table.page.len(length).draw();
                });

                // Event handler untuk panjang menu Mobile
                $('#lengthMenuMobileJadwalSeminarUntukMahasiswa').on('change', function() {
                    var length = $(this).val();
                    table.page.len(length).draw();
                });

                // Filter Pencarian
                $('#searchFilterJadwalSeminarUntukMahasiswa').on('keyup', function() {
                    var value = $(this).val().toLowerCase();
                    table.search(value).draw();
                });

                // Filter Pencarian Mobile
                $('#searchFilterMobileJadwalSeminarUntukMahasiswa').on('keyup', function() {
                    var value = $(this).val().toLowerCase();
                    table.search(value).draw();
                });

                // Tambahkan filter jenis seminar, bulan, dan tahun di samping tombol Tampilkan
                $('#datatables2_length').after($('.filter'));

            });
        </script>

        {{-- Tabel view (daftar hak akses admin jurusan) index.blade.php --}}
        <script type="text/javascript">
            $(document).ready(function() {
                // Inisialisasi DataTables
                var table = $('#datatablesdaftarhakaksesadmjurusan').DataTable({
                    "lengthMenu": [50, 100, 150, 200, 250],
                    "language": {
                        "sProcessing": "Sedang memproses...",
                        "sLengthMenu": "Tampilkan _MENU_ entri",
                        "sZeroRecords": "Tidak ditemukan data yang sesuai",
                        "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                        "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                        "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                        "sInfoPostFix": "",
                        "sSearch": "Cari:",
                        "sUrl": "",
                        "oPaginate": {
                            "sFirst": "Pertama",
                            "sPrevious": "Sebelumnya",
                            "sNext": "Selanjutnya",
                            "sLast": "Terakhir"
                        }
                    }
                });

                // Event handler untuk panjang menu
                $('#lengthMenuDaftarHakAksesAdminJurusan').on('change', function() {
                    var length = $(this).val();
                    table.page.len(length).draw();
                });

                // Event handler untuk panjang menu Mobile
                $('#lengthMenuMobileDaftarHakAksesAdminJurusan').on('change', function() {
                    var length = $(this).val();
                    table.page.len(length).draw();
                });

                // Filter Pencarian
                $('#searchFilterDaftarHakAksesAdminJurusan').on('keyup', function() {
                    var value = $(this).val().toLowerCase();
                    table.search(value).draw();
                });

                // Filter Pencarian Mobile
                $('#searchFilterMobileDaftarHakAksesAdminJurusan').on('keyup', function() {
                    var value = $(this).val().toLowerCase();
                    table.search(value).draw();
                });

                // Tambahkan filter jenis seminar, bulan, dan tahun di samping tombol Tampilkan
                $('#datatables2_length').after($('.filter'));

            });
        </script>

        {{-- Tabel view (daftar plp admin jurusan) index.blade.php --}}
        <script type="text/javascript">
            $(document).ready(function() {
                // Inisialisasi DataTables
                var table = $('#datatablesdaftarplpadmjurusan').DataTable({
                    "lengthMenu": [50, 100, 150, 200, 250],
                    "language": {
                        "sProcessing": "Sedang memproses...",
                        "sLengthMenu": "Tampilkan _MENU_ entri",
                        "sZeroRecords": "Tidak ditemukan data yang sesuai",
                        "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                        "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                        "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                        "sInfoPostFix": "",
                        "sSearch": "Cari:",
                        "sUrl": "",
                        "oPaginate": {
                            "sFirst": "Pertama",
                            "sPrevious": "Sebelumnya",
                            "sNext": "Selanjutnya",
                            "sLast": "Terakhir"
                        }
                    }
                });

                // Event handler untuk panjang menu
                $('#lengthMenuDaftarPLPAdminJurusan').on('change', function() {
                    var length = $(this).val();
                    table.page.len(length).draw();
                });

                // Event handler untuk panjang menu Mobile
                $('#lengthMenuMobileDaftarPLPAdminJurusan').on('change', function() {
                    var length = $(this).val();
                    table.page.len(length).draw();
                });

                // Filter Pencarian
                $('#searchFilterDaftarPLPAdminJurusan').on('keyup', function() {
                    var value = $(this).val().toLowerCase();
                    table.search(value).draw();
                });

                // Filter Pencarian Mobile
                $('#searchFilterMobileDaftarPLPAdminJurusan').on('keyup', function() {
                    var value = $(this).val().toLowerCase();
                    table.search(value).draw();
                });

                // Tambahkan filter jenis seminar, bulan, dan tahun di samping tombol Tampilkan
                $('#datatables2_length').after($('.filter'));

            });
        </script>

        {{-- Tabel view (daftar tendik admin jurusan) index.blade.php --}}
        <script type="text/javascript">
            $(document).ready(function() {
                // Inisialisasi DataTables
                var table = $('#datatablesdaftartendikadmjurusan').DataTable({
                    "lengthMenu": [50, 100, 150, 200, 250],
                    "language": {
                        "sProcessing": "Sedang memproses...",
                        "sLengthMenu": "Tampilkan _MENU_ entri",
                        "sZeroRecords": "Tidak ditemukan data yang sesuai",
                        "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                        "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                        "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                        "sInfoPostFix": "",
                        "sSearch": "Cari:",
                        "sUrl": "",
                        "oPaginate": {
                            "sFirst": "Pertama",
                            "sPrevious": "Sebelumnya",
                            "sNext": "Selanjutnya",
                            "sLast": "Terakhir"
                        }
                    }
                });

                // Filter Role Akses
                $('#roleFilterDaftarTendikAdminJurusan').on('change', function() {
                    var val = $(this).val();
                    if (val) {
                        table.column(4).search(val).draw();
                    } else {
                        table.column(4).search('').draw();
                    }
                });

                // Filter Role Akses Mobile
                $('#roleFilterMobileDaftarTendikAdminJurusan').on('change', function() {
                    var val = $(this).val();
                    if (val) {
                        table.column(4).search(val).draw();
                    } else {
                        table.column(4).search('').draw();
                    }
                });

                // Event handler untuk panjang menu
                $('#lengthMenuDaftarTendikAdminJurusan').on('change', function() {
                    var length = $(this).val();
                    table.page.len(length).draw();
                });

                // Event handler untuk panjang menu Mobile
                $('#lengthMenuMobileDaftarTendikAdminJurusan').on('change', function() {
                    var length = $(this).val();
                    table.page.len(length).draw();
                });

                // Filter Pencarian
                $('#searchFilterDaftarTendikAdminJurusan').on('keyup', function() {
                    var value = $(this).val().toLowerCase();
                    table.search(value).draw();
                });

                // Filter Pencarian Mobile
                $('#searchFilterMobileDaftarTendikAdminJurusan').on('keyup', function() {
                    var value = $(this).val().toLowerCase();
                    table.search(value).draw();
                });

                // Tambahkan filter jenis seminar, bulan, dan tahun di samping tombol Tampilkan
                $('#datatables2_length').after($('.filter'));

            });
        </script>

        {{-- Tabel view (daftar dosen admin jurusan) index.blade.php --}}
        <script type="text/javascript">
            $(document).ready(function() {
                // Inisialisasi DataTables
                var table = $('#datatablesdaftardosenadmjurusan').DataTable({
                    "lengthMenu": [50, 100, 150, 200, 250],
                    "language": {
                        "sProcessing": "Sedang memproses...",
                        "sLengthMenu": "Tampilkan _MENU_ entri",
                        "sZeroRecords": "Tidak ditemukan data yang sesuai",
                        "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                        "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                        "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                        "sInfoPostFix": "",
                        "sSearch": "Cari:",
                        "sUrl": "",
                        "oPaginate": {
                            "sFirst": "Pertama",
                            "sPrevious": "Sebelumnya",
                            "sNext": "Selanjutnya",
                            "sLast": "Terakhir"
                        }
                    }
                });

                // Filter Role Akses
                $('#roleFilterDaftarDosenAdminJurusan').on('change', function() {
                    var val = $(this).val();
                    if (val) {
                        table.column(4).search(val).draw();
                    } else {
                        table.column(4).search('').draw();
                    }
                });

                // Filter Role Akses Mobile
                $('#roleFilterMobileDaftarDosenAdminJurusan').on('change', function() {
                    var val = $(this).val();
                    if (val) {
                        table.column(4).search(val).draw();
                    } else {
                        table.column(4).search('').draw();
                    }
                });

                // Event handler untuk panjang menu
                $('#lengthMenuDaftarDosenAdminJurusan').on('change', function() {
                    var length = $(this).val();
                    table.page.len(length).draw();
                });

                // Event handler untuk panjang menu Mobile
                $('#lengthMenuMobileDaftarDosenAdminJurusan').on('change', function() {
                    var length = $(this).val();
                    table.page.len(length).draw();
                });

                // Filter Pencarian
                $('#searchFilterDaftarDosenAdminJurusan').on('keyup', function() {
                    var value = $(this).val().toLowerCase();
                    table.search(value).draw();
                });

                // Filter Pencarian Mobile
                $('#searchFilterMobileDaftarDosenAdminJurusan').on('keyup', function() {
                    var value = $(this).val().toLowerCase();
                    table.search(value).draw();
                });

                // Tambahkan filter jenis seminar, bulan, dan tahun di samping tombol Tampilkan
                $('#datatables2_length').after($('.filter'));

            });
        </script>

        {{-- Tabel view (daftar konsentrasi admin jurusan) index.blade.php --}}
        <script type="text/javascript">
            $(document).ready(function() {
                // Inisialisasi DataTables
                var table = $('#datatablesdaftarkonsentrasiadmjurusan').DataTable({
                    "lengthMenu": [50, 100, 150, 200, 250],
                    "language": {
                        "sProcessing": "Sedang memproses...",
                        "sLengthMenu": "Tampilkan _MENU_ entri",
                        "sZeroRecords": "Tidak ditemukan data yang sesuai",
                        "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                        "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                        "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                        "sInfoPostFix": "",
                        "sSearch": "Cari:",
                        "sUrl": "",
                        "oPaginate": {
                            "sFirst": "Pertama",
                            "sPrevious": "Sebelumnya",
                            "sNext": "Selanjutnya",
                            "sLast": "Terakhir"
                        }
                    }
                });

                // Event handler untuk panjang menu
                $('#lengthMenuDaftarKonsentrasiAdminJurusan').on('change', function() {
                    var length = $(this).val();
                    table.page.len(length).draw();
                });

                // Event handler untuk panjang menu Mobile
                $('#lengthMenuMobileDaftarKonsentrasiAdminJurusan').on('change', function() {
                    var length = $(this).val();
                    table.page.len(length).draw();
                });

                // Filter Pencarian
                $('#searchFilterDaftarKonsentrasiAdminJurusan').on('keyup', function() {
                    var value = $(this).val().toLowerCase();
                    table.search(value).draw();
                });

                // Filter Pencarian Mobile
                $('#searchFilterMobileDaftarKonsentrasiAdminJurusan').on('keyup', function() {
                    var value = $(this).val().toLowerCase();
                    table.search(value).draw();
                });

                // Tambahkan filter jenis seminar, bulan, dan tahun di samping tombol Tampilkan
                $('#datatables2_length').after($('.filter'));

            });
        </script>

        {{-- Tabel view (daftar program studi admin jurusan) index.blade.php --}}
        <script type="text/javascript">
            $(document).ready(function() {
                // Inisialisasi DataTables
                var table = $('#datatablesdaftarprodiadmjurusan').DataTable({
                    "lengthMenu": [50, 100, 150, 200, 250],
                    "language": {
                        "sProcessing": "Sedang memproses...",
                        "sLengthMenu": "Tampilkan _MENU_ entri",
                        "sZeroRecords": "Tidak ditemukan data yang sesuai",
                        "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                        "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                        "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                        "sInfoPostFix": "",
                        "sSearch": "Cari:",
                        "sUrl": "",
                        "oPaginate": {
                            "sFirst": "Pertama",
                            "sPrevious": "Sebelumnya",
                            "sNext": "Selanjutnya",
                            "sLast": "Terakhir"
                        }
                    }
                });

                // Event handler untuk panjang menu
                $('#lengthMenuDaftarProgramStudiAdminJurusan').on('change', function() {
                    var length = $(this).val();
                    table.page.len(length).draw();
                });

                // Event handler untuk panjang menu Mobile
                $('#lengthMenuMobileDaftarProgramStudiAdminJurusan').on('change', function() {
                    var length = $(this).val();
                    table.page.len(length).draw();
                });

                // Filter Pencarian
                $('#searchFilterDaftarProgramStudiAdminJurusan').on('keyup', function() {
                    var value = $(this).val().toLowerCase();
                    table.search(value).draw();
                });

                // Filter Pencarian Mobile
                $('#searchFilterMobileDaftarProgramStudiAdminJurusan').on('keyup', function() {
                    var value = $(this).val().toLowerCase();
                    table.search(value).draw();
                });

                // Tambahkan filter jenis seminar, bulan, dan tahun di samping tombol Tampilkan
                $('#datatables2_length').after($('.filter'));

            });
        </script>

        {{-- Tabel view (daftar mahasiswa admin prodi) index.blade.php --}}
        <script type="text/javascript">
            $(document).ready(function() {
                // Inisialisasi DataTables
                var table = $('#datatablesdaftarmhsadmprodi').DataTable({
                    "lengthMenu": [50, 100, 150, 200, 250],
                    "language": {
                        "sProcessing": "Sedang memproses...",
                        "sLengthMenu": "Tampilkan _MENU_ entri",
                        "sZeroRecords": "Tidak ditemukan data yang sesuai",
                        "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                        "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                        "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                        "sInfoPostFix": "",
                        "sSearch": "Cari:",
                        "sUrl": "",
                        "oPaginate": {
                            "sFirst": "Pertama",
                            "sPrevious": "Sebelumnya",
                            "sNext": "Selanjutnya",
                            "sLast": "Terakhir"
                        }
                    }
                });

                // Filter Angkatan
                $('#angkatanFilterDaftarMahasiswaAdminProdi').on('change', function() {
                    var val = $(this).val();
                    if (val) {
                        table.column(3).search(val).draw();
                    } else {
                        table.column(3).search('').draw();
                    }
                });

                // Filter Angkatan Mobile
                $('#angkatanFilterMobileDaftarMahasiswaAdminProdi').on('change', function() {
                    var val = $(this).val();
                    if (val) {
                        table.column(3).search(val).draw();
                    } else {
                        table.column(3).search('').draw();
                    }
                });

                // Event handler untuk panjang menu
                $('#lengthMenuDaftarMahasiswaAdminProdi').on('change', function() {
                    var length = $(this).val();
                    table.page.len(length).draw();
                });

                // Event handler untuk panjang menu Mobile
                $('#lengthMenuMobileDaftarMahasiswaAdminProdi').on('change', function() {
                    var length = $(this).val();
                    table.page.len(length).draw();
                });

                // Filter Pencarian
                $('#searchFilterDaftarMahasiswaAdminProdi').on('keyup', function() {
                    var value = $(this).val().toLowerCase();
                    table.search(value).draw();
                });

                // Filter Pencarian Mobile
                $('#searchFilterMobileDaftarMahasiswaAdminProdi').on('keyup', function() {
                    var value = $(this).val().toLowerCase();
                    table.search(value).draw();
                });

                // Tambahkan filter jenis seminar, bulan, dan tahun di samping tombol Tampilkan
                $('#datatables2_length').after($('.filter'));

            });
        </script>

        {{-- Tabel view (persetujuan kp skripsi admin) persetujuan.blade.php --}}
        <script type="text/javascript">
            $(document).ready(function() {
                // Inisialisasi DataTables
                var table = $('#datatablespersetujuankpskripsiadmin').DataTable({
                    "lengthMenu": [50, 100, 150, 200, 250],
                    "language": {
                        "sProcessing": "Sedang memproses...",
                        "sLengthMenu": "Tampilkan _MENU_ entri",
                        "sZeroRecords": "Tidak ditemukan data yang sesuai",
                        "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                        "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                        "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                        "sInfoPostFix": "",
                        "sSearch": "Cari:",
                        "sUrl": "",
                        "oPaginate": {
                            "sFirst": "Pertama",
                            "sPrevious": "Sebelumnya",
                            "sNext": "Selanjutnya",
                            "sLast": "Terakhir"
                        }
                    }
                });

                // Event listener untuk perubahan pada filter status
                $('#statusFilterPersetujuanKpSkripsiAdmin').on('change', function() {
                    var status = $(this).val();
                    // Lakukan filtering berdasarkan status yang dipilih
                    filterByStatusPersetujuanKpSkripsiAdmin(status);
                });

                function filterByStatusPersetujuanKpSkripsiAdmin(status) {
                    // Lakukan filtering menggunakan DataTables
                    table.column(2).search(status ? '^' + status + '$' : '', true, false).draw();
                }

                // Event listener untuk perubahan pada filter status Mobile
                $('#statusFilterMobilePersetujuanKpSkripsiAdmin').on('change', function() {
                    var status = $(this).val();
                    // Lakukan filtering berdasarkan status yang dipilih Mobile
                    filterByStatusMobilePersetujuanKpSkripsiAdmin(status);
                });

                function filterByStatusMobilePersetujuanKpSkripsiAdmin(status) {
                    // Lakukan filtering menggunakan DataTables Mobile
                    table.column(2).search(status ? '^' + status + '$' : '', true, false).draw();
                }

                // Event handler untuk panjang menu
                $('#lengthMenuPersetujuanKpSkripsiAdmin').on('change', function() {
                    var length = $(this).val();
                    table.page.len(length).draw();
                });

                // Event handler untuk panjang menu Mobile
                $('#lengthMenuMobilePersetujuanKpSkripsiAdmin').on('change', function() {
                    var length = $(this).val();
                    table.page.len(length).draw();
                });

                // Filter Pencarian
                $('#searchFilterPersetujuanKpSkripsiAdmin').on('keyup', function() {
                    var value = $(this).val().toLowerCase();
                    table.search(value).draw();
                });

                // Filter Pencarian Mobile
                $('#searchFilterMobilePersetujuanKpSkripsiAdmin').on('keyup', function() {
                    var value = $(this).val().toLowerCase();
                    table.search(value).draw();
                });

                // Tambahkan filter jenis seminar, bulan, dan tahun di samping tombol Tampilkan
                $('#datatables2_length').after($('.filter'));

            });
        </script>

        {{-- Tabel view (jadwal seminar admin prodi) index.blade.php --}}
        <script type="text/javascript">
            $(document).ready(function() {
                // Inisialisasi DataTables
                var table = $('#datatablesjadwalseminaradminprodi').DataTable({
                    "lengthMenu": [50, 100, 150, 200, 250],
                    "language": {
                        "sProcessing": "Sedang memproses...",
                        "sLengthMenu": "Tampilkan _MENU_ entri",
                        "sZeroRecords": "Tidak ditemukan data yang sesuai",
                        "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                        "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                        "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                        "sInfoPostFix": "",
                        "sSearch": "Cari:",
                        "sUrl": "",
                        "oPaginate": {
                            "sFirst": "Pertama",
                            "sPrevious": "Sebelumnya",
                            "sNext": "Selanjutnya",
                            "sLast": "Terakhir"
                        }
                    }
                });

                // Filter Jenis Seminar
                $('#seminarFilterJadwalSeminarAdminProdi').on('change', function() {
                    var val = $(this).val();
                    if (val) {
                        table.column(2).search(val).draw();
                    } else {
                        table.column(2).search('').draw();
                    }
                });

                // Filter Jenis Seminar Mobile
                $('#seminarFilterMobileJadwalSeminarAdminProdi').on('change', function() {
                    var val = $(this).val();
                    if (val) {
                        table.column(2).search(val).draw();
                    } else {
                        table.column(2).search('').draw();
                    }
                });

                // Filter Prodi
                $('#prodiFilterJadwalSeminarAdminProdi').on('change', function() {
                    var val = $(this).val();
                    if (val) {
                        table.column(3).search(val).draw();
                    } else {
                        table.column(3).search('').draw();
                    }
                });

                // Filter Prodi Mobile
                $('#prodiFilterMobileJadwalSeminarAdminProdi').on('change', function() {
                    var val = $(this).val();
                    if (val) {
                        table.column(3).search(val).draw();
                    } else {
                        table.column(3).search('').draw();
                    }
                });

                // Event handler untuk panjang menu
                $('#lengthMenuJadwalSeminarAdminProdi').on('change', function() {
                    var length = $(this).val();
                    table.page.len(length).draw();
                });

                // Event handler untuk panjang menu Mobile
                $('#lengthMenuMobileJadwalSeminarAdminProdi').on('change', function() {
                    var length = $(this).val();
                    table.page.len(length).draw();
                });

                // Filter Pencarian
                $('#searchFilterJadwalSeminarAdminProdi').on('keyup', function() {
                    var value = $(this).val().toLowerCase();
                    table.search(value).draw();
                });

                // Filter Pencarian Mobile
                $('#searchFilterMobileJadwalSeminarAdminProdi').on('keyup', function() {
                    var value = $(this).val().toLowerCase();
                    table.search(value).draw();
                });

                // Tambahkan filter jenis seminar, bulan, dan tahun di samping tombol Tampilkan
                $('#datatables2_length').after($('.filter'));

            });
        </script>

        {{-- Tabel view (data kp mahasiswa admin) kerja-praktek.blade.php --}}
        <script type="text/javascript">
            $(document).ready(function() {
                var table = $('#datatablesdatakpmhsadmin').DataTable({
                    "lengthMenu": [50, 100, 150, 200, 250],
                    "language": {
                        "sProcessing": "Sedang memproses...",
                        "sLengthMenu": "Tampilkan _MENU_ entri",
                        "sZeroRecords": "Tidak ditemukan data yang sesuai",
                        "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                        "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                        "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                        "sInfoPostFix": "",
                        "sSearch": "Cari:",
                        "sUrl": "",
                        "oPaginate": {
                            "sFirst": "Pertama",
                            "sPrevious": "Sebelumnya",
                            "sNext": "Selanjutnya",
                            "sLast": "Terakhir"
                        }
                    }
                });

                // Event listener untuk perubahan pada filter status
                $('#statusFilterDataKPMahasiswaAdmin').on('change', function() {
                    var status = $(this).val();
                    // Lakukan filtering berdasarkan status yang dipilih
                    filterByStatus(status);
                });

                function filterByStatus(status) {
                    // Lakukan filtering menggunakan DataTables
                    table.column(2).search(status ? '^' + status + '$' : '', true, false).draw();
                }

                // Event listener untuk perubahan pada filter status Mobile
                $('#statusFilterMobileDataKPMahasiswaAdmin').on('change', function() {
                    var status = $(this).val();
                    // Lakukan filtering berdasarkan status yang dipilih Mobile
                    filterByStatusMobileDataKPMahasiswaAdmin(status);
                });

                function filterByStatusMobileDataKPMahasiswaAdmin(status) {
                    // Lakukan filtering menggunakan DataTables Mobile
                    table.column(2).search(status ? '^' + status + '$' : '', true, false).draw();
                }

                // Event handler untuk panjang menu
                $('#lengthMenuDataKPMahasiswaAdmin').on('change', function() {
                    var length = $(this).val();
                    table.page.len(length).draw();
                });

                // Event handler untuk panjang menu Mobile
                $('#lengthMenuMobileDataKPMahasiswaAdmin').on('change', function() {
                    var length = $(this).val();
                    table.page.len(length).draw();
                });

                // Filter Pencarian
                $('#searchFilterDataKPMahasiswaAdmin').on('keyup', function() {
                    var value = $(this).val().toLowerCase();
                    table.search(value).draw();
                });

                // Filter Pencarian Mobile
                $('#searchFilterMobileDataKPMahasiswaAdmin').on('keyup', function() {
                    var value = $(this).val().toLowerCase();
                    table.search(value).draw();
                });

                // Tambahkan filter jenis seminar, bulan, dan tahun di samping tombol Tampilkan
                $('#datatables2_length').after($('.filter'));
            });
        </script>

        {{-- Tabel view (data skripsi mahasiswa admin) skripsi.blade.php --}}
        <script type="text/javascript">
            $(document).ready(function() {
                var table = $('#datatablesdataskripsimhsadmin').DataTable({
                    "lengthMenu": [50, 100, 150, 200, 250],
                    "language": {
                        "sProcessing": "Sedang memproses...",
                        "sLengthMenu": "Tampilkan _MENU_ entri",
                        "sZeroRecords": "Tidak ditemukan data yang sesuai",
                        "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                        "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                        "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                        "sInfoPostFix": "",
                        "sSearch": "Cari:",
                        "sUrl": "",
                        "oPaginate": {
                            "sFirst": "Pertama",
                            "sPrevious": "Sebelumnya",
                            "sNext": "Selanjutnya",
                            "sLast": "Terakhir"
                        }
                    }
                });

                // Event listener untuk perubahan pada filter status
                $('#statusFilterDataSkripsiMahasiswaAdmin').on('change', function() {
                    var status = $(this).val();
                    // Lakukan filtering berdasarkan status yang dipilih
                    filterByStatus(status);
                });

                function filterByStatus(status) {
                    // Lakukan filtering menggunakan DataTables
                    table.column(2).search(status ? '^' + status + '$' : '', true, false).draw();
                }

                // Event listener untuk perubahan pada filter status Mobile
                $('#statusFilterMobileDataSkripsiMahasiswaAdmin').on('change', function() {
                    var status = $(this).val();
                    // Lakukan filtering berdasarkan status yang dipilih Mobile
                    filterByStatusMobileDataSkripsiMahasiswaAdmin(status);
                });

                function filterByStatusMobileDataSkripsiMahasiswaAdmin(status) {
                    // Lakukan filtering menggunakan DataTables Mobile
                    table.column(2).search(status ? '^' + status + '$' : '', true, false).draw();
                }

                // Event handler untuk panjang menu
                $('#lengthMenuDataSkripsiMahasiswaAdmin').on('change', function() {
                    var length = $(this).val();
                    table.page.len(length).draw();
                });

                // Event handler untuk panjang menu Mobile
                $('#lengthMenuMobileDataSkripsiMahasiswaAdmin').on('change', function() {
                    var length = $(this).val();
                    table.page.len(length).draw();
                });

                // Filter Pencarian
                $('#searchFilterDataSkripsiMahasiswaAdmin').on('keyup', function() {
                    var value = $(this).val().toLowerCase();
                    table.search(value).draw();
                });

                // Filter Pencarian Mobile
                $('#searchFilterMobileDataSkripsiMahasiswaAdmin').on('keyup', function() {
                    var value = $(this).val().toLowerCase();
                    table.search(value).draw();
                });

                // Tambahkan filter jenis seminar, bulan, dan tahun di samping tombol Tampilkan
                $('#datatables2_length').after($('.filter'));
            });
        </script>

        {{-- Tabel view (daftar beban bimbingan kp) bimbingan-kp.blade.php --}}
        <script type="text/javascript">
            $(document).ready(function() {
                // Inisialisasi DataTables
                var table = $('#datatablesdaftarbebanbimbingankp').DataTable({
                    "lengthMenu": [50, 100, 150, 200, 250],
                    "language": {
                        "sProcessing": "Sedang memproses...",
                        "sLengthMenu": "Tampilkan _MENU_ entri",
                        "sZeroRecords": "Tidak ditemukan data yang sesuai",
                        "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                        "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                        "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                        "sInfoPostFix": "",
                        "sSearch": "Cari:",
                        "sUrl": "",
                        "oPaginate": {
                            "sFirst": "Pertama",
                            "sPrevious": "Sebelumnya",
                            "sNext": "Selanjutnya",
                            "sLast": "Terakhir"
                        }
                    }
                });

                // Event handler untuk panjang menu
                $('#lengthMenuDaftarBebanBimbinganKP').on('change', function() {
                    var length = $(this).val();
                    table.page.len(length).draw();
                });

                // Event handler untuk panjang menu Mobile
                $('#lengthMenuMobileDaftarBebanBimbinganKP').on('change', function() {
                    var length = $(this).val();
                    table.page.len(length).draw();
                });

                // Filter Pencarian
                $('#searchFilterDaftarBebanBimbinganKP').on('keyup', function() {
                    var value = $(this).val().toLowerCase();
                    table.search(value).draw();
                });

                // Filter Pencarian Mobile
                $('#searchFilterMobileDaftarBebanBimbinganKP').on('keyup', function() {
                    var value = $(this).val().toLowerCase();
                    table.search(value).draw();
                });

                // Tambahkan filter jenis seminar, bulan, dan tahun di samping tombol Tampilkan
                $('#datatables2_length').after($('.filter'));

            });
        </script>

        {{-- Tabel view (daftar selesai bimbingan kp) bimbingan-kp.blade.php --}}
        <script type="text/javascript">
            $(document).ready(function() {
                // Inisialisasi DataTables
                var table = $('#datatablesdaftarselesaibimbingankp').DataTable({
                    "lengthMenu": [50, 100, 150, 200, 250],
                    "language": {
                        "sProcessing": "Sedang memproses...",
                        "sLengthMenu": "Tampilkan _MENU_ entri",
                        "sZeroRecords": "Tidak ditemukan data yang sesuai",
                        "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                        "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                        "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                        "sInfoPostFix": "",
                        "sSearch": "Cari:",
                        "sUrl": "",
                        "oPaginate": {
                            "sFirst": "Pertama",
                            "sPrevious": "Sebelumnya",
                            "sNext": "Selanjutnya",
                            "sLast": "Terakhir"
                        }
                    }
                });

                // Event handler untuk panjang menu
                $('#lengthMenuDaftarSelesaiBimbinganKP').on('change', function() {
                    var length = $(this).val();
                    table.page.len(length).draw();
                });

                // Event handler untuk panjang menu Mobile
                $('#lengthMenuMobileDaftarSelesaiBimbinganKP').on('change', function() {
                    var length = $(this).val();
                    table.page.len(length).draw();
                });

                // Filter Pencarian
                $('#searchFilterDaftarSelesaiBimbinganKP').on('keyup', function() {
                    var value = $(this).val().toLowerCase();
                    table.search(value).draw();
                });

                // Filter Pencarian Mobile
                $('#searchFilterMobileDaftarSelesaiBimbinganKP').on('keyup', function() {
                    var value = $(this).val().toLowerCase();
                    table.search(value).draw();
                });

                // Tambahkan filter jenis seminar, bulan, dan tahun di samping tombol Tampilkan
                $('#datatables2_length').after($('.filter'));

            });
        </script>

        {{-- Tabel view (daftar beban bimbingan skripsi) bimbingan-skripsi.blade.php --}}
        <script type="text/javascript">
            $(document).ready(function() {
                // Inisialisasi DataTables
                var table = $('#datatablesdaftarbebanbimbinganskripsi').DataTable({
                    "lengthMenu": [50, 100, 150, 200, 250],
                    "language": {
                        "sProcessing": "Sedang memproses...",
                        "sLengthMenu": "Tampilkan _MENU_ entri",
                        "sZeroRecords": "Tidak ditemukan data yang sesuai",
                        "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                        "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                        "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                        "sInfoPostFix": "",
                        "sSearch": "Cari:",
                        "sUrl": "",
                        "oPaginate": {
                            "sFirst": "Pertama",
                            "sPrevious": "Sebelumnya",
                            "sNext": "Selanjutnya",
                            "sLast": "Terakhir"
                        }
                    }
                });

                // Event handler untuk panjang menu
                $('#lengthMenuDaftarBebanBimbinganSkripsi').on('change', function() {
                    var length = $(this).val();
                    table.page.len(length).draw();
                });

                // Event handler untuk panjang menu Mobile
                $('#lengthMenuMobileDaftarBebanBimbinganSkripsi').on('change', function() {
                    var length = $(this).val();
                    table.page.len(length).draw();
                });

                // Filter Pencarian
                $('#searchFilterDaftarBebanBimbinganSkripsi').on('keyup', function() {
                    var value = $(this).val().toLowerCase();
                    table.search(value).draw();
                });

                // Filter Pencarian Mobile
                $('#searchFilterMobileDaftarBebanBimbinganSkripsi').on('keyup', function() {
                    var value = $(this).val().toLowerCase();
                    table.search(value).draw();
                });

                // Tambahkan filter jenis seminar, bulan, dan tahun di samping tombol Tampilkan
                $('#datatables2_length').after($('.filter'));

            });
        </script>

        {{-- Tabel view (daftar lulus bimbingan skripsi) bimbingan-skripsi.blade.php --}}
        <script type="text/javascript">
            $(document).ready(function() {
                // Inisialisasi DataTables
                var table = $('#datatablesdaftarlulusbimbinganskripsi').DataTable({
                    "lengthMenu": [50, 100, 150, 200, 250],
                    "language": {
                        "sProcessing": "Sedang memproses...",
                        "sLengthMenu": "Tampilkan _MENU_ entri",
                        "sZeroRecords": "Tidak ditemukan data yang sesuai",
                        "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                        "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                        "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                        "sInfoPostFix": "",
                        "sSearch": "Cari:",
                        "sUrl": "",
                        "oPaginate": {
                            "sFirst": "Pertama",
                            "sPrevious": "Sebelumnya",
                            "sNext": "Selanjutnya",
                            "sLast": "Terakhir"
                        }
                    }
                });

                // Event handler untuk panjang menu
                $('#lengthMenuDaftarLulusBimbinganSkripsi').on('change', function() {
                    var length = $(this).val();
                    table.page.len(length).draw();
                });

                // Event handler untuk panjang menu Mobile
                $('#lengthMenuMobileDaftarLulusBimbinganSkripsi').on('change', function() {
                    var length = $(this).val();
                    table.page.len(length).draw();
                });

                // Filter Pencarian
                $('#searchFilterDaftarLulusBimbinganSkripsi').on('keyup', function() {
                    var value = $(this).val().toLowerCase();
                    table.search(value).draw();
                });

                // Filter Pencarian Mobile
                $('#searchFilterMobileDaftarLulusBimbinganSkripsi').on('keyup', function() {
                    var value = $(this).val().toLowerCase();
                    table.search(value).draw();
                });

                // Tambahkan filter jenis seminar, bulan, dan tahun di samping tombol Tampilkan
                $('#datatables2_length').after($('.filter'));

            });
        </script>

        {{-- Tabel view (jadwal seminar prodi) index.blade.php --}}
        <script type="text/javascript">
            $(document).ready(function() {
                // Inisialisasi DataTables
                var table = $('#datatablesjadwalseminarprodi').DataTable({
                    "lengthMenu": [50, 100, 150, 200, 250],
                    "language": {
                        "sProcessing": "Sedang memproses...",
                        "sLengthMenu": "Tampilkan _MENU_ entri",
                        "sZeroRecords": "Tidak ditemukan data yang sesuai",
                        "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                        "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                        "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                        "sInfoPostFix": "",
                        "sSearch": "Cari:",
                        "sUrl": "",
                        "oPaginate": {
                            "sFirst": "Pertama",
                            "sPrevious": "Sebelumnya",
                            "sNext": "Selanjutnya",
                            "sLast": "Terakhir"
                        }
                    }
                });

                // Filter Jenis Seminar
                $('#seminarFilterJadwalSeminarProdi').on('change', function() {
                    var val = $(this).val();
                    if (val) {
                        table.column(2).search(val).draw();
                    } else {
                        table.column(2).search('').draw();
                    }
                });

                // Filter Jenis Seminar Mobile
                $('#seminarFilterMobileJadwalSeminarProdi').on('change', function() {
                    var val = $(this).val();
                    if (val) {
                        table.column(2).search(val).draw();
                    } else {
                        table.column(2).search('').draw();
                    }
                });

                // Filter Prodi
                $('#prodiFilterJadwalSeminarProdi').on('change', function() {
                    var val = $(this).val();
                    if (val) {
                        table.column(3).search(val).draw();
                    } else {
                        table.column(3).search('').draw();
                    }
                });

                // Filter Prodi Mobile
                $('#prodiFilterMobileJadwalSeminarProdi').on('change', function() {
                    var val = $(this).val();
                    if (val) {
                        table.column(3).search(val).draw();
                    } else {
                        table.column(3).search('').draw();
                    }
                });

                // Event handler untuk panjang menu
                $('#lengthMenuJadwalSeminarProdi').on('change', function() {
                    var length = $(this).val();
                    table.page.len(length).draw();
                });

                // Event handler untuk panjang menu Mobile
                $('#lengthMenuMobileJadwalSeminarProdi').on('change', function() {
                    var length = $(this).val();
                    table.page.len(length).draw();
                });

                // Filter Pencarian
                $('#searchFilterJadwalSeminarProdi').on('keyup', function() {
                    var value = $(this).val().toLowerCase();
                    table.search(value).draw();
                });

                // Filter Pencarian Mobile
                $('#searchFilterMobileJadwalSeminarProdi').on('keyup', function() {
                    var value = $(this).val().toLowerCase();
                    table.search(value).draw();
                });

                // Tambahkan filter jenis seminar, bulan, dan tahun di samping tombol Tampilkan
                $('#datatables2_length').after($('.filter'));

            });
        </script>

        {{-- Tabel view (data kp prodi) indexkp.blade.php --}}
        <script type="text/javascript">
            $(document).ready(function() {
                var table = $('#datatablesdatakpprodi').DataTable({
                    "lengthMenu": [50, 100, 150, 200, 250],
                    "language": {
                        "sProcessing": "Sedang memproses...",
                        "sLengthMenu": "Tampilkan _MENU_ entri",
                        "sZeroRecords": "Tidak ditemukan data yang sesuai",
                        "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                        "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                        "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                        "sInfoPostFix": "",
                        "sSearch": "Cari:",
                        "sUrl": "",
                        "oPaginate": {
                            "sFirst": "Pertama",
                            "sPrevious": "Sebelumnya",
                            "sNext": "Selanjutnya",
                            "sLast": "Terakhir"
                        }
                    }
                });

                // Event listener untuk perubahan pada filter status
                $('#statusFilterDataKPProdi').on('change', function() {
                    var status = $(this).val();
                    // Lakukan filtering berdasarkan status yang dipilih
                    filterByStatusDataKPProdi(status);
                });

                function filterByStatusDataKPProdi(status) {
                    // Lakukan filtering menggunakan DataTables
                    table.column(2).search(status ? '^' + status + '$' : '', true, false).draw();
                }

                // Event listener untuk perubahan pada filter status Mobile
                $('#statusFilterMobileDataKPProdi').on('change', function() {
                    var status = $(this).val();
                    // Lakukan filtering berdasarkan status yang dipilih Mobile
                    filterByStatusMobileDataKPProdi(status);
                });

                function filterByStatusMobileDataKPProdi(status) {
                    // Lakukan filtering menggunakan DataTables Mobile
                    table.column(2).search(status ? '^' + status + '$' : '', true, false).draw();
                }

                // Event handler untuk panjang menu
                $('#lengthMenuDataKPProdi').on('change', function() {
                    var length = $(this).val();
                    table.page.len(length).draw();
                });

                // Event handler untuk panjang menu Mobile
                $('#lengthMenuMobileDataKPProdi').on('change', function() {
                    var length = $(this).val();
                    table.page.len(length).draw();
                });

                // Filter Pencarian
                $('#searchFilterDataKPProdi').on('keyup', function() {
                    var value = $(this).val().toLowerCase();
                    table.search(value).draw();
                });

                // Filter Pencarian Mobile
                $('#searchFilterMobileDataKPProdi').on('keyup', function() {
                    var value = $(this).val().toLowerCase();
                    table.search(value).draw();
                });

                // Tambahkan filter jenis seminar, bulan, dan tahun di samping tombol Tampilkan
                $('#datatables2_length').after($('.filter'));
            });
        </script>

        {{-- Tabel view (data skripsi prodi) indexskripsi.blade.php --}}
        <script type="text/javascript">
            $(document).ready(function() {
                var table = $('#datatablesdataskripsiprodi').DataTable({
                    "lengthMenu": [50, 100, 150, 200, 250],
                    "language": {
                        "sProcessing": "Sedang memproses...",
                        "sLengthMenu": "Tampilkan _MENU_ entri",
                        "sZeroRecords": "Tidak ditemukan data yang sesuai",
                        "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                        "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                        "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                        "sInfoPostFix": "",
                        "sSearch": "Cari:",
                        "sUrl": "",
                        "oPaginate": {
                            "sFirst": "Pertama",
                            "sPrevious": "Sebelumnya",
                            "sNext": "Selanjutnya",
                            "sLast": "Terakhir"
                        }
                    }
                });

                // Event listener untuk perubahan pada filter status
                $('#statusFilterDataSkripsiProdi').on('change', function() {
                    var status = $(this).val();
                    // Lakukan filtering berdasarkan status yang dipilih
                    filterByStatus(status);
                });

                function filterByStatus(status) {
                    // Lakukan filtering menggunakan DataTables
                    table.column(2).search(status ? '^' + status + '$' : '', true, false).draw();
                }

                // Event listener untuk perubahan pada filter status Mobile
                $('#statusFilterMobileDataSkripsiProdi').on('change', function() {
                    var status = $(this).val();
                    // Lakukan filtering berdasarkan status yang dipilih Mobile
                    filterByStatusMobileDataSkripsiProdi(status);
                });

                function filterByStatusMobileDataSkripsiProdi(status) {
                    // Lakukan filtering menggunakan DataTables Mobile
                    table.column(2).search(status ? '^' + status + '$' : '', true, false).draw();
                }

                // Event handler untuk panjang menu
                $('#lengthMenuDataSkripsiProdi').on('change', function() {
                    var length = $(this).val();
                    table.page.len(length).draw();
                });

                // Event handler untuk panjang menu Mobile
                $('#lengthMenuMobileDataSkripsiProdi').on('change', function() {
                    var length = $(this).val();
                    table.page.len(length).draw();
                });

                // Filter Pencarian
                $('#searchFilterDataSkripsiProdi').on('keyup', function() {
                    var value = $(this).val().toLowerCase();
                    table.search(value).draw();
                });

                // Filter Pencarian Mobile
                $('#searchFilterMobileDataSkripsiProdi').on('keyup', function() {
                    var value = $(this).val().toLowerCase();
                    table.search(value).draw();
                });

                // Tambahkan filter jenis seminar, bulan, dan tahun di samping tombol Tampilkan
                $('#datatables2_length').after($('.filter'));
            });
        </script>

        {{-- Tabel view (riwayat kp dan skripsi prodi) riwayat-prodi.blade.php --}}
        <script type="text/javascript">
            $(document).ready(function() {
                var table = $('#datatablesriwayatkpskripsiprodi').DataTable({
                    "lengthMenu": [50, 100, 150, 200, 250],
                    "language": {
                        "sProcessing": "Sedang memproses...",
                        "sLengthMenu": "Tampilkan _MENU_ entri",
                        "sZeroRecords": "Tidak ditemukan data yang sesuai",
                        "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                        "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                        "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                        "sInfoPostFix": "",
                        "sSearch": "Cari:",
                        "sUrl": "",
                        "oPaginate": {
                            "sFirst": "Pertama",
                            "sPrevious": "Sebelumnya",
                            "sNext": "Selanjutnya",
                            "sLast": "Terakhir"
                        }
                    }
                });

                // Event listener untuk perubahan pada filter status
                $('#statusFilterRiwayatKPSkripsiProdi').on('change', function() {
                    var status = $(this).val();
                    // Lakukan filtering berdasarkan status yang dipilih
                    filterByStatus(status);
                });

                function filterByStatus(status) {
                    // Lakukan filtering menggunakan DataTables
                    table.column(3).search(status ? '^' + status + '$' : '', true, false).draw();
                }

                // Event listener untuk perubahan pada filter status Mobile
                $('#statusFilterMobileRiwayatKPSkripsiProdi').on('change', function() {
                    var status = $(this).val();
                    // Lakukan filtering berdasarkan status yang dipilih Mobile
                    filterByStatusMobileRiwayatKPSkripsiProdi(status);
                });

                function filterByStatusMobileRiwayatKPSkripsiProdi(status) {
                    // Lakukan filtering menggunakan DataTables Mobile
                    table.column(3).search(status ? '^' + status + '$' : '', true, false).draw();
                }

                // Filter Prodi
                $('#prodiFilterRiwayatKPSkripsiProdi').on('change', function() {
                    var val = $(this).val();
                    if (val) {
                        table.column(2).search(val).draw();
                    } else {
                        table.column(2).search('').draw();
                    }
                });

                // Filter Prodi Mobile
                $('#prodiFilterMobileRiwayatKPSkripsiProdi').on('change', function() {
                    var val = $(this).val();
                    if (val) {
                        table.column(2).search(val).draw();
                    } else {
                        table.column(2).search('').draw();
                    }
                });

                // Event handler untuk panjang menu
                $('#lengthMenuRiwayatKPSkripsiProdi').on('change', function() {
                    var length = $(this).val();
                    table.page.len(length).draw();
                });

                // Event handler untuk panjang menu Mobile
                $('#lengthMenuMobileRiwayatKPSkripsiProdi').on('change', function() {
                    var length = $(this).val();
                    table.page.len(length).draw();
                });

                // Filter Pencarian
                $('#searchFilterRiwayatKPSkripsiProdi').on('keyup', function() {
                    var value = $(this).val().toLowerCase();
                    table.search(value).draw();
                });

                // Filter Pencarian Mobile
                $('#searchFilterMobileRiwayatKPSkripsiProdi').on('keyup', function() {
                    var value = $(this).val().toLowerCase();
                    table.search(value).draw();
                });

                // Tambahkan filter jenis seminar, bulan, dan tahun di samping tombol Tampilkan
                $('#datatables2_length').after($('.filter'));
            });
        </script>

        {{-- Tabel view (riwayat seminar prodi) riwayat-prodi.blade.php --}}
        <script type="text/javascript">
            $(document).ready(function() {
                // Inisialisasi DataTables
                var table = $('#datatablesriwayatseminarprodi').DataTable({
                    "lengthMenu": [50, 100, 150, 200, 250],
                    "language": {
                        "sProcessing": "Sedang memproses...",
                        "sLengthMenu": "Tampilkan _MENU_ entri",
                        "sZeroRecords": "Tidak ditemukan data yang sesuai",
                        "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                        "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                        "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                        "sInfoPostFix": "",
                        "sSearch": "Cari:",
                        "sUrl": "",
                        "oPaginate": {
                            "sFirst": "Pertama",
                            "sPrevious": "Sebelumnya",
                            "sNext": "Selanjutnya",
                            "sLast": "Terakhir"
                        }
                    }
                });

                // Filter Jenis Seminar
                $('#seminarFilterRiwayatSeminarProdi').on('change', function() {
                    var val = $(this).val();
                    if (val) {
                        table.column(2).search(val).draw();
                    } else {
                        table.column(2).search('').draw();
                    }
                });

                // Filter Jenis Seminar Mobile
                $('#seminarFilterMobileRiwayatSeminarProdi').on('change', function() {
                    var val = $(this).val();
                    if (val) {
                        table.column(2).search(val).draw();
                    } else {
                        table.column(2).search('').draw();
                    }
                });

                // Filter Prodi
                $('#prodiFilterRiwayatSeminarProdi').on('change', function() {
                    var val = $(this).val();
                    if (val) {
                        table.column(3).search(val).draw();
                    } else {
                        table.column(3).search('').draw();
                    }
                });

                // Filter Prodi Mobile
                $('#prodiFilterMobileRiwayatSeminarProdi').on('change', function() {
                    var val = $(this).val();
                    if (val) {
                        table.column(3).search(val).draw();
                    } else {
                        table.column(3).search('').draw();
                    }
                });

                // Filter Bulan dan Tahun
                $('#bulanFilterRiwayatSeminarProdi, #tahunFilterRiwayatSeminarProdi').on('change', function() {
                    var bulan = $('#bulanFilterRiwayatSeminarProdi').val();
                    var tahun = $('#tahunFilterRiwayatSeminarProdi').val();

                    if (bulan || tahun) {
                        // Filter berdasarkan bulan dan tahun
                        table.column(4).search(bulan + ' ' + tahun, true, false).draw();
                    } else {
                        // Jika tidak ada bulan atau tahun yang dipilih, hapus filter
                        table.column(4).search('').draw();
                    }
                });

                // Filter Bulan dan Tahun Mobile
                $('#bulanFilterMobileRiwayatSeminarProdi, #tahunFilterMobileRiwayatSeminarProdi').on('change',
                    function() {
                        var bulan = $('#bulanFilterMobileRiwayatSeminarProdi').val();
                        var tahun = $('#tahunFilterMobileRiwayatSeminarProdi').val();

                        if (bulan || tahun) {
                            // Filter berdasarkan bulan dan tahun
                            table.column(4).search(bulan + ' ' + tahun, true, false).draw();
                        } else {
                            // Jika tidak ada bulan atau tahun yang dipilih, hapus filter
                            table.column(4).search('').draw();
                        }
                    });

                // Event handler untuk panjang menu
                $('#lengthMenuRiwayatSeminarProdi').on('change', function() {
                    var length = $(this).val();
                    table.page.len(length).draw();
                });

                // Event handler untuk panjang menu Mobile
                $('#lengthMenuMobileRiwayatSeminarProdi').on('change', function() {
                    var length = $(this).val();
                    table.page.len(length).draw();
                });

                // Filter Pencarian
                $('#searchFilterRiwayatSeminarProdi').on('keyup', function() {
                    var value = $(this).val().toLowerCase();
                    table.search(value).draw();
                });

                // Filter Pencarian Mobile
                $('#searchFilterMobileRiwayatSeminarProdi').on('keyup', function() {
                    var value = $(this).val().toLowerCase();
                    table.search(value).draw();
                });

                // Tambahkan filter jenis seminar, bulan, dan tahun di samping tombol Tampilkan
                $('#datatables2_length').after($('.filter'));

            });
        </script>

        {{-- Tabel view (riwayat seminar dibatalkan) riwayat-prodi.blade.php --}}
        <script type="text/javascript">
            $(document).ready(function() {
                // Inisialisasi DataTables
                var table = $('#datatablesriwayatseminardibatalkan').DataTable({
                    "lengthMenu": [50, 100, 150, 200, 250],
                    "language": {
                        "sProcessing": "Sedang memproses...",
                        "sLengthMenu": "Tampilkan _MENU_ entri",
                        "sZeroRecords": "Tidak ditemukan data yang sesuai",
                        "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                        "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                        "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                        "sInfoPostFix": "",
                        "sSearch": "Cari:",
                        "sUrl": "",
                        "oPaginate": {
                            "sFirst": "Pertama",
                            "sPrevious": "Sebelumnya",
                            "sNext": "Selanjutnya",
                            "sLast": "Terakhir"
                        }
                    }
                });

                // Filter Jenis Seminar
                $('#seminarFilterRiwayatSeminarDibatalkan').on('change', function() {
                    var val = $(this).val();
                    if (val) {
                        table.column(2).search(val).draw();
                    } else {
                        table.column(2).search('').draw();
                    }
                });

                // Filter Jenis Seminar Mobile
                $('#seminarFilterMobileRiwayatSeminarDibatalkan').on('change', function() {
                    var val = $(this).val();
                    if (val) {
                        table.column(2).search(val).draw();
                    } else {
                        table.column(2).search('').draw();
                    }
                });

                // Filter Prodi
                $('#prodiFilterRiwayatSeminarDibatalkan').on('change', function() {
                    var val = $(this).val();
                    if (val) {
                        table.column(3).search(val).draw();
                    } else {
                        table.column(3).search('').draw();
                    }
                });

                // Filter Prodi Mobile
                $('#prodiFilterMobileRiwayatSeminarDibatalkan').on('change', function() {
                    var val = $(this).val();
                    if (val) {
                        table.column(3).search(val).draw();
                    } else {
                        table.column(3).search('').draw();
                    }
                });

                // Filter Bulan dan Tahun
                $('#bulanFilterRiwayatSeminarDibatalkan, #tahunFilterRiwayatSeminarDibatalkan').on('change',
                    function() {
                        var bulan = $('#bulanFilterRiwayatSeminarDibatalkan').val();
                        var tahun = $('#tahunFilterRiwayatSeminarDibatalkan').val();

                        if (bulan || tahun) {
                            // Filter berdasarkan bulan dan tahun
                            table.column(4).search(bulan + ' ' + tahun, true, false).draw();
                        } else {
                            // Jika tidak ada bulan atau tahun yang dipilih, hapus filter
                            table.column(4).search('').draw();
                        }
                    });

                // Filter Bulan dan Tahun Mobile
                $('#bulanFilterMobileRiwayatSeminarDibatalkan, #tahunFilterMobileRiwayatSeminarDibatalkan').on('change',
                    function() {
                        var bulan = $('#bulanFilterMobileRiwayatSeminarDibatalkan').val();
                        var tahun = $('#tahunFilterMobileRiwayatSeminarDibatalkan').val();

                        if (bulan || tahun) {
                            // Filter berdasarkan bulan dan tahun
                            table.column(4).search(bulan + ' ' + tahun, true, false).draw();
                        } else {
                            // Jika tidak ada bulan atau tahun yang dipilih, hapus filter
                            table.column(4).search('').draw();
                        }
                    });

                // Event handler untuk panjang menu
                $('#lengthMenuRiwayatSeminarDibatalkan').on('change', function() {
                    var length = $(this).val();
                    table.page.len(length).draw();
                });

                // Event handler untuk panjang menu Mobile
                $('#lengthMenuMobileRiwayatSeminarDibatalkan').on('change', function() {
                    var length = $(this).val();
                    table.page.len(length).draw();
                });

                // Filter Pencarian
                $('#searchFilterRiwayatSeminarDibatalkan').on('keyup', function() {
                    var value = $(this).val().toLowerCase();
                    table.search(value).draw();
                });

                // Filter Pencarian Mobile
                $('#searchFilterMobileRiwayatSeminarDibatalkan').on('keyup', function() {
                    var value = $(this).val().toLowerCase();
                    table.search(value).draw();
                });

                // Tambahkan filter jenis seminar, bulan, dan tahun di samping tombol Tampilkan
                $('#datatables2_length').after($('.filter'));

            });
        </script>

        {{-- Tabel view (persetujuan kp skripsi) persetujuankp-skripsi.blade.php --}}
        <script type="text/javascript">
            $(document).ready(function() {
                // Inisialisasi DataTables
                var table = $('#datatablespersetujuankpskripsi').DataTable({
                    "lengthMenu": [50, 100, 150, 200, 250],
                    "language": {
                        "sProcessing": "Sedang memproses...",
                        "sLengthMenu": "Tampilkan _MENU_ entri",
                        "sZeroRecords": "Tidak ditemukan data yang sesuai",
                        "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                        "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                        "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                        "sInfoPostFix": "",
                        "sSearch": "Cari:",
                        "sUrl": "",
                        "oPaginate": {
                            "sFirst": "Pertama",
                            "sPrevious": "Sebelumnya",
                            "sNext": "Selanjutnya",
                            "sLast": "Terakhir"
                        }
                    }
                });

                // Event listener untuk perubahan pada filter status
                $('#statusFilterPersetujuanKpSkripsi').on('change', function() {
                    var status = $(this).val();
                    // Lakukan filtering berdasarkan status yang dipilih
                    filterByStatusPersetujuanKpSkripsi(status);
                });

                function filterByStatusPersetujuanKpSkripsi(status) {
                    // Lakukan filtering menggunakan DataTables
                    table.column(2).search(status ? '^' + status + '$' : '', true, false).draw();
                }

                // Event listener untuk perubahan pada filter status Mobile
                $('#statusFilterMobilePersetujuanKpSkripsi').on('change', function() {
                    var status = $(this).val();
                    // Lakukan filtering berdasarkan status yang dipilih Mobile
                    filterByStatusMobilePersetujuanKpSkripsi(status);
                });

                function filterByStatusMobilePersetujuanKpSkripsi(status) {
                    // Lakukan filtering menggunakan DataTables Mobile
                    table.column(2).search(status ? '^' + status + '$' : '', true, false).draw();
                }

                // Event handler untuk panjang menu
                $('#lengthMenuPersetujuanKpSkripsi').on('change', function() {
                    var length = $(this).val();
                    table.page.len(length).draw();
                });

                // Event handler untuk panjang menu Mobile
                $('#lengthMenuMobilePersetujuanKpSkripsi').on('change', function() {
                    var length = $(this).val();
                    table.page.len(length).draw();
                });

                // Filter Pencarian
                $('#searchFilterPersetujuanKpSkripsi').on('keyup', function() {
                    var value = $(this).val().toLowerCase();
                    table.search(value).draw();
                });

                // Filter Pencarian Mobile
                $('#searchFilterMobilePersetujuanKpSkripsi').on('keyup', function() {
                    var value = $(this).val().toLowerCase();
                    table.search(value).draw();
                });

                // Tambahkan filter jenis seminar, bulan, dan tahun di samping tombol Tampilkan
                $('#datatables2_length').after($('.filter'));

            });
        </script>

        {{-- Tabel view (jadwal seminar pembimbing penguji) index-pembimbing.blade.php --}}
        <script type="text/javascript">
            $(document).ready(function() {
                // Inisialisasi DataTables
                var table = $('#datatablesjadwalseminarpembimbingpenguji').DataTable({
                    "lengthMenu": [50, 100, 150, 200, 250],
                    "language": {
                        "sProcessing": "Sedang memproses...",
                        "sLengthMenu": "Tampilkan _MENU_ entri",
                        "sZeroRecords": "Tidak ditemukan data yang sesuai",
                        "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                        "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                        "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                        "sInfoPostFix": "",
                        "sSearch": "Cari:",
                        "sUrl": "",
                        "oPaginate": {
                            "sFirst": "Pertama",
                            "sPrevious": "Sebelumnya",
                            "sNext": "Selanjutnya",
                            "sLast": "Terakhir"
                        }
                    }
                });

                // Filter Jenis Seminar
                $('#seminarFilterJadwalSeminarPembimbingPenguji').on('change', function() {
                    var val = $(this).val();
                    if (val) {
                        table.column(2).search(val).draw();
                    } else {
                        table.column(2).search('').draw();
                    }
                });

                // Filter Jenis Seminar Mobile
                $('#seminarFilterMobileJadwalSeminarPembimbingPenguji').on('change', function() {
                    var val = $(this).val();
                    if (val) {
                        table.column(2).search(val).draw();
                    } else {
                        table.column(2).search('').draw();
                    }
                });

                // Event handler untuk panjang menu
                $('#lengthMenuJadwalSeminarPembimbingPenguji').on('change', function() {
                    var length = $(this).val();
                    table.page.len(length).draw();
                });

                // Event handler untuk panjang menu Mobile
                $('#lengthMenuMobileJadwalSeminarPembimbingPenguji').on('change', function() {
                    var length = $(this).val();
                    table.page.len(length).draw();
                });

                // Filter Pencarian
                $('#searchFilterJadwalSeminarPembimbingPenguji').on('keyup', function() {
                    var value = $(this).val().toLowerCase();
                    table.search(value).draw();
                });

                // Filter Pencarian Mobile
                $('#searchFilterMobileJadwalSeminarPembimbingPenguji').on('keyup', function() {
                    var value = $(this).val().toLowerCase();
                    table.search(value).draw();
                });

                // Tambahkan filter jenis seminar, bulan, dan tahun di samping tombol Tampilkan
                $('#datatables2_length').after($('.filter'));

            });
        </script>

        {{-- Tabel view (bimbingan kp) indexpembimbingkp.blade.php --}}
        <script type="text/javascript">
            $(document).ready(function() {
                var table = $('#datatablesbimbingankp').DataTable({
                    "lengthMenu": [50, 100, 150, 200, 250],
                    "language": {
                        "sProcessing": "Sedang memproses...",
                        "sLengthMenu": "Tampilkan _MENU_ entri",
                        "sZeroRecords": "Tidak ditemukan data yang sesuai",
                        "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                        "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                        "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                        "sInfoPostFix": "",
                        "sSearch": "Cari:",
                        "sUrl": "",
                        "oPaginate": {
                            "sFirst": "Pertama",
                            "sPrevious": "Sebelumnya",
                            "sNext": "Selanjutnya",
                            "sLast": "Terakhir"
                        }
                    }
                });

                // Event listener untuk perubahan pada filter status
                $('#statusFilterBimbinganKP').on('change', function() {
                    var status = $(this).val();
                    // Lakukan filtering berdasarkan status yang dipilih
                    filterByStatusBimbinganKP(status);
                });

                function filterByStatusBimbinganKP(status) {
                    // Lakukan filtering menggunakan DataTables
                    table.column(2).search(status ? '^' + status + '$' : '', true, false).draw();
                }

                // Event listener untuk perubahan pada filter status Mobile
                $('#statusFilterMobileBimbinganKP').on('change', function() {
                    var status = $(this).val();
                    // Lakukan filtering berdasarkan status yang dipilih Mobile
                    filterByStatusMobileBimbinganKP(status);
                });

                function filterByStatusMobileBimbinganKP(status) {
                    // Lakukan filtering menggunakan DataTables Mobile
                    table.column(2).search(status ? '^' + status + '$' : '', true, false).draw();
                }

                // Event handler untuk panjang menu
                $('#lengthMenuBimbinganKP').on('change', function() {
                    var length = $(this).val();
                    table.page.len(length).draw();
                });

                // Event handler untuk panjang menu Mobile
                $('#lengthMenuMobileBimbinganKP').on('change', function() {
                    var length = $(this).val();
                    table.page.len(length).draw();
                });

                // Filter Pencarian
                $('#searchFilterBimbinganKP').on('keyup', function() {
                    var value = $(this).val().toLowerCase();
                    table.search(value).draw();
                });

                // Filter Pencarian Mobile
                $('#searchFilterMobileBimbinganKP').on('keyup', function() {
                    var value = $(this).val().toLowerCase();
                    table.search(value).draw();
                });

                // Tambahkan filter jenis seminar, bulan, dan tahun di samping tombol Tampilkan
                $('#datatables2_length').after($('.filter'));
            });
        </script>

        {{-- Tabel view (bimbingan skripsi) indexpembimbingskripsi.blade.php --}}
        <script type="text/javascript">
            $(document).ready(function() {
                var table = $('#datatablesbimbinganskripsi').DataTable({
                    "lengthMenu": [50, 100, 150, 200, 250],
                    "language": {
                        "sProcessing": "Sedang memproses...",
                        "sLengthMenu": "Tampilkan _MENU_ entri",
                        "sZeroRecords": "Tidak ditemukan data yang sesuai",
                        "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                        "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                        "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                        "sInfoPostFix": "",
                        "sSearch": "Cari:",
                        "sUrl": "",
                        "oPaginate": {
                            "sFirst": "Pertama",
                            "sPrevious": "Sebelumnya",
                            "sNext": "Selanjutnya",
                            "sLast": "Terakhir"
                        }
                    }
                });

                // Event listener untuk perubahan pada filter status
                $('#statusFilterBimbinganSkripsi').on('change', function() {
                    var status = $(this).val();
                    // Lakukan filtering berdasarkan status yang dipilih
                    filterByStatusBimbinganSkripsi(status);
                });

                function filterByStatusBimbinganSkripsi(status) {
                    // Lakukan filtering menggunakan DataTables
                    table.column(2).search(status ? '^' + status + '$' : '', true, false).draw();
                }

                // Event listener untuk perubahan pada filter status Mobile
                $('#statusFilterMobileBimbinganSkripsi').on('change', function() {
                    var status = $(this).val();
                    // Lakukan filtering berdasarkan status yang dipilih Mobile
                    filterByStatusMobileBimbinganSkripsi(status);
                });

                function filterByStatusMobileBimbinganSkripsi(status) {
                    // Lakukan filtering menggunakan DataTables Mobile
                    table.column(2).search(status ? '^' + status + '$' : '', true, false).draw();
                }

                // Event handler untuk panjang menu
                $('#lengthMenuBimbinganSkripsi').on('change', function() {
                    var length = $(this).val();
                    table.page.len(length).draw();
                });

                // Event handler untuk panjang menu Mobile
                $('#lengthMenuMobileBimbinganSkripsi').on('change', function() {
                    var length = $(this).val();
                    table.page.len(length).draw();
                });

                // Filter Pencarian
                $('#searchFilterBimbinganSkripsi').on('keyup', function() {
                    var value = $(this).val().toLowerCase();
                    table.search(value).draw();
                });

                // Filter Pencarian Mobile
                $('#searchFilterMobileBimbinganSkripsi').on('keyup', function() {
                    var value = $(this).val().toLowerCase();
                    table.search(value).draw();
                });

                // Tambahkan filter jenis seminar, bulan, dan tahun di samping tombol Tampilkan
                $('#datatables2_length').after($('.filter'));
            });
        </script>

        {{-- Tabel view (riwayat kp dan skripsi) riwayat-pembimbing-bimbingan.blade.php --}}
        <script type="text/javascript">
            $(document).ready(function() {
                var table = $('#datatablesriwayatkpdanskripsi').DataTable({
                    "lengthMenu": [50, 100, 150, 200, 250],
                    "language": {
                        "sProcessing": "Sedang memproses...",
                        "sLengthMenu": "Tampilkan _MENU_ entri",
                        "sZeroRecords": "Tidak ditemukan data yang sesuai",
                        "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                        "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                        "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                        "sInfoPostFix": "",
                        "sSearch": "Cari:",
                        "sUrl": "",
                        "oPaginate": {
                            "sFirst": "Pertama",
                            "sPrevious": "Sebelumnya",
                            "sNext": "Selanjutnya",
                            "sLast": "Terakhir"
                        }
                    }
                });

                // Event listener untuk perubahan pada filter status
                $('#statusFilterRiwayatKPSkripsi').on('change', function() {
                    var status = $(this).val();
                    // Lakukan filtering berdasarkan status yang dipilih
                    filterByStatus(status);
                });

                function filterByStatus(status) {
                    // Lakukan filtering menggunakan DataTables
                    table.column(2).search(status ? '^' + status + '$' : '', true, false).draw();
                }

                // Event listener untuk perubahan pada filter status Mobile
                $('#statusFilterMobileRiwayatKPSkripsi').on('change', function() {
                    var status = $(this).val();
                    // Lakukan filtering berdasarkan status yang dipilih Mobile
                    filterByStatusMobileRiwayatKPSkripsi(status);
                });

                function filterByStatusMobileRiwayatKPSkripsi(status) {
                    // Lakukan filtering menggunakan DataTables Mobile
                    table.column(2).search(status ? '^' + status + '$' : '', true, false).draw();
                }

                // Event handler untuk panjang menu
                $('#lengthMenuRiwayatKPSkripsi').on('change', function() {
                    var length = $(this).val();
                    table.page.len(length).draw();
                });

                // Event handler untuk panjang menu Mobile
                $('#lengthMenuMobileRiwayatKPSkripsi').on('change', function() {
                    var length = $(this).val();
                    table.page.len(length).draw();
                });

                // Filter Pencarian
                $('#searchFilterRiwayatKPSkripsi').on('keyup', function() {
                    var value = $(this).val().toLowerCase();
                    table.search(value).draw();
                });

                // Filter Pencarian Mobile
                $('#searchFilterMobileRiwayatKPSkripsi').on('keyup', function() {
                    var value = $(this).val().toLowerCase();
                    table.search(value).draw();
                });

                // Tambahkan filter jenis seminar, bulan, dan tahun di samping tombol Tampilkan
                $('#datatables2_length').after($('.filter'));
            });
        </script>

        {{-- Tabel view (riwayat seminar) riwayat-pembimbing-bimbingan.blade.php --}}
        <script type="text/javascript">
            $(document).ready(function() {
                // Inisialisasi DataTables
                var table = $('#datatablesriwayatseminar').DataTable({
                    "lengthMenu": [50, 100, 150, 200, 250],
                    "language": {
                        "sProcessing": "Sedang memproses...",
                        "sLengthMenu": "Tampilkan _MENU_ entri",
                        "sZeroRecords": "Tidak ditemukan data yang sesuai",
                        "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                        "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                        "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                        "sInfoPostFix": "",
                        "sSearch": "Cari:",
                        "sUrl": "",
                        "oPaginate": {
                            "sFirst": "Pertama",
                            "sPrevious": "Sebelumnya",
                            "sNext": "Selanjutnya",
                            "sLast": "Terakhir"
                        }
                    }
                });

                // Filter Jenis Seminar
                $('#seminarFilter').on('change', function() {
                    var val = $(this).val();
                    if (val) {
                        table.column(2).search(val).draw();
                    } else {
                        table.column(2).search('').draw();
                    }
                });

                // Filter Jenis Seminar Mobile
                $('#seminarFilterMobile').on('change', function() {
                    var val = $(this).val();
                    if (val) {
                        table.column(2).search(val).draw();
                    } else {
                        table.column(2).search('').draw();
                    }
                });

                // Filter Bulan dan Tahun
                $('#bulanFilter, #tahunFilter').on('change', function() {
                    var bulan = $('#bulanFilter').val();
                    var tahun = $('#tahunFilter').val();

                    if (bulan || tahun) {
                        // Filter berdasarkan bulan dan tahun
                        table.column(4).search(bulan + ' ' + tahun, true, false).draw();
                    } else {
                        // Jika tidak ada bulan atau tahun yang dipilih, hapus filter
                        table.column(4).search('').draw();
                    }
                });

                // Filter Bulan dan Tahun Mobile
                $('#bulanFilterMobile, #tahunFilterMobile').on('change', function() {
                    var bulan = $('#bulanFilterMobile').val();
                    var tahun = $('#tahunFilterMobile').val();

                    if (bulan || tahun) {
                        // Filter berdasarkan bulan dan tahun
                        table.column(4).search(bulan + ' ' + tahun, true, false).draw();
                    } else {
                        // Jika tidak ada bulan atau tahun yang dipilih, hapus filter
                        table.column(4).search('').draw();
                    }
                });

                // Event handler untuk panjang menu
                $('#lengthMenu').on('change', function() {
                    var length = $(this).val();
                    table.page.len(length).draw();
                });

                // Event handler untuk panjang menu Mobile
                $('#lengthMenuMobile').on('change', function() {
                    var length = $(this).val();
                    table.page.len(length).draw();
                });

                // Filter Pencarian
                $('#searchFilter').on('keyup', function() {
                    var value = $(this).val().toLowerCase();
                    table.search(value).draw();
                });

                // Filter Pencarian Mobile
                $('#searchFilterMobile').on('keyup', function() {
                    var value = $(this).val().toLowerCase();
                    table.search(value).draw();
                });

                // Tambahkan filter jenis seminar, bulan, dan tahun di samping tombol Tampilkan
                $('#datatables2_length').after($('.filter'));

            });
        </script>



        <!-- Bootstrap 4 -->
        <script src="{{ asset('/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
        <script src="{{ asset('assets/dist/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/dist/js/sweetalert2.all.min.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        <script src="{{ asset('js/sweetalert2.min.js') }}"></script>
        @yield('js')
        @stack('scripts')


</body>

</html>
