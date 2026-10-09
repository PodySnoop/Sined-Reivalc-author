@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto px-4 py-12 text-white">

    <h1 class="text-4xl font-bold mb-10 text-center">Toutes les chansons</h1>

 <!-- Bouton Retour -->
    <a href="{{ route('home') }}"
   class="inline-block mb-6 px-4 py-2 rounded bg-white/10 hover:bg-white/20 transition">
    ← Retour
</a>

    @if($chansons->isEmpty())
        <p class="text-center text-gray-300">Aucune chanson n’a encore été ajoutée.</p>
    @else

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

            @foreach($chansons as $chanson)
                <div class="bg-white/5 border border-white/10 rounded-xl p-4 shadow-lg hover:bg-white/10 transition">

                    <!-- Image -->
@php
    // Cas 1 : une image uploadée existe (stockée dans storage/app/public/images)
    if ($chanson->image && file_exists(public_path('storage/' . $chanson->image))) {
        $imagePath = asset('storage/' . $chanson->image);

    // Cas 2 : aucune image uploadée → on prend l'image du genre
    } elseif ($chanson->genre && file_exists(public_path('images/' . $chanson->genre . '-page.png'))) {
        $imagePath = asset('images/' . $chanson->genre . '-page.png');

    // Cas 3 : fallback ultime
    } else {
        $imagePath = asset('images/default.png');
    }
@endphp

<img src="{{ $imagePath }}" class="w-full h-40 object-cover rounded mb-4">




                    <!-- Titre -->
                    <h2 class="text-xl font-bold mb-2">{{ $chanson->titre }}</h2>

                    <!-- Genre -->
                    @if($chanson->genre)
                        <p class="text-sm text-gray-300 mb-4">
                            Genre : <span class="text-white">{{ ucfirst($chanson->genre) }}</span>
                        </p>
                    @endif

                    <!-- Bouton Voir -->
                    <a href="{{ route('chansons.show', $chanson->id) }}"
                       class="block text-center bg-white/10 hover:bg-white/20 transition py-2 rounded-lg font-semibold">
                        🎧 Voir la chanson
                    </a>

                </div>
            @endforeach

        </div>

    @endif

</div>
@endsection
