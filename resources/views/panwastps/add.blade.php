@extends('base.main', ['title' => 'Tambah Data Panwas TPS'])
@section('content')
    <div class="card">
      <div class="card-header">
        <h3>Tambah Data Panwas TPS</h3>
      </div>
      <div class="card-body">
        <form action="/panwastps/{{ $tahun }}/store" method="POST">
          @csrf
          @method('POST')
          <div class="row g-2 mb-3">
            <div class="col">
              <label for="defaultFormControlInput" class="form-label">Nama Lengkap</label>
              <input type="text" name="nama" class="form-control @error('nama') is-invalid
              @enderror" id="defaultFormControlInput" placeholder="Nama Lengkap" aria-describedby="defaultFormControlHelp"
              value="{{ old('nama') }}"/>
              @error('nama')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
            </div>
            <div class="col">
              <label for="defaultFormControlInput" class="form-label">Kecamatan</label>
              <input type="text" name="kecamatan" class="form-control @error('kecamatan') is-invalid
              @enderror" id="defaultFormControlInput" placeholder="Kecamatan" aria-describedby="defaultFormControlHelp"
              value="{{ old('kecamatan') }}"/>
              @error('kecamatan')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
            </div>
          </div>
          <div class="row g-2 mb-3">
            <div class="col">
              <label for="defaultFormControlInput" class="form-label">Kelurahan</label>
              <input type="text" name="kelurahan" class="form-control @error('kelurahan') is-invalid
              @enderror" id="defaultFormControlInput" placeholder="Kelurahan" aria-describedby="defaultFormControlHelp"
              value="{{ old('kelurahan') }}"/>
              @error('kelurahan')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
            </div>
            <div class="col">
              <label for="defaultFormControlInput" class="form-label">No TPS</label>
              <input type="text" name="tps" class="form-control @error('tps') is-invalid
              @enderror" id="defaultFormControlInput" placeholder="No TPS" aria-describedby="defaultFormControlHelp"
              value="{{ old('tps') }}"/>
              @error('tps')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
            </div>
          </div>
          <div class="row g-2 mb-3">
            <div class="col">
              <label for="defaultFormControlInput" class="form-label">Tempat Tanggal Lahir</label>
              <input type="text" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid
              @enderror" id="defaultFormControlInput" placeholder="Tempat Tanggal Lahir" aria-describedby="defaultFormControlHelp"
              value="{{ old('tanggal_lahir') }}"/>
              @error('tanggal_lahir')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
            </div>
            <div class="col">
              <label for="defaultFormControlInput" class="form-label">Jenis Kelamin</label>
              <select class="form-select" name="jenis_kelamin">
                <option value="L">Laki - Laki</option>
                <option value="P">Perempuan</option>
              </select>
            </div>
          </div>

          <div class="row g-2 mb-3">
            <div class="col">
              <label for="defaultFormControlInput" class="form-label">Agama</label>
              <input type="text" name="agama" class="form-control @error('agama') is-invalid
              @enderror" id="defaultFormControlInput" placeholder="Agama" aria-describedby="defaultFormControlHelp"
              value="{{ old('agama') }}"/>
              @error('agama')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
            </div>
            <div class="col">
              <label for="defaultFormControlInput" class="form-label">Disabilitas</label>
              <select class="form-select" name="disabilitas" id="exampleFormControlSelect1" aria-label="Default select example">
                <option value="Tidak">Tidak</option>
                <option value="Ya">Ya</option>
              </select>
            </div>
          </div>

          <div class="row g-2 mb-3">  
            <div class="col">
              <label for="defaultFormControlInput" class="form-label">No HP</label>
              <input type="text" name="no_hp" class="form-control @error('no_hp') is-invalid
              @enderror" id="defaultFormControlInput" placeholder="No HP" aria-describedby="defaultFormControlHelp"
              value="{{ old('no_hp') }}"/>
              @error('no_hp')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
            </div>
          </div>

          <div class="mt-3">
            <button type="submit" class="btn btn-sm btn-success">Simpan</button>
            <a href="/panwastps/{{ $tahun }}" class="btn btn-sm btn-secondary">Kembali</a>
          </div>
        </form>
      </div>
    </div>
@endsection