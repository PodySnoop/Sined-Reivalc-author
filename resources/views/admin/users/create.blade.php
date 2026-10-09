@extends('layouts.app')

@section('content')
<div class="text-white p-8 max-w-xl mx-auto">

<a href="{{ route('admin.dashboard') }}"
   class="inline-flex items-center gap-2 mb-6 px-4 py-2 rounded-lg
          bg-white/10 backdrop-blur-sm border border-white/20
          hover:bg-white/20 transition text-white font-semibold">
    <span class="text-xl">⟵</span> Retour au dashboard
</a>

<h1 class="text-3xl font-bold mb-6">Créer un utilisateur</h1>

<form action="{{ route('admin.users.store') }}" method="POST" class="space-y-4">
    @csrf

    @if ($errors->any())
    <div class="mb-4 p-3 bg-red-600/70 text-white rounded">
        <ul class="list-disc ml-4">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <div>
        <label class="block mb-1">Nom</label>
        <input type="text" name="name" required
               class="w-full p-2 rounded bg-white/10 border border-white/20 text-white">
    </div>

    <div>
        <label class="block mb-1">Email</label>
        <input type="email" name="email" required
               class="w-full p-2 rounded bg-white/10 border border-white/20 text-white">
    </div>

    <div>
        <label class="block mb-1">Mot de passe</label>
        <input type="password" name="password" required
               class="w-full p-2 rounded bg-white/10 border border-white/20 text-white">
    </div>

    <div>
        <label class="block mb-1">Admin ?</label>
        <select name="is_admin"
                class="w-full p-2 rounded bg-white/10 border border-white/20 text-white">
            <option value="0">Non</option>
            <option value="1">Oui</option>
        </select>
    </div>

    <button class="px-4 py-2 bg-blue-600 hover:bg-blue-700 rounded text-white font-semibold">
        Créer l'utilisateur
    </button>
</form>

</div>
@endsection
