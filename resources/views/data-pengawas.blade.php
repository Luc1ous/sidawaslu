@extends('base.main', ['title' => 'Data Pengawas'])
@section('content')
  <div class="card">
    <div class="card-header">
      <h3>{{ $title }}
        {{ $selectedYear }}
      </h3>
      <div class="d-flex justify-content-between">
        <div class="col-6">
          <div class="input-group">
            <input
              type="text"
              class="form-control"
              placeholder="Search data"
              aria-describedby="button-addon2"
            />
            <button class="btn btn-dark" type="button" id="button-addon2">Search</button>
          </div>
        </div>
        <a href="" class="btn btn-primary">
          <i class='bx bx-plus'></i>
          Add Data
        </a>
      </div>
    </div>
    <div class="card-body">
      <form action="/panwascam/import" method="POST">
        @csrf
        <div class="input-group">
          <input
            type="file"
            name="file"
            class="form-control"
            id="inputGroupFile04"
            aria-describedby="inputGroupFileAddon04"
            aria-label="Upload"
          />
          <button class="btn btn-success" type="submit">
            <i class='bx bxs-cloud-upload'></i>
            Upload
          </button>
        </div>
      </form>
    </div>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
          <tr class="text-nowrap">
            <th>No</th>
            <th>Table heading</th>
            <th>Table heading</th>
            <th>Table heading</th>
            <th>Table heading</th>
            <th>Table heading</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
    
@endsection