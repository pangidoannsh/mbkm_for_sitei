@extends('layouts.main')

@section('title')
    Tambah Hak Akses | SIA ELEKTRO
@endsection

@section('sub-title')
    Tambah Hak Akses
@endsection

@section('content')

<div class="col-lg-5">
    <form action="{{url ('/role/create')}}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Hak Akses</label>
            <input type="text" name="role_akses" class="form-control @error('role_akses') is-invalid @enderror" value="{{ old('role_akses') }}">
            @error('role_akses')
              <div class="invalid-feedback">
                  {{$message}}
              </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success mb-5">Submit</button>

      </form>
</div>

@endsection