@extends('layout')

@section('content')
<x-app-layout>
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Gérer les Projets</h1>

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

    <!-- Bouton pour ajouter un projet -->
{{--     <a href="{{ url('projects/create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">
        Ajouter un projet</a> --}}

        <a href="{{ route('admin.projects.create') }}"  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">
            Ajouter un projet</a>


    <!-- Liste des projets -->
    @if($projects->isEmpty())
        <p>Aucun projet disponible.</p>
    @else
        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">#</th>
                    <th class="py-2 px-4 border-b">Nom du projet</th>
                    <th class="py-2 px-4 border-b">Description</th>
                    <th class="py-2 px-4 border-b">Date limite</th>
                    <th class="py-2 px-4 border-b">Statut</th>
                    <th class="py-2 px-4 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($projects as $project)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $project->id }}</td>
                        <td class="py-2 px-4 border-b">{{ $project->title }}</td>
                        <td class="py-2 px-4 border-b">{{ $project->description }}</td>
                        <td class="py-2 px-4 border-b">{{ $project->deadline ?? 'Non spécifiée' }}</td>
                        <td class="py-2 px-4 border-b">{{ $project->status }}</td>
                        <td class="py-2 px-4 border-b">
                            <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-primary btn-sm">Modifier</a>
                            <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm " onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce projet ?');">
                                    Supprimer
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
</x-app-layout>
@endsection
