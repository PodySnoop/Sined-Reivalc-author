@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-10 px-6">

    {{-- Titre --}}
    <h1 class="text-4xl font-bold mb-8 text-white">
        Tableau de bord Administrateur
    </h1>

    {{-- Cartes statistiques --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">

       <div class="bg-[#0d0d12] p-6 rounded-xl shadow border border-white/10">
    <h2 class="text-lg font-semibold text-white">Utilisateurs</h2>
    <p class="text-3xl font-bold text-[#60a5fa] mt-2">
        {{ \App\Models\User::count() }}
    </p>
</div>


        <div class="bg-white/10 backdrop-blur-md p-6 rounded-xl shadow border border-white/10">
            <h2 class="text-lg font-semibold text-white">Chansons</h2>
            <p class="text-3xl font-bold text-[#60a5fa] mt-2">
                {{ \App\Models\Chanson::count() }}
            </p>
        </div>

        <div class="bg-white/10 backdrop-blur-md p-6 rounded-xl shadow border border-white/10">
            <h2 class="text-lg font-semibold text-white">Commentaires</h2>
            <p class="text-3xl font-bold text-[#60a5fa] mt-2">
                {{ \App\Models\Commentaire::count() }}
            </p>
        </div>

    </div>

    {{-- Section gestion --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

        {{-- Gestion des utilisateurs --}}
        <div class="bg-white/10 backdrop-blur-md p-6 rounded-xl shadow border border-white/10">
            <h2 class="text-2xl font-semibold text-white mb-4">Gestion des utilisateurs</h2>
            <p class="text-gray-300 mb-4">
                Voir, modifier ou supprimer les comptes utilisateurs.
            </p>
            <a href="{{ route('admin.users') }}" class="inline-block bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">
                Gérer les utilisateurs
            </a>
        </div>

        {{-- Gestion des chansons --}}
        <div class="bg-white/10 backdrop-blur-md p-6 rounded-xl shadow border border-white/10">
            <h2 class="text-2xl font-semibold text-white mb-4">Gestion des chansons</h2>
            <p class="text-gray-300 mb-4">
                Accéder à toutes les chansons du site, les modifier ou les supprimer.
            </p>
            <a href="{{ route('admin.chansons') }}" class="inline-block bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">
                Gérer les chansons
            </a>
        </div>

        {{-- Gestion des commentaires --}}
        <div class="bg-white/10 backdrop-blur-md p-6 rounded-xl shadow border border-white/10">
            <h2 class="text-2xl font-semibold text-white mb-4">Gestion des commentaires</h2>
            <p class="text-gray-300 mb-4">
                Modérer les commentaires laissés par les utilisateurs.
            </p>
            <a href="{{ route('admin.commentaires') }}" class="inline-block bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">
                Gérer les commentaires
            </a>
        </div>


        <a href="{{ route('password.change') }}"
   class="text-blue-500 hover:underline">
   Changer mon mot de passe
</a>


        {{-- Paramètres admin --}}
        <div class="bg-white/10 backdrop-blur-md p-6 rounded-xl shadow border border-white/10">
            <h2 class="text-2xl font-semibold text-white mb-4">Paramètres administrateur</h2>
            <p class="text-gray-300 mb-4">
                Configurer les options globales du site.
            </p>
            <a href="{{ route('admin.settings') }}" class="inline-block bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">
                Paramètres
            </a>
        </div>

    </div>

</div>
@endsection
