<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Task;
use App\Models\Project;
use App\Notifications\TaskAssigned;


class DashboardController extends Controller
{


    /* public function stats() {
        $tasks = Task::whereHas('project', function ($query) {
            $query->where('user_id', auth()->id());
        })->get();

        $projects = Project::with('tasks')->where('user_id', auth()->id())->get();


        $stats = [
            'tasks_in_progress' => $tasks->where('status', 'en cours')->count(),
            'tasks_completed' => $tasks->where('status', 'terminé')->count(),
            'tasks_not_completed'=> $tasksNotStarted = $tasks->where('status', 'non commencé')->count(),
            'projects_in_progress' => $projects->where('status', 'en cours')->count(),
            'projects_completed' => $projects->where('status', 'terminé')->count(),
        ];

        return view('dashboard', compact('stats', 'tasks', 'projects'));
    } */

    public function assignTask(Request $request, $taskId)
    {
        $task = Task::findOrFail($taskId);
        $user = User::findOrFail($request->assigned_to);

        // Assigner la tâche à l'utilisateur
        $task->assigned_to = $user->id;
        $task->save();

        // Envoyer la notification
        $user->notify(new TaskAssigned($task));


        // Supposez que $user est l'utilisateur à notifier
        $user = User::find(1);
        $task = Task::find(1);

        // Notifiez l'utilisateur
        $user->notify(new TaskAssigned($task));

        $notifications = auth()->user()->unreadNotifications;

        $notification = auth()->user()->unreadNotifications->first();
        $notification->markAsRead();

        $allNotifications = auth()->user()->notifications;

        return redirect()->back()->with('success', 'Tâche assignée et notification envoyée !');
    }

}



