@php
    use Carbon\Carbon;

    function konversiNilai($nilai)
    {
        $nilaiBasis4 = $nilaiBasis4 = round($nilai / 25, 2);
        return $nilaiBasis4;
    }
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print Nilai</title>
    <style type= "text/css">
        body {
            font-family: 'Times New Roman', Times, serif;
            background-color: #ccc
        }

        /* .rangkasurat {width : 980px;margin:0 aut;margin-top: -25px;background-color : #fff;height: 500px;padding: 15px;} */
        .tengah {
            text-align: center;
            line-height: 5px;
        }

        @page {
            size: A4;
            margin: 0.9;
            padding: 0.9;
        }

        .row {
            display: flex;
        }

        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        .col {
            float: left;
            width: 65%;
        }

        .bord {
            border-collapse: collapse;
            border: 1px solid black;
        }

        .no {
            border: none;
            border-right: 1px solid black;
            border-left: 1px solid black;
            border-bottom: 1px solid black;
        }

        .th2 {
            border: none;
            border-left: 1px solid black;
            border-right: 1px solid black;
            border-top: 1px solid black;
            vertical-align: middle;
            text-align: center;
        }

        .bot {
            border: none;
            border-bottom: 1px solid black;
        }

        .logo {
            position: absolute;
            top: 7%;
            right: 73%;
            transform: translate(-50%, -50%);
        }
    </style>
</head>

<body style="background-color: white">
    <div class = "rangkasurat">
        <table width = "100%" style="border-bottom: solid;">
            <tr>
                <td>
                    <div class="logo">
                        <img id="img" src="https://live.staticflickr.com/65535/51644220143_f5dba04544_o_d.png"
                            width="110" height="110">
                    </div>
                <td class = "tengah">
                    <p style="font-size: 1ch">KEMENTERIAN PENDIDIKAN, KEBUDAYAAN</p>
                    <p style="font-size: 1ch"> RISET, DAN TEKNOLOGI</p>
                    <h3>UNIVERSITAS RIAU - FAKULTAS TEKNIK</h3>
                    <h3>JURUSAN TEKNIK ELEKTRO</h3>
                    <h3>PROGRAM STUDI TEKNIK INFORMATIKA</h3>
                    <p style="">Kampus Bina Widya Km. 12,5 Simpang Baru Pekanbaru 28293</p>
                    <p style="">Telepon (0761) 66596 Faksimile (0761) 66595</p>
                    <p style=";margin-bottom:5px;">Laman: http://informatika.ft.unri.ac.id</p>
                </td>
            </tr>
        </table>
        <br>
        <div style="font-size: 15px;">
            <strong>
                <p style="text-align: center;margin-bottom:-10px;">HASIL STUDI NILAI KONVERSI</p>
            </strong>
            <p style="text-align: center;">Semester Genap TA. 2022-2023</p>
        </div>
        <br>
        <div style="padding-left: 50px;font-size: 15px;">
            <table>
                <tr>
                    <td>Nama Mahasiswa</td>
                    <td>:</td>
                    <td>{{ $mbkm->mahasiswa->nama }}</td>
                </tr>
                <tr>
                    <td>Nomor Induk Mahasiswa</td>
                    <td>:</td>
                    <td>{{ $mbkm->mahasiswa_nim }}</td>
                </tr>
                <tr>
                    <td>Angkatan</td>
                    <td>:</td>
                    <td>{{ $mbkm->mahasiswa->angkatan }}</td>
                </tr>
                <tr>
                    <td>Program Studi</td>
                    <td>: </td>
                    <td>{{ $mbkm->mahasiswa->prodi->nama_prodi }}</td>
                </tr>
                <tr>
                    <td>Dosen Pembimbing Lapangan</td>
                    <td>:</td>
                    <td>Dr. Feri candra, ST.,MT</td>
                </tr>
                <tr>
                    <td>Lokasi</td>
                    <td>:</td>
                    <td>{{ $mbkm->perusahaan }}</td>
                </tr>
                <tr>
                    <td>Jenis MBKM</td>
                    <td>:</td>
                    <td>{{ $mbkm->program->name }} (Kampus Merdeka)</td>
                </tr>
                <tr>
                    <td>Pelaksanaan</td>
                    <td>:</td>
                    <td>{{ Carbon::parse($mbkm->mulai_kegiatan)->translatedFormat('d F Y') }} -
                        {{ Carbon::parse($mbkm->selesai_kegiatan)->translatedFormat('d F Y') }}</td>
                </tr>
                <tr>
                    <td>Judul Kegiatan</td>
                    <td>:</td>
                    <td>{{ $mbkm->judul }}</td>
                </tr>
            </table>
        </div>
        <br>
        <div style="padding-left: 50px;padding-right:30px;font-size: 15px;">
            <table width="100%" style="text-align:center;border-collapse:collapse;:1px solid black;">
                <tr>
                    <th class="th2" style="padding-top: 32px">No</th>
                    <th colspan="2" class="bord">Mata Kuliah</th>
                    <th class="th2">SKS</th>
                    <th class="th2">W/P</th>
                    <th class="th2">Nilai</th>
                    <th class="th2">Bobot</th>
                    <th class="th2">Nilai SKS</th>
                </tr>
                <tr>
                    <th class="no"></th>
                    <th class="bord">Kode Mata<br>Kuliah</th>
                    <th class="bord">Nama</th>
                    <th class="no"></th>
                    <th class="no"></th>
                    <th class="no"></th>
                    <th class="no"></th>
                    <th class="no"></th>
                </tr>
                @foreach ($konversi as $konver)
                    <tr class="bord">
                        <td class="bord">{{ $loop->iteration }}</td>
                        <td class="bord">{{ $konver->kode_matkul }}</td>
                        <td class="bord">{{ $konver->nama_nilai_matkul }}</td>
                        <td class="bord">{{ $konver->sks }}</td>
                        <td class="bord">{{ $konver->jenis_matkul }}</td>
                        <td class="bord">{{ konversiNilai($konver->nilai_mbkm) }}</td>
                        <td class="bord">4.00</td>
                        <td class="bord">{{ konversiNilai($konver->nilai_mbkm) * $konver->sks }}</td>
                    </tr>
                @endforeach
                <tr style="font-weight: bold;">
                    <td class="no">Jumlah</td>
                    <td class="bot"></td>
                    <td class="bot"></td>
                    <td class="no">{{ $konversi->sum('sks') }}</td>
                    <td class="bot"></td>
                    <td class="bot"></td>
                    <td class="bot"></td>
                    <td class="no"></td>
                </tr>
            </table>
            <strong>
                <p>IP Semester (IPS)
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                </p>
            </strong>
            <br> <br>
            <div class="row">
                <div class="col">
                    <p>Mengetahui <br> Koordinator Program Studi <br> Teknik Informatika</p>
                    <br><br><br>
                    <p>Dr. Feri Candra, ST.,MT <br>NIP. 19740428 200212 1 003</p>
                </div>
                <div class="col"></div>
                <div class="col">
                    <p>Pekanbaru, {{ Carbon::parse($mbkm->update_at)->translatedFormat('d F Y') }} <br>Dosen
                        Pembimbing Lapangan/<br> TIM MBKM Prodi Teknik Informatika
                    </p>
                    <br><br><br>
                    <p>Dr. Feri Candra, ST.,MT<br>NIP. 19740428 200212 1 003</p>
                </div>
            </div>
            <br>
        </div>
        <br><br>
        <div style="padding-left: 50px;padding-right:30px;font-size: 13px;">
            <table width="100%" style="text-align:center;border-collapse:collapse;border:1px solid black;">
                <td>Visi : Menjadi Program Studi Teknik Informatika Terkemuka Berbasis Riset dan Teknologi yang
                    Bermartabat di Kawasan Asia Tenggara pada Tahun 2035.</td>
            </table>
        </div>
    </div>
</body>

</html>
