@extends('doc.main-layout')

@php
    use Carbon\Carbon;
    if (!str_contains($mbkm->rincian_link, 'https:')) {
        $link = 'https://' . $mbkm->rincian_link;
    } else {
        $link = $mbkm->rincian_link;
    }
@endphp

@section('title')
    SITEI MBKM | Konversi Nilai MBKM
@endsection

@section('sub-title')
    Konversi Nilai MBKM Mahasiswa
@endsection

@section('content')
    <a href="{{ url()->previous() }}" class="badge bg-success p-2 mb-3 "> Kembali </a>
    <section class="row pb-5">

        <form action="{{ route('mbkm.prodi.approvekonversi', $mbkm->id) }}" method="POST" class="col-lg-12"
            id="setujui-konversi">
            @csrf
            <table class="table table-responsive-lg table-bordered table-striped" width="100%">
                <thead class="table-dark">
                    <tr>
                        <th class="text-center" scope="col">NO</th>
                        <th class="text-center" scope="col">Mata Kuliah Yang Di Konversi (UNRI)</th>
                        <th class="text-center" scope="col">Kriteria Penilaian MBKM</th>
                        <th class="text-center" scope="col">Nilai MBKM</th>
                        <th class="text-center" scope="col">Nilai Disetujui</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($konversi as $kr)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $kr->nama_nilai_matkul }}</td>
                            <td class="text-center">{{ $kr->nama_nilai_mbkm }}</td>
                            <td class="text-center">{{ $kr->nilai_mbkm }}</td>
                            <td class="text-center">
                                <input type="number" class="form-control" name="nilai_disetujui[{{ $kr->id }}]"
                                    required />
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-end">
                <button class="btn btn-success px-5 py-2 rounded-2">Setujui Konversi</button>
            </div>
        </form>
        {{-- Section Kanan --}}
        <div class="col-lg-4">

        </div>
    </section>
@endsection

@section('footer')
    <section class="bg-dark p-1">
        <div class="container">
            <p class="developer">Dikembangkan oleh Prodi Teknik Informatika UNRI
                (
                <a class="text-success fw-bold" href="https://pangidoannsh.vercel.app" target="_blank">
                    Muhammad Abdullah Qosim
                </a>,
                <a class="text-success fw-bold" href="https://pangidoannsh.vercel.app" target="_blank">
                    Ilmi Fajar Ramadhan
                </a>,dan
                <a class="text-success fw-bold" href="https://pangidoannsh.vercel.app" target="_blank">
                    Fitra Ramadhan
                </a>
                )
            </p>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $("#setujui-konversi").submit(e => {
            const form = $(this).closest("form");
            e.preventDefault();
            Swal.fire({
                title: 'Persetujuan Konversi Nilai',
                text: 'Lanjutkan Persetujuan?',
                icon: 'question',
                showCancelButton: true,
                cancelButtonText: 'Batal',
                confirmButtonText: 'Setujui',
                confirmButtonColor: '#28a745'
            }).then((result) => {
                if (result.isConfirmed) {
                    e.currentTarget.submit()
                }
            })
        })
        $("#pengunduran-diri").submit((e) => {
            const form = $(this).closest("form");
            e.preventDefault();
            Swal.fire({
                title: 'Usulan Pengunduran Diri',
                text: 'Setujui Usulan Pengunduran Diri?',
                icon: 'question',
                showCancelButton: true,
                cancelButtonText: 'Batal',
                confirmButtonText: 'Setujui',
                confirmButtonColor: '#dc3545'
            }).then((result) => {
                if (result.isConfirmed) {
                    e.currentTarget.submit()
                }
            })
        })

        function tolakUsulanmbkmKaprodi() {
            Swal.fire({
                title: 'Tolak Usulan MBKM',
                text: 'Apakah Anda Yakin?',
                icon: 'question',
                showCancelButton: true,
                cancelButtonText: 'Batal',
                confirmButtonText: 'Tolak',
                confirmButtonColor: '#dc3545'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: 'Tolak Usulan MBKM',
                        html: `
                        <form id="reasonForm" action="/prodi/tolakusulan/{{ $mbkm->id }}" method="POST">
                        @method('put')
                            @csrf
                            <label for="catatan">Alasan Penolakan :</label>
                            <textarea class="form-control" id="catatan" name="catatan" rows="4" cols="50" required></textarea>
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

        function tolakUsulankonversiKaprodi() {
            Swal.fire({
                title: 'Tolak Konversi MBKM',
                text: 'Apakah Anda Yakin?',
                icon: 'question',
                showCancelButton: true,
                cancelButtonText: 'Batal',
                confirmButtonText: 'Tolak',
                confirmButtonColor: '#dc3545'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: 'Tolak Usulan MBKM',
                        html: `
                        <form id="reasonForm" action="/prodi/tolakkonversi/{{ $mbkm->id }}" method="POST">
                        @method('put')
                            @csrf
                            <label for="catatan">Alasan Penolakan :</label>
                            <textarea class="form-control" id="catatan" name="catatan" rows="4" cols="50" required></textarea>
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
@endpush()