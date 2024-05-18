@extends('layouts.main')

@php
    $auth = Auth::guard('mahasiswa');
@endphp
@section('title')
    Upload Sertifikat | SIA ELEKTRO
@endsection

@section('sub-title')
    Upload Sertifikat dan Konversi Nilai
@endsection

@section('content')
    <div class="container-fluid">
        <a href="{{ route('mbkm') }}" class="badge bg-success p-2 mb-3 "> Kembali </a>
    </div>
    <form action="{{ route('mbkm.sertif.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="dokumen-card">
            <h2>Sertifikat dan Konversi Nilai</h2>
            <div class="divider-green"></div>
            <div class="d-flex flex-column gap-3">
                @if ($sertifikat)
                    <div class="d-flex flex gap-2">
                        <div>
                            <a target="_blank" href="{{ asset('storage/' . $sertifikat->file) }}"
                                class="btn-outline-success btn px-5 rounded-2">Lihat Sertifikat</a>
                        </div>
                        <button type="button" class="btn text-warning" title="Ubah Sertifikat" id="edit-sertif">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                    </div>
                    <div class="row d-none" id="edit-sertif-card">
                        <div class="col-6-lg">
                            <div class="mb-3">
                                <div class="d-flex justify-content-between">
                                    <label for="file" class="form-label">Ubah Sertifikat</label>
                                    <span type="button" class="text-secondary pointer" id="cancel-edit">
                                        <i class="fa-solid fa-circle-xmark"></i>
                                    </span>
                                </div>
                                <input type="hidden" value="{{ $mbkmId }}" name="mbkm_id">
                                <input class="form-control @error('file') is-invalid @enderror" type="file"
                                    accept=".jpg, .png, .pdf" id="file" name="file">
                            </div>
                        </div>
                    </div>
                @else
                    <div class="row">
                        <div class="col-6-lg">
                            <div class="mb-3">
                                <label for="file" class="form-label">Sertifikat</label>
                                <input type="hidden" value="{{ $mbkmId }}" name="mbkm_id">
                                <input class="form-control @error('file') is-invalid @enderror" type="file"
                                    accept=".jpg, .png, .pdf" id="file" name="file">
                            </div>
                        </div>
                    </div>
                @endif

            </div>
            <label>Konversi Nilai</label>
            <table class="table table-responsive-lg table-bordered table-striped" width="100%">
                <thead class="table-dark">
                    <tr>
                        <th class="text-center" scope="col">NO</th>
                        <th class="text-center" scope="col">Mata Kuliah Yang Di Konversi (UNRI)</th>
                        <th class="text-center" scope="col">Kriteria Penilaian MBKM</th>
                        <th class="text-center" scope="col">Nilai MBKM</th>
                        <th class="text-center" scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody id="body-table">
                    @foreach ($konversi as $kr)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $kr->nama_nilai_matkul }}</td>
                            <td class="text-center">{{ $kr->nama_nilai_mbkm }}</td>
                            <td class="text-center">{{ $kr->nilai_mbkm }}</td>
                            <td class="text-center">
                                <div>
                                    <button type="button" data-id="{{ $kr->id }}"
                                        class="badge btn btn-danger p-1.5 mb-2 delete-konversi"><i
                                            class="fas fa-times"></i></button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center" id="btnAddKonversiContainer">
                <button id="btnAddKonversi" type="button"
                    class="text-secondary btn-text text-center success d-flex align-items-center gap-1">
                    <div><i class="fa-solid fa-plus"></i></div>
                    <div>Konversi</div>
                </button>
            </div>
        </div>
        <div class="d-flex justify-content-end mt-5">
            <button type="submit" class="btn btn-success rounded-2 px-5">Kirim</button>
        </div>
    </form>
@endsection

@push('scripts')
    <script>
        const bodyTable = $("#body-table");
        const btnAddKonversi = $("#btnAddKonversi")
        var no = @json($konversi).length
        const matkul = @json($matkul);
        const options = matkul.map(mk => `<option value="${mk.id}">${mk.mk}</option>`).join('');

        function createRow(matkul = "", nama_nilai_mbkm = "", nilai_mbkm = "") {
            const row = $(`<tr>
                        <td class="text-center">${no}</td>
                        <td class="text-center">   
                            <select id="matkul" name="konversi[${no}][matkul]" class="form-select" required>
                                <option value="" selected>- Pilih Mata Kuliah -</option>
                                ${options}
                            </select>
                        </td>
                        <td class="text-center">
                            <input type="text" name="konversi[${no}][nama_nilai_mbkm]" class="form-control" required/>  
                        </td>
                        <td class="text-center">
                            <input type="number" name="konversi[${no}][nilai_mbkm]" class="form-control" required/>
                        </td>
                        
                    </tr>`)
            const btnDelete = $(`<button class="badge btn btn-danger p-1.5 mb-2">
                                        <i class="fas fa-times"></i>
                                    </button>`)
            btnDelete.click(e => row.remove())

            const cellAksi = $(`<td class="text-center"></td>`).append(btnDelete)
            return row.append(cellAksi)
        }

        btnAddKonversi.click(e => {
            no++
            bodyTable.append(createRow())
        })
    </script>
    <script>
        $(".delete-konversi").click(e => {
            const id = $(e.currentTarget).data("id");
            Swal.fire({
                title: 'Hapus Konversi',
                text: 'Lanjutkan Penghapusan?',
                icon: 'question',
                showCancelButton: true,
                cancelButtonText: 'Batal',
                confirmButtonText: 'Ya',
                confirmButtonColor: '#28a745'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = `/mbkm/sertifikat/create/${id}/delete`
                }
            })
        })
        const editSertifCard = $("#edit-sertif-card")
        $("#edit-sertif").click(e => {
            editSertifCard.removeClass("d-none")
        })
        $("#cancel-edit").click(e => {
            editSertifCard.addClass("d-none")
        })
    </script>
@endpush
