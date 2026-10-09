@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-cover bg-center" 
     style="background-image: url('{{ asset('images/francaise-page.png') }}');">

    {{-- Bloc sombre principal --}}
    <div class="bg-black/40 backdrop-blur-sm min-h-screen flex flex-col items-center text-white py-20 relative">

        {{-- ⭐ Bouton retour à l'accueil --}}
        <a href="{{ route('home') }}"
           class="absolute top-6 left-6 px-4 py-2 rounded-lg 
                  bg-white/20 backdrop-blur-md text-white font-semibold
                  hover:bg-white/30 transition">
            ← Retour à l'accueil
        </a>

        {{-- TITRE + TEXTE --}}
        <h1 class="text-5xl font-bold mb-6">Inspiration Française</h1>
        <p class="text-lg max-w-2xl text-center mb-12">
            Une atmosphère intime et poétique — entre voix, lumière douce et émotion sincère.
        </p>

        {{-- ⭐ SECTION : chansons associées SUR LE FOND --}}
        <div class="w-full max-w-5xl px-6">
            <h2 class="text-3xl font-bold mb-6">Chansons Françaises</h2>

            @if($chansons->isEmpty())
                <p class="text-white/80 text-lg">
                    Aucune chanson pour le moment.
                </p>
            @else
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach($chansons as $chanson)
                        <div class="bg-white/10 backdrop-blur-md p-4 rounded-xl shadow-lg">
                            <h3 class="font-bold text-xl mb-2">{{ $chanson->titre }}</h3>

    @php
    if ($chanson->image) {
        // Image uploadée → dans storage/app/public/images
        $image = 'storage/' . $chanson->image;
    } else {
        // Image par défaut → dans public/images
        $image = 'images/francaise-page.png';
    }
@endphp

<img src="{{ asset($image) }}"
     class="w-full h-40 object-cover rounded mb-3">


     
                            <a href="{{ route('chansons.show', $chanson->id) }}" 
                               class="text-blue-300 hover:underline">
                                Voir la chanson
                            </a>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

    </div>

</div>
@endsection
