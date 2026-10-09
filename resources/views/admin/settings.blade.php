@extends('layouts.app')

@section('content')
<div class="text-white p-8 max-w-3xl mx-auto">
    
    <a href="{{ route('admin.dashboard') }}"
   class="inline-flex items-center gap-2 mb-6 px-4 py-2 rounded-lg
          bg-white/10 backdrop-blur-sm border border-white/20
          hover:bg-white/20 transition text-white font-semibold">
    <span class="text-xl">⟵</span> Retour au dashboard
</a>


    <h1 class="text-3xl font-bold mb-6">Paramètres du site</h1>

    <p class="text-gray-300">Ici tu pourras ajouter des options globales plus tard.</p>

</div>
@endsection
