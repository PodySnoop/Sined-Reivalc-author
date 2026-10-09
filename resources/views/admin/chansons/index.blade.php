@extends('layouts.app')

@section('content')
<div class="text-white p-8 max-w-4xl mx-auto">

<a href="{{ route('admin.dashboard') }}"
   class="inline-flex items-center gap-2 mb-6 px-4 py-2 rounded-lg
          bg-white/10 backdrop-blur-sm border border-white/20
          hover:bg-white/20 transition text-white font-semibold">
    <span class="text-xl">⟵</span> Retour au dashboard
</a>


    <h1 class="text-3xl font-bold mb-6">Gestion des chansons</h1>

    <table class="w-full bg-white/10 rounded">
        <tr class="border-b border-white/20">
            <th class="p-3">Titre</th>
            <th class="p-3">Genre</th>
            <th class="p-3">Actions</th>
        </tr>

        @foreach($chansons as $chanson)
        <tr class="border-b border-white/10">
            <td class="p-3">{{ $chanson->titre }}</td>
            <td class="p-3">{{ $chanson->genre }}</td>
            <td class="p-3">
                <a href="{{ route('chansons.show', $chanson->id) }}" class="text-blue-400 underline">Voir</a>
            </td>
        </tr>
        @endforeach
    </table>

</div>
@endsection
