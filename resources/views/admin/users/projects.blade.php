@extends('layout')
@section('content')
<x-app-layout>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="container mx-auto mt-6">
        <!-- Bouton pour un retour -->
    <a href="{{ route('admin.users.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">
        Retour
    </a>
        <h1 class="text-center text-2xl font-bold">Projets de {{ $user->name }}</h1>
        <table class="table table-striped mt-5">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Titre</th>
                    <th>Description</th>
                    <th>Date limite</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($projects as $project)
                <tr>
                    <td>{{ $project->id }}</td>
                    <td>{{ $project->title }}</td>
                    <td>{{ $project->description }}</td>
                    <td>{{ $project->deadline ?? 'Non spécifiée' }}</td>
                    <td>{{ $project->status }}</td>
                    <td>
                        <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-primary btn-sm">Modifier</a>
                        <form action="{{ route('admin.users.projects.destroy', $project->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Voulez-vous supprimer ce projet ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
@endsection
