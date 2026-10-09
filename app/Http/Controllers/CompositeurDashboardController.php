<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Message;

class CompositeurDashboardController extends Controller
{
    public function index()
    {
        $nbCommentaires = Commentaire::count();
        $nbMessages = Message::count();
        $nbMessagesNonTraites = Message::where('traite', false)->count();

        return view('compositeur.dashboard', compact(
            'nbCommentaires',
            'nbMessages',
            'nbMessagesNonTraites'
        ));
    }

}
