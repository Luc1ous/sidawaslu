@extends('base.main', ['title' => 'Edit Data Panwascam'])
@section('content')
    <div class="card">
      <div class="card-header">
        <h3>Edit Data Panwascam</h3>
      </div>
      <div class="card-body">
        <form action="/panwascam/{{ $tahun }}/{{ $pengawas->id }}/update" method="POST">
          @csrf
          <div class="col-6 mb-3">
            <label for="defaultFormControlInput" class="form-label">Tahun</label>
            <input type="text" name="nama" class="form-control" id="defaultFormControlInput" value="{{ $tahun }}" readonly/>
          </div>
          <div class="row g-2 mb-3">
            <div class="col">
              <label for="defaultFormControlInput" class="form-label">Nama Lengkap</label>
              <input type="text" name="nama" class="form-control" id="defaultFormControlInput" value="{{ $pengawas->nama }}" aria-describedby="defaultFormControlHelp"
              />
            </div>
            <div class="col">
              <label for="defaultFormControlInput" class="form-label">Kecamatan</label>
              <input type="text" name="kecamatan" class="form-control" id="defaultFormControlInput" value="{{ $pengawas->kecamatan }}" aria-describedby="defaultFormControlHelp"
              />
            </div>
          </div>
          <div class="row g-2 mb-3">
            <div class="col">
              <label for="defaultFormControlInput" class="form-label">Jabatan</label>
              <input type="text" name="jabatan" class="form-control" id="defaultFormControlInput" value="{{ $pengawas->jabatan }}" aria-describedby="defaultFormControlHelp"
              />
            </div>
            <div class="col">
              <label for="defaultFormControlInput" class="form-label">NIK</label>
              <input type="text" name="nik" class="form-control" id="defaultFormControlInput" value="{{ $pengawas->nik }}" aria-describedby="defaultFormControlHelp"
              />
            </div>
          </div>
          <div class="row g-2 mb-3">
            <div class="col">
              <label for="defaultFormControlInput" class="form-label">Tempat Lahir</label>
              <input type="text" name="tempat_lahir" class="form-control" id="defaultFormControlInput" value="{{ $pengawas->tempat_lahir }}" aria-describedby="defaultFormControlHelp"
              />
            </div>
            <div class="col">
              <label for="defaultFormControlInput" class="form-label">Tanggal Lahir</label>
              <input type="text" name="tanggal_lahir" class="form-control" id="defaultFormControlInput" value="{{ $tanggal_lahir }}" aria-describedby="defaultFormControlHelp"
              />
            </div>
          </div>
          <div class="row g-2 mb-3">
            <div class="col">
              <label for="defaultFormControlInput" class="form-label">Nomor SK</label>
              <input type="text" name="nomor_sk" class="form-control" id="defaultFormControlInput" value="{{ $pengawas->nomor_sk }}" aria-describedby="defaultFormControlHelp"
              />
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
              <input type="text" name="agama" class="form-control" id="defaultFormControlInput" value="{{ $pengawas->agama }}" aria-describedby="defaultFormControlHelp"
              />
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
              <label for="defaultFormControlInput" class="form-label">Pendidikan</label>
              <input type="text" name="pendidikan" class="form-control" id="defaultFormControlInput" value="{{ $pengawas->pendidikan }}" aria-describedby="defaultFormControlHelp"
              />
            </div>
            <div class="col">
              <label for="defaultFormControlInput" class="form-label">Pekerjaan</label>
              <input type="text" name="pekerjaan" class="form-control" id="defaultFormControlInput" value="{{ $pengawas->pekerjaan }}" aria-describedby="defaultFormControlHelp"
              />
            </div>
          </div>
          <div class="row g-2 mb-3">
            <div class="col">
              <label for="defaultFormControlInput" class="form-label">Alamat</label>
              <input type="text" name="alamat" class="form-control" id="defaultFormControlInput" value="{{ $pengawas->alamat }}" aria-describedby="defaultFormControlHelp"
              />
            </div>
            <div class="col">
              <label for="defaultFormControlInput" class="form-label">No HP</label>
              <input type="text" name="nomor_hp" class="form-control" id="defaultFormControlInput" value="{{ $pengawas->nomor_hp }}" aria-describedby="defaultFormControlHelp"
              />
            </div>
          </div>
          {{-- Checkbox Pengalaman Kepemiluan --}}
          <div class="col">
            <label for="defaultFormControlInput" class="form-label">Pengalaman Kepemiluan</label>
            <textarea id="basic-default-message" name="pengalaman_kepemiluan" class="form-control" style="height: 100px">{{ $pengawas->pengalaman_kepemiluan }}</textarea>
          </div>
          
          <div class="mt-3">
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="/panwascam/{{ $tahun }}" class="btn btn-secondary">Kembali</a>
          </div>
        </form>
      </div>
    </div>
@endsection
