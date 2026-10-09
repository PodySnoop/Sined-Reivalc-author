@extends('layouts.app')

@section('content')
<div class="text-white p-6">
    <h1 class="text-3xl font-bold mb-6">💬 Commentaires reçus</h1>

    {{-- Bouton retour --}}
<div class="mb-6">
    <a href="{{ route('compositeur.dashboard') }}"
       class="px-4 py-2 rounded bg-white/10 hover:bg-white/20 transition">
        ← Retour au tableau de bord
    </a>
</div>

    @forelse($commentaires as $commentaire)
        <div class="bg-white/10 p-4 rounded-lg mb-4 border border-white/20">
            <p class="text-sm opacity-70">
                Reçu le {{ $commentaire->created_at->format('d/m/Y à H:i') }}
            </p>

            <p class="font-bold mt-2">{{ $commentaire->auteur }}</p>
            <p class="mt-1">{{ $commentaire->contenu }}</p>

            <p class="text-sm mt-2 opacity-70">
                Sur la chanson :
                <a href="{{ route('chansons.show', $commentaire->chanson_id) }}"
                   class="underline text-blue-300">
                    Voir la chanson
                </a>
            </p>

            <form action="{{ route('compositeur.commentaires.destroy', $commentaire->id) }}"
      method="POST" class="mt-3">
    @csrf
    @method('DELETE')

    <button class="text-red-400 hover:text-red-600">
        Supprimer
    </button>
</form>

        </div>
    @empty
        <p class="text-gray-300">Aucun commentaire pour le moment.</p>
    @endforelse
</div>
@endsection
