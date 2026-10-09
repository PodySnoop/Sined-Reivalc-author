@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto mt-20 bg-white/10 p-8 rounded-lg text-white">

    <h2 class="text-3xl font-bold mb-6">Changer mon mot de passe</h2>

    {{-- Bouton retour --}}
<div class="mb-6">
    <a href="{{ route('compositeur.dashboard') }}"
       class="px-4 py-2 rounded bg-white/10 hover:bg-white/20 transition">
        ← Retour au tableau de bord
    </a>
</div>

    @if(session('success'))
        <div class="bg-green-600 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('password.update') }}" method="POST">
        @csrf

        <!-- Mot de passe actuel -->
        <label class="block mb-2">Mot de passe actuel</label>
        <div class="relative mb-4">
            <input type="password" name="current_password"
                   id="current_password"
                   class="w-full p-3 rounded bg-white/20" required>

            <button type="button"
                    onclick="togglePassword('current_password')"
                    class="absolute right-3 top-1/2 -translate-y-1/2 text-white">
                👁️
            </button>
        </div>

        <!-- Nouveau mot de passe -->
        <label class="block mb-2">Nouveau mot de passe</label>
        <div class="relative mb-4">
            <input type="password" name="new_password"
                   id="new_password"
                   class="w-full p-3 rounded bg-white/20" required>

            <button type="button"
                    onclick="togglePassword('new_password')"
                    class="absolute right-3 top-1/2 -translate-y-1/2 text-white">
                👁️
            </button>
        </div>

        <!-- Confirmation -->
        <label class="block mb-2">Confirmer le nouveau mot de passe</label>
        <div class="relative mb-6">
            <input type="password" name="new_password_confirmation"
                   id="new_password_confirmation"
                   class="w-full p-3 rounded bg-white/20" required>

            <button type="button"
                    onclick="togglePassword('new_password_confirmation')"
                    class="absolute right-3 top-1/2 -translate-y-1/2 text-white">
                👁️
            </button>
        </div>

        <button class="bg-orange px-6 py-3 rounded font-semibold">
            Mettre à jour
        </button>
    </form>
</div>

<!-- Script pour afficher / masquer -->
<script>
function togglePassword(id) {
    const input = document.getElementById(id);
    input.type = input.type === "password" ? "text" : "password";
}
</script>
@endsection
