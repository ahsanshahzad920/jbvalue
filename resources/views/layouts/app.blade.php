<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title,  config('app.name', 'JB Values') }}</title>


    {{-- fontawesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- poppins font --}}
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
    </style>


{{-- chartjs --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Scripts -->
@vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/app.css'])
</head>
<body>
    <div id="app">
        <x-header />
        <main class="">
            @yield('content')
        </main>
        <x-footer />
    </div>
    
    {{-- custom js --}}
    @stack('js')
</body>
</html>
