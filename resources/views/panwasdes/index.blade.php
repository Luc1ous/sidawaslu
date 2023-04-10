@extends('base.main', ['title' => 'Data Panwasdes'])
@section('content')
  <div class="card">
    <div class="card-header">
      @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible" role="alert">
          <span class="fw-bold">Gagal : </span> {{ session('error') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
      @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
          <span class="fw-bold">Sukses : </span> {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
      <div class="d-flex justify-content-between">
        <h3>Data Panwasdes Tahun
          {{ $tahun }}
        </h3>
        <div class="dropdown">
          <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" id="growthReportId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class='bx bx-filter'></i>
          </button>
          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="growthReportId" style="">
            <a class="dropdown-item" href="/panwasdes/{{ $tahun }}/filter/nama">Nama</a>
            <a class="dropdown-item" href="/panwasdes/{{ $tahun }}/filter/kecamatan">Kecamatan</a>
            <a class="dropdown-item" href="/panwasdes/{{ $tahun }}/filter/kelurahan">Kelurahan</a>
            <a class="dropdown-item" href="/panwasdes/{{ $tahun }}/filter/jenis_kelamin">Jenis Kelamin</a>
          </div>
        </div>
      </div>
      <div class="d-flex justify-content-between">
        <div class="col-6 p-0">
          <form action="/panwasdes/{{ $tahun }}/search" method="GET">
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
        <a href="/panwasdes/{{ $tahun }}/add" class="btn btn-primary">
          <i class='bx bx-plus'></i>
          Add Data
        </a>
      </div>
    </div>
    <div class="card-body">
      <form action="/panwasdes/import" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="input-group col-8 mb-3 p-0">
          <input
            type="file"
            name="file"
            class="form-control @error('file') is-invalid @enderror"
            id="inputGroupFile04"
            aria-describedby="inputGroupFileAddon04"
            aria-label="Upload"
          />
          <button class="btn btn-success" type="submit">
            <i class='bx bxs-cloud-upload'></i>
            Upload
          </button>
          @error('file')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
      </form>
      <span class="bg-dark p-2 text-white rounded">Total data : {{ $listPengawas->total() }}</span>
      @if (isset($search))
        <p class="mt-2">Menampilkan hasil dari pencarian : <b>{{ $search }}</b></p>
      @endif
      <div class="table-responsive text-nowrap my-3">
        <table class="table table-hover">
          <thead class="table-light">
            <tr class="text-nowrap">
              <th>No</th>
              <th>Nama</th>
              <th>Foto</th>
              <th>Kecamatan</th>
              <th>Kelurahan</th>
              <th>No Hp</th>
              <th>Jenis Kelamin</th>
              <th>Tahun</th>
              <th>Keterangan</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @forelse ( $listPengawas as $index => $pengawas )
              <tr>
                <td>{{ $listPengawas->firstItem() + $index }}</td>
                <td>{{ $pengawas->nama }}</td>
                <td>
                  @if ($pengawas->foto)
                    <img src="{{ asset('images/'.$pengawas->foto) }}" class="rounded-circle" width="50" height="50">
                  @endif
                </td>
                <td>{{ $pengawas->kecamatan }}</td>
                <td>{{ $pengawas->kelurahan }}</td>
                <td>{{ $pengawas->nomor_hp }}</td>
                <td>{{ $pengawas->jenis_kelamin }}</td>
                <td>{{ $pengawas->tahun }}</td>
                <td>{{ $pengawas->keterangan }}</td>
                <td class="d-flex">
                  <a href="/panwasdes/{{ $tahun }}/{{ $pengawas->id }}/edit" class="btn btn-sm btn-warning">
                    <i class="bi bi-pencil-square"></i>
                    Edit
                  </a>
                  <form action="/panwasdes/delete/{{ $pengawas->id }}" method="POST">
                    @csrf
                    <button class="btn btn-sm btn-danger mx-2">
                      <i class="bi bi-trash3-fill"></i>
                      Hapus
                    </button>
                  </form>
                  <a href="/generate/{{ $pengawas->id }}" class="btn btn-sm btn-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-vcard-fill" viewBox="0 0 16 16">
                      <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm9 1.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1h-4a.5.5 0 0 0-.5.5ZM9 8a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1h-4A.5.5 0 0 0 9 8Zm1 2.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 0-1h-3a.5.5 0 0 0-.5.5Zm-1 2C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1 1 0 0 0 2 13h6.96c.026-.163.04-.33.04-.5ZM7 6a2 2 0 1 0-4 0 2 2 0 0 0 4 0Z"/>
                    </svg>
                    Generate ID
                  </a>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="10" class="fw-bold text-center">Data kosong / tidak ditemukan</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
      {{ $listPengawas->appends(Request::except('page'))->links() }}
    </div>
  </div>
    
@endsection