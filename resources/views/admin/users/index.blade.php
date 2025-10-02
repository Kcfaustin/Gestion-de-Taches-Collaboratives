@extends('layout')

@section('content')
<x-app-layout>
    <!-- Header moderne avec gradient -->
    <div class="bg-gradient-primary text-white py-5 mb-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="d-flex align-items-center">
                        <div class="bg-white bg-opacity-20 rounded-circle p-3 me-3">
                            <i class="bi bi-people-fill text-white fs-3"></i>
                        </div>
                        <div>
                            <h1 class="h2 mb-1 fw-bold">Gestion des Utilisateurs</h1>
                            <p class="mb-0 opacity-75">Administration et contrôle des comptes utilisateurs</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-md-end">
                    <button class="btn btn-light fw-semibold px-4 py-2" data-bs-toggle="modal" data-bs-target="#createUserModal">
                        <i class="bi bi-person-plus me-2"></i>Nouvel utilisateur
                    </button>
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
        <!-- Statistiques rapides -->
<div class="row mb-4">
    <div class="col-md-3">
        <div class="card border-0 shadow-sm card-stats-primary">
            <div class="card-body text-center">
                <i class="bi bi-people fs-1 mb-2"></i>
                <h3 class="mb-0 fw-bold">{{ $users->count() }}</h3>
                <small>Utilisateurs totaux</small>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-0 shadow-sm card-stats-danger">
            <div class="card-body text-center">
                <i class="bi bi-shield-check fs-1 mb-2"></i>
                <h3 class="mb-0 fw-bold">{{ $users->where('usertype', 'admin')->count() }}</h3>
                <small>Administrateurs</small>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-0 shadow-sm card-stats-info">
            <div class="card-body text-center">
                <i class="bi bi-person fs-1 mb-2"></i>
                <h3 class="mb-0 fw-bold">{{ $users->where('usertype', 'user')->count() }}</h3>
                <small>Utilisateurs</small>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-0 shadow-sm card-stats-success">
            <div class="card-body text-center">
                <i class="bi bi-folder fs-1 mb-2"></i>
                <h3 class="mb-0 fw-bold">{{ $users->sum('projects_count') }}</h3>
                <small>Projets totaux</small>
            </div>
        </div>
    </div>
</div>

        <!-- Tableau des utilisateurs moderne -->
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white py-3">
                <div class="row align-items-center">
                    <div class="col">
                        <h5 class="mb-0 fw-semibold text-dark">
                            <i class="bi bi-table me-2 text-primary"></i>Liste des utilisateurs
                        </h5>
                    </div>
                    <div class="col-auto">
                        <div class="d-flex gap-2">
                            <button class="btn btn-outline-secondary btn-sm" onclick="location.reload();">
                                <i class="bi bi-arrow-clockwise me-1"></i>Actualiser
                            </button>
                            <div class="dropdown">
                                <button class="btn btn-outline-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                    <i class="bi bi-funnel me-1"></i>Filtrer
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#" onclick="filterByRole('all')">Tous les rôles</a></li>
                                    <li><a class="dropdown-item" href="#" onclick="filterByRole('admin')">Administrateurs</a></li>
                                    <li><a class="dropdown-item" href="#" onclick="filterByRole('user')">Utilisateurs</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-dark table-hover mb-0" id="usersTable">
                        <thead class="table-dark">
                            <tr>
                                <th class="border-0 fw-semibold text-white small">
                                    <i class="bi bi-hash me-1"></i>ID
                                </th>
                                <th class="border-0 fw-semibold text-white small">
                                    <i class="bi bi-person me-1"></i>Utilisateur
                                </th>
                                <th class="border-0 fw-semibold text-white small">
                                    <i class="bi bi-envelope me-1"></i>Email
                                </th>
                                <th class="border-0 fw-semibold text-white small">
                                    <i class="bi bi-shield me-1"></i>Rôle
                                </th>
                                <th class="border-0 fw-semibold text-white small">
                                    <i class="bi bi-folder me-1"></i>Projets
                                </th>
                                <th class="border-0 fw-semibold text-white small text-center">
                                    <i class="bi bi-gear me-1"></i>Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td class="align-middle">
                                        <span class="text-light small">#{{ $user->id }}</span>
                                    </td>
                                    <td class="align-middle">
                                        <div class="d-flex align-items-center">
                                            <div class="bg-primary bg-opacity-30 rounded-circle p-2 me-3">
                                                <i class="bi bi-person-circle text-primary"></i>
                                            </div>
                                            <div>
                                                <div class="fw-semibold text-white">{{ $user->name }}</div>
                                                <div class="text-light small opacity-75">
                                                    Membre depuis {{ $user->created_at ? $user->created_at->diffForHumans() : 'N/A' }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle">
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-envelope me-2 text-light"></i>
                                            <span class="text-white">{{ $user->email }}</span>
                                        </div>
                                    </td>
                                    <td class="align-middle">
                                        <span class="badge bg-{{ $user->usertype === 'admin' ? 'danger' : 'primary' }} px-3 py-2">
                                            <i class="bi bi-{{ $user->usertype === 'admin' ? 'shield-check' : 'person' }} me-1"></i>
                                            {{ ucfirst($user->usertype) }}
                                        </span>
                                    </td>
                                    <td class="align-middle">
                                        <div class="d-flex align-items-center">
                                            <span class="badge bg-info me-2">{{ $user->projects_count ?? 0 }}</span>
                                            <span class="text-light small">projet{{ ($user->projects_count ?? 0) > 1 ? 's' : '' }}</span>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center">
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.users.edit', $user->id) }}"
                                               class="btn btn-warning btn-sm"
                                               title="Modifier l'utilisateur">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <a href="{{ route('admin.users.projects', ['id' => $user->id]) }}"
                                               class="btn btn-info btn-sm"
                                               title="Voir les projets">
                                                <i class="bi bi-folder-open"></i>
                                            </a>
                                            <form action="{{ route('admin.users.destroy', ['id' => $user->id]) }}"
                                                  method="POST"
                                                  class="d-inline"
                                                  onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="btn btn-danger btn-sm"
                                                        title="Supprimer l'utilisateur">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        
        <!-- Pagination Laravel -->
        @if($users->hasPages())
        <div class="card-footer bg-white border-top py-3">
            <div class="d-flex justify-content-center">
                {{ $users->links() }}
            </div>
        </div>
        @endif
    </div>
</div>

    <!-- CSS personnalisé -->
    <style>
        .bg-gradient-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .table tbody tr:hover {
            background-color: rgba(0,123,255,0.05);
        }

        .card {
            border: 1px solid rgba(0,0,0,0.08);
        }

        .btn-sm {
            font-size: 0.8rem;
            padding: 0.375rem 0.75rem;
        }

        .badge {
            font-size: 0.75rem;
            font-weight: 500;
        }

        .dropdown-menu {
            border: none;
            box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.15);
        }

        .table th {
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-size: 0.75rem;
        }

        .btn-group .btn {
            margin: 0 1px;
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
    </style>
</x-app-layout>

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
/* CSS SPÉCIFIQUE POUR ADMIN USERS - PRIORITÉ MAXIMALE */
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
