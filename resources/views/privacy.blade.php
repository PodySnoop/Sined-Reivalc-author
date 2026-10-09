@extends('layouts.app')

@section('content')
<div class="min-h-screen px-8 py-16 text-white"
     style="background: linear-gradient(135deg, #3b1f1f, #4b2a6f);">

    <h1 class="text-4xl font-bold mb-8">Politique de confidentialité</h1>

      {{-- Bouton retour à la page précédente --}}
<a href="{{ url()->previous() }}"
   class="inline-block mb-6 px-4 py-2 rounded bg-white/10 hover:bg-white/20 transition">
    ← Retour
</a>


    <div class="bg-white/10 p-6 rounded-lg border border-white/20 backdrop-blur-sm">

        <h2 class="text-2xl font-semibold mb-4">1. Données collectées</h2>
        <p class="mb-4">
            Le site collecte uniquement les données nécessaires à son fonctionnement :
            nom, email, mot de passe (chiffré), commentaires, suggestions, données techniques.
        </p>

        <h2 class="text-2xl font-semibold mb-4">2. Finalité de la collecte</h2>
        <p class="mb-4">
            Les données sont utilisées pour permettre la connexion, afficher les contenus,
            améliorer l’expérience utilisateur et assurer la sécurité du site.
        </p>

        <h2 class="text-2xl font-semibold mb-4">3. Conservation des données</h2>
        <p class="mb-4">
            Les données sont conservées tant que le compte est actif.
            Les commentaires et suggestions peuvent être supprimés par l’administrateur.
        </p>

        <h2 class="text-2xl font-semibold mb-4">4. Sécurité</h2>
        <p class="mb-4">
            Le site utilise des mesures de sécurité telles que le chiffrement des mots de passe,
            la protection des accès administrateur et l’absence de stockage de données sensibles en clair.
        </p>

        <h2 class="text-2xl font-semibold mb-4">5. Partage des données</h2>
        <p class="mb-4">
            Les données ne sont jamais revendues, partagées ou transmises à des tiers.
        </p>

        <h2 class="text-2xl font-semibold mb-4">6. Droits des utilisateurs</h2>
        <p class="mb-4">
            Conformément au RGPD, vous pouvez demander l’accès, la modification,
            la suppression ou la portabilité de vos données.
            <br>Contact : 📧 <em>sined.reivalc@gmail.com et podysnoop@gmail.com</em>
        </p>

        <h2 class="text-2xl font-semibold mb-4">7. Cookies</h2>
        <p>
            Le site utilise uniquement des cookies techniques nécessaires au fonctionnement
            (session, authentification). Aucun cookie publicitaire n’est utilisé.
        </p>

    </div>
</div>
@endsection
