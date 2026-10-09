<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
{
    $commentaires = Commentaire::orderBy('created_at', 'desc')->get();

    return view('compositeur.commentaires.index', compact('commentaires'));
}

    public function store(Request $request, $id)
    {
        // Validation
        $request->validate([
            'auteur' => 'required|string|max:255',
            'contenu' => 'required|string',
        ]);

        // Enregistrement
        Commentaire::create([
            'chanson_id' => $id,
            'auteur' => $request->auteur,
            'contenu' => $request->contenu,
        ]);

        return back()->with('success', 'Commentaire ajouté avec succès.');
    }

    public function destroy($id)
{
    Commentaire::findOrFail($id)->delete();

    return back()->with('success', 'Commentaire supprimé.');
}
}
