@extends('layouts.app')

@section('content')
<div class="text-white p-8 max-w-4xl mx-auto">

<a href="{{ route('admin.dashboard') }}"
   class="inline-flex items-center gap-2 mb-6 px-4 py-2 rounded-lg
          bg-white/10 backdrop-blur-sm border border-white/20
          hover:bg-white/20 transition text-white font-semibold">
    <span class="text-xl">⟵</span> Retour au dashboard
</a>

<a href="{{ route('admin.users.create') }}"
   class="inline-flex items-center gap-2 mb-6 px-4 py-2 rounded-lg
          bg-blue-600 hover:bg-blue-700 transition text-white font-semibold">
    + Créer un utilisateur
</a>

    <h1 class="text-3xl font-bold mb-6">Gestion des utilisateurs</h1>

    <table class="w-full bg-white/10 rounded">
    <tr class="border-b border-white/20">
        <th class="p-3">Nom</th>
        <th class="p-3">Email</th>
        <th class="p-3">Admin ?</th>
        <th class="p-3">Actions</th>
    </tr>

    @foreach($users as $user)
    <tr class="border-b border-white/10">
        <td class="p-3">{{ $user->name }}</td>
        <td class="p-3">{{ $user->email }}</td>
        <td class="p-3">{{ $user->is_admin ? 'Oui' : 'Non' }}</td>

        <td class="p-3">
            @if(auth()->id() !== $user->id)
                <form action="{{ route('admin.users.delete', $user->id) }}" method="POST"
                      onsubmit="return confirm('Supprimer cet utilisateur ?')">
                    @csrf
                    @method('DELETE')

                    <button class="px-3 py-1 bg-red-600/70 hover:bg-red-600 text-white rounded">
                        Supprimer
                    </button>
                </form>
            @else
                <span class="text-gray-400 italic">Impossible</span>
            @endif
        </td>
    </tr>
    @endforeach
</table>


</div>
@endsection
