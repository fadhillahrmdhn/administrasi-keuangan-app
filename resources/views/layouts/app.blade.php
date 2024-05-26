<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&display=swap"
        rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- select2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    {{--
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css"
        integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" /> --}}
        <style>
            [x-cloak] { display: none !important;}
        </style>

</head>

<body class="font-sans antialiased bg-gray-100">
    <div class="min-h-screen ">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endif

        <!-- Page Content -->
        <main >
            {{ $slot }}
        </main>
    </div>
    <footer class="relative min-h-full mb-6 sm:mt-14">
        <hr class=" border-gray-300 sm:mx-auto pb-6" />
        <div class="block text-sm text-gray-500 text-center">
            <p>© 2024. <span class="font-bold">RA.BINA TUNAS NUSANTARA</span> All Rights Reserved.
            </p>
            <P><span class="font-bold">Designed by</span> Fadhillah Ramadhan</P>
        </div>
    </footer>

    {{-- select2 --}}
    <script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    

    {{-- select tambah data halaman detail spp--}}
    <script>
        $(document).ready(function() {
        $('#selectbulan').select2({
            minimumResultsForSearch: -1
        });
    });
    </script>

    <script>
        $(document).ready(function() {
        $('#selectharga').select2({
            minimumResultsForSearch: -1
        });
    });
    </script>

    {{-- select edit data halaman spp--}}
    <script>
        $(document).ready(function() {
        $('#selecteditnamasiswa').select2();
    });
    </script>

    <script>
        $(document).ready(function() {
        $('#selecteditkelompok').select2({
            minimumResultsForSearch: -1
        });
    });
    </script>

    {{-- select tambah data halaman spp--}}
    <script>
        $(document).ready(function() {
        $('#selectnamasiswa').select2();
    });
    </script>

    <script>
        $(document).ready(function() {
        $('#selectkelompok').select2();
    });
    </script>

    {{-- select cetak laporan halaman spp --}}
    <script>
        $(document).ready(function() {
        $('#selectkelompokcetak').select2({
            minimumResultsForSearch: -1
        });
    });
    </script>

    <script>
        $(document).ready(function() {
        $('#selecttahunajaran').select2();
    });
    </script>

</body>

</html>