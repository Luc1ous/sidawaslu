@extends('base.main', ['title' => 'User'])
@section('content')
    <div class="card">
      <div class="card-header">
        <h3>Data User</h3>
      </div>
      <div class="card-body">
        <div class="table text-nowrap">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              @foreach ($users as $user)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                  </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
@endsection