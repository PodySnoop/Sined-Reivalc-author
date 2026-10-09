<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chanson;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        session(['before_chanson' => route('home')]);

        if (!$request->filled('q')) {
            return view('recherche.index', [
                'query' => null,
                'resultats' => []
            ]);
        }

        $query = $request->input('q');

        // Recherche dans les colonnes EXISTANTES
        $resultats = Chanson::where('titre', 'LIKE', "%$query%")
            ->orWhere('genre', 'LIKE', "%$query%")
            ->orWhere('sujet', 'LIKE', "%$query%")
            ->orWhere('paroles', 'LIKE', "%$query%")
            ->get();

        return view('recherche.index', [
            'query' => $query,
            'resultats' => $resultats
        ]);
    }
}
