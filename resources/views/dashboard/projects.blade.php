@extends('layout')

@section('content')
<x-app-layout>
    <div class="container mx-auto mt-6">
        <h1 class="text-center mb-4 text-2xl font-bold">Gestion de Vos Projets</h1>
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
        {{-- Bouton pour ouvrir la fenêtre modale --}}
        <div class="mb-3 text-end">
            <a href="{{ route('projects.create') }}" class="btn btn-primary">
                Créer un nouveau projet
            </a>
        </div>

        {{-- Liste des projets --}}
        <div class="row">
            @forelse($projects as $project)
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">{{ $project->title }}</h5>
                            <p class="card-text">{{ $project->description }}</p>
                            <p class="card-text">
                                <small class="text-muted">
                                    Date limite : {{ $project->deadline ?? 'Non spécifiée' }} <br>
                                    Statut :
                                    <span class="badge bg-{{ $project->status == 'en cours' ? 'primary' : 'success' }}">
                                        {{ $project->status }}
                                    </span>
                                </small>
                            </p>
                            <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-outline-success btn-sm">Modifier</a>
                            <form action="{{ route('projects.destroy', $project->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-danger btn-sm" onclick="return confirm('Voulez-vous supprimer ce projet ?')">Supprimer</button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center">Aucun projet disponible. Créez-en un !</p>
            @endforelse
        </div>
    </div>
</x-app-layout>
@endsection
