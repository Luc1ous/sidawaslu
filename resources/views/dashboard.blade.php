@extends('base.main', ['title' => 'Dashboard'])
@section('content')

  <h2 class="fw-bold py-3 mb-2">Dashboard</h2>
  <div class="card my-3">
    <div class="card-header">
      <p class="text-dark">
        <img src="../template/assets/img/calendar.png" class="me-2" width="30">
        {{ $date }}
      </p>
      <h2 class="text-dark fw-semibold">Selamat Datang di Sidawaslu</h2>
    </div>                
  </div>
  <h4 class="my-3">Total Seluruh Data Pengawas</h4>
  <div class="row">
    <div class="col my-2">
      <div class="card">
        <div class="card-body">
          <div class="d-flex align-items-center">
            <img src="../template/assets/img/man.png" width="40" alt="">
            <span class="text-dark ms-3">
              <h4>{{ $total }} orang</h4>
              Total Seluruh Data
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <h4 class="my-3">Total Data Pengawas</h4>
  <div class="row">
    <div class="col-12 col-md-6 col-lg-4 my-2">
      <div class="card">
        <div class="card-body">
          <div class="d-flex align-items-center">
            <img src="../template/assets/img/man.png" width="40" alt="">
            <span class="text-dark ms-3">
              <h4>{{ $panwascam }} orang</h4>
              Total Panwas Kecamatan
            </span>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-6 col-lg-4 my-2">
      <div class="card">
        <div class="card-body">
          <div class="d-flex align-items-center">
            <img src="../template/assets/img/man.png" width="40" alt="">
            <span class="text-dark ms-3">
              <h4>{{ $panwasdes }} orang</h4>
              Total Panwas Desa
            </span>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-6 col-lg-4 my-2">
      <div class="card">
        <div class="card-body">
          <div class="d-flex align-items-center">
            <img src="../template/assets/img/man.png" width="40" alt="">
            <span class="text-dark ms-3">
              <h4>{{ $panwastps }} orang</h4>
              Total Pengawas TPS
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>

  <h4 class="my-3">Data Pengawas Berdasarkan Jenis Kelamin</h4>
  <div class="row">
    <div class="col-12 col-md-6 my-2">
      <div class="card">
        <div class="card-body">
          <div class="d-flex align-items-center">
            <img src="../template/assets/img/man2.png" width="40" alt="">
            <span class="text-dark ms-3">
              <h4>{{ $male }} orang</h4>
              Total Laki - Laki
            </span>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-6 my-2">
      <div class="card">
        <div class="card-body">
          <div class="d-flex align-items-center">
            <img src="../template/assets/img/woman.png" width="40" alt="">
            <span class="text-dark ms-3">
              <h4>{{ $female }} orang</h4>
              Total Perempuan
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
      
@endsection