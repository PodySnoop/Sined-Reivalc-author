@extends('layouts.app')

@section('content')
<div class="text-white p-6 max-w-6xl mx-auto">
    
    {{-- Bouton retour --}}
<div class="mb-6">
    <a href="{{ route('compositeur.dashboard') }}"
       class="px-4 py-2 rounded bg-white/10 hover:bg-white/20 transition">
        ← Retour au tableau de bord
    </a>
</div>


    {{-- Message de succès --}}
    @if(session('success'))
        <div class="mb-6 p-4 rounded bg-green-600/20 border border-green-400 text-green-200">
            {{ session('success') }}
        </div>
    @endif

    <h1 class="text-3xl font-bold mb-8">Gestion des chansons</h1>

    {{-- Bouton ajouter --}}
    <div class="mb-8">
        <a href="{{ route('compositeur.chansons.create') }}"
           class="px-4 py-2 rounded bg-white/10 hover:bg-white/20 transition">
            + Ajouter une chanson
        </a>
    </div>

    {{-- Grille des chansons --}}
    @if($chansons->isEmpty())
        <p class="text-gray-300">Aucune chanson enregistrée pour le moment.</p>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

            @foreach($chansons as $chanson)
                <div class="bg-white/5 border border-white/10 rounded-lg p-4 flex flex-col">

                    {{-- Image --}}
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


                    {{-- Titre --}}
                    <h2 class="text-xl font-semibold">{{ $chanson->titre }}</h2>

                    {{-- Genre --}}
                    <p class="text-gray-400 mb-4">{{ ucfirst($chanson->genre) }}</p>

                    {{-- Actions --}}
                    <div class="mt-auto flex gap-2">

                        <a href="{{ route('chansons.show', $chanson->id) }}"
                           class="flex-1 text-center px-3 py-2 rounded bg-blue-600/40 hover:bg-blue-600/60 transition">
                            Voir
                        </a>

                        <a href="{{ route('compositeur.chansons.edit', $chanson->id) }}"
                           class="flex-1 text-center px-3 py-2 rounded bg-yellow-600/40 hover:bg-yellow-600/60 transition">
                            Modifier
                        </a>

                       <a href="{{ route('compositeur.chansons.delete', $chanson->id) }}"
                           class="flex-1 text-center px-3 py-2 rounded bg-red-600/40 hover:bg-red-600/60 transition">
                            Supprimer
                        </a>

                    </div>

                </div>
            @endforeach

        </div>
    @endif

</div>
@endsection
