<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">

    @livewireStyles

    <!-- Scripts -->
    <link rel="stylesheet" href="{{ mix('css/admin.css') }}">
    <script src="{{ mix('js/admin.js') }}" defer></script>
</head>

<body class="font-sans antialiased">
    
    @include('layouts.main.loader') 
    @livewire('navigation-menu')

    <!-- Page Content -->
    <main class="container my-2">
        {{ $slot }}
    </main>

    @stack('modals')

    @livewireScripts
    <x:pharaonic-tagify::scripts />

    @stack('scripts')
</body>

</html>