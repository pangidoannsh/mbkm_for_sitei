@extends('layouts.main')

@section('title')
    Profil Mahasiswa | SIA ELEKTRO
@endsection

@section('sub-title')
    Profil Mahasiswa
@endsection

@section('content')
@if (session()->has('message'))
<div class="alert alert-success alert-dismissible fade show col-lg-5" role="alert">
  {{session('message')}}
</div>
@endif

    @foreach ($mahasiswas as $mhs)
    
        <div class="card" style="width: 18rem;">
            <img src="{{asset('storage/'. $mhs->gambar)}}" class="card-img-top">
            <div class="card-body">
                <p>NIM : {{$mhs->nim}}</p>
                <p>Nama : {{$mhs->nama}}</p>
                <p>Email : {{$mhs->email}}</p>
                <a href="/profil-mhs/editfotomhs/{{$mhs->id}}" class="btn btn-success">Edit Foto</a>
                <a href="/profil-mhs/editpasswordmhs/{{$mhs->id}}" class="btn btn-primary">Edit Password</a>
            </div>
        </div>

    @endforeach

@endsection

@push('scripts')
<script>
  window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
      $(this).remove(); 
    });
  }, 2000);
</script>
@endpush()