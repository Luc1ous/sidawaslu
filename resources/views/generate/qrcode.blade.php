<!DOCTYPE html>

<html
  lang="en"
  class="light-style customizer-hide"
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

    <title>Generate ID Card</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../template/assets/img/sidawaslu.png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../template/assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../template/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../template/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../template/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../template/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="../template/assets/vendor/css/pages/page-auth.css" />
    <!-- Helpers -->
    <script src="../template/assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../template/assets/js/config.js"></script>
  </head>

  <body>
    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <div class="text-center">
          </div>
          <div class="card">
            <div class="card-body">
              <div class="text-center">
                <p class="mb-4 fw-bold text-center">Scan untuk menuju ke link Digital ID Card</p>
                {!! $qrcode !!}
                <p class="mt-3">Atau kunjungi link berikut : </p>
                <a href="{{ $link }}" class="text-primary">{{ $link }}</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="../template/assets/vendor/js/menu.js"></script>

    <!-- Main JS -->
    <script src="../template/assets/js/main.js"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
