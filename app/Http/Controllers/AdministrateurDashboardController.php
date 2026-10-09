<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Chanson;
use App\Models\Commentaire;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard', [
            'nbUsers' => User::count(),
            'nbChansons' => Chanson::count(),
            'nbCommentaires' => Commentaire::count(),
        ]);
    }

    public function users()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function chansons()
    {
        $chansons = Chanson::all();
        return view('admin.chansons.index', compact('chansons'));
    }

    public function commentaires()
    {
        $commentaires = Commentaire::latest()->get();
        return view('admin.commentaires.index', compact('commentaires'));
    }

    public function settings()
    {
        return view('admin.settings');
    }

    public function index()
{
    session(['before_chanson' => url()->current()]);
    $chansons = Chanson::all();
    return view('chansons.index', compact('chansons'));
}

}
