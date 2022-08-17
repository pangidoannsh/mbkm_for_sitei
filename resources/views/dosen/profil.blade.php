@extends('layouts.main')

@section('title')
    Profil Dosen | SIA ELEKTRO
@endsection

@section('sub-title')
    Profil Dosen
@endsection

@section('content')

@if (session()->has('message'))
<div class="alert alert-success alert-dismissible fade show col-lg-5" role="alert">
  {{session('message')}}
</div>
@endif

    @foreach ($dosens as $dosen)
    
        <div class="card" style="width: 18rem;">
            <img src="{{asset('storage/'. $dosen->gambar)}}" class="card-img-top">
            <div class="card-body">
                <p>NIP : {{$dosen->nip}}</p>
                <p>Nama : {{$dosen->nama}}</p>
                <p>Email : {{$dosen->email}}</p>
                <p>Jabatan : 
                  @if ($dosen->role_id === null)
                  <td> - </td>
                  @endif
                  @if($dosen->role_id)
                  <td>{{$dosen->role->role_akses}}</td>
                  @endif
                </p>
                <a href="/profil-dosen/editfotodsn/{{$dosen->id}}" class="btn btn-success">Edit Foto</a>
                <a href="/profil-dosen/editpassworddsn/{{$dosen->id}}" class="btn btn-primary">Edit Password</a>
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