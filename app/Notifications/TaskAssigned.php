<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Task;


class TaskAssigned extends Notification
{
    use Queueable;

    public $task;

    public function __construct(Task $task) {
        $this->task = $task;
    }

    public function via($notifiable) {
        return ['database', 'mail'];
    }

    public function toMail($notifiable) {
        return (new MailMessage)
                    ->line("Une tâche vous a été assignée : {$this->task->title}")
                    ->action('Voir la tâche', url('/tasks/'.$this->task->id))
                    ->line('Merci de votre attention.');
    }

    // Notification pour les bases de données
    public function toDatabase($notifiable)
    {
        return [
            'task_id' => $this->task->id,
            'task_title' => $this->task->title,
            'assigned_by' => auth()->user()->name,
        ];
    }

    public function toArray($notifiable) {
        return [
            'task_id' => $this->task->id,
            'task_title' => $this->task->title,
            'assigned_by' => $this->task->project->user->name,
        ];
    }
}

