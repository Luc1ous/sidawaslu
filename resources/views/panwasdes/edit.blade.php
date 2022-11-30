@extends('base.main', ['title' => 'Edit Data Panwasdes'])
@section('content')
    <div class="card">
      <div class="card-header">
        <h3>Edit Data Panwasdes</h3>
      </div>
      <div class="card-body">
        <form action="/panwasdes/{{ $tahun }}/{{ $pengawas->id }}/update" method="POST">
          @csrf
          @method('POST')
          <div class="row g-2 mb-3">
            <div class="col">
              <label for="defaultFormControlInput" class="form-label">Nama Lengkap</label>
              <input type="text" name="nama" class="form-control @error('nama') is-invalid
              @enderror" id="defaultFormControlInput" value="{{ $pengawas->nama }}" aria-describedby="defaultFormControlHelp"
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
              @enderror" id="defaultFormControlInput" value="{{ $pengawas->kecamatan }}" aria-describedby="defaultFormControlHelp"
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
              @enderror" id="defaultFormControlInput" value="{{ $pengawas->kelurahan }}" aria-describedby="defaultFormControlHelp"
              value="{{ old('kelurahan') }}"/>
              @error('kelurahan')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
            </div>
            <div class="col">
              <label for="defaultFormControlInput" class="form-label">Jabatan</label>
              <input type="text" name="jabatan" class="form-control @error('jabatan') is-invalid
              @enderror" id="defaultFormControlInput" value="{{ $pengawas->jabatan }}" aria-describedby="defaultFormControlHelp"
              value="{{ old('jabatan') }}"/>
              @error('jabatan')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
            </div>
          </div>
          <div class="row g-2 mb-3">
            <div class="col">
              <label for="defaultFormControlInput" class="form-label">Tempat Tanggal Lahir</label>
              <input type="text" name="ttl" class="form-control @error('ttl') is-invalid
              @enderror" id="defaultFormControlInput" value="{{ $pengawas->ttl }}" aria-describedby="defaultFormControlHelp"
              value="{{ old('ttl') }}"/>
              @error('ttl')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
            </div>
            <div class="col">
              <label for="defaultFormControlInput" class="form-label">Jenis Kelamin</label>
              <select class="form-select" name="jenis_kelamin">
                <option value="Laki - Laki" {{ $pengawas->jenis_kelamin == 'Laki - Laki' ? 'selected' : '' }}>Laki - Laki</option>
                <option value="Perempuan" {{ $pengawas->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
              </select>
            </div>
          </div>

          <div class="row g-2 mb-3">
            <div class="col">
              <label for="defaultFormControlInput" class="form-label">Agama</label>
              <input type="text" name="agama" class="form-control @error('agama') is-invalid
              @enderror" id="defaultFormControlInput" value="{{ $pengawas->agama }}" aria-describedby="defaultFormControlHelp"
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
                <option value="Tidak" {{ $pengawas->disabilitas == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                <option value="Ya" {{ $pengawas->disabilitas == 'Ya' ? 'selected' : '' }}>Ya</option>
              </select>
            </div>
          </div>

          <div class="row g-2 mb-3">
            <div class="col">
              <label for="defaultFormControlInput" class="form-label">Pekerjaan</label>
              <input type="text" name="pekerjaan" class="form-control @error('pekerjaan') is-invalid
              @enderror" id="defaultFormControlInput" value="{{ $pengawas->pekerjaan }}" aria-describedby="defaultFormControlHelp"
              value="{{ old('pekerjaan') }}"/>
              @error('pekerjaan')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
            </div>
            <div class="col">
              <label for="defaultFormControlInput" class="form-label">Alamat</label>
              <input type="text" name="alamat" class="form-control @error('alamat') is-invalid
              @enderror" id="defaultFormControlInput" value="{{ $pengawas->alamat }}" aria-describedby="defaultFormControlHelp"
              value="{{ old('alamat') }}"/>
              @error('alamat')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
            </div>
          </div>

          <div class="row g-2 mb-3">  
            <div class="col">
              <label for="defaultFormControlInput" class="form-label">No HP</label>
              <input type="text" name="nomor_hp" class="form-control @error('nomor_hp') is-invalid
              @enderror" id="defaultFormControlInput" value="{{ $pengawas->nomor_hp }}" aria-describedby="defaultFormControlHelp"
              value="{{ old('nomor_hp') }}"/>
              @error('nomor_hp')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
            </div>
          </div>
          <div class="col">
            <label for="defaultFormControlInput" class="form-label">Pengalaman Kepemiluan</label>
            <textarea id="basic-default-message" name="pengalaman_kepemiluan" class="form-control" style="height: 100px">{{ $pengawas->pengalaman_kepemiluan }}</textarea>
          </div>

          <div class="mt-3">
            <button type="submit" class="btn btn-sm btn-success">Simpan</button>
            <a href="/panwasdes/{{ $tahun }}" class="btn btn-sm btn-secondary">Kembali</a>
          </div>
        </form>
      </div>
    </div>
@endsection