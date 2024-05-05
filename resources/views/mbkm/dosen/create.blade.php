@extends('layouts.main')

@section('title')
    Upload Sertifikat | SIA ELEKTRO
@endsection

@section('sub-title')
    Upload Sertifikat dan Konversi Nilai
@endsection

@section('content')

<form action="{{route('dosen.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama Singkat</label>
            <input type="text" class="form-control" id="nama_singkat" name="nama_singkat" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">NIM</label>
            <input type="text" class="form-control" id="nip" name="nip" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Roles</label>
            <select class="form-select" aria-label="Default select example" id="role" name="role">
                @foreach ($role as $role)
                <option value="{{ $role->id}}">{{ $role->role_akses }}</option>
                @endforeach

              </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Roles</label>
            <select class="form-select" aria-label="Default select example" id="role" name="role">
                @foreach ($prodi as $prodi)
                <option value="{{ $prodi->id}}">{{ $prodi->nama_prodi }}</option>
                @endforeach

              </select>
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
            <input type="checkbox" style="margin-left: 1px" class="form-check-input" id="exampleCheck1" onclick="myFunction()">
            <label class="form-check-label" style="margin-left: 20px" >Show Password</label>
        </div>
        <div class="mb-5 mt-3 float-right">
            <div class="row row-cols-2">
                <div class="col">
                 <a href="{{ route('user.index') }}"><button type="button" class="btn btn-danger " data-bs-toggle="tooltip" title="Tolak" >Cancel</button></a>
            </div>
            <div class="col">
                    <button type="submit" class="btn btn-success ">Create</i></button>
            </div>
          </div>
</div>
</form>

<script>
    function myFunction() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
@endsection

