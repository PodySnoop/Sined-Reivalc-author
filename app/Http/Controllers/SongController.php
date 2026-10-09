<?php

namespace App\Http\Controllers;

use App\Models\Chanson;
use App\Models\Commentaire;
use Illuminate\Http\Request;

class SongController extends Controller
{
    /**
     * Page publique : liste des chansons
     */
    public function index()
{
    // On enregistre la page précédente AVANT d’aller sur une chanson
    session(['before_chanson' => url()->current()]);

    $chansons = Chanson::all();

    return view('chansons.index', compact('chansons'));
}


    /**
     * Page publique : afficher une chanson
     */
    public function show($id)
{
    $chanson = Chanson::findOrFail($id);

    // On sauvegarde l’URL de la chanson dans la session
    session(['last_page' => url()->current()]);

    // Charger les commentaires liés à la chanson
    $commentaires = Commentaire::where('chanson_id', $id)->get();

    return view('chansons.show', compact('chanson', 'commentaires'));
}


    /**
     * Suggestion (optionnel)
     */
    public function suggest(Request $request, $id)
    {
        return back()->with('success', 'Suggestion envoyée !');
    }

    /**
     * Page compositeur : formulaire d'ajout
     */
    public function create()
    {
        return view('compositeur.chansons.create');
    }

    /**
     * Enregistrer une chanson dans la base
     */
    public function store(Request $request)
{
    $request->validate([
        'titre' => 'required|string|max:255',
        'sujet' => 'nullable|string|max:255',
        'paroles_pdf' => 'nullable|file|mimes:pdf|max:20480',
        'image' => 'nullable|file|mimes:jpg,jpeg,png|max:20480',
        'audio' => 'nullable|file|mimes:mp3,wav,ogg|max:51200',
        'genre' => 'nullable|string|max:255',
    ]);

    // Upload PDF
    $paroles_pdf_path = $request->hasFile('paroles_pdf')
        ? $request->file('paroles_pdf')->store('paroles', 'public')
        : null;

    // Upload image
    // IMAGE
if ($request->hasFile('image')) {
    // Une image a été envoyée
    $image_path = $request->file('image')->store('images', 'public');
} else {
    // Aucune image envoyée → image par défaut selon le genre
    $image_path = match ($request->genre) {
        'soul-jazz' => 'images/soul-jazz-page.png',
        'antillaise-africaine' => 'images/antillaise-africaine-page.png',
        'francaise' => 'images/francaise-page.png',
        'reggae' => 'images/reggae-page.png',
        default => 'images/default-page.png',
    };
}

    // Upload audio
    $audio_path = $request->hasFile('audio')
        ? $request->file('audio')->store('audio', 'public')
        : null;

    Chanson::create([
        'titre' => $request->titre,
        'sujet' => $request->sujet,
        'paroles' => $paroles_pdf_path,
        'image' => $image_path,
        'audio' => $audio_path,
        'telechargement' => $audio_path, // le client télécharge directement l'audio
        'genre' => $request->genre,
    ]);

    return redirect()
        ->route('compositeur.chansons.index')
        ->with('success', 'Chanson ajoutée avec succès !');
}

    /**
     * Page compositeur : liste des chansons
     */
    public function compositeurIndex()
    {
        $chansons = Chanson::all();
        return view('compositeur.chansons.index', compact('chansons'));
    }

/*formulaire de modification*/
    public function edit($id)
{
    $chanson = Chanson::findOrFail($id);
    return view('compositeur.chansons.edit', compact('chanson'));
}

/* Mise à jour chanson dans la base*/
public function update(Request $request, $id)
{
    $chanson = Chanson::findOrFail($id);

    $request->validate([
        'titre' => 'required|string|max:255',
        'sujet' => 'nullable|string|max:255',
        'genre' => 'nullable|string|max:255',
        'paroles_pdf' => 'nullable|file|mimes:pdf|max:20480',
        'image' => 'nullable|image|max:20480',
        'audio' => 'nullable|mimes:mp3,wav,ogg|max:51200',
    ]);

    // Upload PDF
    if ($request->hasFile('paroles_pdf')) {
        $chanson->paroles = $request->file('paroles_pdf')->store('paroles', 'public');
    }

    // IMAGE
if ($request->hasFile('image')) {
    // Une nouvelle image a été envoyée → on remplace
    $chanson->image = $request->file('image')->store('images', 'public');
} else {
    // Aucune nouvelle image envoyée
    if (!$chanson->image) {
        // La chanson n'a pas d'image → on met l'image par défaut du genre
        $chanson->image = match ($request->genre) {
            'soul-jazz' => 'images/soul-jazz-page.png',
            'antillaise-africaine' => 'images/antillaise-africaine-page.png',
            'francaise' => 'images/francaise-page.png',
            'reggae' => 'images/reggae-page.png',
            default => 'images/default-page.png',
        };
    }
    // Si la chanson a déjà une image → on ne touche à rien
}

    // Upload audio
    if ($request->hasFile('audio')) {
        $chanson->audio = $request->file('audio')->store('audio', 'public');
        $chanson->telechargement = $chanson->audio;
    }

    // Mise à jour des champs simples
    $chanson->titre = $request->titre;
    $chanson->sujet = $request->sujet;
    $chanson->genre = $request->genre;

    $chanson->save();

    return redirect()
        ->route('compositeur.chansons.index')
        ->with('success', 'Chanson mise à jour avec succès !');
}

/* Page de confirmation de suppression */
public function deleteConfirm($id)
{
    $chanson = Chanson::findOrFail($id);
    return view('compositeur.chansons.delete', compact('chanson'));
}

/* Supprime chanson*/
public function delete($id)
{
    $chanson = Chanson::findOrFail($id);
    $chanson->delete();

    return redirect()
        ->route('compositeur.chansons.index')
        ->with('success', 'Chanson supprimée avec succès !');
}

     /*Filtrer par genre*/
    
    public function parGenre($genre)
    {
        $chansons = Chanson::where('genre', $genre)->get();
        return view('chansons.par-genre', compact('chansons', 'genre'));
    }
}