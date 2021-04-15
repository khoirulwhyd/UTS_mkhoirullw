@extends('book.layout')
@section('content')
    <div class="container mt-5">
    <div class="row justify-content-center align-items-center">
    <div class="card" style="width: 24rem;">
    <div class="card-header">
Detail Mahasiswa
</div>
    <div class="card-body">
        <ul class="list-group list-group-flush">
        <li class="list-group-item"><b>ID_Buku : </b>{{$buku->ID_Buku}}</li>
        <li class="list-group-item"><b>Judul : </b>{{$buku->Judul}}</li>
        <li class="list-group-item"><b>Kategori : </b>{{$buku->Kategori}}</li>
        <li class="list-group-item"><b>Penerbit : </b>{{$buku->Penerbit}}</li>
        <li class="list-group-item"><b>Pengarang : </b>{{$buku->Pengarang}}</li>
        <li class="list-group-item"><b>Jumlah : </b>{{$buku->Jumlah}}</li>
        <li class="list-group-item"><b>Status : </b>{{$buku->Status}}</li>
</ul>
</div>
    <a class="btn btn-success mt-3" href="{{ route('book.index') }}">Kembali</a>
        </div>
    </div>
</div>
@endsection