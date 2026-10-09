@extends('layouts.app')

@section('content')
<div class="text-white p-6 max-w-3xl mx-auto">

<a href="{{ route('compositeur.dashboard') }}"
   class="inline-block mb-6 px-4 py-2 rounded bg-white/10 hover:bg-white/20 text-white transition">
    ← Retour au dashboard
</a>

    <h1 class="text-3xl font-bold mb-6">Ajouter une chanson</h1>

    <form action="{{ route('chansons.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Titre -->
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Titre</label>
            <input type="text" name="titre"
                   class="w-full p-3 rounded bg-white/10 border border-white/20 text-white"
                   required>
        </div>

        <!-- Sujet -->
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Sujet</label>
            <input type="text" name="sujet"
                   class="w-full p-3 rounded bg-white/10 border border-white/20 text-white">
        </div>

        <!-- Paroles PDF -->
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Paroles (PDF)</label>
            <input type="file" name="paroles_pdf"
                   class="w-full p-3 rounded bg-white/10 border border-white/20 text-white"
                   accept="application/pdf">
        </div>

        <!-- Image -->
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Image (JPG/PNG)</label>
            <input type="file" name="image"
                   class="w-full p-3 rounded bg-white/10 border border-white/20 text-white"
                   accept="image/*">
        </div>

        <!-- Audio -->
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Audio (MP3/WAV)</label>
            <input type="file" name="audio"
                   class="w-full p-3 rounded bg-white/10 border border-white/20 text-white"
                   accept="audio/*">
        </div>

        <!-- Genre -->
        <div class="mb-6">
            <label class="block mb-1 font-semibold">Genre</label>
            <select name="genre"
                    class="w-full p-3 rounded bg-white/10 border border-white/20 text-white">
                <option value="soul-jazz">Soul‑Jazz</option>
                <option value="antillaise-africaine">Antillaise‑Africaine</option>
                <option value="francaise">Française</option>
                <option value="reggae">Reggae</option>
            </select>
        </div>

        <button type="submit"
                class="bg-white/10 px-6 py-3 rounded-lg hover:bg-white/20 transition font-semibold">
            💾 Enregistrer la chanson
        </button>

    </form>

</div>
@endsection