@extends('base.main', ['title' => 'Edit Pengalaman'])
@section('content')
  <div class="card">
    <div class="card-header">
      <h3>Edit Pengalaman Kepemiluan</h3>
    </div>
    <div class="card-body">
      <div class="col-8">
        <form action="/pengalaman/edit/{{ $pengalaman->id }}" method="POST">
          @csrf
          <label for="pengalaman" class="form-label">Pengalaman Kepemiluan</label>
          <input type="text" name="pengalaman" class="form-control @error('pengalaman') is-invalid @enderror" placeholder="Pengalaman Kepemiluan" value="{{ $pengalaman->pengalaman }}" autocomplete="off">
          @error('pengalaman')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
          <button class="btn btn-success my-4" type="submit">Simpan</button>
          <a href="/pengalaman/delete/{{ $pengalaman->id }}" class="btn btn-danger">Hapus</a>
        </form>
      </div>
    </div>
  </div>
@endsection