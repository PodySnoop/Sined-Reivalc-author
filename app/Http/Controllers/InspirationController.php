<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chanson;

class InspirationController extends Controller
{
    public function index()
    {
        // Page principale des inspirations
        session(['before_chanson' => url()->current()]);
        return view('inspirations.index');
    }

    public function show($type)
    {
        // On enregistre la page précédente AVANT d’aller sur une chanson
        session(['before_chanson' => url()->current()]);

        // Récupérer les chansons du même genre
        $chansons = Chanson::where('genre', $type)->get();

        // Choisir la bonne vue selon le type
        $view = match ($type) {
            'soul-jazz' => 'inspirations.soul-jazz',
            'antillaise-africaine' => 'inspirations.antillaise-africaine',
            'francaise' => 'inspirations.francaise',
            'reggae' => 'inspirations.reggae',
            default => 'inspirations.index',
        };

        // Envoyer les données à la vue
        return view($view, [
            'type' => $type,
            'chansons' => $chansons
        ]);
    }
}
