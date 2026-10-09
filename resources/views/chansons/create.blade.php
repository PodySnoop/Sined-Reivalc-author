@extends('layouts.app')

@section('content')

    <h1 class="text-2xl font-bold mb-6">Ajouter une chanson</h1>

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('chansons.store') }}" method="POST" class="space-y-6">
        @csrf

        <div>
            <label class="block font-medium mb-1">Titre</label>
            <input type="text" name="titre" class="w-full border-gray-300 rounded" required>
        </div>

        <div>
            <label class="block font-medium mb-1">Paroles</label>
            <textarea name="paroles" rows="8" class="w-full border-gray-300 rounded" required></textarea>
        </div>

        <button class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            Enregistrer
        </button>
    </form>

@endsection