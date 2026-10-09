@extends('layouts.app')

@section('content')
<div class="text-white p-6 max-w-3xl mx-auto">

    {{-- Bouton retour --}}
    <a href="{{ route('compositeur.chansons.index') }}"
       class="inline-block mb-6 px-4 py-2 rounded bg-white/10 hover:bg-white/20 transition">
        ← Retour à la gestion des chansons
    </a>

    {{-- Titre --}}
    <h1 class="text-3xl font-bold mb-6">Modifier la chanson</h1>

    {{-- Formulaire --}}
    <form action="{{ route('compositeur.chansons.update', $chanson->id) }}"
          method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Titre --}}
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Titre</label>
            <input type="text" name="titre" value="{{ $chanson->titre }}"
                   class="w-full p-3 rounded bg-white/10 border border-white/20 text-white">
        </div>

        {{-- Sujet --}}
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Sujet</label>
            <input type="text" name="sujet" value="{{ $chanson->sujet }}"
                   class="w-full p-3 rounded bg-white/10 border border-white/20 text-white">
        </div>

        {{-- Genre --}}
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Genre</label>
            <select name="genre"
                    class="w-full p-3 rounded bg-white/10 border border-white/20 text-white">
                <option value="soul-jazz" {{ $chanson->genre == 'soul-jazz' ? 'selected' : '' }}>Soul‑Jazz</option>
                <option value="antillaise-africaine" {{ $chanson->genre == 'antillaise-africaine' ? 'selected' : '' }}>Antillaise‑Africaine</option>
                <option value="francaise" {{ $chanson->genre == 'francaise' ? 'selected' : '' }}>Française</option>
                <option value="reggae" {{ $chanson->genre == 'reggae' ? 'selected' : '' }}>Reggae</option>
            </select>
        </div>

        {{-- Paroles PDF --}}
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Paroles (PDF)</label>

            @if($chanson->paroles)
                <p class="text-sm text-gray-300 mb-2">
                    Fichier actuel :
                    <a href="{{ asset('storage/' . $chanson->paroles) }}" target="_blank" class="underline">
                        Voir le PDF
                    </a>
                </p>
            @endif

            <input type="file" name="paroles_pdf"
                   class="w-full p-3 rounded bg-white/10 border border-white/20 text-white">
        </div>

        {{-- Image --}}
        @php
    if ($chanson->image && file_exists(public_path('storage/' . $chanson->image))) {
        $imagePath = asset('storage/' . $chanson->image);
    } elseif ($chanson->genre && file_exists(public_path('images/' . $chanson->genre . '-page.png'))) {
        $imagePath = asset('images/' . $chanson->genre . '-page.png');
    } else {
        $imagePath = asset('images/default.png');
    }
@endphp

<img src="{{ $imagePath }}" class="w-32 h-32 object-cover rounded mb-2">


        {{-- Audio --}}
        <div class="mb-6">
            <label class="block mb-1 font-semibold">Audio</label>

            @if($chanson->audio)
                <audio controls class="w-full mb-2">
                    <source src="{{ asset('storage/' . $chanson->audio) }}" type="audio/mpeg">
                </audio>
            @endif

            <input type="file" name="audio"
                   class="w-full p-3 rounded bg-white/10 border border-white/20 text-white">
        </div>

        {{-- Bouton enregistrer --}}
        <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 px-6 py-3 rounded-lg font-semibold">
            💾 Enregistrer les modifications
        </button>

    </form>

</div>
@endsection
