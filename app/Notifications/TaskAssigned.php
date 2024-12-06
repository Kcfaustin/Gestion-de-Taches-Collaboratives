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
                    ->subject('Nouvelle tâche assignée : ' . $this->task->title)
                    ->greeting('Bonjour ' . $notifiable->name . ',')
                    ->line('Une nouvelle tâche vous a été assignée :')
                    ->line('**Titre** : ' . $this->task->title)
                    ->line('**Description** : ' . $this->task->description)
                    ->line('**Priorité** : ' . ucfirst($this->task->priority))
                    ->action('Voir la tâche', route('tasks.show', $this->task->id))
                    ->line('Merci de votre implication !');
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

