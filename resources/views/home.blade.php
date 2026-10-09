   @extends('layouts.app')

@push('styles')
<style>
    :root {
        --bleu-nuit: #007dbcff;
        --bleu-petrole: #0631a7b7;
        --vert-bouton: #18a7cfff;
        --vert-bouton-hover: #22aca3ff;
        --blanc: #f5e9d2;/*ici..*/
    --texte-secondaire: #139435ff;
    --jaune: #f5e9d2;  /* Pour .text- chaque...*/
    --orange: #1895cfff; /* Pour .bg-orange et .border-orange */
    }
    
    .hero-section {
        color: var(--blanc);
        position: relative;
        overflow: hidden;
    }

    .logo-hero {
    filter: drop-shadow(0 0 14px rgba(0, 40, 90, 0.8));
}
    
    .hero-bg {
        position: absolute;
        inset: 0;
        background: url("{{ asset('images/maison-isolee.png') }}") no-repeat center center;
        background-size: contain;
background-repeat: no-repeat;

        opacity: 1;
    }
    
    .fond-musical {
    background: url("{{ asset('images/fond-musical.png') }}") center/cover no-repeat;
    background-attachment: fixed;
    min-height: 100%;
    width: 100%;
}

    .text-jaune { color: var(--jaune); }
    .bg-orange { background-color: var(--orange); }
    .border-orange { border-color: var(--orange); }
    .hover-bg-orange:hover { background-color: var(--orange-clair); }
</style>
@endpush

@section('content')

   <section class="hero-section relative min-h-screen pt-24 overflow-hidden z-0">

    <!-- Image de fond stable -->
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('images/maison-isolee.png') }}"
             class="w-full h-full object-cover opacity-100">
    </div>

    <!-- Contenu -->
    <div class="relative z-10 max-w-6xl mx-auto px-6 flex flex-col md:flex-row items-start gap-10">

        <!-- Logo -->
        <img src="{{ asset('images/logo.png') }}"
             alt="Logo Sined Reivalc"
             class="h-28 md:h-36">

        <!-- Texte -->
        <div class="text-center md:text-left">
            <h1 class="text-5xl font-bold mb-4 text-jaune">Chaque émotion sa chanson</h1>
            <p class="text-xl opacity-90 max-w-2xl">
                Ici, chaque émotion trouve sa mélodie. Explore, découvre, ressens et laisse la musique te guider.
            </p>
        </div>

    </div>
</section>

<div class="fond-musical">

    <!-- Barre de recherche -->
    <section class="bg-transparent py-8 shadow-md">
        <div class="max-w-4xl mx-auto px-4">
            <form action="{{ route('recherche') }}" method="GET" class="relative">
                <input 
                    type="text" 
                    name="q" 
                    placeholder="Rechercher une chanson, un thème, une émotion…" 
                    class="w-full px-6 py-4 text-lg border-2 border-gray-200 rounded-full focus:outline-none focus:border-orange"
                >
                <button type="submit" class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-orange text-white px-6 py-2 rounded-full hover-bg-orange transition-colors">
                    Rechercher
                </button>
            </form>
        </div>
    </section>

     <!-- Section types chansons -->
    <section class="py-20 bg-transparent">
    <div class="max-w-6xl mx-auto px-4">
        <h2 class="text-5xl font-extrabold mb-10 text-center text-white">
            Explorez par inspiration musicale
        </h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mt-10">

   <!-- Soul-Jazz -->
<a href="{{ route('inspiration.show', 'soul-jazz') }}" 
   class="block bg-white/20 backdrop-blur-md rounded-xl p-4 text-center shadow hover:shadow-lg transition">
    
    <div class="relative mb-4 h-40">
    <img src="{{ asset('images/inspiration-soul-jazz.png') }}"
         class="w-full h-full object-cover rounded-lg">
</div>

    <h3 class="text-xl font-bold text-white">Soul-Jazz</h3>
</a>


<!-- Antillaise-Africaine -->
<a href="{{ route('inspiration.show', 'antillaise-africaine') }}" 
   class="block bg-white/20 backdrop-blur-md rounded-xl p-4 text-center shadow hover:shadow-lg transition">
    
    <div class="relative mb-4 h-40">
        <img src="{{ asset('images/inspiration-antillaise-africaine.png') }}"
            class="w-full h-full object-cover rounded-lg">
    </div>

    <h3 class="text-xl font-bold text-white">Antillaise‑Africaine</h3>
</a>


<!-- Française -->
<a href="{{ route('inspiration.show', 'francaise') }}" 
   class="block bg-white/20 backdrop-blur-md rounded-xl p-4 text-center shadow hover:shadow-lg transition">
    
    <div class="relative mb-4 h-40">
        <img src="{{ asset('images/inspiration-francaise.png') }}"
             class="w-full h-full object-cover object-[center_20%] rounded-lg">
    </div>

    <h3 class="text-xl font-bold text-white">Française</h3>
</a>


<!-- Reggae -->
<a href="{{ route('inspiration.show', 'reggae') }}" 
   class="block bg-white/20 backdrop-blur-md rounded-xl p-4 text-center shadow hover:shadow-lg transition">
    
    <div class="relativ mb-4 h-40">
        <img src="{{ asset('images/inspiration-reggae.png') }}"
             class="w-full h-full object-cover rounded-lg">
    </div>

    <h3 class="text-xl font-bold text-white">Reggae</h3>
</a>

</div>
    </div>
</section>

    <!-- Section À propos -->
<section class="py-20 bg-transparent">
    <div class="max-w-6xl mx-auto px-4">
        <h2 class="text-5xl font-extrabold mb-6 text-white drop-shadow-lg">À propos du compositeur</h2>

        <div class="space-y-4 text-lg leading-relaxed text-white drop-shadow-md">
            <p>
                Né guadeloupéen et arrivé en France encore enfant, j'ai subi et vu plusieurs injustices de tous types. Ainsi, j'ai aussi connu et vécu toutes sortes de partages et de bonheur avec ma fmaille et amis.
            </p>
            <p>
                Comme le dit mon logo, chaque émotion sa chanson car mes chansons sont évocatrices de délivrance pour les injustices, les douleurs, les peurs mais d'autres le sont plus pour la joie et le partage ainsi que pour célébrer le bonheur.
            </p>
        </div>
    </div>
</section>

               <!-- Section Créations -->
<section class="py-20">
    <div class="max-w-6xl mx-auto px-4">

        <div class="bg-blue-100 rounded-2xl p-10">

            <div class="text-center mb-10">
                <div class="text-6xl mb-4">🎵</div>
                <h3 class="text-3xl font-bold text-blue-900">Découvrez mes créations</h3>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">

                <!-- 🔥 Les plus Populaires -->
                <div>
                    <h4 class="text-xl font-semibold text-blue-900 mb-3">🔥 Les plus populaires</h4>

                    @if(!$hasPopular)
                        <p class="text-gray-700">Aucune chanson populaire pour le moment.</p>
                    @else
                        @foreach($populaires as $chanson)
                            @php
                                if ($chanson->image && file_exists(public_path('storage/' . $chanson->image))) {
                                    $imagePath = asset('storage/' . $chanson->image);
                                } elseif ($chanson->genre && file_exists(public_path('images/' . $chanson->genre . '-page.png'))) {
                                    $imagePath = asset('images/' . $chanson->genre . '-page.png');
                                } else {
                                    $imagePath = asset('images/default.png');
                                }
                            @endphp

                            <div class="flex items-center gap-4 bg-white/60 p-3 rounded-lg shadow mb-4">
                                <img src="{{ $imagePath }}" class="w-16 h-16 object-cover rounded-md">

                                <div class="flex-1">
                                    <p class="font-bold text-blue-900">{{ $chanson->titre }}</p>
                                    <p class="text-sm text-gray-700">{{ $chanson->ecoutes }} écoutes</p>
                                </div>

                                <a href="{{ route('chansons.show', $chanson->id) }}"
                                   class="text-blue-700 font-semibold hover:underline">
                                    Voir
                                </a>
                            </div>
                        @endforeach
                    @endif
                </div>

                <!-- 🆕 Les plus récentes -->
                <div>
                    <h4 class="text-xl font-semibold text-blue-900 mb-3">🆕 Les plus récentes</h4>

                    @forelse($recentes as $chanson)
                        @php
                            if ($chanson->image && file_exists(public_path('storage/' . $chanson->image))) {
                                $imagePath = asset('storage/' . $chanson->image);
                            } elseif ($chanson->genre && file_exists(public_path('images/' . $chanson->genre . '-page.png'))) {
                                $imagePath = asset('images/' . $chanson->genre . '-page.png');
                            } else {
                                $imagePath = asset('images/default.png');
                            }
                        @endphp

                        <div class="flex items-center gap-4 bg-white/60 p-3 rounded-lg shadow mb-4">
                            <img src="{{ $imagePath }}" class="w-16 h-16 object-cover rounded-md">

                            <div class="flex-1">
                                <p class="font-bold text-blue-900">{{ $chanson->titre }}</p>
                                <p class="text-sm text-gray-700">
                                    Ajoutée le {{ $chanson->created_at->format('d/m/Y') }}
                                </p>
                            </div>

                            <a href="{{ route('chansons.show', $chanson->id) }}"
                               class="text-blue-700 font-semibold hover:underline">
                                Voir
                            </a>
                        </div>
                    @empty
                        <p class="text-gray-700">Aucune chanson récente pour le moment.</p>
                    @endforelse
                </div>

            </div>

            <div class="text-center mt-10">
                <a href="{{ route('chansons.index') }}"
                   class="inline-block bg-orange text-white px-8 py-3 rounded-full hover-bg-orange transition-colors font-semibold">
                    Explorer toutes les chansons
                </a>
            </div>

        </div>

    </div>
</section>




    <!-- Section Call-to-action -->
    <section class="py-20 bg-gradient-to-r from-orange-600 to-blue-700 text-white">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h2 class="text-4xl font-bold mb-6">Partagez vos émotions</h2>
            <p class="text-xl mb-8">Chaque chanson est une invitation à ressentir, à partager et à célébrer la vie.</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">

                @auth
                <a href="{{ route('compositeur.dashboard') }}" class="border-2 border-white text-white px-8 py-4 rounded-full hover:bg-white hover:text-blue-700 transition-colors font-semibold">
                    Espace compositeur
                </a>
                @endauth

                @guest
                <a href="{{ route('login') }}" class="border-2 border-white text-white px-8 py-4 rounded-full hover:bg-white hover:text-blue-700 transition-colors font-semibold">
                    Espace compositeur
                </a>
                @endguest
            </div>
        </div>
    </section>
@endsection


</body>
</html>