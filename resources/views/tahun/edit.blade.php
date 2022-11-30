@extends('base.main', ['title' => 'Edit Tahun'])
@section('content')
  <div class="card">
    <div class="card-header">
      <h3>Edit Tahun</h3>
    </div>
    <div class="card-body">
      <div class="col-8">
        <form action="/tahun/edit/{{ $tahun->id }}" method="POST">
          @csrf
          <label for="tahun" class="form-label">Tahun</label>
          <input type="text" name="tahun" class="form-control @error('tahun') is-invalid @enderror" placeholder="Tahun" value="{{ $tahun->tahun }}" autocomplete="off">
          @error('tahun')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
          <button class="btn btn-sm btn-success my-4" type="submit">Simpan</button>
          <a href="/tahun/delete/{{ $tahun->id }}" class="btn btn-sm btn-danger">Hapus</a>
        </form>
      </div>
    </div>
  </div>
@endsection