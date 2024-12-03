@extends('layout')

@section('content')
<x-app-layout>
    <div class="container mx-auto mt-6">
        <h1 class="text-center mb-4 text-2xl font-bold">Créer un nouveau projet</h1>
    </div>

    <div class="container mt-5">
        <form method="POST" action="{{ route('projects.store') }}">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Nom du projet</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
            </div>

            <div class="mb-3">
                <label for="deadline" class="form-label">Date limite</label>
                <input type="date" class="form-control" id="deadline" name="deadline" required>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Statut</label>
                <select class="form-select" id="status" name="status" required>
                    <option value="en cours" selected>En cours</option>
                    <option value="terminé">Terminé</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Créer le projet</button>
        </form>
    </div>
</x-app-layout>
@endsection
