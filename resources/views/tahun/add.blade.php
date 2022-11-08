@extends('base.main', ['title' => 'Add Tahun'])
@section('content')
    <div class="card">
      <div class="card-header">
        <h3>Tambah Tahun</h3>
      </div>
      <div class="card-body">
        <div class="col-8">
          <form action="/tahun/add" method="POST">
            @csrf
            <label for="tahun" class="form-label">Tahun</label>
            <input type="text" name="tahun" class="form-control @error('tahun') is-invalid @enderror" placeholder="Tahun" value="{{ old('tahun') }}" autocomplete="off">
            @error('tahun')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
            <button class="btn btn-success my-4" type="submit">Tambah</button>
          </form>
        </div>
      </div>
    </div>
@endsection