@extends('layouts.main')

@php
    use Carbon\Carbon;
@endphp

@section('title')
    SITEI MBKM | Logbook MBKM
@endsection

@section('sub-title')
    Logbook MBKM | {{ $mbkm->judul }}
@endsection

@section('content')
    @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('message') }}
        </div>
    @endif


    <div class="container-fluid">

        <div class="card p-4">
            <table class="table table-responsive-lg table-bordered table-striped" width="100%" id="unorderer_datatables">
                <thead class="table-dark">
                    <tr>
                        <th class="text-center" scope="col">Bulan</th>
                        <th class="text-center" scope="col">Logbook</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($logbooks as $lb)
                        <tr>
                            <td class="text-center ">{{ Carbon::parse($lb->input_date)->translatedFormat('F Y') }}</td>
                            <td class="text-center ">
                                @if ($lb->file)
                                    <a href="{{ asset('storage/' . $lb->file) }}" target="_blank">Lihat logbook</a>
                                @else
                                    <div class="text-secondary">
                                        <button class="btn btn-outline-success" title="Upload logbook" data-toggle="modal"
                                            data-target="#uploadLogbook{{ $lb->id }}">
                                            <i class="fa-solid fa-upload"></i>
                                            Upload Logbook
                                        </button>
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <div class="modal fade" id="uploadLogbook{{ $lb->id }}" data-backdrop="static"
                            data-keyboard="false" tabindex="-1" aria-labelledby="uploadLogbook{{ $lb->id }}Label"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="uploadLogbookLabel">Upload Logbook:
                                            {{ Carbon::parse($lb->input_date)->translatedFormat('F Y') }}
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('mbkm.logbook.store', $lb->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="file">Logbook <span style="font-size: 12px">(Pdf,
                                                        max:1MB)</span></label>
                                                <input type="file" class="form-control" id="file" name="file">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success float-right mt-4">Kirim</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('footer')
    <section class="bg-dark p-1">
        <div class="container d-flex justify-content-center">
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
