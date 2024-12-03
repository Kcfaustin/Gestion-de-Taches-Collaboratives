@extends('layout')

@section('content')
<x-app-layout>
<div class="container mx-auto mt-6">
    <h1 class="text-center mb-4 text-2xl font-bold">Gestion de vos Tâches</h1>
</div>
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

<div class="container my-5">

    {{-- Tâches avec DataTables --}}
        <div class="mb-3 text-end">
            <a href="{{ route('tasks.create') }}" class="btn btn-primary">Créer une nouvelle tâche</a>
        </div>
        <h2 class="mt-5 mb-4">Tâches que j'ai crée : </h2>
        <table id="tasks-table" class="table table-striped">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Projet associé</th>
                    <th>Description</th>
                    <th>Statut</th>
                    <th>Priorité</th>
                    <th>Assigné à </th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($tasks as $task)
                    <tr>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->project->title ?? 'Sans projet' }}</td>
                        <td>{{ $task->description }}</td>
                        <td>
                            <span class="badge bg-{{ $task->status == 'en cours' ? 'primary' : ($task->status == 'terminé' ? 'success' : 'secondary') }}">
                                {{ $task->status }}
                            </span>
                        </td>
                        <td>
                            <span class="badge bg-{{ $task->priority == 'haute' ? 'danger' : ($task->priority == 'moyenne' ? 'warning' : 'info') }}">
                                {{ ucfirst($task->priority) }}
                            </span>
                        </td>
                        <td>
                            {{ $task->assignedUser->name ?? 'Non assigné' }}
                        </td>
                        <td>
                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-outline-success btn-sm">Modifier</a>
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Voulez-vous supprimer cette tâche ?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Aucune tâche disponible.</td>
                    </tr>
                @endforelse

            </tbody>
        </table>

        {{-- Tâches assignées --}}
    <h2 class="mt-5 mb-4">Tâches qui me sont assignées :</h2>
    <table id="assigned-tasks-table" class="table table-striped">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Projet associé</th>
                <th>Description</th>
                <th>Statut</th>
                <th>Priorité</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($assignedTasks as $task)
                <tr>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->project->title ?? 'Sans projet' }}</td>
                    <td>{{ $task->description }}</td>
                    <td>
                        <span class="badge bg-{{ $task->status == 'en cours' ? 'primary' : ($task->status == 'terminé' ? 'success' : 'secondary') }}">
                            {{ $task->status }}
                        </span>
                    </td>
                    <td>
                        <span class="badge bg-{{ $task->priority == 'haute' ? 'danger' : ($task->priority == 'moyenne' ? 'warning' : 'info') }}">
                            {{ ucfirst($task->priority) }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-outline-success btn-sm">Modifier</a>
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Voulez-vous supprimer cette tâche ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Aucune tâche ne vous a été assignée.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    </div>
</div>
</x-app-layout>
@endsection

