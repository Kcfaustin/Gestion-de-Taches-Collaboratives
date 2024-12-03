<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Config\App;
use App\Notifications\TaskAssigned;
use Illuminate\Support\Facades\Auth;


class TaskController extends Controller
{
    // Afficher les tâches d'un projet
    public function index()
    {
        $tasks = Task::whereHas('project', function ($query) {
            $query->where('user_id', auth()->id());
        })->get();

        // Tâches assignées à l'utilisateur
        $assignedTasks = Task::where('assigned_to', auth()->id())->get();

        return view('dashboard.tasks', compact('tasks', 'assignedTasks'));
    }




    // Afficher le formulaire de création d'une tâche
    public function create(Project $project)
    {
        // Récupérer tous les projets (ou filtrer selon un critère, par exemple, les projets de l'utilisateur)
        $projects = Project::where('user_id', auth()->id())->get();
        $users = User::all();

        return view('tasks.create', compact('project', 'projects', 'users'));
    }
    // Enregistrer une nouvelle tâche
    public function store(Request $request)
        {
            $validatedData = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
                'status' => 'required|in:non commencé,en cours,terminé',
                'priority' => 'required|in:basse,moyenne,haute',
                'project_id' => 'required|exists:projects,id',
                'assigned_to' => 'required|exists:users,id',
            ]);

            $task = Task::create($validatedData);

            // Envoyer une notification à l'utilisateur assigné
            $user = User::find($validatedData['assigned_to']);
            $user->notify(new TaskAssigned($task));

            return redirect()->route('dashboard.tasks')->with('success', 'Tâche créée avec succès.');
        }



    // Afficher les détails d'une tâche
    public function show(Project $project, Task $task)
    {
        return view('tasks.show', compact('task', 'project'));
    }

    // Afficher le formulaire de modification d'une tâche
    public function edit(Task $task)
    {
        /* $task = Task::findOrFail($id); */
        $projects = Project::all();
        $users = User::all();
        return view('tasks.edit', compact('task', 'projects', 'users'));
    }


    // Mettre à jour une tâche existante
    public function update(Request $request, Project $project, Task $task)
    {

        // Si l'utilisateur est assigné à la tâche
        if ($task->assigned_to == Auth::id()) {
             // Mise à jour uniquement du statut
            $task->update(['status' => $validated['status']]);

            return redirect()->route('dashboard.tasks', $project)->with('success', 'Statut de la tâche mis à jour avec succès.');
        }
        else{

            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
                'status' => 'required|in:non commencé,en cours,terminé',
                'priority' => 'required|in:basse,moyenne,haute',
                'project_id' => 'required|exists:projects,id', // Assurez-vous que le projet existe
                'assigned_to' => 'nullable|exists:users,id',  // Facultatif
            ]);

            // Mise à jour de la tâche avec les données validées
            $task->update($validated);

            return redirect()->route('dashboard.tasks', $project)->with('success', 'Tâche mise à jour avec succès.');

        }


    }


    // Supprimer une tâche
    public function destroy(Task $task)
    {

        // Vérifie si l'utilisateur connecté est l'auteur de la tâche
        if ($task->assigned_to == Auth::id()) {
            return redirect()->route('dashboard.tasks')->with('error', 'Vous ne pouvez pas supprimer cette tâche car elle vous a été assignée.');
        }

        $task->delete();

        return redirect()->route('dashboard.tasks')->with('success', 'Tâche supprimée avec succès.');
    }
}

