<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Project;

class ProjectController extends Controller
{
    // Afficher tous les projets d'un utilisateur
    public function index()
    {
        $projects = Project::with('tasks')->where('user_id', auth()->id())->get();
        //$projects = auth()->user()->projects()->with('tasks')->get();
        return view('dashboard.projects', compact('projects'));
    }

    // Afficher le formulaire de création d'un projet
    public function create()
    {
        return view('projects.create');
    }

    // Enregistrer un nouveau projet
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'deadline' => 'required|date',
            'status' => 'required|in:en cours,terminé',
        ]);

        auth()->user()->projects()->create($request->all());

        return redirect()->route('dashboard.projects')->with('success', 'Projet créé avec succès.');
    }

    // Afficher le formulaire de modification d'un projet
    public function edit($id)
    {
        $project = Project::findOrFail($id);

        // Autorisation personnalisée
        if (auth()->user()->id !== $project->user_id) {
            abort(403, 'Vous n\'êtes pas autorisé à modifier ce projet.');
        }

        return view('projects.edit', compact('project'));
    }


// Méthode pour mettre à jour un projet
public function update(Request $request, $id)
{
    $project = Project::findOrFail($id);

    // Vérification que l'utilisateur connecté est bien le propriétaire du projet
    if ($project->user_id !== auth()->id()) {
        return redirect()->route('dashboard.projects')->with('error', 'Vous n\'êtes pas autorisé à modifier ce projet.');
    }

    // Validation des données du formulaire
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string|max:1000',
        'deadline' => 'required|date',
        'status' => 'required|in:en cours,terminé',
    ]);

    // Mise à jour du projet
    $project->update($request->all());

    return redirect()->route('dashboard.projects')->with('success', 'Projet mis à jour avec succès.');
}


    // Supprimer un projet
    public function destroy($id)
    {
        // Trouver le projet
        $project = Project::findOrFail($id);

        // Vérifier si l'utilisateur est le propriétaire du projet
        if ($project->user_id !== auth()->id()) {
            // Si ce n'est pas le propriétaire, renvoyer une réponse d'erreur
            return redirect()->route('dashboard.projects')->with('error', 'Vous n\'êtes pas autorisé à supprimer ce projet.');
        }

        // Supprimer le projet
        $project->delete();

        // Rediriger avec un message de succès
        return redirect()->route('dashboard.projects')->with('success', 'Projet supprimé avec succès.');
    }

}

