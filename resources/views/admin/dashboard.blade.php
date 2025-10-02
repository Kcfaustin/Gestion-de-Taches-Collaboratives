@extends('layout')

@section('content')
<x-app-layout>
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

    <!-- Admin Dashboard Header -->
    <div class="container-fluid px-3 px-sm-4 px-lg-5 mb-4">
        <div class="row align-items-center">
            <div class="col-12 col-md-8 mb-3 mb-md-0">
                <div class="d-flex align-items-center">
                    <div class="bg-danger bg-gradient rounded-circle p-3 me-3 shadow">
                        <i class="bi bi-shield-check text-white fs-5"></i>
                    </div>
                    <div>
                        <h1 class="h3 mb-1 fw-bold text-dark">Tableau de bord - Administration</h1>
                        <p class="text-secondary mb-0 fw-medium">
                            <i class="bi bi-person-gear me-1"></i>
                            Panneau d'administration système
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <!-- Admin Notifications -->
                <div class="dropdown">
                    <button class="btn btn-outline-danger btn-sm dropdown-toggle position-relative" type="button" id="notificationsDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-bell"></i>
                        <span class="d-none d-sm-inline ms-1">Notifications</span>
                        @if(auth()->user()->unreadNotifications->count() > 0)
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 0.6em;">
                                {{ auth()->user()->unreadNotifications->count() }}
                            </span>
                        @endif
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0" style="min-width: 300px;" aria-labelledby="notificationsDropdown">
                        <li class="dropdown-header d-flex justify-content-between align-items-center">
                            <span class="fw-bold text-dark">Notifications Admin</span>
                            @if(auth()->user()->unreadNotifications->count() > 0)
                                <span class="badge bg-danger">{{ auth()->user()->unreadNotifications->count() }}</span>
                            @endif
                        </li>
                        @forelse (auth()->user()->unreadNotifications as $notification)
                            <li>
                                <a href="{{ route('notifications.markAsRead', $notification->id) }}" class="dropdown-item py-3 border-bottom text-dark">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 me-3">
                                            <div class="bg-danger bg-opacity-10 rounded-circle p-2">
                                                <i class="bi bi-exclamation-triangle text-danger"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1 fw-semibold text-dark">Tâche assignée</h6>
                                            <p class="mb-1 small text-secondary">{{ $notification->data['task_title'] }}</p>
                                            <small class="text-muted">par {{ $notification->data['assigned_by'] }}</small>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        @empty
                            <li class="dropdown-item-text text-center py-4">
                                <i class="bi bi-bell-slash text-muted fs-1 mb-2"></i>
                                <p class="text-muted mb-0">Aucune notification</p>
                            </li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Admin Stats Section -->
    <div class="container-fluid px-3 px-sm-4 px-lg-5">
        <div class="row mb-4">
            <div class="col-12">
                <h2 class="h4 mb-4 fw-bold text-dark">Statistiques générales</h2>
            </div>
        </div>
        <div class="row g-4">
            <!-- Utilisateurs Stats -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="card border-0 shadow-sm h-100 bg-white">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div class="stats-icon bg-primary bg-opacity-15 border border-primary border-opacity-25 p-3 rounded-3">
                                <i class="bi bi-people text-primary fs-4"></i>
                            </div>
                            <span class="badge bg-primary text-white fw-semibold">Total</span>
                        </div>
                        <h3 class="h2 fw-bold mb-1 text-dark">{{ $usersCount }}</h3>
                        <p class="text-secondary mb-0 fw-medium">Utilisateurs</p>
                        <div class="progress mt-3" style="height: 6px;">
                            <div class="progress-bar bg-primary" style="width: 100%"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tous les Projets -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="card border-0 shadow-sm h-100 bg-white">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div class="stats-icon bg-info bg-opacity-15 border border-info border-opacity-25 p-3 rounded-3">
                                <i class="bi bi-folder2-open text-info fs-4"></i>
                            </div>
                            <span class="badge bg-info text-white fw-semibold">Total</span>
                        </div>
                        <h3 class="h2 fw-bold mb-1 text-dark">{{ $projectsCount }}</h3>
                        <p class="text-secondary mb-0 fw-medium">Projets totaux</p>
                        <div class="progress mt-3" style="height: 6px;">
                            <div class="progress-bar bg-info" style="width: 85%"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Projets En Cours -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="card border-0 shadow-sm h-100 bg-white">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div class="stats-icon bg-warning bg-opacity-15 border border-warning border-opacity-25 p-3 rounded-3">
                                <i class="bi bi-clock-history text-warning fs-4"></i>
                            </div>
                            <span class="badge bg-warning text-white fw-semibold">Actifs</span>
                        </div>
                        <h3 class="h2 fw-bold mb-1 text-dark">{{ $projectsInProgressCount }}</h3>
                        <p class="text-secondary mb-0 fw-medium">Projets en cours</p>
                        <div class="progress mt-3" style="height: 6px;">
                            <div class="progress-bar bg-warning" style="width: 70%"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Projets Terminés -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="card border-0 shadow-sm h-100 bg-white">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div class="stats-icon bg-success bg-opacity-15 border border-success border-opacity-25 p-3 rounded-3">
                                <i class="bi bi-check-circle text-success fs-4"></i>
                            </div>
                            <span class="badge bg-success text-white fw-semibold">Finis</span>
                        </div>
                        <h3 class="h2 fw-bold mb-1 text-dark">{{ $projectsCompletedCount }}</h3>
                        <p class="text-secondary mb-0 fw-medium">Projets terminés</p>
                        <div class="progress mt-3" style="height: 6px;">
                            <div class="progress-bar bg-success" style="width: 100%"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tâches Total (nouvelle stat) -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="card border-0 shadow-sm h-100 bg-white">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div class="stats-icon bg-secondary bg-opacity-15 border border-secondary border-opacity-25 p-3 rounded-3">
                                <i class="bi bi-list-task text-secondary fs-4"></i>
                            </div>
                            <span class="badge bg-secondary text-white fw-semibold">Total</span>
                        </div>
                        <h3 class="h2 fw-bold mb-1 text-dark">{{ $tasksCount }}</h3>
                        <p class="text-secondary mb-0 fw-medium">Tâches totales</p>
                        <div class="progress mt-3" style="height: 6px;">
                            <div class="progress-bar bg-secondary" style="width: 90%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Admin Actions -->
        <div class="row mt-5">
            <div class="col-12">
                <div class="card border-0 shadow-sm bg-white">
                    <div class="card-header bg-transparent border-0 pb-0">
                        <h5 class="card-title mb-0 fw-bold text-dark">Actions rapides d'administration</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-3">
                                <a href="{{ route('admin.users.index') }}" class="btn btn-outline-primary w-100 py-3 hover-lift">
                                    <i class="bi bi-person-plus-fill mb-2 d-block fs-4"></i>
                                    <span class="fw-semibold">Gérer Utilisateurs</span>
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a href="{{ route('admin.projects.index') }}" class="btn btn-outline-info w-100 py-3 hover-lift">
                                    <i class="bi bi-folder-plus mb-2 d-block fs-4"></i>
                                    <span class="fw-semibold">Gérer Projets</span>
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a href="{{ route('dashboard') }}" class="btn btn-outline-warning w-100 py-3 hover-lift">
                                    <i class="bi bi-gear-fill mb-2 d-block fs-4"></i>
                                    <span class="fw-semibold">Paramètres</span>
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a href="{{ route('dashboard') }}" class="btn btn-outline-danger w-100 py-3 hover-lift">
                                    <i class="bi bi-graph-up mb-2 d-block fs-4"></i>
                                    <span class="fw-semibold">Rapports</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CSS personnalisé -->
    <style>
        .hover-lift {
            transition: all 0.3s ease;
        }

        .hover-lift:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }

        .card {
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }

        .stats-icon {
            transition: all 0.3s ease;
        }

        .card:hover .stats-icon {
            transform: scale(1.1);
        }

        .dropdown-menu {
            border: none;
            box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.15);
        }

        .dropdown-item:hover {
            background-color: rgba(0,123,255,0.1);
        }

        .progress-bar {
            transition: all 0.3s ease;
        }

        .btn {
            transition: all 0.3s ease;
        }

        .btn:hover {
            transform: translateY(-1px);
        }
    </style>
</x-app-layout>

@push('scripts')
<script>
    $(document).ready(function() {
        // Initialiser les tooltips
        $('[title]').tooltip();

        // Animation au scroll
        $(window).on('scroll', function() {
            $('.card').each(function() {
                var elementTop = $(this).offset().top;
                var elementBottom = elementTop + $(this).outerHeight();
                var viewportTop = $(window).scrollTop();
                var viewportBottom = viewportTop + $(window).height();

                if (elementBottom > viewportTop && elementTop < viewportBottom) {
                    $(this).addClass('animate__animated animate__fadeInUp');
                }
            });
        });

        // Notification dropdown auto-refresh
        setInterval(function() {
            // Optionnel: actualiser les notifications toutes les 30 secondes
            // Vous pouvez implémenter cette fonctionnalité si nécessaire
        }, 30000);
    });
</script>
@endpush
@endsection
