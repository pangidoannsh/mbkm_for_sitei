<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('/assets/dist/css/bootstrap.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('/assets/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    {{-- <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" /> --}}

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

    <link rel="icon" href="{{ asset('logo.png') }}">

    <style>
        .dropdown-menu {
            border-left: 0.01px solid rgba(0, 0, 0, 0.05);
            border-right: 0.01px solid rgba(0, 0, 0, 0.05);
            border-bottom: 0.01px solid rgba(0, 0, 0, 0.05);
            border-top: 0.01px solid rgba(0, 0, 0, 0.05);
            /* border: none; */
            box-shadow: none;
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
                            <a class="navbar-brand mt-1 " href="/">SITEI
                            @elseif (Str::length(Auth::guard('dosen')->user()) > 0)
                                <a class="navbar-brand mt-1 " href="/persetujuan-kp-skripsi">SITEI
                                @elseif (Str::length(Auth::guard('mahasiswa')->user()) > 0)
                                    <a class="navbar-brand mt-1 " href="/">SITEI
                                    @else
                                        <a class="navbar-brand mt-1 " href="/">SITEI
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
                                    @if (in_array(Auth::guard('dosen')->user()->role_id, [5, 6, 7, 8]))
                                        <li class="nav-item dropdown ">
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
                                        </li>
                                    @else
                                        <li class="nav-item">
                                            <a class="nav-link {{ Request::is('pengumuman*') ? 'text-success' : '' }} "
                                                aria-current="page" href="{{ route('pengumuman') }}">PENGUMUMAN</a>
                                        </li>
                                    @endif
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
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::is('inventaris*') ? 'text-success' : '' }} "
                                        aria-current="page" href="/inventaris/peminjaman-dosen">INVENTARIS</a>
                                </li>
                                {{-- DistribusiDokumen --}}
                                @if (in_array(Auth::guard('dosen')->user()->role_id, [5, 6, 7, 8]))
                                    <li class="nav-item dropdown ">
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
                                    </li>
                                @else
                                    <li class="nav-item dropdown baru">
                                        <a href="{{ route('doc.index') }}"
                                            class="nav-link {{ Request::is('distribusi-dokumen*') ? 'text-success' : '' }}">
                                            DOKUMEN
                                        </a>
                                    </li>
                                @endif
                            @endif

                            {{-- Menu PLP --}}

                            @if (Str::length(Auth::guard('web')->user()) > 0)
                                @if (Auth::guard('web')->user()->role_id == 12)
                                    <li class="nav-item">
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
                                    </li>
                                @endif
                            @endif

                            {{-- Menu KP/TA Mahasiswa --}}

                            @if (Str::length(Auth::guard('mahasiswa')->user()) > 0)
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link {{ Request::is('pengumuman*') ? 'text-success' : '' }} "
                                            aria-current="page" href="{{ route('pengumuman') }}">PENGUMUMAN</a>
                                    </li>
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

                                <li class="nav-item">
                                    <a class="nav-link {{ Request::is('inventaris*') ? 'text-success' : '' }} "
                                        aria-current="page" href="/inventaris/peminjamanmhs">INVENTARIS</a>
                                </li>
                                {{-- DistribusiDokumen --}}
                                <li class="nav-item dropdown baru">
                                    <a id="dokumendropdown" href="{{ route('doc.index') }}"
                                        class="nav-link {{ Request::is('distribusi-dokumen*') ? 'text-success' : '' }}">
                                        DOKUMEN
                                    </a>
                                </li>
                            @endif

                            @if (Str::length(Auth::guard('web')->user()) > 0)
                                @if (Auth::guard('web')->user()->role_id == 2 ||
                                        Auth::guard('web')->user()->role_id == 3 ||
                                        Auth::guard('web')->user()->role_id == 4)
                                    <ul class="navbar-nav">
                                        <li class="nav-item">
                                            <a class="nav-link {{ Request::is('pengumuman*') ? 'text-success' : '' }} "
                                                aria-current="page" href="{{ route('pengumuman') }}">PENGUMUMAN</a>
                                        </li>
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

                                    <li class="nav-item">
                                        <a class="nav-link {{ Request::is('inventaris*') ? 'text-success' : '' }}"
                                            aria-current="page" href="/inventaris/peminjamanadm">INVENTARIS</a>
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
                                        <li class="nav-item">
                                            <a class="nav-link {{ Request::is('pengumuman*') ? 'text-success' : '' }} "
                                                aria-current="page" href="{{ route('pengumuman') }}">PENGUMUMAN</a>
                                        </li>
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

                                    <li class="nav-item">
                                        <a class="nav-link {{ Request::is('inventaris*') ? 'text-success' : '' }}"
                                            aria-current="page" href="/inventaris/peminjamanadm">INVENTARIS</a>
                                    </li>
                                    {{-- DistribusiDokumen --}}
                                    <li class="nav-item dropdown baru">
                                        <a id="dokumendropdown" href="{{ route('doc.index') }}"
                                            class="nav-link {{ Request::is('distribusi-dokumen*') ? 'text-success' : '' }}">
                                            DOKUMEN
                                        </a>
                                    </li>

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
                                @if (Auth::guard('web')->user()->role_id == 2)
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
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                @endif
                            @endif

                            @if (Str::length(Auth::guard('web')->user()) > 0)
                                @if (Auth::guard('web')->user()->role_id == 3)
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
                        <!--@if (!Auth::guard('web')->check() && !Auth::guard('dosen')->check() && !Auth::guard('mahasiswa')->check())-->
                        <!--    <div class="navbar-nav ml-auto">-->
                        <!--        <a href="/" class="btn btn-success rounded-2">Login</a>-->
                        <!--    </div>-->
                    <!--@else-->
                        <!--    <ul class="navbar-nav ml-auto">-->
                        <!--        <li class="nav-item dropdown">-->
                        <!--            <a class="nav-link dropdown-toggle " href="" id="navbarDropdown"-->
                        <!--                role="button" data-bs-toggle="dropdown" aria-expanded="false">-->
                        <!--                @if (Str::length(Auth::guard('dosen')->user()) > 0)
-->
                        <!--                    {{ Auth::guard('dosen')->user()->nama }}-->
                        <!--
@elseif (Str::length(Auth::guard('web')->user()) > 0)
-->
                        <!--                    {{ Auth::guard('web')->user()->nama }}-->
                        <!--
@elseif (Str::length(Auth::guard('mahasiswa')->user()) > 0)
-->
                        <!--                    {{ Auth::guard('mahasiswa')->user()->nama }}-->
                        <!--
@endif-->
                        <!--            </a>-->
                        <!--            <div>-->
                        <!--                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">-->
                        <!--                    @if (Str::length(Auth::guard('dosen')->user()) > 0)
-->
                        <!--                        @if (Auth::guard('dosen')->user())
-->
                        <!--                            <li>-->
                        <!--                                <a class="nav-link dropdown-item {{ Request::is('profil-dosen*') ? 'text-success' : '' }}"-->
                        <!--                                    href="/profil-dosen/editpassworddsn/">-->
                        <!--                                    <i class="fas fa-key"></i> Ubah Password-->
                        <!--                                </a>-->
                        <!--                            </li>-->
                        <!--
@endif-->
                        <!--
@endif-->

                        <!--                    @if (Str::length(Auth::guard('mahasiswa')->user()) > 0)
-->
                        <!--                        @if (Auth::guard('mahasiswa')->user())
-->
                        <!--                            <li>-->
                        <!--                                <a class="nav-link dropdown-item {{ Request::is('profil-mhs*') ? 'text-success' : '' }}"-->
                        <!--                                    href="/profil-mhs/editpasswordmhs/">-->
                        <!--                                    <i class="fas fa-key"></i> Ubah Password-->
                        <!--                                </a>-->
                        <!--                            </li>-->
                        <!--
@endif-->
                        <!--
@endif-->

                        <!--                    @if (Str::length(Auth::guard('web')->user()) > 0)
-->
                        <!--                        @if (Auth::guard('web')->user())
-->
                        <!--                            <li>-->
                        <!--                                <a class="nav-link dropdown-item {{ Request::is('profil-staff*') ? 'text-success' : '' }}"-->
                        <!--                                    href="/profil-staff/editpasswordstaff/">-->
                        <!--                                    <i class="fas fa-key"></i> Ubah Password-->
                        <!--                                </a>-->
                        <!--                            </li>-->
                        <!--
@endif-->
                        <!--
@endif-->

                        <!--                    <form action="/logout" method="POST">-->
                        <!--                        @csrf-->
                        <!--                        <li>-->
                        <!--                            <button type="submit" class="nav-link dropdown-item">-->
                        <!--                                <i class="fas fa-sign-out-alt"></i> Keluar-->
                        <!--                            </button>-->
                        <!--                        </li>-->
                        <!--                    </form>-->
                        <!--                </ul>-->
                        <!--            </div>-->
                        <!--        </li>-->
                        <!--    </ul>-->
                        <!--@endif-->
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
                        <div class="anak-judul sub-title">
                            <h4>@yield('sub-title')</h4>
                            @hasSection('sub-title')
                                <hr>
                            @endif
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

        <script type="text/javascript">
            $(document).ready(function() {
                // $('.filter').removeClass("d-none")
                // $('.filter').addClass("d-flex")
                var table = $('#datatables').DataTable({
                    "order": [],
                    "lengthMenu": [50, 100, 150, 200, 250],
                    "language": {
                        "sProcessing": "Sedang memproses...",
                        "sLengthMenu": "Tampilkan _MENU_",
                        "sZeroRecords": "Tidak ditemukan data yang sesuai",
                        "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                        "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                        "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                        "sInfoPostFix": "",
                        "sSearch": "Cari",
                        "sUrl": "",
                        "oPaginate": {
                            "sFirst": "Pertama",
                            "sPrevious": "Sebelumnya",
                            "sNext": "Selanjutnya",
                            "sLast": "Terakhir"
                        }
                    }

                })
                $("#statusFilter").on('change', e => {
                    const val = e.target.value
                    table.column(4).search(val ? '^' + val + '$' : '', true, true).draw();
                })
                $("#kategoriFilter").on('change', e => {
                    const val = e.target.value
                    table.column(6).search(val ? '^' + val + '$' : '', true, false).draw();
                })
                $("#semesterFilter").on('change', e => {
                    const val = e.target.value
                    table.column(8).search(val ? '^' + val + '$' : '', true, false).draw();
                })
                $("#statusFilterInModal").on('change', e => {
                    const val = e.target.value
                    table.column(4).search(val ? '^' + val + '$' : '', true, true).draw();
                })
                $("#kategoriFilterInModal").on('change', e => {
                    const val = e.target.value
                    table.column(6).search(val ? '^' + val + '$' : '', true, false).draw();
                })
                $("#semesterFilterInModal").on('change', e => {
                    const val = e.target.value
                    table.column(8).search(val ? '^' + val + '$' : '', true, false).draw();
                })
            });
        </script>

        <script type="text/javascript">
            $(document).ready(function() {
                var table = $('#datatables3').DataTable({
                    "lengthMenu": [50, 100, 150, 200, 250],
                    "language": {
                        "sProcessing": "Sedang memproses...",
                        "sLengthMenu": "Tampilkan _MENU_",
                        "sZeroRecords": "Tidak ditemukan data yang sesuai",
                        "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                        "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                        "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                        "sInfoPostFix": "",
                        "sSearch": "Cari",
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
                        "sLengthMenu": "Tampilkan _MENU_",
                        "sZeroRecords": "Tidak ditemukan data yang sesuai",
                        "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                        "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                        "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                        "sInfoPostFix": "",
                        "sSearch": "Cari",
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
                        "sLengthMenu": "Tampilkan _MENU_",
                        "sZeroRecords": "Tidak ditemukan data yang sesuai",
                        "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                        "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                        "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                        "sInfoPostFix": "",
                        "sSearch": "Cari",
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
                var table = $('#datatables2').DataTable({
                    "lengthMenu": [50, 100, 150, 200, 250],
                    "language": {
                        "sProcessing": "Sedang memproses...",
                        "sLengthMenu": "Tampilkan _MENU_",
                        "sZeroRecords": "Tidak ditemukan data yang sesuai",
                        "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                        "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                        "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                        "sInfoPostFix": "",
                        "sSearch": "Cari",
                        "sUrl": "",
                        "oPaginate": {
                            "sFirst": "Pertama",
                            "sPrevious": "Sebelumnya",
                            "sNext": "Selanjutnya",
                            "sLast": "Terakhir"
                        }
                    }
                })
                $("#statusFilter2").on('change', e => {
                    const val = e.target.value
                    table.column(4).search(val ? '^' + val + '$' : '', true, true).draw();
                })
                $("#kategoriFilter2").on('change', e => {
                    const val = e.target.value
                    table.column(6).search(val ? '^' + val + '$' : '', true, false).draw();
                })
                $("#semesterFilter2").on('change', e => {
                    const val = e.target.value
                    table.column(8).search(val ? '^' + val + '$' : '', true, false).draw();
                })
            });
        </script>



        <!-- Bootstrap 4 -->
        <script src="{{ asset('/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
        <script src="{{ asset('assets/dist/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/dist/js/sweetalert2.all.min.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        {{-- <script src="{{ asset('js/sweetalert2.min.js') }}"></script> --}}
        @yield('js')
        @stack('scripts')


</body>

</html>
