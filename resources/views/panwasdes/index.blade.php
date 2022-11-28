@extends('base.main', ['title' => 'Data Panwasdes'])
@section('content')
  <div class="card">
    <div class="card-header">
      @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
          <span class="fw-bold">Sukses : </span> {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
      <h3>Data Panwasdes Tahun
        {{ $selectedYear }}
      </h3>
      <div class="d-flex justify-content-between">
        <div class="col-6">
          <form action="/panwasdes/{{ $selectedYear }}/search" method="GET">
            <div class="input-group">
              <input
                type="text"
                name="search"
                class="form-control"
                placeholder="Search data"
                aria-describedby="button-addon2"
              />
              <button class="btn btn-dark" type="submit" id="button-addon2">Search</button>
            </div>
          </form>
        </div>
        <a href="/panwasdes/{{ $selectedYear }}/add" class="btn btn-primary">
          <i class='bx bx-plus'></i>
          Add Data
        </a>
      </div>
    </div>
    <div class="card-body">
      <form action="/panwasdes/import" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="input-group">
          <input
            type="file"
            name="file"
            class="form-control @error('file') is-invalid @enderror"
            id="inputGroupFile04"
            aria-describedby="inputGroupFileAddon04"
            aria-label="Upload"
          />
          @error('file')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <button class="btn btn-success my-3" type="submit">
          <i class='bx bxs-cloud-upload'></i>
          Upload
        </button>
      </form>
      <div class="table-responsive text-nowrap mb-3">
        <table class="table table-hover">
          <thead class="table-light">
            <tr class="text-nowrap">
              <th>No</th>
              <th>Nama</th>
              <th>Kecamatan</th>
              <th>No Hp</th>
              <th>Jenis Kelamin</th>
              <th>Tempat Tanggal Lahir</th>
              <th>Tahun</th>
              <th>Keterangan</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @forelse ( $listPengawas as $index => $pengawas )
              <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header text-center">
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                      <h4>Delete Confirmation</h4>
                      <p>Apakah Anda yakin ingin menghapus Data : {{ $pengawas->nama }} ?</p>
                      <p>
                        <span class="fw-bold">Notice : </span>
                        Data yang terhapus tidak bisa dikembalikan lagi
                      </p>
                      <form action="/panwasdes/delete/{{ $pengawas->id }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger">Hapus</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <tr>
                <td>{{ $listPengawas->firstItem() + $index }}</td>
                <td>{{ $pengawas->nama }}</td>
                <td>{{ $pengawas->kecamatan }}</td>
                <td>{{ $pengawas->no_hp }}</td>
                <td>{{ $pengawas->jenis_kelamin }}</td>
                <td>{{ $pengawas->ttl }}</td>
                <td>{{ $pengawas->tahun }}</td>
                <td>
                  <a href="/panwasdes/{{ $selectedYear }}/{{ $pengawas->id }}/edit" class="btn btn-sm btn-warning">
                    <i class="bi bi-pencil-square"></i>
                    Edit
                  </a>
                  <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#basicModal">
                    <i class="bi bi-trash3-fill"></i>
                    Hapus
                  </button>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="8" class="fw-bold text-center">Data kosong / tidak ditemukan</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
      {{ $listPengawas->links() }}
    </div>
  </div>
    
@endsection