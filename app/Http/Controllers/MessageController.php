<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message; // ou Suggestion si tu préfères

class MessageController extends Controller
{
    public function store(Request $request, $id)
    {
        // Validation
        $request->validate([
            'suggestion' => 'required|string',
        ]);

        // Enregistrement
        Message::create([
            'chanson_id' => $id,
            'sujet' => 'Suggestion', // valeur par défaut
            'contenu' => $request->suggestion,
            'envoye_par' => 'visiteur', // ou user_id si connecté
        ]);

        return back()->with('success', 'Suggestion envoyée.');
    }
    public function index()
    {
        $messages = Message::latest()->get();

        return view('compositeur.messages.index', compact('messages'));
    }
    public function traiter($id)
{
    $message = Message::findOrFail($id);
    $message->traite = true;
    $message->save();

    return back()->with('success', 'Message marqué comme traité.');
}

public function destroy($id)
{
    Message::findOrFail($id)->delete();

    return back()->with('success', 'Message supprimé.');
}

}
