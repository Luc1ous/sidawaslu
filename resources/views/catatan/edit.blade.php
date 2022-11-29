@extends('base.main', ['title' => 'Edit Catatan'])
@section('content')
    <div class="card">
      <div class="card-header">
        <h3>Edit Catatan</h3>
      </div>
      <div class="card-body">
        <form action="/catatan/update/{{ $catatan->id }}" method="POST">
          @csrf
          <div class="col mb-3">
            <label for="defaultFormControlInput" class="form-label">Judul</label>
            <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" id="defaultFormControlInput" placeholder="Judul" value="{{ $catatan->judul }}"/>
            @error('judul')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
            @enderror
          </div>
          <div class="col mb-3">
            <label for="defaultFormControlInput" class="form-label">Catatan</label>
            <textarea type="text" name="catatan" class="form-control @error('catatan') is-invalid @enderror" id="defaultFormControlInput" placeholder="Catatan" style="height: 200px">{{ $catatan->catatan }}</textarea>
            @error('catatan')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
            @enderror
          </div>
          <div class="mt-3">
            <button type="submit" class="btn btn-sm btn-success">Simpan</button>
            <a href="/catatan" class="btn btn-sm btn-secondary">Kembali</a>
          </div>
        </form>
      </div>
    </div>
@endsection