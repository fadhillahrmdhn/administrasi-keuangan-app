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
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">

    <div class="min-h-screen flex flex-col justify-center items-center pt-6 sm:pt-0 bg-cover bg-center "
        style="background-image:linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('/image/sekolah2.jpg');">

        <div class="w-full sm:max-w-lg px-6 py-4 mb-6 sm:mb-0 bg-gray-200 shadow-md overflow-hidden rounded-lg">

            {{ $slot }}
        </div>
    </div>
    <!-- <footer class="relative min-h-full mb-6">
        <hr class=" border-gray-300 sm:mx-auto pb-6" />
        <div class="block text-sm text-gray-500 text-center ">
            <p>© 2024. <span class="font-bold">RA.BINA TUNAS NUSANTARA</span> All Rights Reserved.
            </p>
            <P><span class="font-bold">Designed by</span> Fadhillah Ramadhan</P>
        </div>
    </footer> -->
</body>

</html>