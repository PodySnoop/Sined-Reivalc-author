<?php

use App\Http\Controllers\SongController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InspirationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\PasswordController;


// --- Routes publiques ---
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/chansons', [SongController::class, 'index'])->name('chansons.index');
Route::get('/chanson/{id}', [SongController::class, 'show'])->name('chansons.show');

Route::get('/recherche', [SearchController::class, 'index'])->name('recherche');
Route::get('/chansons/type/{genre}', [SongController::class, 'parGenre'])
    ->name('chansons.type');

Route::post('/chanson/{id}/comment', [CommentController::class, 'store'])->name('comment.store');
Route::post('/chanson/{id}/suggest', [MessageController::class, 'store'])->name('suggest.store');

Route::get('/inspiration/{type}', [InspirationController::class, 'show'])
    ->name('inspiration.show');

Route::get('/mentions-legales', function () {
    return view('legal');
})->name('legal');

Route::get('/politique-de-confidentialite', function () {
    return view('privacy');
})->name('privacy');
  

    // --- Redirection après connexion (redirection en fonction du rôle)---
Route::get('/redirect-after-login', function () {
    if (auth()->user()->is_admin) {
        return redirect()->route('admin.dashboard');
    }
    return redirect()->route('compositeur.dashboard');
})->name('redirect.after.login');

// --- Changement de mot de passe (accessible à tous les utilisateurs connectés) ---
Route::get('/password/change', function () {
    return view('auth.password-change');
})->middleware('auth')->name('password.change');

Route::post('/password/update', [PasswordController::class, 'update'])
    ->middleware('auth')
    ->name('password.update');

// --- Routes réservées au compositeur connecté ---
Route::middleware(['auth'])->prefix('compositeur')->group(function () {

    // Dashboard
    Route::get('/dashboard', [\App\Http\Controllers\CompositeurDashboardController::class, 'index'])
    ->name('compositeur.dashboard');

    // Liste privée des chansons
    Route::get('/chansons', [SongController::class, 'compositeurIndex'])
        ->name('compositeur.chansons.index');

    // Formulaire d'ajout
    Route::get('/chansons/create', [SongController::class, 'create'])
        ->name('compositeur.chansons.create');

    // Enregistrement d'une chanson
    Route::post('/chansons', [SongController::class, 'store'])
        ->name('chansons.store');

        // Formulaire de modification
Route::get('/chansons/{id}/edit', [SongController::class, 'edit'])
    ->name('compositeur.chansons.edit');

// Mise à jour
Route::put('/chansons/{id}', [SongController::class, 'update'])
    ->name('compositeur.chansons.update');

// Page de confirmation
    Route::get('/chansons/{id}/delete', [SongController::class, 'deleteConfirm'])
        ->name('compositeur.chansons.delete');

    // Suppression définitive
    Route::delete('/chansons/{id}', [SongController::class, 'delete'])
        ->name('compositeur.chansons.destroy');

    // Commentaires
    Route::get('/commentaires', [CommentController::class, 'index'])
        ->name('compositeur.commentaires.index');

    Route::delete('/commentaires/{id}', [CommentController::class, 'destroy'])
    ->name('compositeur.commentaires.destroy');


    // Messages
    Route::get('/messages', [MessageController::class, 'index'])
        ->name('compositeur.messages.index');

        Route::patch('/messages/{id}/traiter', [MessageController::class, 'traiter'])
    ->name('compositeur.messages.traiter');

    Route::delete('/messages/{id}', [MessageController::class, 'destroy'])
    ->name('compositeur.messages.destroy');


});

// --- Routes réservées à admin connecté ---
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {

    Route::get('/users/create', [AdminController::class, 'createUser'])
    ->name('admin.users.create');

Route::post('/users/create', [AdminController::class, 'storeUser'])
    ->name('admin.users.store');

    Route::middleware(['admin'])->group(function () {

    // Voir les messages
    Route::get('/messages', [AdminController::class, 'messages'])
        ->name('admin.messages');

    // Marquer comme traité
    Route::patch('messages/{id}/traiter', [AdminController::class, 'traiterMessage'])
        ->name('admin.messages.traiter');

    // Supprimer
    Route::delete('messages/{id}', [AdminController::class, 'destroyMessage'])
        ->name('admin.messages.destroy');
});

   Route::get('/dashboard', [AdminController::class, 'dashboard'])
    ->name('admin.dashboard');

     Route::get('/users', [AdminController::class, 'users'])
        ->name('admin.users');

        Route::delete('/users/{id}', [AdminController::class, 'deleteUser'])
    ->name('admin.users.delete');

    Route::get('/chansons', [AdminController::class, 'chansons'])
        ->name('admin.chansons');

    Route::get('/commentaires', [AdminController::class, 'commentaires'])
        ->name('admin.commentaires');

        Route::delete('/commentaires/{id}', [CommentController::class, 'destroy'])
    ->name('admin.commentaires.destroy');

    Route::get('/settings', [AdminController::class, 'settings'])
        ->name('admin.settings');
});

require __DIR__.'/auth.php';

