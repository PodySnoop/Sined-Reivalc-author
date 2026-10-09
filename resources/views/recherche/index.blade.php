@extends('layouts.app')

@section('content')

<div class="max-w-4xl mx-auto px-4 py-12 text-white">

    <!-- Titre -->
    <h1 class="text-4xl font-bold mb-6">Résultats de recherche</h1>

    <!-- Bouton Retour -->
    <a href="{{ session('before_chanson') }}"
       class="inline-block mb-6 px-4 py-2 rounded bg-white/10 hover:bg-white/20 transition">
        ← Retour
    </a>

    {{-- Si aucune recherche --}}
    @if(!$query)
        <p class="text-gray-300">Tapez quelque chose dans la barre de recherche…</p>
    @endif

    {{-- Si aucun résultat --}}
    @if($query && $resultats->isEmpty())
        <p class="text-gray-300">Aucun résultat pour « {{ $query }} »</p>
    @endif

    {{-- Résultats --}}
    @foreach($resultats as $chanson)
        <div class="mb-4 p-4 bg-white/5 border border-white/10 rounded-lg">
            <a href="{{ route('chansons.show', $chanson->id) }}" class="font-semibold blue-600 via-blue-400">
                {{ $chanson->titre }}
            </a>
            <p class="mt-1 text-gray-300 text-sm">
                {{ $chanson->genre }} —
                {{ $chanson->emotion ?? '' }}
            </p>
        </div>
    @endforeach

</div>

@endsection
