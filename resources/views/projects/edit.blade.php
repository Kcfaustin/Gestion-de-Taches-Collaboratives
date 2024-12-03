@extends('layout')

@section('content')
<x-app-layout>
    <div class="container">
        <h1 class="text-center mb-4">Modifier le projet</h1>

        <form action="{{ route('projects.update', $project->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Titre</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $project->title) }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" required>{{ old('description', $project->description) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="deadline" class="form-label">Date limite</label>
                <input type="date" class="form-control" id="deadline" name="deadline" value="{{ old('deadline', $project->deadline) }}" required>
            </div>

            <!-- Champ pour modifier le statut -->
            <div class="mb-3">
                <label for="status" class="form-label">Statut</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="en cours" {{ old('status', $project->status) == 'en cours' ? 'selected' : '' }}>En cours</option>
                    <option value="terminé" {{ old('status', $project->status) == 'terminé' ? 'selected' : '' }}>Terminé</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </form>
    </div>
</x-app-layout>
@endsection
