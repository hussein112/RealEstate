<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <meta name="description" content="Company Description">
        <meta name="keywords" content="Company Keywords">
        <meta name="author" content="Hussein Khalil">

        <title>{{ config('app.name', 'Laravel') }}</title>


        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

        @vite(['resources/js/app.js', 'resources/css/employee/style.css', 'resources/js/employee/settings.js', 'resources/js/employee/sidebar.js'])

    </head>
    <body>
        <div class="page d-flex flex-wrap">
            <span class="aside-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar" aria-expanded="false" aria-controls="sidebar">
                <iconify-icon icon="material-symbols:menu"></iconify-icon>
            </span>
            <!-- Start Sidebar -->

            <x-employee.sidebar></x-employee.sidebar>

            <!-- End Sidebar -->

            {{ $main }}
        </div>

        <script src="https://code.iconify.design/iconify-icon/1.0.2/iconify-icon.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </body>
</html>
