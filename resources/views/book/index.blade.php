@extends('book.layout')
    @section('content')
    <div class="row">
    <div class="col-lg-12 margin-tb">
    <div class="pull-left mt-2">
        <h2>SISTEM INFORMASI BUKU</h2>
        <!-- Form Search -->
        <div class="float-left my-2">
                <form action="{{ route('book.index') }}" method="GET">
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" name="search" placeholder="Search...">
                        <span class="input-group-btn">
                            <button class="btn btn-secondary" type="submit"><i class="fa fa-search"></i> Cari</button>
                        </span>
                    </div>
                </form>
            </div>
            <!-- End Form Search -->
    </div>
    <div class="float-right my-2">
        <a class="btn btnsuccess" href="{{ route('book.create') }}"> Input Buku</a>
        </div>
    </div>
</div>
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif<table class="table table-bordered">
    <tr>
        <th>ID Buku</th>
        <th>Judul</th>
        <th>Kategori</th>
        <th>Penerbit</th>
        <th>Pengarang</th>
        <th>Jumlah</th>
        <th>Status</th>
        <th width="280px">Action</th>
    </tr>
@foreach ($book as $buku)
    <tr>
        <td>{{ $buku->ID_Buku }}</td>
        <td>{{ $buku->Judul }}</td>
        <td>{{ $buku->Kategori }}</td>
        <td>{{ $buku->Penerbit }}</td>
        <td>{{ $buku->Pengarang }}</td>
        <td>{{ $buku->Jumlah }}</td>
        <td>{{ $buku->Status }}</td>
        <td>
        <form action="{{ route('book.destroy',$buku->ID_Buku) }}" method="POST">
        <a class="btn btn-info" href="{{ route('book.show',$buku->ID_Buku) }}">Show</a>
        <a class="btn btn-primary" href="{{ route('book.edit',$buku->ID_Buku) }}">Edit</a>
@csrf
@method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </td>
</tr>
@endforeach
</table>
<div class="d-flex justify-content-center">
    {{$book->links()}}
</div>
@endsection