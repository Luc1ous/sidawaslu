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
              <input type="text" name="nama" class="form-control" id="defaultFormControlInput" aria-describedby="defaultFormControlHelp"
              />
            </div>
            <div class="col">
              <label for="defaultFormControlInput" class="form-label">Kecamatan</label>
              <input type="text" name="kecamatan" class="form-control" id="defaultFormControlInput" aria-describedby="defaultFormControlHelp"
              />
            </div>
          </div>
          <div class="row g-2 mb-3">
            <div class="col">
              <label for="defaultFormControlInput" class="form-label">Kelurahan</label>
              <input type="text" name="kelurahan" class="form-control" id="defaultFormControlInput" aria-describedby="defaultFormControlHelp"
              />
            </div>
            <div class="col">
              <label for="defaultFormControlInput" class="form-label">Jabatan</label>
              <input type="text" name="jabatan" class="form-control" id="defaultFormControlInput" aria-describedby="defaultFormControlHelp"
              />
            </div>
          </div>
          <div class="row g-2 mb-3">
            <div class="col">
              <label for="defaultFormControlInput" class="form-label">NIK</label>
              <input type="text" name="nik" class="form-control" id="defaultFormControlInput" aria-describedby="defaultFormControlHelp"
              />
            </div>
            <div class="col">
              <label for="defaultFormControlInput" class="form-label">No TPS</label>
              <input type="text" name="no_tps" class="form-control" id="defaultFormControlInput" aria-describedby="defaultFormControlHelp"
              />
            </div>
          </div>
          <div class="row g-2 mb-3">
            <div class="col">
              <label for="defaultFormControlInput" class="form-label">Tempat Lahir</label>
              <input type="text" name="tempat_lahir" class="form-control" id="defaultFormControlInput" aria-describedby="defaultFormControlHelp"
              />
            </div>
            <div class="col">
              <label for="defaultFormControlInput" class="form-label">Tanggal Lahir</label>
              <input type="date" name="tanggal_lahir" class="form-control" id="defaultFormControlInput" aria-describedby="defaultFormControlHelp"
              />
            </div>
          </div>
          <div class="row g-2 mb-3">
            <div class="col">
              <label for="defaultFormControlInput" class="form-label">Nomor SK</label>
              <input type="text" name="nomor_sk" class="form-control" id="defaultFormControlInput" aria-describedby="defaultFormControlHelp"
              />
            </div>
            <div class="col">
              <label for="defaultFormControlInput" class="form-label">Tanggal SK</label>
              <input type="text" name="tanggal_sk" class="form-control" id="defaultFormControlInput" aria-describedby="defaultFormControlHelp"
              />
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
              <input type="text" name="nomor_hp" class="form-control" id="defaultFormControlInput" aria-describedby="defaultFormControlHelp"
              />
            </div>
            <div class="col">
              <label for="defaultFormControlInput" class="form-label">Pendidikan</label>
              <input type="text" name="pendidikan" class="form-control" id="defaultFormControlInput" aria-describedby="defaultFormControlHelp"
              />
            </div>
          </div>
          <div class="row g-2 mb-3">
            <div class="col">
              <label for="defaultFormControlInput" class="form-label">Agama</label>
              <input type="text" name="agama" class="form-control" id="defaultFormControlInput" aria-describedby="defaultFormControlHelp"
              />
            </div>
            <div class="col">
              <label for="defaultFormControlInput" class="form-label">Pekerjaan</label>
              <input type="text" name="pekerjaan" class="form-control" id="defaultFormControlInput" aria-describedby="defaultFormControlHelp"
              />
            </div>
          </div>
          <div class="row g-2 mb-3">
            <div class="col">
              <label for="defaultFormControlInput" class="form-label">Alamat</label>
              <textarea type="text" name="alamat" class="form-control" id="defaultFormControlInput" aria-describedby="defaultFormControlHelp"
              ></textarea>
            </div>
          </div>
          
          <div class="row g-2 mb-3">
            <div class="col">
              <label for="defaultFormControlInput" class="form-label">Pengalaman Kepemiluan</label>
              <textarea id="basic-default-message" name="pengalaman_kepemiluan" class="form-control" style="height: 100px"></textarea>
            </div>
          </div>

          <div class="row g-2 mb-3">
            <div class="col">
              <label for="defaultFormControlInput" class="form-label">Catatan Khusus</label>
              <textarea type="text" name="catatan" class="form-control" placeholder="Catatan Khusus" value="{{ old('catatan') }}"></textarea>
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