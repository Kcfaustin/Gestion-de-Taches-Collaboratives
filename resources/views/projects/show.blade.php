@extends('layout')

@section('content')
<x-app-layout>
    <div class="container">
        <h1 class="text-center mb-4">Détails du projet</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $project->title }}</h5>
                <p class="card-text">{{ $project->description }}</p>
                <p><strong>Date limite :</strong> {{ $project->deadline ?? 'Non spécifiée' }}</p>
                <p><strong>Statut :</strong> {{ $project->status }}</p>

                <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-outline-success">Modifier</a>

                <form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Voulez-vous vraiment supprimer ce projet ?')">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
@endsection
