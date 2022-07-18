<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('../node_modules/bootstrap-icons/font/fonts/bootstrap-icons.css') }}">
    <script src="https://unpkg.com/alpinejs" defer></script>

    @livewireStyles

    <title>Document</title>
</head>

<body class="main-color">
    @include('partials.navbar')

    <div class="container mx-auto pt-20 z-[99]">
        @yield('content')
    </div>


    @livewireScripts
    <script src="{{ asset('vendor/flowbite.js') }}"></script>
    @yield('scripts')
</body>

</html>
