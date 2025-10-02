
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



    <!-- Header Section -->
    <div class="container-fluid px-3 px-sm-4 px-lg-5 mb-4">
        <div class="row align-items-center">
            <div class="col-12">
                <div class="d-flex align-items-center">
                    <div class="bg-success bg-gradient rounded-circle p-3 me-3 shadow">
                        <i class="bi bi-plus-square text-white fs-5"></i>
                    </div>
                    <div>
                        <h1 class="h3 mb-1 fw-bold text-dark">Créer une nouvelle tâche</h1>
                        <p class="text-secondary mb-0 fw-medium">
                            <i class="bi bi-info-circle me-1"></i>
                            Ajoutez une tâche à votre projet
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Form Section -->
    <div class="container-fluid px-3 px-sm-4 px-lg-5">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white border-0 pb-0">
                        <h5 class="card-title mb-0 fw-bold text-dark">Détails de la tâche</h5>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('tasks.store') }}" method="POST" class="row g-4">
                            @csrf

                            <!-- Titre -->
                            <div class="col-12">
                                <label for="title" class="form-label fw-semibold text-dark">
                                    <i class="bi bi-pencil me-1 text-success"></i>Titre de la tâche
                                </label>
                                <input type="text"
                                       class="form-control form-control-lg border-2 border-gray-200 text-dark"
                                       id="title"
                                       name="title"
                                       placeholder="Ex: Créer la maquette du design"
                                       required>
                            </div>

                            <!-- Projet associé -->
                            <div class="col-12">
                                <label for="project_id" class="form-label fw-semibold text-dark">
                                    <i class="bi bi-folder me-1 text-primary"></i>Projet associé
                                </label>
                                <select class="form-select form-select-lg border-2 border-gray-200 text-dark"
                                        id="project_id"
                                        name="project_id"
                                        required>
                                    <option value="" disabled selected>-- Sélectionnez un projet --</option>
                                    @foreach($projects as $project)
                                        <option value="{{ $project->id }}">{{ $project->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Description -->
                            <div class="col-12">
                                <label for="description" class="form-label fw-semibold text-dark">
                                    <i class="bi bi-card-text me-1 text-info"></i>Description
                                </label>
                                <textarea class="form-control border-2 border-gray-200 text-dark"
                                          id="description"
                                          name="description"
                                          rows="4"
                                          placeholder="Décrivez les détails de la tâche..."></textarea>
                            </div>

                            <!-- Statut et Priorité -->
                            <div class="col-md-6">
                                <label for="status" class="form-label fw-semibold text-dark">
                                    <i class="bi bi-flag me-1 text-warning"></i>Statut
                                </label>
                                <select class="form-select border-2 border-gray-200 text-dark"
                                        id="status"
                                        name="status"
                                        required>
                                    <option value="non commencé" selected>Non commencé</option>
                                    <option value="en cours">En cours</option>
                                    <option value="terminé">Terminé</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="priority" class="form-label fw-semibold text-dark">
                                    <i class="bi bi-exclamation-triangle me-1 text-danger"></i>Priorité
                                </label>
                                <select class="form-select border-2 border-gray-200 text-dark"
                                        id="priority"
                                        name="priority"
                                        required>
                                    <option value="basse">🟢 Basse</option>
                                    <option value="moyenne" selected>🟡 Moyenne</option>
                                    <option value="haute">🔴 Élevée</option>
                                </select>
                            </div>

                            <!-- Assignation -->
                            <div class="col-12">
                                <label for="assigned_to" class="form-label fw-semibold text-dark">
                                    <i class="bi bi-person me-1 text-secondary"></i>Assigner à
                                </label>
                                <select class="form-select border-2 border-gray-200 text-dark"
                                        id="assigned_to"
                                        name="assigned_to">
                                    <option value="">-- Aucun utilisateur assigné --</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Boutons d'action -->
                            <div class="col-12 pt-3 border-top">
                                <div class="d-flex gap-3 justify-content-end">
                                    <a href="{{ route('tasks.index') }}"
                                       class="btn btn-outline-secondary px-4 py-2">
                                        <i class="bi bi-arrow-left me-1"></i>Annuler
                                    </a>
                                    <button type="submit"
                                            class="btn btn-success px-4 py-2 shadow">
                                        <i class="bi bi-check-lg me-1"></i>Créer la tâche
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
@endsection
