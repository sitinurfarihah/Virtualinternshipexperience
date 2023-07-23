@extends('template')

@section('indexkat')
<div class="container-fluid">
    <a href="{{ route('kategori.create') }}" class="btn btn-primary col-3 mb-3">Tambah</a>
<table class="table">
    <thead>
        <tr>
        <th scope="col">No.</th>
        <th scope="col">Nama</th>
        <th scope="col">Deskripsi</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($kategori as $no => $kat)
        <tr>
          <th>{{ $no+1 }}</th>
          <td>{{ $kat->namakategori }}</td>
          <td>{{ $kat->desckategori }}</td>
          <td>
            <a href="{{ route('kategori.edit', $kat->id) }}" class="btn btn-warning">Edit</a>
            <a href="{{ url('kategori/delete/'. $kat->id) }}" class="btn btn-danger">Delete</a>
          </td>
        </tr>
        @endforeach
    </tbody>
  </table>
</div>
@endsection