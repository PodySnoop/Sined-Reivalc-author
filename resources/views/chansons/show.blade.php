@extends('layouts.app')

@section('content')

<div class="max-w-4xl mx-auto px-4 py-12 text-white">

    <!-- Titre -->
    <h1 class="text-4xl font-bold mb-2">{{ $chanson->titre }}</h1>

    <!-- Bouton Retour -->
    <a href="{{ session('before_chanson') }}"
   class="inline-block mb-6 px-4 py-2 rounded bg-white/10 hover:bg-white/20 transition">
    ← Retour
</a>

     @if(session('success'))
    <div class="bg-green-600 text-white p-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

    <!-- Sujet -->
    @if($chanson->sujet)
        <p class="text-gray-300 mb-6">{{ $chanson->sujet }}</p>
    @endif

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


    <!-- Audio -->
    @if($chanson->audio)
        <audio controls class="w-full mb-6">
            <source src="{{ asset('storage/' . $chanson->audio) }}" type="audio/mpeg">
        </audio>
    @endif

    <!-- Bouton Télécharger la chanson -->
    @if($chanson->audio)
        <a href="{{ asset('storage/' . $chanson->audio) }}"
           download
           class="inline-block bg-green-600 hover:bg-green-700 px-6 py-3 rounded-lg font-semibold mb-8">
            ⬇️ Télécharger la chanson
        </a>
    @endif

    <!-- Paroles PDF -->
    @if($chanson->paroles)
        <div class="mt-6 mb-10">
            <a href="{{ asset('storage/' . $chanson->paroles) }}"
               target="_blank"
               class="inline-block bg-blue-600 hover:bg-blue-700 px-6 py-3 rounded-lg font-semibold">
                📄 Télécharger les paroles (PDF)
            </a>
        </div>
    @endif

    <!-- Suggestion -->
    <h2 class="text-2xl font-bold mt-12 mb-4">Proposer une modification</h2>
    <form action="{{ route('suggest.store', $chanson->id) }}" method="POST" class="mb-10">
        @csrf
        <textarea name="suggestion"
                  class="w-full p-3 rounded bg-white/10 border border-white/20 text-white mb-3"
                  rows="4"
                  placeholder="Votre suggestion"></textarea>
        <button type="submit"
                class="bg-yellow-600 hover:bg-yellow-700 px-6 py-3 rounded-lg font-semibold">
            Envoyer
        </button>
    </form>

    <!-- Commentaires -->
    <h2 class="text-2xl font-bold mb-4">Commentaires</h2>

    @foreach($commentaires as $commentaire)
        <div class="bg-white/5 border border-white/10 p-4 rounded-lg mb-4">
            <strong>{{ $commentaire->auteur }}</strong>
            <p class="mt-1">{{ $commentaire->contenu }}</p>
        </div>
    @endforeach


    <!-- Formulaire commentaire -->
    <form action="{{ route('comment.store', $chanson->id) }}" method="POST" class="mt-6">
        @csrf
        <input type="text" name="auteur"
               class="w-full p-3 rounded bg-white/10 border border-white/20 text-white mb-3"
               placeholder="Votre nom">

        <textarea name="contenu"
                  class="w-full p-3 rounded bg-white/10 border border-white/20 text-white mb-3"
                  rows="3"
                  placeholder="Votre commentaire"></textarea>

        <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 px-6 py-3 rounded-lg font-semibold">
            Commenter
        </button>
    </form>

</div>

@endsection