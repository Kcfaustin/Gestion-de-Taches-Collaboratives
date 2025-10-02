@extends('layouts.app')

@section('content')
<x-app-layout>
    <div class="container-fluid px-3 px-sm-4 px-lg-5">
        <!-- Header Section -->
        <div class="row justify-content-between align-items-center mb-4">
            <div class="col-12 col-sm-auto mb-2 mb-sm-0">
                <h1 class="h3 mb-0">Mes Projets</h1>
            </div>
            <div class="col-12 col-sm-auto">
                <a href="{{ route('projects.create') }}" class="btn btn-primary w-100 w-sm-auto">
                    <i class="bi bi-plus-circle me-1"></i>
                    <span class="d-none d-sm-inline">Créer un </span>projet
                </a>
            </div>
        </div>

        <!-- Projects Grid -->
        <div class="row g-3 g-md-4">
            @forelse($projects as $project)
                <div class="col-12 col-sm-6 col-lg-4 col-xl-3">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body d-flex flex-column">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h5 class="card-title mb-0 text-truncate flex-grow-1 me-2">
                                    <a href="{{ route('projects.show', $project) }}" class="text-decoration-none">
                                        {{ $project->title }}
                                    </a>
                                </h5>
                                <span class="badge
                                    @if($project->status == 'completed') bg-success
                                    @elseif($project->status == 'in_progress') bg-primary
                                    @else bg-secondary
                                    @endif
                                    flex-shrink-0">
                                    {{ ucfirst($project->status) }}
                                </span>
                            </div>

                            @if($project->description)
                                <p class="card-text small text-muted flex-grow-1">
                                    {{ Str::limit($project->description, 100) }}
                                </p>
                            @endif

                            <div class="mt-auto pt-2">
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-muted">
                                        <i class="bi bi-calendar3"></i>
                                        {{ $project->created_at->format('d/m/Y') }}
                                    </small>
                                    <a href="{{ route('projects.show', $project) }}" class="btn btn-outline-primary btn-sm">
                                        Voir
                                        <i class="bi bi-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="text-center py-5">
                        <i class="bi bi-folder-x fs-1 text-muted mb-3"></i>
                        <h4 class="text-muted">Aucun projet trouvé</h4>
                        <p class="text-muted">Commencez par créer votre premier projet</p>
                        <a href="{{ route('projects.create') }}" class="btn btn-primary">
                            <i class="bi bi-plus-circle me-1"></i>
                            Créer un projet
                        </a>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</x-app-layout>
@endsection
