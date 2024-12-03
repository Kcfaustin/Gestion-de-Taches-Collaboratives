@extends('layout')

@section('content')
<x-app-layout>

    <h1 class=" text-center mb-4 text-2xl font-bold mb-6">Modifier le projet</h1>
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

    <div class="container">

        <form action="{{ route('admin.projects.update', $project->id) }}" method="POST">
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
