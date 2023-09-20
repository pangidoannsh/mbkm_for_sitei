@extends('layouts.main')

@section('title')
    Daftar KP | SIA ELEKTRO
@endsection

@section('sub-title')
    Pendaftaran Kerja Praktek
@endsection

@section('content')

@foreach ($pendaftaran_kp as $kp)

<form action="/balasankp/create/{{$kp->id}}" method="POST" enctype="multipart/form-data">
@method('put')
        @csrf
    <div>
    <div class="row ">

    <div class="col-12">

    <div class="mb-3">
            <label for="formFile" class="form-label">Surat Balasan Perusahaan  <small class="text-secondary">( Format .pdf .jpeg .png .jpg | Maks. 200 KB ) </small></label>
            <input name="surat_balasan" class="form-control @error ('surat_balasan') is-invalid @enderror" value="{{ old('surat_balasan') }}" type="file" id="formFile" required autofocus>

            @error('surat_balasan')
              <div class="invalid-feedback">
                  {{$message}}
              </div>
            @enderror
    </div>
                
        <div class="mb-3 field">
            <label class="form-label">Tanggal Mulai KP</label>
            <input type="date" name="tanggal_mulai" class="form-control @error('tanggal_mulai') is-invalid @enderror" value="{{ old('tanggal_mulai') }}" required>
            @error('tanggal_mulai')
              <div class="invalid-feedback">
                  {{$message}}
              </div>
            @enderror
        </div>

        


        <button type="submit" class="btn btn-success  mt-4 float-end">Kirim</button>

                   
            </div>
          
        </div>
    </div>
</form>



@endforeach
@endsection