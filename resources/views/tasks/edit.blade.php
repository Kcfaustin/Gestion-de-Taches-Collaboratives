@extends('layout')

@section('content')
<x-app-layout>

    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
<div class="container my-5">
    <h1 class="text-2xl font-bold mb-6">Modifier une tâche</h1>
    <form action="{{ route('tasks.update', [$task->project_id, $task->id]) }}" method="POST">
        @csrf
        @method('PUT')

        @if(Auth::id() == $task->assigned_to)
        <div class="form-group">
            <label for="status">Statut</label>
            <select name="status" id="status" class="form-control">
                <option value="en cours" {{ $task->status == 'en cours' ? 'selected' : '' }}>En cours</option>
                <option value="terminé" {{ $task->status == 'terminé' ? 'selected' : '' }}>Terminé</option>
            </select>
        </div>
        @else

        <div class="mb-3">
            <label for="title" class="form-label">Titre</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $task->title) }}" required>
        </div>
        <div class="mb-3">
            <label for="project_id" class="form-label">Projet associé</label>
            <select class="form-select" id="project_id" name="project_id" required>
                @foreach($projects as $project)
                    <option value="{{ $project->id }}" {{ $task->project_id == $project->id ? 'selected' : '' }}>
                        {{ $project->title }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description">{{ old('description', $task->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Statut</label>
            <select class="form-control" id="status" name="status" required>
                <option value="non commencé" {{ old('status', $task->status) == 'non commencé' ? 'selected' : '' }}>non commencé</option>
                <option value="en cours" {{ old('status', $task->status) == 'en cours' ? 'selected' : '' }}>en cours</option>
                <option value="terminé" {{ old('status', $task->status) == 'terminé' ? 'selected' : '' }}>terminé</option>

            </select>
        </div>

        <div class="mb-3">
            <label for="priority" class="form-label">Priorité</label>
            <select class="form-select" id="priority" name="priority" required>
                <option value="basse" {{ old('priority', $task->priority) == 'basse' ? 'selected' : '' }}>Basse</option>
                <option value="moyenne" {{ old('priority',$task->priority) == 'moyenne' ? 'selected' : '' }}>Moyenne</option>
                <option value="haute" {{ old('priority',$task->priority) == 'haute' ? 'selected' : '' }}>Haute</option>
            </select>
        </div>
        <div class="form-group">
            <label for="assigned_to">Assigner à</label>
            <select name="assigned_to" id="assigned_to" class="form-control">
                <option value="">-- Sélectionnez un utilisateur --</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ old('assigned_to', $task->assigned_to) == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>
        @endif



        <button type="submit" class="btn btn-success">Modifier</button>
    </form>
</div>
</x-app-layout>
@endsection
