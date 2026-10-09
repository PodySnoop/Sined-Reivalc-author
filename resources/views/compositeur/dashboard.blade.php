@extends('layouts.app')

@section('content')
<div class="relative min-h-screen">

    {{-- Image de fond --}}
    <div class="absolute inset-0 bg-cover bg-center"
         style="background-image: url('/images/fond-compo.jpg');"></div>

    {{-- Overlay sombre --}}
    <div class="absolute inset-0 bg-black/40"></div>

    {{-- Contenu --}}
    <div class="relative text-white p-6">
        <h1 class="text-3xl font-bold mb-6">Tableau de bord du compositeur</h1>

<p class="text-white/80 mb-6 text-lg">
    Bonjour Sined, bienvenu dans ton espace. Prêt à créer quelque chose de beau et qui te ressemble aujourd’hui ?
</p>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <a href="{{ route('compositeur.chansons.create') }}"
               class="bg-white/10 p-6 rounded-xl shadow hover:bg-white/20 transition">
                ➕ Ajouter une chanson
            </a>

            <a href="{{ route('password.change') }}"
   class="text-blue-500 hover:underline">
   Changer mon mot de passe
</a>

            <a href="{{ route('compositeur.chansons.index') }}"
               class="bg-white/10 p-6 rounded-xl shadow hover:bg-white/20 transition">
                🎵 Gérer mes chansons
            </a>

            <a href="{{ route('compositeur.commentaires.index') }}"
               class="bg-white/10 p-6 rounded-xl shadow hover:bg-white/20 transition">
                💬 Commentaires reçus
                <span class="text-sm opacity-70">({{ $nbCommentaires }})</span>
            </a>

            <a href="{{ route('compositeur.messages.index') }}"
               class="bg-white/10 p-6 rounded-xl shadow hover:bg-white/20 transition">
                ✉️ Messages
                <span class="text-sm opacity-70">({{ $nbMessages }})</span>

                @if($nbMessagesNonTraites > 0)
                    <span class="ml-2 bg-red-500 text-white px-2 py-1 rounded text-xs">
                        {{ $nbMessagesNonTraites }} nouveau(x)
                    </span>
                @endif
            </a>

        </div>
    </div>
</div>
@endsection
