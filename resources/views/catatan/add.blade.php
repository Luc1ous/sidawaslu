@extends('base.main', ['title' => 'Add Catatan'])
@section('content')
    <div class="card">
      <div class="card-header">
        <h3>Add Catatan</h3>
      </div>
      <div class="card-body">
        <form action="/catatan/store" method="POST">
          @csrf
          <div class="col mb-3">
            <label for="defaultFormControlInput" class="form-label">Judul</label>
            <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" id="defaultFormControlInput" placeholder="Judul" value="{{ old('judul') }}"/>
            @error('judul')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
            @enderror
          </div>
          <div class="col mb-3">
            <label for="defaultFormControlInput" class="form-label">Catatan</label>
            <textarea type="text" name="catatan" class="form-control @error('catatan') is-invalid @enderror" id="defaultFormControlInput" placeholder="Catatan" value="{{ old('catatan') }}" style="height: 200px"></textarea>
            @error('catatan')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
            @enderror
          </div>
          <div class="mt-3">
            <button type="submit" class="btn btn-sm btn-success">Simpan</button>
          </div>
        </form>
      </div>
    </div>
@endsection