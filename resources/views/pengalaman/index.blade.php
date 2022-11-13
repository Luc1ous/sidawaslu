@extends('base.main', ['title' => 'Pengalaman Kepemiluan'])
@section('content')
    <div class="card">
      <div class="card-header">
        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
          <span class="fw-bold">Sukses : </span> {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
        <h3>Pengalaman Kepemiluan</h3>
        <a href="/pengalaman/add" class="btn btn-primary">Tambah Data</a>
      </div>
      <div class="card-body">
        <div class="table text-nowrap">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>Pengalaman</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              @foreach ($listPengalaman as $pengalaman)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $pengalaman->pengalaman }}</td>
                    <td>
                      <a href="/pengalaman/{{ $pengalaman->id }}" class="btn btn-sm btn-secondary">View</a>
                    </td>
                  </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
@endsection