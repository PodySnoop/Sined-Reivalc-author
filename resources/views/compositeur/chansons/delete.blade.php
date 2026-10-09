@extends('layouts.app')

@section('content')
<div class="text-white p-6 max-w-3xl mx-auto">

    {{-- Bouton retour --}}
    <a href="{{ route('compositeur.chansons.index') }}"
       class="inline-block mb-6 px-4 py-2 rounded bg-white/10 hover:bg-white/20 transition">
        ← Retour à la gestion
    </a>

    <h1 class="text-3xl font-bold mb-6 text-red-400">Supprimer la chanson</h1>

    <div class="bg-white/5 border border-white/10 rounded-lg p-6 mb-6">

        {{-- Image --}}
        @if($chanson->image)
            <img src="{{ asset($chanson->image) }}"
                 class="w-full h-48 object-cover rounded mb-4">
        @else
            <div class="w-full h-48 bg-white/10 rounded flex items-center justify-center text-gray-400 mb-4">
                🎵
            </div>
        @endif

        <h2 class="text-2xl font-semibold mb-2">{{ $chanson->titre }}</h2>
        <p class="text-gray-300 mb-4">{{ ucfirst($chanson->genre) }}</p>

        <p class="text-red-300 font-semibold mb-4">
            Cette action est irréversible.  
            Êtes‑vous sûr de vouloir supprimer cette chanson ?
        </p>

        {{-- Formulaire de suppression --}}
        <form action="{{ route('compositeur.chansons.destroy', $chanson->id) }}"
              method="POST">
            @csrf
            @method('DELETE')

            <button type="submit"
                    class="bg-red-600 hover:bg-red-700 px-6 py-3 rounded-lg font-semibold">
                Oui, supprimer définitivement
            </button>
        </form>

    </div>

</div>
@endsection
