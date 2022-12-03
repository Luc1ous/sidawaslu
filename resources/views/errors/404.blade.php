<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>404 Not Found</title>
    <link rel="stylesheet" href={{ asset("template/assets/vendor/css/core.css") }} class="template-customizer-core-css" />
    <link rel="stylesheet" href={{ asset("template/assets/vendor/css/theme-default.css") }} class="template-customizer-theme-css" />
    <link rel="stylesheet" href={{ asset("template/assets/css/demo.css") }} />
</head>
<style>
    body {
        font-family: 'Nunito', sans-serif;
    }
</style>
<body>
    <div class="container">
        <div class="text-center mt-5 py-5">
            <img src="{{ asset('template/assets/img/404 error.png') }}" width="500">
            <br>
            <h2 class="text-danger">Page Not Found</h2>
            <a href="/" class="btn btn-danger">Back to Dashboard</a>
        </div>
    </div>
</body>
</html>