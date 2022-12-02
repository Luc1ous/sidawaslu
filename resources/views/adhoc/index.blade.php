@extends('base.main', ['title' => 'Data Ad Hoc'])
@section('content')

<div class="card">
  <div class="card-header">
      @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
          <span class="fw-bold">Sukses : </span> {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
      <div class="d-flex justify-content-between">
        <h3>Data Pengawas AdHoc</h3>
        <div class="dropdown">
          <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" id="growthReportId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class='bx bx-filter'></i>
          </button>
          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="growthReportId" style="">
            <a class="dropdown-item" href="/adhoc/filter/nama">Nama</a>
            <a class="dropdown-item" href="/adhoc/filter/kecamatan">Kecamatan</a>
            <a class="dropdown-item" href="/adhoc/filter/jenis_kelamin">Jenis Kelamin</a>
            <a class="dropdown-item" href="/adhoc/filter/pendidikan">Pendidikan</a>
            <a class="dropdown-item" href="/adhoc/filter/tahun">Tahun</a>
            <a class="dropdown-item" href="/adhoc/filter/keterangan">Keterangan</a>
          </div>
        </div>
      </div>
      <div class="d-flex justify-content-between">
        <div class="col-6 p-0">
          <form action="/adhoc/search" method="GET">
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
      </div>
    </div>
    <div class="card-body">
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
              <th>Kecamatan</th>
              <th>No Hp</th>
              <th>Jenis Kelamin</th>
              <th>Pendidikan</th>
              <th>Tahun</th>
              <th>Keterangan</th>
            </tr>
          </thead>
          <tbody>
            @forelse ( $listPengawas as $index => $pengawas )
              <tr>
                <td>{{ $listPengawas->firstItem() + $index }}</td>
                <td>{{ $pengawas->nama }}</td>
                <td>{{ $pengawas->kecamatan }}</td>
                <td>{{ $pengawas->nomor_hp }}</td>
                <td>{{ $pengawas->jenis_kelamin }}</td>
                @if ($pengawas->pendidikan)
                  <td>{{ $pengawas->pendidikan }}</td>
                @else
                  <td>-</td>
                @endif
                <td>{{ $pengawas->tahun }}</td>
                <td>{{ $pengawas->keterangan }}</td>
              </tr>
            @empty
              <tr>
                <td colspan="8" class="fw-bold text-center">Data kosong / tidak ditemukan</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
      {{ $listPengawas->appends(Request::except('page'))->links() }}
    </div>
  </div>

    
@endsection
