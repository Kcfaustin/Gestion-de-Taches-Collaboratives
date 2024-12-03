
@extends('layout')

@section('content')
<x-app-layout>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

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



    <div class="container mx-auto mt-6">
        <h1 class="text-center mb-4 text-2xl font-bold">Créer une nouvelle tâche</h1>
    </div>
<div class="container my-5">
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Titre</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
            <label for="project_id" class="form-label">Projet associé</label>
            <select class="form-select" id="project_id" name="project_id" required>
                <option value="" disabled selected>-- Sélectionnez un projet --</option>
                @foreach($projects as $project)
                    <option value="{{ $project->id }}">{{ $project->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description"></textarea>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Statut</label>
            <select class="form-select" id="status" name="status" required>
                <option value="non commencé">Non commencé</option>
                <option value="en cours">En cours</option>
                <option value="terminé">Terminé</option>
            </select>
        </div>


        <div class="mb-3">
            <label for="priority" class="form-label">Priorité</label>
            <select class="form-select" id="priority" name="priority" required>
                <option value="basse">Basse</option>
                <option value="moyenne">Moyenne</option>
                <option value="haute">Élevée</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="assigned_to" class="form-label">Assigner à</label>
            <select class="form-control" id="assigned_to" name="assigned_to">
                <option value="">Aucun utilisateur assigné</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Créer</button>
    </form>
</div>
</x-app-layout>
@endsection
