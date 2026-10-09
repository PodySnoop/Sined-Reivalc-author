@extends('layouts.app')

@section('content')
<div class="min-h-screen px-8 py-16 text-white"
     style="background: linear-gradient(135deg, #3b1f1f, #4b2a6f);">

    <h1 class="text-4xl font-bold mb-8">Mentions légales</h1>

    {{-- Bouton retour à la page précédente --}}
<a href="{{ url()->previous() }}"
   class="inline-block mb-6 px-4 py-2 rounded bg-white/10 hover:bg-white/20 transition">
    ← Retour
</a>


    <div class="bg-white/10 p-6 rounded-lg border border-white/20 backdrop-blur-sm">

        <h2 class="text-2xl font-semibold mb-4">Éditeur du site</h2>
        <p class="mb-4">
            Ce site est édité par <strong>PodySnoop</strong>, créatrice, développeuse et directrice artistique.
            <br>Adresse : <em>Communiquée sur demande</em>
            <br>Email : <em>podysnoop@gmail.com</em>
        </p>

        <h2 class="text-2xl font-semibold mb-4">Hébergement</h2>
        <p class="mb-4">
            Le site est hébergé par <strong>Render</strong>.
            <br>Adresse : <em>sined.reivalc@gmail.com</em>
        </p>

        <h2 class="text-2xl font-semibold mb-4">Propriété intellectuelle</h2>
        <p class="mb-4">
            L’ensemble du contenu présent sur ce site (textes, images, compositions musicales,
            visuels, logos, design, code) est protégé par le droit d’auteur.
            Toute reproduction ou diffusion sans autorisation est interdite.
        </p>

        <h2 class="text-2xl font-semibold mb-4">Responsabilité</h2>
        <p class="mb-4">
            L’éditeur ne peut être tenu responsable en cas d’erreurs techniques,
            d’indisponibilité temporaire ou d’utilisation inappropriée du site.
        </p>

        <h2 class="text-2xl font-semibold mb-4">Liens externes</h2>
        <p class="mb-4">
            Le site peut contenir des liens vers des sites tiers.
            L’éditeur n’est pas responsable du contenu de ces sites.
        </p>

        <h2 class="text-2xl font-semibold mb-4">Contact</h2>
        <p>
            Pour toute question concernant le site ou son contenu :
            <br>📧 <em>sined.reivalc@gmail.com</em>
        </p>

    </div>
</div>
@endsection
