@extends('layouts.app')

@section('content')
<div class="text-white p-8 max-w-4xl mx-auto">

    <a href="{{ route('admin.dashboard') }}"
       class="inline-flex items-center gap-2 mb-6 px-4 py-2 rounded-lg
              bg-white/10 backdrop-blur-sm border border-white/20
              hover:bg-white/20 transition text-white font-semibold">
        <span class="text-xl">⟵</span> Retour au dashboard
    </a>

    <h1 class="text-3xl font-bold mb-6">Gestion des commentaires & suggestions</h1>

    {{-- SUGGESTIONS / MESSAGES --}}
    <h2 class="text-2xl font-semibold mb-4">Suggestions reçues</h2>

    @forelse($messages as $message)
        <div class="bg-white/10 p-4 rounded-lg mb-4 border border-white/20">
            <p class="text-sm opacity-70">
                Reçu le {{ $message->created_at->format('d/m/Y à H:i') }}
            </p>

            <p class="mt-2">{{ $message->contenu }}</p>

            <p class="text-sm mt-2 opacity-70">
                Pour la chanson :
                <a href="{{ route('chansons.show', $message->chanson_id) }}"
                   class="underline text-blue-300">
                    Voir la chanson
                </a>
            </p>

            @if(!$message->traite)
            <form action="{{ route('admin.messages.traiter', $message->id) }}"
                  method="POST" class="mt-3">
                @csrf
                @method('PATCH')
                <button class="text-green-400 hover:text-green-600">
                    Marquer comme traité
                </button>
            </form>
            @endif

            <form action="{{ route('admin.messages.destroy', $message->id) }}"
                  method="POST" class="mt-3">
                @csrf
                @method('DELETE')
                <button class="text-red-400 hover:text-red-600">
                    Supprimer
                </button>
            </form>
        </div>
    @empty
        <p class="text-gray-300">Aucune suggestion pour le moment.</p>
    @endforelse


    {{-- COMMENTAIRES --}}
    <h2 class="text-2xl font-semibold mt-10 mb-4">Commentaires</h2>

   @forelse($commentaires as $commentaire)
    <div class="bg-white/10 p-4 rounded mb-4 border border-white/20">
        <strong>{{ $commentaire->auteur }}</strong>
        <p>{{ $commentaire->contenu }}</p>
        <p class="text-sm text-gray-400">
            Chanson : {{ $commentaire->chanson->titre }}
        </p>

        <form action="{{ route('admin.commentaires.destroy', $commentaire->id) }}"
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
