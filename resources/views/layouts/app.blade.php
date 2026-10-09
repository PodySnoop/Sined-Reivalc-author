<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Chansons') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')

   <style>
/* Désactive l'apparence native du select */
select {
    appearance: none; /* reprendre le contrôle*/
    -webkit-appearance: none;
    -moz-appearance: none;

    background-color: rgba(20,20,20,0.9);
    color: white;
    padding-right: 2.5rem;
    border: 1px solid rgba(255,255,255,0.2);
}

/* Style du menu déroulant */
select option {             /*enfin appliqué ce que je veux*/
    background-color: rgba(20,20,20,0.95);
    color: white;
}

/* Force le thème sombre pour les menus natifs */
select {
    color-scheme: dark; /*navigateur arrête imposer fond blanc*/
}
</style>

</head>

<body class="font-sans antialiased bg-black">

    {{-- NAVIGATION --}}
    <div class="relative z-50">
        @include('layouts.navigation')
    </div>

    {{-- CONTENU --}}
    <main class="relative z-10">
        @yield('content')
    </main>


    {{-- FOOTER AVEC DÉGRADÉ --}}
   <footer class="bg-gradient-to-r from-orange-600 to-blue-700 text-white py-8 relative z-20">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <a href="{{ route('legal') }}" class="mx-2 hover:text-gray-300">
            Mentions légales
        </a>

        <a href="{{ route('privacy') }}" class="mx-2 hover:text-gray-300">
            Politique de confidentialité
        </a>
    </div>
</footer>


</body>
</html>