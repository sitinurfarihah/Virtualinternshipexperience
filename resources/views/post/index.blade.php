@extends('template')

@section('indexpost')
<div class="container-fluid">
    <a href="{{ route('post.create') }}" class="btn btn-primary col-2 m-5">Tambah</a>
<table class="table">
    <thead>
        <tr>
        <th scope="col">No.</th>
        <th scope="col">Judul</th>
        <th scope="col">Isi</th>
        <th scope="col">Tanggal</th>
        <th scope="col">Penulis</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($post as $no => $P)
        <tr>
          <th>{{ $no+1 }}</th>
          <td>{{ $P->judul }}</td>
          <td>{{ $P->isi }}</td>
          <td>{{ $P->tanggal }}</td>
          <td>{{ $P->penulis }}</td>
          <td>
            <a href="{{ route('post.edit', $P->id) }}" class="btn btn-warning">Edit</a>
            <a href="{{ url('post/delete/'. $P->id) }}" class="btn btn-danger">Delete</a>
          </td>
        </tr>
        @endforeach
    </tbody>
  </table>
</div>
@endsection