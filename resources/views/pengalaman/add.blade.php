@extends('base.main', ['title' => 'Add Pengalaman'])
@section('content')
    <div class="card">
      <div class="card-header">
        <h3>Tambah Pengalaman Kepemiluan</h3>
      </div>
      <div class="card-body">
        <div class="col-8">
          <form action="/pengalaman/add" method="POST">
            @csrf
            <label for="pengalaman" class="form-label">Pengalaman Kepemiluan</label>
            <input type="text" name="pengalaman" class="form-control @error('pengalaman') is-invalid @enderror" placeholder="Pengalaman Kepemiluan" value="{{ old('pengalaman') }}" autocomplete="off">
            @error('pengalaman')
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