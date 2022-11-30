@extends('base.main', ['title' => 'Tahun'])
@section('content')

  <div class="card">
    <div class="card-header">
      @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
          <span class="fw-bold">Sukses : </span> {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
      <h3>Data Tahun</h3>
      <a href="/tahun/add" class="btn btn-sm btn-primary">Tambah</a>
    </div>
    <div class="card-body">
      <div class="table text-nowrap">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>No</th>
              <th>Tahun</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            @forelse ($listTahun as $tahun)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $tahun->tahun }}</td>
                  <td>
                    <a href="/tahun/edit/{{ $tahun->id }}" class="btn btn-sm btn-warning">
                      <i class="bi bi-pencil-square"></i>
                      Edit
                    </a>
                    <a href="/tahun/delete/{{ $tahun->id }}" class="btn btn-sm btn-danger">
                      <i class="bi bi-trash"></i>
                      Delete
                    </a>
                  </td>
                </tr>
            @empty
                <tr>
                  <td colspan="3" class="fw-bold text-center">Data kosong / tidak ditemukan</td>
                </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
    
@endsection