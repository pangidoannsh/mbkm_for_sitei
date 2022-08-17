@extends('layouts.main')

@section('title')
    Tambah Dosen | SIA ELEKTRO
@endsection

@section('sub-title')
    Tambah Dosen
@endsection

@section('content')

<div class="col-lg-5">
    <form action="{{url ('/dosen/create')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label">NIP</label>
            <input type="text" name="nip" class="form-control @error('nip') is-invalid @enderror" value="{{ old('nip') }}">
            @error('nip')
              <div class="invalid-feedback">
                  {{$message}}
              </div>
            @enderror
        </div>  

        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}">
            @error('nama')
              <div class="invalid-feedback">
                  {{$message}}
              </div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
            @error('email')
              <div class="invalid-feedback">
                  {{$message}}
              </div>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="prodi_id" class="form-label">Program Studi</label>
            <select name="prodi_id" class="form-select @error('prodi_id') is-invalid @enderror">
                <option value="">-Pilih-</option>
                @foreach ($prodis as $prodi)
                    <option value="{{$prodi->id}}" {{old('prodi_id') == $prodi->id ? 'selected' : null}}>{{$prodi->nama_prodi}}</option>
                @endforeach
            </select>
            @error('prodi_id')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}">
            @error('password')
              <div class="invalid-feedback">
                  {{$message}}
              </div>
            @enderror
        </div> 

        <div class="mb-3">
            <label for="role_id" class="form-label">Status</label>
            <select name="role_id" class="form-select @error('role_id') is-invalid @enderror">
                <option value="">-Pilih-</option>
                @foreach ($roles as $role)
                    <option value="{{$role->id}}" {{old('role_id') == $role->id ? 'selected' : null}}>{{$role->role_akses}}</option>
                @endforeach
            </select>
            @error('role_id')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="imgdosen" class="form-label">Foto Dosen</label>
            <img class="img-preview-dsn img-fluid mb-3 col-sm-5">
            <input class="form-control @error('gambar') is-invalid @enderror" type="file" id="imgdosen" name="gambar" onchange="previewImgdosen()">
            @error('gambar')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-outline-dark mb-5">Submit</button>

      </form>
</div>

@endsection

@push('scripts')
<script>

    function previewImgdosen(){

        const imagedosen = document.querySelector('#imgdosen');
        const imgPreviewdsn = document.querySelector('.img-preview-dsn');

        imgPreviewdsn.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(imagedosen.files[0]);

        oFReader.onload = function(oFREvent){
            imgPreviewdsn.src = oFREvent.target.result;            
        }

    }

</script>
@endpush()