@extends('template')
@section('createkat')
    <div class="container">
        <form action="{{ route('kategori.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label class="form-label">Nama</label>
              <input type="text" class="form-control" id="" name="namakategori">
            </div>
            <div class="mb-3">
                <label class="form-label">Dskripsi</label>
                <input type="text" class="form-control" id="" name="desckategori">
              </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
@endsection