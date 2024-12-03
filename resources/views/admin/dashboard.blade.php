@extends('layout')

@section('content')
<x-app-layout>
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="notificationsDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            Notifications ({{ auth()->user()->unreadNotifications->count() }})
        </button>
        <ul class="dropdown-menu" aria-labelledby="notificationsDropdown">
            @forelse (auth()->user()->unreadNotifications as $notification)
                <li>
                    <a href="{{ route('notifications.markAsRead', $notification->id) }}" class="dropdown-item">
                        Une tâche vous a été assignée : {{ $notification->data['task_title'] }}
                        par {{ $notification->data['assigned_by'] }}
                    </a>
                </li>
            @empty
                <li><span class="dropdown-item">Aucune notification</span></li>
            @endforelse
        </ul>
    </div>
    <div class="container mx-auto mt-6">
        <h1 class="text-center text-2xl font-bold">Tableau de bord - Administration</h1>
        <div class="row my-5">
            <div class="col-md-4">
                <div class="card bg-primary text-white">
                    <div class="card-body">
                        <h5 class="card-title">Utilisateurs</h5>
                        <p class="card-text fs-3">{{ $usersCount }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-success text-white">
                    <div class="card-body">
                        <h5 class="card-title">Projets</h5>
                        <p class="card-text fs-3">{{ $projectsCount }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Projets En Cours</h5>
                        <p class="card-text fs-3">{{ $projectsInProgressCount }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Projets Terminé</h5>
                        <p class="card-text fs-3">{{ $projectsCompletedCount }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
@endsection
