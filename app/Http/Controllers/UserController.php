<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // Afficher tous les utilisateurs
    public function index()
    {
        $users = User::with('projects')->get();
        return view('admin.users.index', compact('users'));
    }

    // Modifier un utilisateur
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    // Mettre à jour un utilisateur
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|in:admin,user',
        ]);

        $user->update($request->all());

        return redirect()->route('admin.users.index')->with('success', 'Utilisateur mis à jour avec succès.');
    }

    // Supprimer un utilisateur
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'Utilisateur supprimé avec succès.');
    }
}
