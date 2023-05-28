@extends('base.main', ['title' => 'Edit Data Panwasdes'])
@section('content')
    <div class="card">
      <div class="card-header">
        <h3>Edit Data Panwasdes</h3>
      </div>
      <div class="card-body">
        <form action="/panwasdes/{{ $tahun }}/{{ $pengawas->id }}/update" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="row g-2 mb-3">
            <img src="{{ asset('images/'.$pengawas->foto) }}" alt="" style="width: 100px">
            <div class="col ms-3">
              <label for="foto" class="form-label">Foto</label>
              <input type="file" name="image" accept="image/*" class="form-control @error('image') is-invalid @enderror">
              @error('image')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
          </div>
          <div class="row g-2 mb-3">
            <div class="col">
              <label for="defaultFormControlInput" class="form-label">Nama Lengkap</label>
              <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="defaultFormControlInput" value="{{ old('nama', $pengawas->nama) }}" aria-describedby="defaultFormControlHelp"
              />
              @error('nama')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="col">
              <label for="defaultFormControlInput" class="form-label">Kecamatan</label>
              <input type="text" name="kecamatan" class="form-control @error('kecamatan') is-invalid @enderror" id="defaultFormControlInput" value="{{ old('kecamatan', $pengawas->kecamatan) }}" aria-describedby="defaultFormControlHelp"
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
              <input type="text" name="kelurahan" class="form-control @error('kelurahan') is-invalid @enderror" id="defaultFormControlInput" value="{{ old('kelurahan', $pengawas->kelurahan) }}" aria-describedby="defaultFormControlHelp"
              />
              @error('kelurahan')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="col">
              <label for="defaultFormControlInput" class="form-label">Jabatan</label>
              <input type="text" name="jabatan" class="form-control @error('jabatan') is-invalid @enderror" id="defaultFormControlInput" value="{{ old('jabatan', $pengawas->jabatan) }}" aria-describedby="defaultFormControlHelp"
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
              <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror" id="defaultFormControlInput" value="{{ old('nik', $pengawas->nik) }}" aria-describedby="defaultFormControlHelp"
              />
              @error('nik')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="col">
              <label for="defaultFormControlInput" class="form-label">No TPS</label>
              <input type="text" name="no_tps" class="form-control @error('no_tps') is-invalid @enderror" id="defaultFormControlInput" value="{{ old('no_tps', $pengawas->no_tps) }}" aria-describedby="defaultFormControlHelp"
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
              <input type="text" name="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid @enderror" id="defaultFormControlInput" value="{{ old('tempat_lahir', $pengawas->tempat_lahir) }}" aria-describedby="defaultFormControlHelp"
              />
              @error('tempat_lahir')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="col">
              <label for="defaultFormControlInput" class="form-label">Tanggal Lahir</label>
              <input type="text" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="defaultFormControlInput" value="{{ old('tanggal_lahir', $pengawas->tanggal_lahir) }}" aria-describedby="defaultFormControlHelp"
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
              <input type="text" name="nomor_sk" class="form-control @error('nomor_sk') is-invalid @enderror" id="defaultFormControlInput" value="{{ old('nomor_sk', $pengawas->nomor_sk) }}" aria-describedby="defaultFormControlHelp"
              />
              @error('nomor_sk')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="col">
              <label for="defaultFormControlInput" class="form-label">Tanggal SK</label>
              <input type="text" name="tanggal_sk" class="form-control @error('tanggal_sk') is-invalid @enderror" id="defaultFormControlInput" value="{{ old('tanggal_sk', $pengawas->tanggal_sk) }}" aria-describedby="defaultFormControlHelp"
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
                <option value="L" {{ $pengawas->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki - Laki</option>
                <option value="P" {{ $pengawas->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
              </select>
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
              <label for="defaultFormControlInput" class="form-label">Nomor HP</label>
              <input type="text" name="nomor_hp" class="form-control @error('nomor_hp') is-invalid @enderror" id="defaultFormControlInput" value="{{ old('nomor_hp', $pengawas->nomor_hp) }}" aria-describedby="defaultFormControlHelp"
              />
              @error('nomor_hp')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="col">
              <label for="defaultFormControlInput" class="form-label">Pendidikan</label>
              <input type="text" name="pendidikan" class="form-control @error('pendidikan') is-invalid @enderror" id="defaultFormControlInput" value="{{ old('pendidikan', $pengawas->pendidikan) }}" aria-describedby="defaultFormControlHelp"
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
              <input type="text" name="agama" class="form-control @error('agama') is-invalid @enderror" id="defaultFormControlInput" value="{{ old('agama', $pengawas->agama) }}" aria-describedby="defaultFormControlHelp"
              />
              @error('agama')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="col">
              <label for="defaultFormControlInput" class="form-label">Pekerjaan</label>
              <input type="text" name="pekerjaan" class="form-control @error('pekerjaan') is-invalid @enderror" id="defaultFormControlInput" value="{{ old('pekerjaan', $pengawas->pekerjaan) }}" aria-describedby="defaultFormControlHelp"
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
              >{{ old('alamat', $pengawas->alamat) }}</textarea>
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
              <textarea id="basic-default-message" name="pengalaman_kepemiluan" class="form-control @error('pengalaman_kepemiluan') is-invalid @enderror" style="height: 100px">{{ old('pengalaman_kepemiluan', $pengawas->pengalaman_kepemiluan) }}</textarea>
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
              <textarea type="text" name="catatan" class="form-control @error('catatan') is-invalid @enderror" placeholder="Catatan Khusus">{{ old('catatan', $pengawas->catatan) }}</textarea>
              @error('catatan')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
          </div>
          
          <div class="mt-3">
            <button type="submit" class="btn btn-sm btn-success">Simpan</button>
            <a href="/panwasdes/{{ $tahun }}" class="btn btn-sm btn-secondary">Kembali</a>
          </div>
        </form>
      </div>
    </div>
@endsection