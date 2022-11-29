@extends('base.main', ['title' => 'Catatan'])
@section('content')
    <div class="card">
      <div class="card-header">
        @if (session()->has('success'))
          <div class="alert alert-success alert-dismissible" role="alert">
            <span class="fw-bold">Sukses : </span> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
        <h3>Catatan Khusus</h3>
        <div class="d-flex justify-content-between">
          <div class="col-6">
            <form action="/catatan/search" method="GET">
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
          <a href="/catatan/add" class="btn btn-primary">
            <i class='bx bx-plus'></i>
            Add Catatan
          </a>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive text-nowrap mb-3">
          <table class="table table-hover">
            <thead class="table-light">
              <tr class="text-nowrap">
                <th>No</th>
                <th>Judul</th>
                <th>Catatan</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @forelse ( $listCatatan as $index => $catatan )
                <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header text-center">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body text-center">
                        <h4>Delete Confirmation</h4>
                        <p>Apakah Anda yakin ingin menghapus Data : {{ $catatan->judul }} ?</p>
                        <p>
                          <span class="fw-bold">Notice : </span>
                          Data yang terhapus tidak bisa dikembalikan lagi
                        </p>
                        <form action="/catatan/delete/{{ $catatan->id }}" method="POST">
                          @csrf
                          <button type="submit" class="btn btn-outline-danger">Hapus</button>
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <tr>
                  <td>{{ $listCatatan->firstItem() + $index }}</td>
                  <td>{{ $catatan->judul }}</td>
                  <td>{{ substr($catatan->catatan, 0, 50) }}</td>
                  <td>
                    <a href="/catatan/edit/{{ $catatan->id }}" class="btn btn-sm btn-warning">
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
        {{ $listCatatan->appends(Request::except('page'))->links() }}
      </div>
    </div>
@endsection
