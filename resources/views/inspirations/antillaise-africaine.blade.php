@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-cover bg-center" 
     style="background-image: url('{{ asset('images/antillaise-africaine-page.png') }}');">

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
        <h1 class="text-5xl font-bold mb-6">Inspiration Antillaise‑Africaine</h1>
        <p class="text-lg max-w-2xl text-center mb-12">
            Soleil, musique et partage — entre glaces coco, bokits et danse sur la plage.
        </p>

        {{-- ⭐ SECTION : chansons associées SUR LE FOND --}}
        <div class="w-full max-w-5xl px-6">
            <h2 class="text-3xl font-bold mb-6">Chansons Antillaises‑Africaines</h2>

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
    // Cas 1 : image uploadée
    if ($chanson->image && file_exists(public_path('storage/' . $chanson->image))) {
        $imagePath = asset('storage/' . $chanson->image);

    // Cas 2 : image du genre
    } elseif ($chanson->genre && file_exists(public_path('images/' . $chanson->genre . '-page.png'))) {
        $imagePath = asset('images/' . $chanson->genre . '-page.png');

    // Cas 3 : fallback
    } else {
        $imagePath = asset('images/default.png');
    }
@endphp

<img src="{{ $imagePath }}" class="w-full h-40 object-cover rounded mb-3">


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
