<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Chanson;
use App\Models\Commentaire;
use App\Models\Message;


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

    public function createUser()
{
    return view('admin.users.create');
}

public function storeUser(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6',
        'is_admin' => 'required|in:0,1',
    ]);

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'is_admin' => $request->is_admin,
    ]);

    return redirect()->route('admin.dashboard')
                     ->with('success', 'Utilisateur créé avec succès.');
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
    $messages = Message::with('chanson')->get();
    $commentaires = Commentaire::with('chanson')->get();

    return view('admin.commentaires.index', compact('messages', 'commentaires'));
}


    public function settings()
    {
        return view('admin.settings');
    }

    public function destroyMessage($id)
{
    $message = Message::findOrFail($id);
    $message->delete();

    return redirect()->back()->with('success', 'Message supprimé.');
}

    public function deleteUser($id)
{
    // Empêcher la suppression de soi-même
    if (auth()->id() == $id) {
        return redirect()->back()->with('error', 'Vous ne pouvez pas supprimer votre propre compte.');
    }

    $user = User::findOrFail($id);
    $user->delete();

    return redirect()->back()->with('success', 'Utilisateur supprimé avec succès.');
}
}
