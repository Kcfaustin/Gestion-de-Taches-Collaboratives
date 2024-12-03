<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Project;
use App\Models\Task;

class HomeController extends Controller
{
    // Tableau de bord
    public function dashboard()
    {
        if (auth()->user()->isAdmin()) {

            $usersCount = User::count(); // Total des utilisateurs
            $projectsCount = Project::count(); // Total des projets
            $tasksCount = Task::count(); // Total des tâches
            // Compter les projets "en cours" et "terminé"
            $projectsInProgressCount = Project::where('status', 'en cours')->count();
            $projectsCompletedCount = Project::where('status', 'terminé')->count();



            return view('admin.dashboard', compact('usersCount', 'projectsCount', 'tasksCount', 'projectsInProgressCount', 'projectsCompletedCount'));
        }

        $tasks = Task::whereHas('project', function ($query) {
            $query->where('user_id', auth()->id());
        })->get();

        $projects = Project::with('tasks')->where('user_id', auth()->id())->get();

        $userId = auth()->id();

        $stats = [

            'tasks_not_completed' => Task::where('assigned_to', $userId)->where('status', 'non commencé')->count(),
            'tasks_in_progress' => Task::where('assigned_to', $userId)->where('status', 'en cours')->count(),
            'tasks_completed' => Task::where('assigned_to', $userId)->where('status', 'terminé')->count(),

            /* 'tasks_in_progress' => $tasks->where('status', 'en cours')->count(),
            'tasks_completed' => $tasks->where('status', 'terminé')->count(),
            'tasks_not_completed'=> $tasksNotStarted = $tasks->where('status', 'non commencé')->count(), */
            'projects_in_progress' => $projects->where('status', 'en cours')->count(),
            'projects_completed' => $projects->where('status', 'terminé')->count(),
        ];

        return view('dashboard', compact('stats', 'tasks', 'projects'));
    }

    // Liste des utilisateurs
    public function listUsers()
    {
        $users = User::withCount('projects')->get(); // Chargement des utilisateurs avec leur nombre de projets
        return view('admin.users.index', compact('users'));
    }

    // Liste des projets d'un utilisateur
    public function listUserProjects($id)
    {
        $user = User::findOrFail($id); // Recherche de l'utilisateur
        $projects = $user->projects; // Projets de l'utilisateur
        return view('admin.users.projects', compact('user', 'projects'));
    }

    public function listProjects()
    {
        // Exemple : Récupérer les projets depuis la base de données
        $projects = Project::all();

        // Retourner la vue avec les projets
        return view('admin.projects.index', compact('projects'));
    }

    // Suppression d'un utilisateur
    public function deleteUser($id)
    {
        $user = User::findOrFail($id);

        if ($user->usertype === 'admin') {
            return redirect()->route('admin.users.index')->with('error', 'Impossible de supprimer un Administrateur.');
        }

        $user->delete(); // Suppression de l'utilisateur
        return redirect()->route('admin.users.index')->with('success', 'Utilisateur supprimé avec succès.');
    }

    // Suppression d'un projet
    public function deleteProject($id)
    {
        $project = Project::findOrFail($id);
        $project->delete(); // Suppression du projet
        return redirect()->route('admin.projects.index')->with('success', 'Projet supprimé avec succès.');
    }

     // Suppression d'un projet Utilisateur
     public function deleteUsersProject($id)
     {
         $project = Project::findOrFail($id);
         $project->delete(); // Suppression du projet
         return redirect()->route('admin.users.index')->with('success', 'Projet supprimé avec succès.');
     }

    // Afficher le formulaire de création d'un projet
    public function create()
    {
        return view('admin.projects.create');
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

        return redirect()->route('admin.projects.index')->with('success', 'Projet créé avec succès.');
    }

    // Afficher le formulaire de modification d'un projet
    public function edit($id)
    {
        $project = Project::findOrFail($id);

        return view('admin.projects.edit', compact('project'));
    }


    // Méthode pour mettre à jour un projet
    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);

        // Validation des données du formulaire
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'deadline' => 'required|date',
            'status' => 'required|in:en cours,terminé',
        ]);

        // Mise à jour du projet
        $project->update($request->all());

        return redirect()->route('admin.projects.index')->with('success', 'Projet mis à jour avec succès.');
    }


}
