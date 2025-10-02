@extends('layout')

@section('content')
    <div class="container my-5">
        <!-- Statistiques rapides -->
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card border-0 shadow-sm card-stats-primary">
                    <div class="card-body text-center">
                        <i class="bi bi-list-task fs-1 mb-2"></i>
                        <h3 class="mb-0 fw-bold">{{ $tasks->count() }}</h3>
                        <small>Tâches totales</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm card-stats-warning">
                    <div class="card-body text-center">
                        <i class="bi bi-hourglass-split fs-1 mb-2"></i>
                        <h3 class="mb-0 fw-bold">{{ $tasks->where('status', 'en cours')->count() }}</h3>
                        <small>En cours</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm card-stats-success">
                    <div class="card-body text-center">
                        <i class="bi bi-check-circle fs-1 mb-2"></i>
                        <h3 class="mb-0 fw-bold">{{ $tasks->where('status', 'terminé')->count() }}</h3>
                        <small>Terminées</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm card-stats-danger">
                    <div class="card-body text-center">
                        <i class="bi bi-exclamation-triangle fs-1 mb-2"></i>
                        <h3 class="mb-0 fw-bold">{{ $tasks->where('priority', 'haute')->count() }}</h3>
                        <small>Priorité haute</small>
                    </div>
                </div>
            </div>
        </div>

    <!-- Header moderne avec gradient -->
    <div class="bg-gradient-primary text-white py-5 mb-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="d-flex align-items-center">
                        <div class="bg-white bg-opacity-20 rounded-circle p-3 me-3">
                            <i class="bi bi-list-task text-white fs-3"></i>
                        </div>
                        <div>
                            <h1 class="h2 mb-1 fw-bold">Gestion de vos Tâches</h1>
                            <p class="mb-0 opacity-75">Organisez et suivez l'avancement de vos tâches</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-md-end">
                    <a href="{{ route('tasks.create') }}" class="btn btn-light fw-semibold px-4 py-2">
                        <i class="bi bi-plus-circle me-2"></i>Nouvelle tâche
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

    <!-- Section: Tâches créées -->
    <div class="card shadow-sm border-0 mb-5">
        <div class="card-header bg-white border-bottom-0 py-4">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h3 class="h5 mb-1 fw-bold text-dark">
                        <i class="bi bi-folder-plus text-primary me-2"></i>Tâches que j'ai créées
                    </h3>
                    <p class="text-muted mb-0 small">Gérez les tâches que vous avez créées</p>
                </div>
                <span class="badge bg-primary fs-6 px-3 py-2">{{ $tasks->count() }} tâche{{ $tasks->count() > 1 ? 's' : '' }}</span>
            </div>
        </div>
        <div class="card-body p-0">
                            <div class="table-responsive">
                    <table class="table table-dark table-hover shadow-sm rounded" id="tasksTable">
                        <thead class="table-dark">
                            <tr>
                                <th class="fw-semibold border-0 px-4 py-3 text-dark">Titre</th>
                                <th class="fw-semibold border-0 px-4 py-3 text-dark">Projet</th>
                                <th class="fw-semibold border-0 px-4 py-3 text-dark">Description</th>
                                <th class="fw-semibold border-0 px-4 py-3 text-dark">Statut</th>
                                <th class="fw-semibold border-0 px-4 py-3 text-dark">Priorité</th>
                                <th class="fw-semibold border-0 px-4 py-3 text-dark">Assigné à</th>
                                <th class="fw-semibold border-0 px-4 py-3 text-dark">Actions</th>
                            </tr>
                        </thead>
                    <tbody>
                        @forelse($tasks as $task)
                            <tr class="border-bottom">
                                <td class="px-4 py-3">
                                    <div class="fw-semibold text-white">{{ $task->title }}</div>
                                </td>
                                <td class="px-4 py-3">
                                    <span class="text-light">{{ $task->project->title ?? 'Sans projet' }}</span>
                                </td>
                                <td class="px-4 py-3">
                                    <span class="text-light small">{{ Str::limit($task->description, 50) }}</span>
                                </td>
                                <td class="px-4 py-3">
                                    <span class="badge {{ $task->status == 'en cours' ? 'bg-primary' : ($task->status == 'terminé' ? 'bg-success' : 'bg-secondary') }} px-3 py-2">
                                        <i class="bi bi-{{ $task->status == 'en cours' ? 'play-circle' : ($task->status == 'terminé' ? 'check-circle' : 'pause-circle') }} me-1"></i>
                                        {{ ucfirst($task->status) }}
                                    </span>
                                </td>
                                <td class="px-4 py-3">
                                    <span class="badge {{ $task->priority == 'haute' ? 'bg-danger' : ($task->priority == 'moyenne' ? 'bg-warning text-dark' : 'bg-info') }} px-3 py-2">
                                        <i class="bi bi-{{ $task->priority == 'haute' ? 'exclamation-triangle' : ($task->priority == 'moyenne' ? 'dash-circle' : 'info-circle') }} me-1"></i>
                                        {{ ucfirst($task->priority) }}
                                    </span>
                                </td>
                                <td class="px-4 py-3">
                                    @if($task->assignedUser)
                                        <div class="d-flex align-items-center">
                                            <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 24px; height: 24px;">
                                                <span class="text-white small fw-bold">{{ substr($task->assignedUser->name, 0, 1) }}</span>
                                            </div>
                                            <span class="text-white small">{{ $task->assignedUser->name }}</span>
                                        </div>
                                    @else
                                        <span class="text-light small">Non assigné</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3">
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary btn-sm">
                                            <i class="bi bi-pencil me-1"></i>Modifier
                                        </a>
                                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Voulez-vous supprimer cette tâche ?')">
                                                <i class="bi bi-trash me-1"></i>Supprimer
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-5">
                                    <div class="text-light">
                                        <i class="bi bi-inbox fs-1 d-block mb-2 text-light"></i>
                                        <p class="mb-0 text-light">Aucune tâche créée pour le moment.</p>
                                        <a href="{{ route('tasks.create') }}" class="btn btn-primary btn-sm mt-2">
                                            <i class="bi bi-plus-circle me-1"></i>Créer votre première tâche
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        
        <!-- Pagination Laravel pour les tâches créées -->
        @if($tasks->hasPages())
        <div class="card-footer bg-white border-top py-3">
            <div class="d-flex justify-content-center">
                {{ $tasks->links() }}
            </div>
        </div>
        @endif
    </div>

    <!-- Section: Tâches assignées -->
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white border-bottom-0 py-4">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h3 class="h5 mb-1 fw-bold text-dark">
                        <i class="bi bi-person-check text-success me-2"></i>Tâches qui me sont assignées
                    </h3>
                    <p class="text-muted mb-0 small">Tâches que d'autres utilisateurs vous ont assignées</p>
                </div>
                <span class="badge bg-success fs-6 px-3 py-2">{{ $assignedTasks->count() }} tâche{{ $assignedTasks->count() > 1 ? 's' : '' }}</span>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table id="assigned-tasks-table" class="table table-dark table-hover mb-0">
                    <thead class="table-dark">
                        <tr class="text-dark">
                            <th class="fw-semibold border-0 px-4 py-3 text-dark">Titre</th>
                            <th class="fw-semibold border-0 px-4 py-3 text-dark">Projet associé</th>
                            <th class="fw-semibold border-0 px-4 py-3 text-dark">Description</th>
                            <th class="fw-semibold border-0 px-4 py-3 text-dark">Statut</th>
                            <th class="fw-semibold border-0 px-4 py-3 text-dark">Priorité</th>
                            <th class="fw-semibold border-0 px-4 py-3 text-dark">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($assignedTasks as $task)
                            <tr class="border-bottom">
                                <td class="px-4 py-3">
                                    <div class="fw-semibold text-white">{{ $task->title }}</div>
                                </td>
                                <td class="px-4 py-3">
                                    <span class="text-light">{{ $task->project->title ?? 'Sans projet' }}</span>
                                </td>
                                <td class="px-4 py-3">
                                    <span class="text-light small">{{ Str::limit($task->description, 50) }}</span>
                                </td>
                                <td class="px-4 py-3">
                                    <span class="badge {{ $task->status == 'en cours' ? 'bg-primary' : ($task->status == 'terminé' ? 'bg-success' : 'bg-secondary') }} px-3 py-2">
                                        <i class="bi bi-{{ $task->status == 'en cours' ? 'play-circle' : ($task->status == 'terminé' ? 'check-circle' : 'pause-circle') }} me-1"></i>
                                        {{ ucfirst($task->status) }}
                                    </span>
                                </td>
                                <td class="px-4 py-3">
                                    <span class="badge {{ $task->priority == 'haute' ? 'bg-danger' : ($task->priority == 'moyenne' ? 'bg-warning text-dark' : 'bg-info') }} px-3 py-2">
                                        <i class="bi bi-{{ $task->priority == 'haute' ? 'exclamation-triangle' : ($task->priority == 'moyenne' ? 'dash-circle' : 'info-circle') }} me-1"></i>
                                        {{ ucfirst($task->priority) }}
                                    </span>
                                </td>
                                <td class="px-4 py-3">
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-success btn-sm">
                                            <i class="bi bi-pencil me-1"></i>Modifier
                                        </a>
                                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Voulez-vous supprimer cette tâche ?')">
                                                <i class="bi bi-trash me-1"></i>Supprimer
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-5">
                                    <div class="text-light">
                                        <i class="bi bi-person-x fs-1 d-block mb-2 text-light"></i>
                                        <p class="mb-0 text-light">Aucune tâche ne vous a été assignée pour le moment.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        
        <!-- Pagination Laravel pour les tâches assignées -->
        @if($assignedTasks->hasPages())
        <div class="card-footer bg-white border-top py-3">
            <div class="d-flex justify-content-center">
                {{ $assignedTasks->links() }}
            </div>
        </div>
        @endif
    </div>
    </div>

    <!-- CSS personnalisé pour les couleurs -->
    <style>
        .bg-gradient-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .table-hover tbody tr:hover {
            background-color: rgba(0,123,255,0.05);
        }

        .btn-group .btn {
            border-radius: 0.375rem;
            margin-right: 0.25rem;
        }

        .btn-sm {
            font-size: 0.8rem;
            padding: 0.375rem 0.75rem;
        }

        .card {
            border: 1px solid rgba(0,0,0,0.08);
        }

        .table th {
            background-color: #f8f9fa;
            color: #495057;
            font-weight: 600;
        }

        .badge {
            font-size: 0.75rem;
            font-weight: 500;
        }

        /* Forcer les couleurs des cartes statistiques */
        .card.bg-primary {
            background-color: #0d6efd !important;
            color: #ffffff !important;
        }

        .card.bg-warning {
            background-color: #ffc107 !important;
            color: #ffffff !important;
        }

        .card.bg-success {
            background-color: #198754 !important;
            color: #ffffff !important;
        }

        .card.bg-info {
            background-color: #0dcaf0 !important;
            color: #ffffff !important;
        }

        .card.bg-danger {
            background-color: #dc3545 !important;
            color: #ffffff !important;
        }

        .card.bg-primary .card-body *,
        .card.bg-warning .card-body *,
        .card.bg-success .card-body *,
        .card.bg-info .card-body *,
        .card.bg-danger .card-body * {
            color: #ffffff !important;
        }

        /* Améliorer la pagination DataTables */
        .dataTables_paginate .paginate_button {
            background: #f8f9fa !important;
            border: 1px solid #dee2e6 !important;
            color: #495057 !important;
            padding: 8px 12px !important;
            margin: 0 2px !important;
            border-radius: 4px !important;
        }

        .dataTables_paginate .paginate_button:hover {
            background: #e9ecef !important;
            border-color: #adb5bd !important;
        }

        .dataTables_paginate .paginate_button.current {
            background: #0d6efd !important;
            border-color: #0d6efd !important;
            color: #ffffff !important;
        }

        .dataTables_paginate .paginate_button.disabled {
            background: #e9ecef !important;
            border-color: #dee2e6 !important;
            color: #6c757d !important;
        }
    </style>

    {{-- Scripts --}}
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
/* CSS SPÉCIFIQUE POUR DASHBOARD TASKS - PRIORITÉ MAXIMALE */
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

