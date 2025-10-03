

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }}</title>

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Bootstrap Icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

        <!-- Custom CSS - CDN fallback for production -->
        @if(app()->environment('production'))
            <link rel="stylesheet" href="{{ secure_asset('css/production.css') }}">
            <style>
                /* Critical CSS inline for production */
                body { 
                    font-family: 'Inter', 'Figtree', sans-serif;
                    background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
                    min-height: 100vh;
                }
                
                /* Form styles */
                .form-control {
                    border-radius: 8px;
                    border: 1px solid #d1d5db;
                    padding: 0.75rem 1rem;
                    font-size: 1rem;
                    transition: all 0.3s ease;
                }
                
                .form-control:focus {
                    border-color: #0d6efd;
                    box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
                }
                
                .form-label {
                    font-weight: 600;
                    color: #374151;
                    margin-bottom: 0.5rem;
                }
                
                .btn {
                    border-radius: 8px;
                    font-weight: 600;
                    padding: 0.75rem 1.5rem;
                    transition: all 0.3s ease;
                }
                
                .btn-primary {
                    background: linear-gradient(135deg, #0d6efd, #0b5ed7);
                    border: none;
                }
                
                .btn-primary:hover {
                    background: linear-gradient(135deg, #0b5ed7, #0a58ca);
                    transform: translateY(-2px);
                    box-shadow: 0 8px 25px rgba(13, 110, 253, 0.4);
                }
                
                .btn-outline-primary {
                    border: 2px solid #0d6efd;
                    color: #0d6efd;
                    background: transparent;
                }
                
                .btn-outline-primary:hover {
                    background: #0d6efd;
                    color: white;
                    transform: translateY(-2px);
                }
                
                /* Card styles */
                .card {
                    border-radius: 12px;
                    border: 1px solid #e5e7eb;
                    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
                    transition: all 0.3s ease;
                }
                
                .card:hover {
                    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
                    transform: translateY(-2px);
                }
                
                .card-header {
                    background: linear-gradient(135deg, #f8f9fa, #e9ecef);
                    border-bottom: 1px solid #e5e7eb;
                    border-radius: 12px 12px 0 0;
                    padding: 1.5rem;
                }
                
                .card-body {
                    padding: 1.5rem;
                }
                
                /* Alert styles */
                .alert {
                    border-radius: 8px;
                    border: none;
                    padding: 1rem 1.25rem;
                    margin-bottom: 1rem;
                }
                
                .alert-success {
                    background: linear-gradient(135deg, #d1fae5, #a7f3d0);
                    color: #065f46;
                }
                
                .alert-danger {
                    background: linear-gradient(135deg, #fee2e2, #fecaca);
                    color: #991b1b;
                }
                
                .alert-warning {
                    background: linear-gradient(135deg, #fef3c7, #fde68a);
                    color: #92400e;
                }
                
                .alert-info {
                    background: linear-gradient(135deg, #dbeafe, #bfdbfe);
                    color: #1e40af;
                }
                
                /* Dashboard styles */
                .dashboard-card {
                    background: white;
                    border-radius: 12px;
                    padding: 1.5rem;
                    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
                    border: 1px solid #e5e7eb;
                    transition: all 0.3s ease;
                }
                
                .dashboard-card:hover {
                    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
                    transform: translateY(-2px);
                }
                
                .stats-card {
                    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                    color: white;
                    border-radius: 12px;
                    padding: 1.5rem;
                    text-align: center;
                }
                
                .stats-card h3 {
                    font-size: 2rem;
                    font-weight: 700;
                    margin-bottom: 0.5rem;
                }
                
                .stats-card p {
                    opacity: 0.9;
                    margin: 0;
                }
                
                /* Table styles */
                .table {
                    border-radius: 8px;
                    overflow: hidden;
                    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
                }
                
                .table thead th {
                    background: linear-gradient(135deg, #f8f9fa, #e9ecef);
                    border: none;
                    font-weight: 600;
                    color: #374151;
                    padding: 1rem;
                }
                
                .table tbody td {
                    padding: 1rem;
                    border-color: #f3f4f6;
                }
                
                .table tbody tr:hover {
                    background-color: #f8f9fa;
                }
                
                /* Badge styles */
                .badge {
                    display: inline-flex !important;
                    align-items: center !important;
                    justify-content: center !important;
                    font-weight: 600 !important;
                    font-size: 0.875rem !important;
                    padding: 0.5rem 0.75rem;
                    border-radius: 6px;
                }
                
                .badge i {
                    display: inline-block !important;
                    opacity: 1 !important;
                    color: inherit !important;
                    margin-right: 0.25rem;
                }
                
                /* Utility classes */
                .text-primary { color: #0d6efd !important; }
                .text-success { color: #198754 !important; }
                .text-warning { color: #ffc107 !important; }
                .text-danger { color: #dc3545 !important; }
                .text-info { color: #0dcaf0 !important; }
                .text-muted { color: #6c757d !important; }
                
                .bg-primary { background-color: #0d6efd !important; }
                .bg-success { background-color: #198754 !important; }
                .bg-warning { background-color: #ffc107 !important; }
                .bg-danger { background-color: #dc3545 !important; }
                .bg-info { background-color: #0dcaf0 !important; }
                .bg-light { background-color: #f8f9fa !important; }
                
                .border-primary { border-color: #0d6efd !important; }
                .border-success { border-color: #198754 !important; }
                .border-warning { border-color: #ffc107 !important; }
                .border-danger { border-color: #dc3545 !important; }
                .border-info { border-color: #0dcaf0 !important; }
                
                /* Responsive utilities */
                @media (max-width: 768px) {
                    .card-body { padding: 1rem; }
                    .dashboard-card { padding: 1rem; }
                    .stats-card h3 { font-size: 1.5rem; }
                }
                .navbar {
                    background: linear-gradient(135deg, #1a1a1a 0%, #2d3748 100%) !important;
                    backdrop-filter: blur(10px);
                    border-bottom: 1px solid rgba(255,255,255,0.1);
                }
                .navbar-brand {
                    font-weight: 700 !important;
                    font-size: 1.5rem !important;
                    color: #ffffff !important;
                }
                .navbar-brand i {
                    color: #0d6efd !important;
                    margin-right: 0.5rem;
                }
                .nav-link {
                    color: #f8f9fa !important;
                    font-weight: 500;
                    transition: all 0.3s ease;
                    border-radius: 8px;
                    margin: 0 0.25rem;
                    padding: 0.5rem 1rem !important;
                }
                .nav-link:hover {
                    background-color: rgba(255,255,255,0.1);
                    color: #ffffff !important;
                    transform: translateY(-1px);
                }
                .nav-link.active {
                    background-color: rgba(13, 110, 253, 0.2);
                    color: #0d6efd !important;
                }
                .auth-btn-login {
                    border: 2px solid rgba(255,255,255,0.8) !important;
                    color: #ffffff !important;
                    background: transparent !important;
                    font-weight: 600;
                    transition: all 0.3s ease;
                    border-radius: 8px !important;
                    padding: 0.5rem 1.25rem !important;
                }
                .auth-btn-login:hover {
                    background-color: #ffffff !important;
                    color: #1a1a1a !important;
                    border-color: #ffffff !important;
                    transform: translateY(-2px);
                    box-shadow: 0 6px 20px rgba(255,255,255,0.2);
                }
                .auth-btn-register {
                    background: linear-gradient(135deg, #0d6efd, #0b5ed7) !important;
                    border: 2px solid transparent !important;
                    color: #ffffff !important;
                    font-weight: 600;
                    transition: all 0.3s ease;
                    border-radius: 8px !important;
                    padding: 0.5rem 1.25rem !important;
                }
                .auth-btn-register:hover {
                    background: linear-gradient(135deg, #0b5ed7, #0a58ca) !important;
                    transform: translateY(-2px);
                    box-shadow: 0 8px 25px rgba(13, 110, 253, 0.4);
                    color: #ffffff !important;
                }
                .min-h-screen {
                    background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
                    padding: 2rem 0;
                }
                .bi {
                    display: inline-block !important;
                    opacity: 1 !important;
                    font-style: normal !important;
                }
            </style>
        @else
        <link rel="stylesheet" href="{{ secure_asset('css/icon-fixes.css') }}">
        <link href="{{ secure_asset('css/modern-theme.css') }}" rel="stylesheet">
        @endif

        <!-- Scripts -->
        @if(app()->environment('production'))
            <!-- Fallback CSS - Try multiple paths -->
            @if(file_exists(public_path('build/assets/app-Dydjg6F-.css')))
                <link rel="stylesheet" href="{{ secure_asset('build/assets/app-Dydjg6F-.css') }}">
            @elseif(file_exists(public_path('build/assets/app.css')))
                <link rel="stylesheet" href="{{ secure_asset('build/assets/app.css') }}">
            @elseif(file_exists(public_path('build/app.css')))
                <link rel="stylesheet" href="{{ secure_asset('build/app.css') }}">
            @else
                <!-- Inline critical CSS as fallback -->
                <style>
                    body { font-family: 'Inter', sans-serif; }
                    .bg-gradient-to-br { background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); }
                    .min-h-screen { min-height: 100vh; }
                    .navbar { background: linear-gradient(135deg, #1a1a1a 0%, #2d3748 100%) !important; }
                    .navbar-brand { font-weight: 700 !important; color: #ffffff !important; }
                    .nav-link { color: #f8f9fa !important; font-weight: 500; }
                    .auth-btn-login { border: 2px solid rgba(255,255,255,0.8) !important; color: #ffffff !important; }
                    .auth-btn-register { background: linear-gradient(135deg, #0d6efd, #0b5ed7) !important; color: #ffffff !important; }
                </style>
            @endif
            
            <!-- Fallback JS - Try multiple paths -->
            @if(file_exists(public_path('build/assets/js-K89dAo7v.js')))
                <script type="module" src="{{ secure_asset('build/assets/js-K89dAo7v.js') }}"></script>
            @elseif(file_exists(public_path('build/assets/js.js')))
                <script type="module" src="{{ secure_asset('build/assets/js.js') }}"></script>
            @elseif(file_exists(public_path('build/js.js')))
                <script type="module" src="{{ secure_asset('build/js.js') }}"></script>
            @endif
        @else
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
    </head>

    <body class="font-sans text-gray-900 antialiased">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-lg sticky-top">
            <div class="container-fluid px-3 px-sm-4">
                <!-- Logo -->
                <a class="navbar-brand fw-bold fs-4 text-white" href="{{ url('/') }}">
                    <i class="bi bi-check-circle-fill text-primary me-2"></i>
                    <span class="d-none d-sm-inline">Gestion Des Tâches</span>
                    <span class="d-inline d-sm-none">GDT</span>
                </a>

                <!-- Hamburger Menu Button -->
                <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Navigation Content -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <div class="d-flex w-100 justify-content-between align-items-center mt-3 mt-lg-0">
                        <!-- Navigation Links -->
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link fw-medium text-light {{ request()->is('/') ? 'active text-primary' : '' }}"
                                   href="{{ url('/') }}">
                                    <i class="bi bi-house me-1"></i>Accueil
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fw-medium text-light {{ request()->is('about') ? 'active text-primary' : '' }}"
                                   href="{{ url('/about') }}">
                                    <i class="bi bi-info-circle me-1"></i>À propos
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fw-medium text-light {{ request()->is('contact') ? 'active text-primary' : '' }}"
                                   href="{{ url('/contact') }}">
                                    <i class="bi bi-envelope me-1"></i>Contact
                                </a>
                            </li>
                        </ul>

                        <!-- Login & Register Buttons -->
                        <div class="d-flex gap-2 flex-wrap">
                            <a href="{{ route('login') }}" class="btn btn-outline-light fw-medium px-3 py-2 auth-btn-login">
                                <i class="bi bi-box-arrow-in-right me-1"></i>Connexion
                            </a>
                            <a href="{{ route('register') }}" class="btn btn-primary fw-medium px-3 py-2 shadow auth-btn-register">
                                <i class="bi bi-person-plus me-1"></i>Inscription
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <style>
            /* Font et styles de base */
            body {
                font-family: 'Inter', 'Figtree', sans-serif;
                background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
                min-height: 100vh;
            }

            /* Navbar Professional Styles */
            .navbar {
                background: linear-gradient(135deg, #1a1a1a 0%, #2d3748 100%) !important;
                backdrop-filter: blur(10px);
                border-bottom: 1px solid rgba(255,255,255,0.1);
                z-index: 1050 !important;
            }

            .navbar-brand {
                font-weight: 700 !important;
                font-size: 1.5rem !important;
                color: #ffffff !important;
                text-decoration: none !important;
            }

            .navbar-brand:hover {
                color: #ffffff !important;
                transform: scale(1.02);
                transition: all 0.3s ease;
            }

            .navbar-brand i {
                color: #0d6efd !important;
                margin-right: 0.5rem;
            }

            /* Navigation Links */
            .nav-link {
                color: #f8f9fa !important;
                font-weight: 500;
                transition: all 0.3s ease;
                border-radius: 8px;
                margin: 0 0.25rem;
                padding: 0.5rem 1rem !important;
            }

            .nav-link:hover {
                background-color: rgba(255,255,255,0.1);
                color: #ffffff !important;
                transform: translateY(-1px);
            }

            .nav-link.active {
                background-color: rgba(13, 110, 253, 0.2);
                color: #0d6efd !important;
            }

            .nav-link i {
                margin-right: 0.25rem;
                opacity: 0.8;
            }

            /* Auth Buttons Styling */
            .auth-btn-login {
                border: 2px solid rgba(255,255,255,0.8) !important;
                color: #ffffff !important;
                background: transparent !important;
                font-weight: 600;
                transition: all 0.3s ease;
                text-decoration: none !important;
                cursor: pointer !important;
                border-radius: 8px !important;
                padding: 0.5rem 1.25rem !important;
            }

            .auth-btn-login:hover {
                background-color: #ffffff !important;
                color: #1a1a1a !important;
                border-color: #ffffff !important;
                transform: translateY(-2px);
                box-shadow: 0 6px 20px rgba(255,255,255,0.2);
            }

            .auth-btn-register {
                background: linear-gradient(135deg, #0d6efd, #0b5ed7) !important;
                border: 2px solid transparent !important;
                color: #ffffff !important;
                font-weight: 600;
                transition: all 0.3s ease;
                text-decoration: none !important;
                cursor: pointer !important;
                border-radius: 8px !important;
                padding: 0.5rem 1.25rem !important;
            }

            .auth-btn-register:hover {
                background: linear-gradient(135deg, #0b5ed7, #0a58ca) !important;
                transform: translateY(-2px);
                box-shadow: 0 8px 25px rgba(13, 110, 253, 0.4);
                color: #ffffff !important;
            }

            /* Responsive Design */
            @media (max-width: 991.98px) {
                .navbar-collapse {
                    background-color: rgba(26, 26, 26, 0.98);
                    border-radius: 12px;
                    margin-top: 1rem;
                    padding: 2rem;
                    border: 1px solid rgba(255,255,255,0.1);
                    box-shadow: 0 10px 30px rgba(0,0,0,0.3);
                }

                .navbar-nav {
                    margin-bottom: 1.5rem;
                }

                .nav-link {
                    margin: 0.25rem 0;
                    text-align: center;
                    padding: 0.75rem 1rem !important;
                }

                .d-flex.gap-2 {
                    flex-direction: column;
                    gap: 0.75rem !important;
                    width: 100%;
                }

                .auth-btn-login,
                .auth-btn-register {
                    text-align: center;
                    width: 100%;
                    padding: 0.875rem 1rem !important;
                    font-size: 1rem;
                    justify-content: center;
                }
            }

            /* Hamburger menu styling */
            .navbar-toggler {
                border: none !important;
                padding: 0.25rem;
            }

            .navbar-toggler:focus {
                box-shadow: none;
            }

            .navbar-toggler-icon {
                background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28255, 255, 255, 0.8%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
            }

            /* Content area styling */
            .min-h-screen {
                background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
                padding: 2rem 0;
            }

            /* Footer styling */
            footer {
                background: linear-gradient(135deg, #1a1a1a 0%, #2d3748 100%) !important;
                margin-top: auto;
            }

            footer .text-light {
                color: #e2e8f0 !important;
            }

            footer .opacity-75 {
                opacity: 0.8 !important;
            }

            footer .hover-opacity-100:hover {
                opacity: 1 !important;
                transform: translateY(-1px);
                transition: all 0.3s ease;
            }

            footer h5,
            footer h6 {
                color: #ffffff !important;
                font-weight: 600;
            }

            footer .border-secondary {
                border-color: rgba(255,255,255,0.1) !important;
            }

            /* Ensure all icons are visible */
            .bi {
                display: inline-block !important;
                opacity: 1 !important;
                font-style: normal !important;
            }
        </style>
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gradient-to-br from-blue-50 via-white to-green-50">
            <div class="w-full sm:max-w-lg mt-6 px-6 py-4 overflow-hidden">
                {{ $slot }}
            </div>
        </div>

        <!-- Footer professionnel unifié -->
        <footer class="bg-dark text-white mt-auto">
            <div class="container-fluid px-3 px-sm-4 px-lg-5">
                <div class="row py-5">
                    <!-- Logo et description -->
                    <div class="col-lg-4 mb-4 mb-lg-0">
                        <div class="d-flex align-items-center mb-3">
                            <i class="bi bi-check-circle-fill text-primary fs-3 me-2"></i>
                            <h5 class="fw-bold mb-0 text-white">Gestion Des Tâches</h5>
                        </div>
                        <p class="text-light opacity-75 mb-3">
                            Plateforme moderne de gestion collaborative pour optimiser votre productivité et celle de votre équipe.
                        </p>
                        <div class="d-flex gap-3">
                            <a href="#" class="text-light opacity-75 hover-opacity-100 transition-opacity">
                                <i class="bi bi-facebook fs-5"></i>
                            </a>
                            <a href="#" class="text-light opacity-75 hover-opacity-100 transition-opacity">
                                <i class="bi bi-twitter fs-5"></i>
                            </a>
                            <a href="#" class="text-light opacity-75 hover-opacity-100 transition-opacity">
                                <i class="bi bi-linkedin fs-5"></i>
                            </a>
                            <a href="#" class="text-light opacity-75 hover-opacity-100 transition-opacity">
                                <i class="bi bi-github fs-5"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Liens rapides -->
                    <div class="col-md-6 col-lg-2 mb-4 mb-md-0">
                        <h6 class="fw-semibold text-white mb-3">Produit</h6>
                        <ul class="list-unstyled">
                            <li class="mb-2"><a href="#" class="text-light opacity-75 text-decoration-none hover-opacity-100">Fonctionnalités</a></li>
                            <li class="mb-2"><a href="#" class="text-light opacity-75 text-decoration-none hover-opacity-100">Tarifs</a></li>
                            <li class="mb-2"><a href="#" class="text-light opacity-75 text-decoration-none hover-opacity-100">Sécurité</a></li>
                            <li class="mb-2"><a href="#" class="text-light opacity-75 text-decoration-none hover-opacity-100">Intégrations</a></li>
                        </ul>
                    </div>

                    <div class="col-md-6 col-lg-2 mb-4 mb-md-0">
                        <h6 class="fw-semibold text-white mb-3">Entreprise</h6>
                        <ul class="list-unstyled">
                            <li class="mb-2"><a href="{{ url('/about') }}" class="text-light opacity-75 text-decoration-none hover-opacity-100">À propos</a></li>
                            <li class="mb-2"><a href="#" class="text-light opacity-75 text-decoration-none hover-opacity-100">Carrières</a></li>
                            <li class="mb-2"><a href="#" class="text-light opacity-75 text-decoration-none hover-opacity-100">Blog</a></li>
                            <li class="mb-2"><a href="{{ url('/contact') }}" class="text-light opacity-75 text-decoration-none hover-opacity-100">Contact</a></li>
                        </ul>
                    </div>

                    <div class="col-md-6 col-lg-2 mb-4 mb-md-0">
                        <h6 class="fw-semibold text-white mb-3">Support</h6>
                        <ul class="list-unstyled">
                            <li class="mb-2"><a href="#" class="text-light opacity-75 text-decoration-none hover-opacity-100">Centre d'aide</a></li>
                            <li class="mb-2"><a href="#" class="text-light opacity-75 text-decoration-none hover-opacity-100">Documentation</a></li>
                            <li class="mb-2"><a href="#" class="text-light opacity-75 text-decoration-none hover-opacity-100">API</a></li>
                            <li class="mb-2"><a href="#" class="text-light opacity-75 text-decoration-none hover-opacity-100">Statut</a></li>
                        </ul>
                    </div>

                    <div class="col-md-6 col-lg-2">
                        <h6 class="fw-semibold text-white mb-3">Légal</h6>
                        <ul class="list-unstyled">
                            <li class="mb-2"><a href="#" class="text-light opacity-75 text-decoration-none hover-opacity-100">Confidentialité</a></li>
                            <li class="mb-2"><a href="#" class="text-light opacity-75 text-decoration-none hover-opacity-100">Conditions</a></li>
                            <li class="mb-2"><a href="#" class="text-light opacity-75 text-decoration-none hover-opacity-100">Cookies</a></li>
                            <li class="mb-2"><a href="#" class="text-light opacity-75 text-decoration-none hover-opacity-100">Licences</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Copyright -->
                <div class="border-top border-secondary py-4">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <p class="mb-0 text-light opacity-75">
                                &copy; {{ date('Y') }} Gestion Des Tâches. Tous droits réservés.
                                Développé avec ❤️ par <strong>Faustin et Elisée</strong>.
                            </p>
                        </div>
                        <div class="col-md-4 text-md-end mt-3 mt-md-0">
                            <div class="d-flex justify-content-md-end gap-4">
                                <a href="#" class="text-light opacity-75 text-decoration-none hover-opacity-100 small">Français</a>
                                <a href="#" class="text-light opacity-75 text-decoration-none hover-opacity-100 small">English</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <!-- Bootstrap JS pour la responsivité -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        
        <!-- Production JavaScript -->
        @if(app()->environment('production'))
            <script src="{{ secure_asset('js/production.js') }}"></script>
        @endif

        <!-- Script pour hover effects -->
        <script>
            // Smooth hover effects for footer links
            document.querySelectorAll('footer a').forEach(link => {
                link.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-1px)';
                    this.style.transition = 'all 0.3s ease';
                });

                link.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });

            // Navbar responsive behavior enhancement
            const navbarToggler = document.querySelector('.navbar-toggler');
            const navbarCollapse = document.querySelector('.navbar-collapse');

            if (navbarToggler && navbarCollapse) {
                navbarToggler.addEventListener('click', function() {
                    setTimeout(() => {
                        if (navbarCollapse.classList.contains('show')) {
                            navbarCollapse.style.maxHeight = navbarCollapse.scrollHeight + 'px';
                        }
                    }, 10);
                });
            }
        </script>
    </body>
</html>
