@extends('layout')

@section('content')
<x-app-layout>
    <!-- Header Section -->
    <div class="container-fluid px-3 px-sm-4 px-lg-5 mb-4">
        <div class="row align-items-center">
            <div class="col-12">
                <div class="d-flex align-items-center">
                    <div class="bg-primary bg-gradient rounded-circle p-3 me-3 shadow">
                        <i class="bi bi-folder-plus text-white fs-5"></i>
                    </div>
                    <div>
                        <h1 class="h3 mb-1 fw-bold text-dark">Créer un nouveau projet</h1>
                        <p class="text-secondary mb-0 fw-medium">
                            <i class="bi bi-info-circle me-1"></i>
                            Ajoutez un nouveau projet à votre espace de travail
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
                        <h5 class="card-title mb-0 fw-bold text-dark">Informations du projet</h5>
                    </div>
                    <div class="card-body p-4">
                        <form method="POST" action="{{ route('projects.store') }}" class="row g-4">
                            @csrf

                            <!-- Nom du projet -->
                            <div class="col-12">
                                <label for="title" class="form-label fw-semibold text-dark">
                                    <i class="bi bi-pencil me-1 text-primary"></i>Nom du projet
                                </label>
                                <input type="text"
                                       class="form-control form-control-lg border-2 border-gray-200 text-dark"
                                       id="title"
                                       name="title"
                                       placeholder="Ex: Refonte du site web"
                                       required>
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
                                          placeholder="Décrivez les objectifs et le contexte du projet..."
                                          required></textarea>
                            </div>

                            <!-- Date limite et Statut -->
                            <div class="col-md-6">
                                <label for="deadline" class="form-label fw-semibold text-dark">
                                    <i class="bi bi-calendar-date me-1 text-warning"></i>Date limite
                                </label>
                                <input type="date"
                                       class="form-control border-2 border-gray-200 text-dark"
                                       id="deadline"
                                       name="deadline"
                                       required>
                            </div>

                            <div class="col-md-6">
                                <label for="status" class="form-label fw-semibold text-dark">
                                    <i class="bi bi-flag me-1 text-success"></i>Statut
                                </label>
                                <select class="form-select border-2 border-gray-200 text-dark"
                                        id="status"
                                        name="status"
                                        required>
                                    <option value="en cours" selected>En cours</option>
                                    <option value="terminé">Terminé</option>
                                </select>
                            </div>

                            <!-- Boutons d'action -->
                            <div class="col-12 pt-3 border-top">
                                <div class="d-flex gap-3 justify-content-end">
                                    <a href="{{ route('projects.index') }}"
                                       class="btn btn-outline-secondary px-4 py-2">
                                        <i class="bi bi-arrow-left me-1"></i>Annuler
                                    </a>
                                    <button type="submit"
                                            class="btn btn-primary px-4 py-2 shadow">
                                        <i class="bi bi-check-lg me-1"></i>Créer le projet
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
