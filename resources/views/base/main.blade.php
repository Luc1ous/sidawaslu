<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Sidawaslu | {{ $title }}</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../../template/assets/img/sidawaslu.png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href={{ asset("template/assets/vendor/fonts/boxicons.css") }} />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <!-- Core CSS -->
    <link rel="stylesheet" href={{ asset("template/assets/vendor/css/core.css") }} class="template-customizer-core-css" />
    <link rel="stylesheet" href={{ asset("template/assets/vendor/css/theme-default.css") }} class="template-customizer-theme-css" />
    <link rel="stylesheet" href={{ asset("template/assets/css/demo.css") }} />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href={{ asset("template/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css") }} />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src={{ asset("template/assets/vendor/js/helpers.js") }}></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src={{ asset("template/assets/js/config.js") }}></script>
  </head>

  <body>
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-theme text-white">
          <div class="app-brand demo d-flex flex-column">
            <a href="" class="app-brand-link d-flex flex-row align-items-center">
              <img src={{ asset("template/assets/img/sidawaslu.png") }} alt="" width="45">
              <span class="app-brand-text demo menu-text fw-bolder text-uppercase ms-2">sidawaslu</span>
            </a>
          </div>
          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item {{ (request()->is('/')) ? 'active' : '' }}">
              <a href="/" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-dashboard"></i>
                <div>Dashboard</div>
              </a>
            </li>
            <!-- User -->
            <li class="menu-item {{ (request()->is('user')) ? 'active' : '' }}">
              <a href="/user" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-user"></i>
                <div>User</div>
              </a>
            </li>
            {{-- Tahun --}}
            <li class="menu-item {{ (request()->is('tahun')) ? 'active' : '' }}">
              <a href="/tahun" class="menu-link">
                <i class='menu-icon bx bxs-calendar' ></i>
                <div>Tahun</div>
              </a>
            </li>
            {{-- Pengalaman Kepemiluan --}}
            <li class="menu-item {{ (request()->is('pengalaman')) ? 'active' : '' }}">
              <a href="/pengalaman" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-user-pin"></i>
                <div>Kepemiluan</div>
              </a>
            </li>
            <!-- Data Pengawas Kecamatan -->
            <li class="menu-item">
              <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-user-pin"></i>
                <div data-i18n="Extended UI">Panwascam</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  @foreach ($listTahun as $tahun)
                    <a href="/panwascam/{{ $tahun->tahun }}" class="menu-link">
                      <div data-i18n="Perfect Scrollbar">{{ $tahun->tahun }}</div>
                    </a>
                  @endforeach
                </li>
              </ul>
            </li>
            <!-- Data Pengawas Desa -->
            <li class="menu-item">
              <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-user-pin"></i>
                <div data-i18n="Extended UI">Panwasdes</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  @foreach ($listTahun as $tahun)
                    <a href="/panwasdes/{{ $tahun->tahun }}" class="menu-link">
                      <div data-i18n="Perfect Scrollbar">{{ $tahun->tahun }}</div>
                    </a>
                  @endforeach
                </li>
              </ul>
            </li>
            <!-- Data Pengawas TPS -->
            <li class="menu-item">
              <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-user-pin"></i>
                <div data-i18n="Extended UI">Panwas TPS</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  @foreach ($listTahun as $tahun)
                    <a href="/panwastps/{{ $tahun->tahun }}" class="menu-link">
                      <div data-i18n="Perfect Scrollbar">{{ $tahun->tahun }}</div>
                    </a>
                  @endforeach
                </li>
              </ul>
            </li>
          </ul>
        </aside>
        <div class="layout-page">
          <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>
            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center mt-3">
                  <h6>SIDAWASLU KABUPATEN SLEMAN</h6>
                </div>
              </div>
              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src={{ asset("template/assets/img/profile.png") }} alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src={{ asset("template/assets/img/profile.png") }} alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block">{{ auth()->user()->name }}</span>
                            <small class="text-muted">{{ auth()->user()->email }}</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="/logout">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Log Out</span>
                      </a>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
          </nav>
          <!-- Content wrapper -->
          @include('sweetalert::alert')
          <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
                @yield('content')
            </div>
            <div class="content-backdrop fade"></div>
          </div>
        </div>
      </div>
    </div>

    @stack('script')
    <!-- build:js assets/vendor/js/core.js -->
    <script src={{ asset("template/assets/vendor/libs/jquery/jquery.js") }}></script>
    <script src={{ asset("template/assets/vendor/libs/popper/popper.js") }}></script>
    <script src={{ asset("template/assets/vendor/js/bootstrap.js") }}></script>
    <script src={{ asset("template/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js") }}></script>

    <script src={{ asset("template/assets/vendor/js/menu.js") }}></script>

    <!-- Main JS -->
    <script src={{ asset("template/assets/js/main.js") }}></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>