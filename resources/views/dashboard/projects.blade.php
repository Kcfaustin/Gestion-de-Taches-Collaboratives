@extends('layout')

@section('content')
    <!-- Header moderne avec gradient -->
    <div class="bg-gradient-success text-white py-5 mb-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="d-flex align-items-center">
                        <div class="bg-white bg-opacity-20 rounded-circle p-3 me-3">
                            <i class="bi bi-folder-check text-white fs-3"></i>
                        </div>
                        <div>
                            <h1 class="h2 mb-1 fw-bold">Gestion de Vos Projets</h1>
                            <p class="mb-0 opacity-75">Organisez et suivez l'avancement de vos projets</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-md-end">
                    <a href="{{ route('projects.create') }}" class="btn btn-light fw-semibold px-4 py-2">
                        <i class="bi bi-plus-circle me-2"></i>Nouveau projet
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Messages de statut -->
    @if(session('success'))
    <div class="container mb-4">
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    @endif
    @if(session('error'))
    <div class="container mb-4">
        <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
            <i class="bi bi-exclamation-triangle me-2"></i>{{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    @endif

    <div class="container my-5">
        <!-- Statistiques rapides -->
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card border-0 shadow-sm card-stats-primary">
                    <div class="card-body text-center">
                        <i class="bi bi-folder fs-1 mb-2"></i>
                        <h3 class="mb-0 fw-bold">{{ $projects->count() }}</h3>
                        <small>Projets totaux</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm card-stats-warning">
                    <div class="card-body text-center">
                        <i class="bi bi-hourglass-split fs-1 mb-2"></i>
                        <h3 class="mb-0 fw-bold">{{ $projects->where('status', 'en cours')->count() }}</h3>
                        <small>En cours</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm card-stats-success">
                    <div class="card-body text-center">
                        <i class="bi bi-check-circle fs-1 mb-2"></i>
                        <h3 class="mb-0 fw-bold">{{ $projects->where('status', 'terminé')->count() }}</h3>
                        <small>Terminés</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm card-stats-info">
                    <div class="card-body text-center">
                        <i class="bi bi-calendar-event fs-1 mb-2"></i>
                        <h3 class="mb-0 fw-bold">{{ $projects->whereNotNull('deadline')->count() }}</h3>
                        <small>Avec échéance</small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Liste des projets sous forme de cartes -->
        <div class="row">
            @forelse($projects as $project)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100 shadow-sm border-0 hover-lift">
                        <!-- En-tête de la carte -->
                        <div class="card-header bg-white border-bottom-0 pb-0">
                            <div class="d-flex justify-content-between align-items-start">
                                <div class="d-flex align-items-center">
                                    <div class="bg-{{ $project->status == 'en cours' ? 'primary' : ($project->status == 'terminé' ? 'success' : 'secondary') }} bg-opacity-10 rounded-circle p-2 me-2">
                                        <i class="bi bi-{{ $project->status == 'en cours' ? 'play-circle' : ($project->status == 'terminé' ? 'check-circle' : 'pause-circle') }} text-{{ $project->status == 'en cours' ? 'primary' : ($project->status == 'terminé' ? 'success' : 'secondary') }}"></i>
                                    </div>
                                    <span class="badge bg-{{ $project->status == 'en cours' ? 'primary' : ($project->status == 'terminé' ? 'success' : 'secondary') }} px-2 py-1">
                                        {{ ucfirst($project->status) }}
                                    </span>
                                </div>
                                <div class="dropdown">
                                    <button class="btn btn-link text-muted p-1" type="button" data-bs-toggle="dropdown">
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end shadow">
                                        <li>
                                            <a class="dropdown-item" href="{{ route('projects.edit', $project->id) }}">
                                                <i class="bi bi-pencil me-2"></i>Modifier
                                            </a>
                                        </li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li>
                                            <form action="{{ route('projects.destroy', $project->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="dropdown-item text-danger" onclick="return confirm('Voulez-vous supprimer ce projet ?')">
                                                    <i class="bi bi-trash me-2"></i>Supprimer
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Corps de la carte -->
                        <div class="card-body">
                            <h5 class="card-title fw-bold text-white mb-2">{{ $project->title }}</h5>
                            <p class="card-text text-white small mb-3">{{ Str::limit($project->description, 100) }}</p>

                            @if($project->deadline)
                                <div class="d-flex align-items-center text-white small mb-2">
                                    <i class="bi bi-calendar-event me-2"></i>
                                    <span>Échéance : {{ \Carbon\Carbon::parse($project->deadline)->format('d/m/Y') }}</span>
                                    @if(\Carbon\Carbon::parse($project->deadline)->isPast() && $project->status != 'terminé')
                                        <span class="badge bg-danger ms-2">Retard</span>
                                    @endif
                                </div>
                            @endif

                            <!-- Tâches associées -->
                            @if($project->tasks && $project->tasks->count() > 0)
                                <div class="d-flex align-items-center text-white small mb-3">
                                    <i class="bi bi-list-task me-2"></i>
                                    <span>{{ $project->tasks->count() }} tâche{{ $project->tasks->count() > 1 ? 's' : '' }}</span>
                                    <div class="ms-auto">
                                        <div class="progress" style="width: 60px; height: 6px;">
                                            @php
                                                $completed = $project->tasks->where('status', 'terminé')->count();
                                                $total = $project->tasks->count();
                                                $percentage = $total > 0 ? ($completed / $total) * 100 : 0;
                                            @endphp
                                            <div class="progress-bar bg-success" style="width: {{ $percentage }}%"></div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <!-- Pied de la carte -->
                        <div class="card-footer bg-white border-top-0">
                            <div class="d-flex gap-2">
                                <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-outline-primary btn-sm flex-fill">
                                    <i class="bi bi-pencil me-1"></i>Modifier
                                </a>
                                <form action="{{ route('projects.destroy', $project->id) }}" method="POST" class="flex-fill">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm w-100" onclick="return confirm('Voulez-vous supprimer ce projet ?')">
                                        <i class="bi bi-trash me-1"></i>Supprimer
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <!-- État vide -->
                <div class="col-12">
                    <div class="text-center py-5">
                        <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 100px; height: 100px;">
                            <i class="bi bi-folder-plus text-white" style="font-size: 3rem;"></i>
                        </div>
                        <h4 class="text-white mb-2">Aucun projet créé</h4>
                        <p class="text-white mb-4">Commencez par créer votre premier projet pour organiser vos tâches.</p>
                        <a href="{{ route('projects.create') }}" class="btn btn-primary">
                            <i class="bi bi-plus-circle me-2"></i>Créer mon premier projet
                        </a>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Pagination Laravel -->
        @if($projects->hasPages())
        <div class="row mt-4">
            <div class="col-12">
                    <div class="d-flex justify-content-center">
                    {{ $projects->links() }}
                    </div>
            </div>
        </div>
        @endif
    </div>

    <!-- CSS personnalisé -->
    <style>
        .bg-gradient-success {
            background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
        }

        .hover-lift {
            transition: all 0.3s ease;
        }

        .hover-lift:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.15) !important;
        }

        .card {
            border: 1px solid rgba(0,0,0,0.08);
        }

        .btn-sm {
            font-size: 0.8rem;
            padding: 0.375rem 0.75rem;
        }

        .progress {
            border-radius: 3px;
        }

        .dropdown-menu {
            border: none;
            box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.15);
        }

        .project-card {
            display: none;
        }

        .project-card.active {
            display: block;
        }

        .pagination .page-link {
            color: #11998e;
            border-color: #11998e;
        }

        .pagination .page-item.active .page-link {
            background-color: #11998e;
            border-color: #11998e;
        }

        /* Forcer les couleurs des cartes statistiques avec maximum de spécificité */
        .container .row .col-md-3 .card.bg-primary.border-0.shadow-sm,
        .card.bg-primary {
            background: #0d6efd !important;
            background-color: #0d6efd !important;
            color: #ffffff !important;
        }

        .container .row .col-md-3 .card.bg-warning.border-0.shadow-sm,
        .card.bg-warning {
            background: #ffc107 !important;
            background-color: #ffc107 !important;
            color: #ffffff !important;
        }

        .container .row .col-md-3 .card.bg-success.border-0.shadow-sm,
        .card.bg-success {
            background: #198754 !important;
            background-color: #198754 !important;
            color: #ffffff !important;
        }

        .container .row .col-md-3 .card.bg-info.border-0.shadow-sm,
        .card.bg-info {
            background: #0dcaf0 !important;
            background-color: #0dcaf0 !important;
            color: #ffffff !important;
        }

        .container .row .col-md-3 .card.bg-danger.border-0.shadow-sm,
        .card.bg-danger {
            background: #dc3545 !important;
            background-color: #dc3545 !important;
            color: #ffffff !important;
        }

        /* Forcer la couleur du texte dans les cartes */
        .card.bg-primary *,
        .card.bg-warning *,
        .card.bg-success *,
        .card.bg-info *,
        .card.bg-danger *,
        .card.bg-primary .card-body,
        .card.bg-warning .card-body,
        .card.bg-success .card-body,
        .card.bg-info .card-body,
        .card.bg-danger .card-body,
        .card.bg-primary .card-body *,
        .card.bg-warning .card-body *,
        .card.bg-success .card-body *,
        .card.bg-info .card-body *,
        .card.bg-danger .card-body * {
            color: #ffffff !important;
        }
    </style>

@push('scripts')
<script>
    $(document).ready(function() {
        // Initialiser les tooltips
        $('[title]').tooltip();
    });
    </script>
    @endpush

@push('styles')
<style>
/* CSS SPÉCIFIQUE POUR DASHBOARD PROJECTS - PRIORITÉ MAXIMALE */
.card-stats-primary .card-body *,
.card-stats-primary .card-body h3,
.card-stats-primary .card-body small,
.card-stats-primary .card-body i,
.card-stats-primary .card-body span {
    color: #ffffff !important;
    opacity: 1 !important;
    text-shadow: 0 1px 3px rgba(0, 0, 0, 0.4) !important;
    font-weight: 700 !important;
}

.card-stats-warning .card-body *,
.card-stats-warning .card-body h3,
.card-stats-warning .card-body small,
.card-stats-warning .card-body i,
.card-stats-warning .card-body span {
    color: #212529 !important;
    opacity: 1 !important;
    text-shadow: 0 1px 2px rgba(255, 255, 255, 0.3) !important;
    font-weight: 700 !important;
}

.card-stats-success .card-body *,
.card-stats-success .card-body h3,
.card-stats-success .card-body small,
.card-stats-success .card-body i,
.card-stats-success .card-body span {
    color: #ffffff !important;
    opacity: 1 !important;
    text-shadow: 0 1px 3px rgba(0, 0, 0, 0.4) !important;
    font-weight: 700 !important;
}

.card-stats-info .card-body *,
.card-stats-info .card-body h3,
.card-stats-info .card-body small,
.card-stats-info .card-body i,
.card-stats-info .card-body span {
    color: #ffffff !important;
    opacity: 1 !important;
    text-shadow: 0 1px 3px rgba(0, 0, 0, 0.4) !important;
    font-weight: 700 !important;
}

.card-stats-danger .card-body *,
.card-stats-danger .card-body h3,
.card-stats-danger .card-body small,
.card-stats-danger .card-body i,
.card-stats-danger .card-body span {
    color: #ffffff !important;
    opacity: 1 !important;
    text-shadow: 0 1px 3px rgba(0, 0, 0, 0.4) !important;
    font-weight: 700 !important;
}

/* Titres h3 spécifiques */
.card-stats-primary .card-body h3,
.card-stats-success .card-body h3,
.card-stats-info .card-body h3,
.card-stats-danger .card-body h3 {
    font-size: 2rem !important;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.6) !important;
}

.card-stats-warning .card-body h3 {
    font-size: 2rem !important;
    text-shadow: 0 1px 2px rgba(255, 255, 255, 0.5) !important;
}

/* Textes small spécifiques */
.card-stats-primary .card-body small,
.card-stats-success .card-body small,
.card-stats-info .card-body small,
.card-stats-danger .card-body small {
    font-weight: 500 !important;
    font-size: 0.875rem !important;
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.4) !important;
}

.card-stats-warning .card-body small {
    font-weight: 500 !important;
    font-size: 0.875rem !important;
    text-shadow: 0 1px 2px rgba(255, 255, 255, 0.3) !important;
}

/* Icônes spécifiques */
.card-stats-primary .card-body i,
.card-stats-success .card-body i,
.card-stats-info .card-body i,
.card-stats-danger .card-body i {
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.4) !important;
}

.card-stats-warning .card-body i {
    text-shadow: 0 1px 2px rgba(255, 255, 255, 0.3) !important;
}
</style>
@endpush
@endsection
