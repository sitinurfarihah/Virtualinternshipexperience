@extends('template')
@section('editpost')
    <div class="container">
        <form action="{{ url('post/'. $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-3">
              <label class="form-label">Judul</label>
              <input type="text" class="form-control" id="" name="judul" value="{{ $post->judul }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Isi</label>
                <input type="text" class="form-control" id="" name="isi" value="{{ $post->isi }}">
              </div>
              <div class="mb-3">
                <label class="form-label">Tanggal</label>
                <input type="date" class="form-control" id="" name="tanggal" value="{{ $post->tanggal }}">
              </div>
              <div class="mb-3">
                  <label class="form-label">Penulis</label>
                  <input type="text" class="form-control" id="" name="penulis" value="{{ $post->penulis }}">
                </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
@endsection