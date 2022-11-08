@extends('base.main', ['title' => 'Tahun'])
@section('content')

  <div class="card">
    <div class="card-header">
      <h3>Data Tahun</h3>
      <a href="/tahun/add" class="btn btn-primary">Tambah</a>
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
            @foreach ($listTahun as $tahun)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $tahun->tahun }}</td>
                  <td>
                    <a href="/tahun/{{ $tahun->id }}" class="btn btn-sm btn-secondary">View</a>
                  </td>
                </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
    
@endsection