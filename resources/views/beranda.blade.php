@extends('template')

@section('beranda')
<div class="container-fluid m-5">
<table class="table">
    <thead>
        <tr>
        <th scope="col">No.</th>
        <th scope="col">Nama Produk</th>
        <th scope="col">foto</th>
        <th scope="col">Postingan</th>
        <th scope="col">Kategori</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($produk as $no => $po)
        <tr>
          <th>{{ $no+1 }}</th>
          <td>{{ $po->nama }}</td>
          <td>
              <img src="{{asset('storage/'. $po->foto) }}" alt="" width="100px">
            </td>
        @endforeach
        @foreach ($post as $post)
        <td>{{ $po->judul }}</td>
        @endforeach
        @foreach ($kategori as $kat)
        <td>{{ $kat->namakategori }}</td>
        @endforeach
        </tr>
    </tbody>
  </table>
  <a href="{{ url('rekomendasi') }}" class="btn btn-primary mt-5">Menuju Halaman Rekomendasi</a>
</div>
@endsection
