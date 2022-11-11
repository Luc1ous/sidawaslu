@extends('base.main', ['title' => 'Data Panwas TPS'])
@section('content')
  <div class="card">
    <div class="card-header">
      <h3>Data Panwas TPS Tahun
        {{ $selectedYear }}
      </h3>
      <div class="d-flex justify-content-between">
        <div class="col-6">
          <form action="/panwastps/{{ $selectedYear }}/search" method="GET">
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
        <a href="" class="btn btn-primary">
          <i class='bx bx-plus'></i>
          Add Data
        </a>
      </div>
    </div>
    <div class="card-body">
      <form action="/panwastps/import" method="POST" enctype="multipart/form-data">
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
              <th>Keterangan</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @forelse ( $listPengawas as $index => $pengawas )
              <tr>
                <td>{{ $listPengawas->firstItem() + $index }}</td>
                <td>{{ $pengawas->nama }}</td>
                <td>{{ $pengawas->kecamatan }}</td>
                <td>{{ $pengawas->no_hp }}</td>
                <td>{{ $pengawas->jenis_kelamin }}</td>
                <td>{{ $pengawas->tanggal_lahir }}</td>
                <td>{{ $pengawas->tahun }}</td>
                <td>
                  <a href="/panwascam/{{ $selectedYear }}/{{ $pengawas->id }}" class="btn btn-sm btn-secondary">
                    <i class="bi bi-eye-fill"></i>
                    View
                  </a>
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