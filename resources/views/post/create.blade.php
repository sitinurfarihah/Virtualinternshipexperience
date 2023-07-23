@extends('template')
@section('createpost')
    <div class="container">
      <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <button type="submit" class="btn btn-primary mb-3">Submit</button>
            <div class="mb-3">
              <label class="form-label">Judul</label>
              <input type="text" class="form-control" id="" name="judul">
            </div>
            <div class="mb-3">
                <label class="form-label">Isi</label>
                <input type="text" class="form-control" id="" name="isi">
              </div>
              <div class="mb-3">
                <label class="form-label">Tanggal</label>
                <input type="date" class="form-control" id="" name="tanggal">
              </div>
              <div class="mb-3">
                  <label class="form-label">Penulis</label>
                  <input type="text" class="form-control" id="" name="penulis">
              </div>
              <div class="mb-3">
                <select class="form-select mb-3" name="kategoris_id">
                  <option selected>kategori</option>
                  @foreach ($kategori as $kat)
                      <option value="{{ $kat->id }}">{{ $kat->namakategori }}</option>
                  @endforeach>
            </div> 
            
          </form>
    </div>
@endsection