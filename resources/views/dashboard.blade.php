@extends('layout')

@section('content')
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

        <!-- Modern Dashboard Header with Better Contrast -->
        <div class="container-fluid px-3 px-sm-4 px-lg-5 mb-4">
            <div class="row align-items-center">
                <div class="col-12 col-md-8 mb-3 mb-md-0">
                    <div class="d-flex align-items-center">
                        <div class="bg-primary bg-gradient rounded-circle p-3 me-3 shadow">
                            <i class="bi bi-speedometer2 text-white fs-5"></i>
                        </div>
                        <div>
                            <h1 class="h3 mb-1 fw-bold text-dark">Tableau de bord</h1>
                            <p class="text-secondary mb-0 fw-medium">
                                <i class="bi bi-calendar3 me-1"></i>
                                {{ now()->format('l, F j, Y') }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="d-flex justify-content-md-end gap-2">
                        <!-- Quick Actions -->
                        <div class="dropdown">
                            <button class="btn btn-outline-primary btn-sm dropdown-toggle" type="button" id="actionsDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-plus-circle me-1"></i>
                                <span class="d-none d-sm-inline">Actions rapides</span>
                            </button>
                            <ul class="dropdown-menu shadow-lg border-0 bg-white" aria-labelledby="actionsDropdown">
                                <li><a class="dropdown-item text-dark py-2 px-3 hover-bg-light" href="{{ route('projects.create') }}">
                                    <i class="bi bi-folder-plus me-2 text-primary"></i>Nouveau projet
                                </a></li>
                                <li><a class="dropdown-item text-dark py-2 px-3 hover-bg-light" href="{{ route('tasks.create') }}">
                                    <i class="bi bi-plus-square me-2 text-success"></i>Nouvelle tâche
                                </a></li>
                                <li><hr class="dropdown-divider my-2"></li>
                                <li><a class="dropdown-item text-dark py-2 px-3 hover-bg-light" href="{{ route('profile.edit') }}">
                                    <i class="bi bi-gear me-2 text-secondary"></i>Paramètres
                                </a></li>
                            </ul>
                        </div>

                        <!-- Notifications -->
                        <div class="dropdown">
                            <button class="btn btn-outline-secondary btn-sm dropdown-toggle position-relative" type="button" id="notificationsDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-bell"></i>
                                @if(auth()->user()->unreadNotifications->count() > 0)
                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 0.6em;">
                                        {{ auth()->user()->unreadNotifications->count() }}
                                    </span>
                                @endif
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0" style="min-width: 300px;" aria-labelledby="notificationsDropdown">
                                <li class="dropdown-header d-flex justify-content-between align-items-center">
                                    <span class="fw-bold">Notifications</span>
                                    @if(auth()->user()->unreadNotifications->count() > 0)
                                        <span class="badge bg-primary">{{ auth()->user()->unreadNotifications->count() }}</span>
                                    @endif
                                </li>
                                @forelse (auth()->user()->unreadNotifications->take(5) as $notification)
                                    <li>
                                        <a href="{{ route('notifications.markAsRead', $notification->id) }}" class="dropdown-item py-3 border-bottom">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="bg-primary bg-opacity-10 rounded-circle p-2">
                                                        <i class="bi bi-check-circle text-primary"></i>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-1 fw-semibold">Nouvelle tâche assignée</h6>
                                                    <p class="mb-1 small text-muted">{{ $notification->data['task_title'] }}</p>
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
                                @if(auth()->user()->unreadNotifications->count() > 5)
                                    <li><hr class="dropdown-divider my-0"></li>
                                    <li class="dropdown-item text-center">
                                        <a href="#" class="text-decoration-none small">
                                            Voir toutes les notifications ({{ auth()->user()->unreadNotifications->count() }})
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    <!-- Modern Stats Section -->
    <div class="container-fluid px-3 px-sm-4 px-lg-5">
        <!-- Stats Overview -->
        <div class="row mb-5">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="h4 mb-0 fw-bold text-dark">Vue d'ensemble</h2>
                    <div class="btn-group btn-group-sm">
                        <button class="btn btn-outline-primary active shadow-sm">7 jours</button>
                        <button class="btn btn-outline-primary shadow-sm">30 jours</button>
                        <button class="btn btn-outline-primary shadow-sm">3 mois</button>
                    </div>
                </div>

                <!-- Enhanced Stats Grid -->
                <div class="row g-4">
                    <!-- Tasks Stats -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="card border-0 shadow-sm h-100 stats-card card-stats-warning">
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <div class="stats-icon bg-dark bg-opacity-20 border border-dark border-opacity-25 p-3 rounded-3">
                                        <i class="bi bi-clock fs-4"></i>
                                    </div>
                                    <span class="badge bg-dark text-white fw-semibold">+12%</span>
                                </div>
                                <h3 class="h2 fw-bold mb-1">{{ $stats['tasks_not_completed'] }}</h3>
                                <p class="mb-0 fw-medium">Tâches en attente</p>
                                <div class="progress mt-3" style="height: 6px;">
                                    <div class="progress-bar bg-dark" style="width: 65%"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="card border-0 shadow-sm h-100 stats-card card-stats-primary">
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <div class="stats-icon bg-white bg-opacity-20 border border-white border-opacity-25 p-3 rounded-3">
                                        <i class="bi bi-play-circle fs-4"></i>
                                    </div>
                                    <span class="badge bg-white text-primary fw-semibold">+8%</span>
                                </div>
                                <h3 class="h2 fw-bold mb-1">{{ $stats['tasks_in_progress'] }}</h3>
                                <p class="mb-0 fw-medium">Tâches en cours</p>
                                <div class="progress mt-3" style="height: 6px;">
                                    <div class="progress-bar bg-white" style="width: 80%"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="card border-0 shadow-sm h-100 stats-card card-stats-success">
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <div class="stats-icon bg-white bg-opacity-20 border border-white border-opacity-25 p-3 rounded-3">
                                        <i class="bi bi-check-circle fs-4"></i>
                                    </div>
                                    <span class="badge bg-white text-success fw-semibold">+24%</span>
                                </div>
                                <h3 class="h2 fw-bold mb-1">{{ $stats['tasks_completed'] }}</h3>
                                <p class="mb-0 fw-medium">Tâches terminées</p>
                                <div class="progress mt-3" style="height: 6px;">
                                    <div class="progress-bar bg-white" style="width: 100%"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="card border-0 shadow-sm h-100 stats-card card-stats-info">
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <div class="stats-icon bg-white bg-opacity-20 border border-white border-opacity-25 p-3 rounded-3">
                                        <i class="bi bi-folder fs-4"></i>
                                    </div>
                                    <span class="badge bg-white text-info fw-semibold">+5%</span>
                                </div>
                                <h3 class="h2 fw-bold mb-1">{{ $projects->count() }}</h3>
                                <p class="mb-0 fw-medium">Projets actifs</p>
                                <div class="progress mt-3" style="height: 6px;">
                                    <div class="progress-bar bg-white" style="width: 75%"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="card h-100" style="background: linear-gradient(135deg, #198754 0%, #0f5132 100%);">
                            <div class="card-body p-3 text-center">
                                <div class="d-flex flex-column align-items-center">
                                    <i class="bi bi-check-all fs-2 mb-2 text-white"></i>
                                    <h6 class="card-title mb-1 small text-white">Proj. Terminés</h6>
                                    <p class="card-text fs-4 fw-bold mb-0 text-white">{{ $stats['projects_completed'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container my-5">



    {{-- Intégration de DataTables (jQuery chargé avant dans le layout) --}}
    @push('scripts')
    <!-- Vérification que jQuery est chargé -->
    <script>
        if (typeof jQuery === 'undefined') {
            console.error('jQuery is not loaded before DataTables!');
        } else {
            console.log('jQuery is available for DataTables: v' + jQuery.fn.jquery);
        }
    </script>

    <!-- DataTables after jQuery -->
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
    <script>
        // Check if jQuery is loaded
        if (typeof jQuery !== 'undefined') {
            console.log('jQuery loaded successfully');

            $(document).ready(function () {
                // Initialize DataTables
                if ($.fn.DataTable) {
                    $('#tasks-table').DataTable();
                    console.log('DataTables initialized');
                }

                // FORCE CLICKABILITY FOR DROPDOWN BUTTONS
                console.log('Initializing dropdown functionality...');

                // Force style and event binding for Actions dropdown
                $('#actionsDropdown').css({
                    'pointer-events': 'auto',
                    'cursor': 'pointer',
                    'user-select': 'none',
                    'position': 'relative',
                    'z-index': '100',
                    'background': 'transparent',
                    'border': '1px solid #0d6efd'
                }).attr('data-bs-toggle', 'dropdown').attr('aria-expanded', 'false');

                // Force style and event binding for Notifications dropdown
                $('#notificationsDropdown').css({
                    'pointer-events': 'auto',
                    'cursor': 'pointer',
                    'user-select': 'none',
                    'position': 'relative',
                    'z-index': '100',
                    'background': 'transparent',
                    'border': '1px solid #6c757d'
                }).attr('data-bs-toggle', 'dropdown').attr('aria-expanded', 'false');

            // Manual click handlers as fallback
            $('#actionsDropdown').off('click').on('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                console.log('Actions dropdown clicked');

                var $menu = $(this).next('.dropdown-menu');
                $('.dropdown-menu').not($menu).removeClass('show');
                $menu.toggleClass('show');
            });

            $('#notificationsDropdown').off('click').on('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                console.log('Notifications dropdown clicked');

                var $menu = $(this).next('.dropdown-menu');
                $('.dropdown-menu').not($menu).removeClass('show');
                $menu.toggleClass('show');
            });

            // Close dropdowns when clicking outside
            $(document).on('click', function(e) {
                if (!$(e.target).closest('.dropdown').length) {
                    $('.dropdown-menu').removeClass('show');
                }
            });

            // Fix dropdown menu positioning
            $('.dropdown').on('show.bs.dropdown', function () {
                $(this).find('.dropdown-menu').css('z-index', 1050);
            });

            // Ensure dropdown items are clickable
            $('.dropdown-item').each(function() {
                $(this).css({
                    'pointer-events': 'auto',
                    'cursor': 'pointer'
                });
            });

            // Add hover effects to dropdown items
            $('.dropdown-item').hover(
                function() {
                    $(this).addClass('hover-bg-light');
                },
                function() {
                    $(this).removeClass('hover-bg-light');
                }
            );

                console.log('Dropdown functionality initialized');

                // Debug: Check if buttons exist and are clickable
                setTimeout(function() {
                    var actionsBtn = document.getElementById('actionsDropdown');
                    var notifBtn = document.getElementById('notificationsDropdown');

                    if (actionsBtn) {
                        console.log('Actions button found, testing click...');
                        actionsBtn.addEventListener('click', function(e) {
                            console.log('Actions button clicked successfully!');
                        });
                    } else {
                        console.error('Actions button not found!');
                    }

                    if (notifBtn) {
                        console.log('Notifications button found, testing click...');
                        notifBtn.addEventListener('click', function(e) {
                            console.log('Notifications button clicked successfully!');
                        });
                    } else {
                        console.error('Notifications button not found!');
                    }
                }, 1000);
            });
        } else {
            // Fallback sans jQuery - JavaScript vanilla
            console.warn('jQuery not found, using vanilla JavaScript fallback');

            document.addEventListener('DOMContentLoaded', function() {
                console.log('DOM loaded, initializing dropdown functionality with vanilla JS...');

                // Force dropdown functionality without jQuery
                const actionsBtn = document.getElementById('actionsDropdown');
                const notifBtn = document.getElementById('notificationsDropdown');

                if (actionsBtn) {
                    // Style the button
                    actionsBtn.style.pointerEvents = 'auto';
                    actionsBtn.style.cursor = 'pointer';
                    actionsBtn.style.position = 'relative';
                    actionsBtn.style.zIndex = '100';

                    // Add click handler
                    actionsBtn.addEventListener('click', function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                        console.log('Actions dropdown clicked (vanilla JS)');

                        const menu = this.nextElementSibling;
                        // Close other dropdowns
                        document.querySelectorAll('.dropdown-menu').forEach(function(item) {
                            if (item !== menu) item.classList.remove('show');
                        });
                        // Toggle current menu
                        menu.classList.toggle('show');
                    });
                }

                if (notifBtn) {
                    // Style the button
                    notifBtn.style.pointerEvents = 'auto';
                    notifBtn.style.cursor = 'pointer';
                    notifBtn.style.position = 'relative';
                    notifBtn.style.zIndex = '100';

                    // Add click handler
                    notifBtn.addEventListener('click', function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                        console.log('Notifications dropdown clicked (vanilla JS)');

                        const menu = this.nextElementSibling;
                        // Close other dropdowns
                        document.querySelectorAll('.dropdown-menu').forEach(function(item) {
                            if (item !== menu) item.classList.remove('show');
                        });
                        // Toggle current menu
                        menu.classList.toggle('show');
                    });
                }

                // Close dropdowns when clicking outside
                document.addEventListener('click', function(e) {
                    if (!e.target.closest('.dropdown')) {
                        document.querySelectorAll('.dropdown-menu').forEach(function(menu) {
                            menu.classList.remove('show');
                        });
                    }
                });

                console.log('Vanilla JS dropdown functionality initialized');
            });
        }
    </script>
    @endpush

@push('styles')
<style>
/* CSS SPÉCIFIQUE POUR DASHBOARD - PRIORITÉ MAXIMALE */
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

