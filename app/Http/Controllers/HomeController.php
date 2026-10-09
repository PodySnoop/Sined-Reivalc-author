<?php

namespace App\Http\Controllers;

use App\Models\Chanson;
use App\Models\Commentaire;
use App\Models\Message;

class HomeController extends Controller
{
    public function index()
    {
        // On enregistre la page précédente AVANT d’aller sur une chanson
        session(['before_chanson' => url()->current()]);

        // Données pour la page d'accueil
        $populaires = Chanson::where('ecoutes', '>', 0)
            ->orderBy('ecoutes', 'desc')
            ->take(3)
            ->get();

        $recentes = Chanson::orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        $hasPopular = Chanson::where('ecoutes', '>', 0)->exists();

        // Données pour le dashboard compositeur
        $nbCommentaires = Commentaire::count();
        $nbMessages = Message::count();
        $nbMessagesNonTraites = Message::where('traite', false)->count();

        // Si l'utilisateur est compositeur → dashboard
        if (auth()->check() && !auth()->user()->is_admin) {
            return view('compositeur.dashboard', compact(
                'nbCommentaires',
                'nbMessages',
                'nbMessagesNonTraites'
            ));
        }

        // Sinon → page d'accueil
        return view('home', compact('populaires', 'recentes', 'hasPopular'));
    }
}
