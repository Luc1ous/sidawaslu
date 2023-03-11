@extends('base.main', ['title' => 'Tambah Data Panwascam'])
@section('content')
    <div class="card">
      <div class="card-header">
        <h3>Tambah Data Panwascam</h3>
      </div>
      <div class="card-body">
        <form action="/panwascam/{{ $tahun }}/store" method="POST">
          @csrf
          <div class="row g-2 mb-3">
            <div class="col">
              <label for="defaultFormControlInput" class="form-label">Nama Lengkap</label>
              <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="defaultFormControlInput" aria-describedby="defaultFormControlHelp" value="{{ old('nama') }}"
              />
              @error('nama')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="col">
              <label for="defaultFormControlInput" class="form-label">Kecamatan</label>
              <input type="text" name="kecamatan" class="form-control @error('kecamatan') is-invalid @enderror" id="defaultFormControlInput" aria-describedby="defaultFormControlHelp" value="{{ old('kecamatan') }}"
              />
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
              <input type="text" name="kelurahan" class="form-control @error('kelurahan') is-invalid @enderror" id="defaultFormControlInput" aria-describedby="defaultFormControlHelp" value="{{ old('kelurahan') }}"
              />
              @error('kelurahan')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="col">
              <label for="defaultFormControlInput" class="form-label">Jabatan</label>
              <input type="text" name="jabatan" class="form-control @error('jabatan') is-invalid @enderror" id="defaultFormControlInput" aria-describedby="defaultFormControlHelp" value="{{ old('jabatan') }}"
              />
              @error('jabatan')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
          </div>
          <div class="row g-2 mb-3">
            <div class="col">
              <label for="defaultFormControlInput" class="form-label">NIK</label>
              <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror" id="defaultFormControlInput" aria-describedby="defaultFormControlHelp" value="{{ old('nik') }}"
              />
              @error('nik')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="col">
              <label for="defaultFormControlInput" class="form-label">No TPS</label>
              <input type="text" name="no_tps" class="form-control @error('no_tps') is-invalid @enderror" id="defaultFormControlInput" aria-describedby="defaultFormControlHelp" value="{{ old('no_tps') }}"
              />
              @error('no_tps')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
          </div>
          <div class="row g-2 mb-3">
            <div class="col">
              <label for="defaultFormControlInput" class="form-label">Tempat Lahir</label>
              <input type="text" name="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid @enderror" id="defaultFormControlInput" aria-describedby="defaultFormControlHelp" value="{{ old('tempat_lahir') }}"
              />
              @error('tempat_lahir')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="col">
              <label for="defaultFormControlInput" class="form-label">Tanggal Lahir</label>
              <input type="date" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="defaultFormControlInput" aria-describedby="defaultFormControlHelp" value="{{ old('tanggal_lahir') }}"
              />
              @error('tanggal_lahir')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
          </div>
          <div class="row g-2 mb-3">
            <div class="col">
              <label for="defaultFormControlInput" class="form-label">Nomor SK</label>
              <input type="text" name="nomor_sk" class="form-control @error('nomor_sk') is-invalid @enderror" id="defaultFormControlInput" aria-describedby="defaultFormControlHelp" value="{{ old('nomor_sk') }}"
              />
              @error('nomor_sk')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="col">
              <label for="defaultFormControlInput" class="form-label">Tanggal SK</label>
              <input type="text" name="tanggal_sk" class="form-control @error('tanggal_sk') is-invalid @enderror" id="defaultFormControlInput" aria-describedby="defaultFormControlHelp" value="{{ old('tanggal_sk') }}"
              />
              @error('tanggal_sk')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
          </div>
          <div class="row g-2 mb-3">
            <div class="col">
              <label for="defaultFormControlInput" class="form-label">Jenis Kelamin</label>
              <select class="form-select" name="jenis_kelamin">
                <option value="Laki - Laki">Laki - Laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
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
              <label for="defaultFormControlInput" class="form-label">Nomor HP</label>
              <input type="text" name="nomor_hp" class="form-control @error('nomor_hp') is-invalid @enderror" id="defaultFormControlInput" aria-describedby="defaultFormControlHelp" value="{{ old('nomor_hp') }}"
              />
              @error('nomor_hp')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="col">
              <label for="defaultFormControlInput" class="form-label">Pendidikan</label>
              <input type="text" name="pendidikan" class="form-control @error('pendidikan') is-invalid @enderror" id="defaultFormControlInput" aria-describedby="defaultFormControlHelp" value="{{ old('pendidikan') }}"
              />
              @error('pendidikan')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
          </div>
          <div class="row g-2 mb-3">
            <div class="col">
              <label for="defaultFormControlInput" class="form-label">Agama</label>
              <input type="text" name="agama" class="form-control @error('agama') is-invalid @enderror" id="defaultFormControlInput" aria-describedby="defaultFormControlHelp" value="{{ old('agama') }}"
              />
              @error('agama')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="col">
              <label for="defaultFormControlInput" class="form-label">Pekerjaan</label>
              <input type="text" name="pekerjaan" class="form-control @error('pekerjaan') is-invalid @enderror" id="defaultFormControlInput" aria-describedby="defaultFormControlHelp" value="{{ old('pekerjaan') }}"
              />
              @error('pekerjaan')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
          </div>
          <div class="row g-2 mb-3">
            <div class="col">
              <label for="defaultFormControlInput" class="form-label">Alamat</label>
              <textarea type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="defaultFormControlInput" aria-describedby="defaultFormControlHelp"
              >{{ old('alamat') }}</textarea>
              @error('alamat')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
          </div>
          
          <div class="row g-2 mb-3">
            <div class="col">
              <label for="defaultFormControlInput" class="form-label">Pengalaman Kepemiluan</label>
              <textarea id="basic-default-message" name="pengalaman_kepemiluan" class="form-control @error('pengalaman_kepemiluan') is-invalid @enderror" style="height: 100px">{{ old('pengalaman_kepemiluan') }}</textarea>
              @error('pengalaman_kepemiluan')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
          </div>

          <div class="row g-2 mb-3">
            <div class="col">
              <label for="defaultFormControlInput" class="form-label">Catatan Khusus</label>
              <textarea type="text" name="catatan" class="form-control @error('catatan') is-invalid @enderror" placeholder="Catatan Khusus" value="{{ old('catatan') }}">{{ old('catatan') }}</textarea>
              @error('catatan')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
          </div>

          <div class="mt-3">
            <button type="submit" class="btn btn-sm btn-success">Simpan</button>
            <a href="/panwascam/{{ $tahun }}" class="btn btn-sm btn-secondary">Kembali</a>
          </div>
        </form>
      </div>
    </div>
@endsection