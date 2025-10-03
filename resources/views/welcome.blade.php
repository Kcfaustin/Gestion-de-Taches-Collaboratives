<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskFlow Pro - Gestion Professionnelle des Tâches</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/icon-fixes.css') }}">
    
    <!-- Scripts -->
    @if(app()->environment('production'))
        <!-- Fallback CSS - Try multiple paths -->
        @if(file_exists(public_path('build/assets/app-Dydjg6F-.css')))
            <link rel="stylesheet" href="{{ asset('build/assets/app-Dydjg6F-.css') }}">
        @elseif(file_exists(public_path('build/assets/app.css')))
            <link rel="stylesheet" href="{{ asset('build/assets/app.css') }}">
        @elseif(file_exists(public_path('build/app.css')))
            <link rel="stylesheet" href="{{ asset('build/app.css') }}">
        @endif
        
        <!-- Fallback JS - Try multiple paths -->
        @if(file_exists(public_path('build/assets/js-K89dAo7v.js')))
            <script type="module" src="{{ asset('build/assets/js-K89dAo7v.js') }}"></script>
        @elseif(file_exists(public_path('build/assets/js.js')))
            <script type="module" src="{{ asset('build/assets/js.js') }}"></script>
        @elseif(file_exists(public_path('build/js.js')))
            <script type="module" src="{{ asset('build/js.js') }}"></script>
        @endif
    @else
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
    <style>
        body { font-family: 'Inter', sans-serif; }
        .hero-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            position: relative;
            overflow: hidden;
        }
        .hero-gradient::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" fill="white" opacity="0.1"><polygon points="0,100 100,0 200,50 300,0 400,50 500,0 600,50 700,0 800,50 900,0 1000,50 1000,100"/></svg>') repeat-x;
            animation: wave 10s linear infinite;
        }
        @keyframes wave {
            0% { background-position-x: 0; }
            100% { background-position-x: 1000px; }
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        }
        .feature-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            color: white;
            font-size: 1.5rem;
        }
        .btn-gradient {
            background: linear-gradient(135deg, #667eea, #764ba2);
            border: none;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
            transition: all 0.3s ease;
        }
        .btn-gradient:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.6);
        }
        .hover-lift {
            transition: all 0.3s ease;
        }
        .hover-lift:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1) !important;
        }
        .py-6 {
            padding-top: 5rem !important;
            padding-bottom: 5rem !important;
        }
        @media (max-width: 768px) {
            .py-6 {
                padding-top: 3rem !important;
                padding-bottom: 3rem !important;
            }
        }

        /* Statistics Section Styles */
        .stats-counter {
            transition: all 0.3s ease;
        }

        .stats-counter:hover {
            transform: translateY(-5px);
        }

        .stats-counter .rounded-circle {
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }

        .stats-counter:hover .rounded-circle {
            background-color: rgba(255, 255, 255, 0.3) !important;
            transform: scale(1.1);
        }

        .text-white-75 {
            color: rgba(255, 255, 255, 0.75) !important;
        }

        /* Counter animation enhancement */
        [data-count] {
            display: inline-block;
            transition: all 0.3s ease;
        }

        /* Statistics responsive adjustments */
        @media (max-width: 768px) {
            .stats-counter .rounded-circle {
                width: 60px !important;
                height: 60px !important;
                padding: 1rem !important;
            }

            .stats-counter .rounded-circle i {
                font-size: 1.5rem !important;
            }

            .stats-counter h3 {
                font-size: 2rem !important;
            }
        }

        /* Additional Features Section Styles */
        .feature-icon-modern {
            transition: all 0.3s ease;
        }

        .hover-lift:hover .feature-icon-modern {
            transform: scale(1.1) rotate(5deg);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }

        .hover-lift:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.1) !important;
        }

        .hover-lift {
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            border: 1px solid rgba(0,0,0,0.05);
        }

        .hover-lift:hover {
            border-color: rgba(13, 110, 253, 0.2);
        }

        /* Professional card styling */
        .card {
            overflow: hidden;
            position: relative;
        }

        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #0d6efd, #20c997, #ffc107);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .hover-lift:hover::before {
            opacity: 1;
        }

        /* CTA Buttons Styles - Ensure clickability */
        .hero-cta-btn {
            background: #ffffff !important;
            color: #1a1a1a !important;
            border: none !important;
            font-weight: 600 !important;
            text-decoration: none !important;
            transition: all 0.3s ease !important;
            position: relative !important;
            z-index: 10 !important;
            cursor: pointer !important;
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
        }

        .hero-cta-btn:hover {
            background: #f8f9fa !important;
            color: #1a1a1a !important;
            transform: translateY(-3px) !important;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3) !important;
        }

        .hero-login-btn {
            border: 2px solid rgba(255,255,255,0.8) !important;
            color: #ffffff !important;
            background: transparent !important;
            font-weight: 600 !important;
            text-decoration: none !important;
            transition: all 0.3s ease !important;
            position: relative !important;
            z-index: 10 !important;
            cursor: pointer !important;
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
        }

        .hero-login-btn:hover {
            background: rgba(255,255,255,0.1) !important;
            color: #ffffff !important;
            border-color: #ffffff !important;
            transform: translateY(-3px) !important;
            box-shadow: 0 10px 30px rgba(255,255,255,0.2) !important;
        }

        .cta-register-btn {
            background: linear-gradient(135deg, #0d6efd, #0b5ed7) !important;
            border: none !important;
            color: #ffffff !important;
            font-weight: 600 !important;
            text-decoration: none !important;
            transition: all 0.3s ease !important;
            position: relative !important;
            z-index: 10 !important;
            cursor: pointer !important;
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
        }

        .cta-register-btn:hover {
            background: linear-gradient(135deg, #0b5ed7, #0a58ca) !important;
            color: #ffffff !important;
            transform: translateY(-3px) !important;
            box-shadow: 0 15px 35px rgba(13, 110, 253, 0.4) !important;
        }

        .demo-btn {
            border: 2px solid #343a40 !important;
            color: #343a40 !important;
            background: transparent !important;
            font-weight: 600 !important;
            text-decoration: none !important;
            transition: all 0.3s ease !important;
            position: relative !important;
            z-index: 10 !important;
            cursor: pointer !important;
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
        }

        .demo-btn:hover {
            background: #343a40 !important;
            color: #ffffff !important;
            transform: translateY(-3px) !important;
            box-shadow: 0 10px 25px rgba(52, 58, 64, 0.3) !important;
        }

        /* Ensure all buttons are clickable */
        .btn {
            pointer-events: auto !important;
            user-select: none !important;
        }

        /* Fix any overlay issues */
        .hero-gradient {
            position: relative;
        }

        .hero-gradient * {
            position: relative;
            z-index: 1;
        }

        /* Hero CTA Buttons - Ensure they are clickable */
        .hero-cta-btn {
            position: relative;
            z-index: 10;
            cursor: pointer !important;
            pointer-events: auto !important;
            text-decoration: none !important;
            display: inline-flex !important;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            background-color: #ffffff !important;
            color: #1a1a1a !important;
            border: 2px solid transparent;
        }

        .hero-cta-btn:hover {
            background-color: #f8f9fa !important;
            color: #0d6efd !important;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(255,255,255,0.2);
            text-decoration: none !important;
        }

        .hero-login-btn {
            position: relative;
            z-index: 10;
            cursor: pointer !important;
            pointer-events: auto !important;
            text-decoration: none !important;
            display: inline-flex !important;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            border: 2px solid rgba(255,255,255,0.8) !important;
            color: #ffffff !important;
            background-color: transparent !important;
        }

        .hero-login-btn:hover {
            background-color: #ffffff !important;
            color: #1a1a1a !important;
            border-color: #ffffff !important;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(255,255,255,0.2);
            text-decoration: none !important;
        }

        /* CTA Section Buttons */
        .cta-register-btn {
            position: relative;
            z-index: 10;
            cursor: pointer !important;
            pointer-events: auto !important;
            text-decoration: none !important;
            display: inline-flex !important;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .cta-register-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(102, 126, 234, 0.4);
            text-decoration: none !important;
        }

        .demo-btn {
            position: relative;
            z-index: 10;
            cursor: pointer !important;
            pointer-events: auto !important;
            text-decoration: none !important;
            display: inline-flex !important;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .demo-btn:hover {
            background-color: #1a1a1a !important;
            color: #ffffff !important;
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(0,0,0,0.2);
            text-decoration: none !important;
        }

        /* Ensure all buttons are above other elements */
        .btn {
            position: relative;
            z-index: 5;
            cursor: pointer !important;
            pointer-events: auto !important;
        }
    </style>
</head>
<body>
@include('navbar')

    <!-- Hero Section -->
    <section class="hero-gradient text-white position-relative" style="min-height: 100vh; display: flex; align-items: center;">
        <div class="container-fluid px-3 px-sm-4 px-lg-5">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="pe-lg-5">
                        <div class="badge bg-primary bg-opacity-90 text-white border border-white border-opacity-25 mb-3 px-3 py-2 rounded-pill shadow-sm">
                            <i class="bi bi-star-fill text-warning me-1"></i>
                            Solution #1 de gestion des tâches
                        </div>
                        <h1 class="display-4 fw-bold mb-4">
                            Transformez votre
                            <span class="text-warning">productivité</span>
                            avec TaskFlow Pro
                        </h1>
                        <p class="lead mb-4 text-white-50">
                            Une plateforme collaborative moderne pour gérer vos projets, suivre vos tâches et optimiser votre workflow. Conçue pour les équipes qui visent l'excellence.
                        </p>
                        <div class="d-flex flex-column flex-sm-row gap-3 mb-4">
                            <a href="{{ route('register') }}" class="btn btn-light btn-lg px-4 py-3 rounded-3 fw-semibold hero-cta-btn">
                                <i class="bi bi-rocket-takeoff me-2"></i>
                                Commencer gratuitement
                            </a>
                            <a href="{{ route('login') }}" class="btn btn-outline-light btn-lg px-4 py-3 rounded-3 hero-login-btn">
                                <i class="bi bi-box-arrow-in-right me-2"></i>
                                Se connecter
                            </a>
                        </div>
                        <div class="d-flex align-items-center text-white-50">
                            <div class="d-flex me-4">
                                <img src="https://i.pravatar.cc/32?img=1" class="rounded-circle me-1" width="32" height="32" alt="User">
                                <img src="https://i.pravatar.cc/32?img=2" class="rounded-circle me-1" width="32" height="32" alt="User">
                                <img src="https://i.pravatar.cc/32?img=3" class="rounded-circle me-1" width="32" height="32" alt="User">
                            </div>
                            <small>Rejoint par plus de 1000+ utilisateurs</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="position-relative">
                        <div class="glass-card p-4 mb-4">
                            <div class="d-flex align-items-center mb-3">
                                <div class="bg-success rounded-circle p-2 me-3">
                                    <i class="bi bi-check-circle-fill text-white"></i>
                                </div>
                                <div>
                                    <h6 class="mb-0 text-white">Projet Design UI/UX</h6>
                                    <small class="text-white-50">Terminé aujourd'hui</small>
                                </div>
                            </div>
                            <div class="progress mb-2" style="height: 6px;">
                                <div class="progress-bar bg-success" style="width: 100%"></div>
                            </div>
                            <small class="text-white-50">5/5 tâches complétées</small>
                        </div>

                        <div class="glass-card p-4 ms-4">
                            <div class="d-flex align-items-center mb-3">
                                <div class="bg-primary rounded-circle p-2 me-3">
                                    <i class="bi bi-clock-fill text-white"></i>
                                </div>
                                <div>
                                    <h6 class="mb-0 text-white">Développement Mobile</h6>
                                    <small class="text-white-50">En cours</small>
                                </div>
                            </div>
                            <div class="progress mb-2" style="height: 6px;">
                                <div class="progress-bar" style="width: 60%"></div>
                            </div>
                            <small class="text-white-50">3/5 tâches complétées</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Statistics Section -->
    <section class="py-5 py-lg-6" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
        <div class="container-fluid px-3 px-sm-4 px-lg-5">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 text-center">
                    <div class="badge bg-white text-dark mb-3 px-3 py-2 rounded-pill fw-semibold">
                        <i class="bi bi-graph-up-arrow me-1"></i>
                        Statistiques en temps réel
                    </div>
                    <h2 class="display-5 fw-bold text-white mb-4">
                        Des chiffres qui parlent
                    </h2>
                    <p class="lead text-white-75">
                        Rejoignez une communauté grandissante d'utilisateurs qui transforment leur productivité
                    </p>
                </div>
            </div>

            <div class="row g-4">
                <!-- Utilisateurs actifs -->
                <div class="col-6 col-md-3">
                    <div class="text-center">
                        <div class="stats-counter mb-3">
                            <div class="bg-white rounded-circle p-4 d-inline-flex align-items-center justify-content-center mb-3 shadow-lg" style="width: 80px; height: 80px;">
                                <i class="bi bi-people-fill text-primary fs-2"></i>
                            </div>
                            <h3 class="display-4 fw-bold text-white mb-0" data-count="50000">0</h3>
                            <div class="text-white fw-medium">K+</div>
                        </div>
                        <p class="text-white fw-medium mb-0">Utilisateurs actifs</p>
                    </div>
                </div>

                <!-- Projets complétés -->
                <div class="col-6 col-md-3">
                    <div class="text-center">
                        <div class="stats-counter mb-3">
                            <div class="bg-white rounded-circle p-4 d-inline-flex align-items-center justify-content-center mb-3 shadow-lg" style="width: 80px; height: 80px;">
                                <i class="bi bi-check-circle-fill text-success fs-2"></i>
                            </div>
                            <h3 class="display-4 fw-bold text-white mb-0" data-count="125000">0</h3>
                            <div class="text-white fw-medium">K+</div>
                        </div>
                        <p class="text-white fw-medium mb-0">Projets complétés</p>
                    </div>
                </div>

                <!-- Tâches gérées -->
                <div class="col-6 col-md-3">
                    <div class="text-center">
                        <div class="stats-counter mb-3">
                            <div class="bg-white rounded-circle p-4 d-inline-flex align-items-center justify-content-center mb-3 shadow-lg" style="width: 80px; height: 80px;">
                                <i class="bi bi-list-task text-info fs-2"></i>
                            </div>
                            <h3 class="display-4 fw-bold text-white mb-0" data-count="2500000">0</h3>
                            <div class="text-white fw-medium">M+</div>
                        </div>
                        <p class="text-white fw-medium mb-0">Tâches gérées</p>
                    </div>
                </div>

                <!-- Temps économisé -->
                <div class="col-6 col-md-3">
                    <div class="text-center">
                        <div class="stats-counter mb-3">
                            <div class="bg-white rounded-circle p-4 d-inline-flex align-items-center justify-content-center mb-3 shadow-lg" style="width: 80px; height: 80px;">
                                <i class="bi bi-clock-history text-warning fs-2"></i>
                            </div>
                            <h3 class="display-4 fw-bold text-white mb-0" data-count="95">0</h3>
                            <div class="text-white fw-medium">%</div>
                        </div>
                        <p class="text-white fw-medium mb-0">Temps économisé</p>
                    </div>
                </div>
            </div>

            <!-- Testimonial row -->
            <div class="row justify-content-center mt-5 pt-4 border-top border-white border-opacity-20">
                <div class="col-lg-8 text-center">
                    <div class="d-flex align-items-center justify-content-center mb-3">
                        <div class="d-flex">
                            <i class="bi bi-star-fill text-warning fs-5"></i>
                            <i class="bi bi-star-fill text-warning fs-5"></i>
                            <i class="bi bi-star-fill text-warning fs-5"></i>
                            <i class="bi bi-star-fill text-warning fs-5"></i>
                            <i class="bi bi-star-fill text-warning fs-5"></i>
                        </div>
                        <span class="text-white ms-2 fw-medium">4.9/5 basé sur 12,000+ avis</span>
                    </div>
                    <blockquote class="blockquote text-white-75">
                        <p class="mb-3 fs-5 fst-italic">"TaskFlow Pro a transformé notre façon de travailler. Notre productivité a augmenté de 300% en quelques mois."</p>
                        <footer class="blockquote-footer text-white-50">
                            <strong>Sarah Martin</strong>, CEO chez TechStart
                        </footer>
                    </blockquote>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-5 py-lg-6 bg-light">
        <div class="container-fluid px-3 px-sm-4 px-lg-5">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 text-center">
                    <div class="badge bg-primary bg-opacity-10 text-primary mb-3 px-3 py-2 rounded-pill">
                        <i class="bi bi-lightning-charge-fill me-1"></i>
                        Fonctionnalités
                    </div>
                    <h2 class="display-5 fw-bold mb-4">
                        Tout ce dont votre équipe a besoin
                    </h2>
                    <p class="lead text-muted">
                        Des outils puissants et intuitifs conçus pour maximiser votre productivité et celle de votre équipe.
                    </p>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card border-0 shadow-sm h-100 hover-lift">
                        <div class="card-body p-4">
                            <div class="feature-icon mb-3">
                                <i class="bi bi-kanban"></i>
                            </div>
                            <h4 class="h5 mb-3">Gestion de Projets</h4>
                            <p class="text-muted mb-3">
                                Organisez vos projets avec des tableaux Kanban intuitifs. Suivez les progrès en temps réel.
                            </p>
                            <ul class="list-unstyled small text-muted">
                                <li class="mb-1"><i class="bi bi-check-circle-fill text-success me-2"></i>Tableaux personnalisables</li>
                                <li class="mb-1"><i class="bi bi-check-circle-fill text-success me-2"></i>Suivi des deadlines</li>
                                <li><i class="bi bi-check-circle-fill text-success me-2"></i>Templates de projets</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card border-0 shadow-sm h-100 hover-lift">
                        <div class="card-body p-4">
                            <div class="feature-icon mb-3" style="background: linear-gradient(135deg, #28a745, #20c997);">
                                <i class="bi bi-people"></i>
                            </div>
                            <h4 class="h5 mb-3">Collaboration</h4>
                            <p class="text-muted mb-3">
                                Travaillez ensemble efficacement avec des outils de collaboration avancés.
                            </p>
                            <ul class="list-unstyled small text-muted">
                                <li class="mb-1"><i class="bi bi-check-circle-fill text-success me-2"></i>Assignation d'équipes</li>
                                <li class="mb-1"><i class="bi bi-check-circle-fill text-success me-2"></i>Commentaires en temps réel</li>
                                <li><i class="bi bi-check-circle-fill text-success me-2"></i>Notifications intelligentes</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card border-0 shadow-sm h-100 hover-lift">
                        <div class="card-body p-4">
                            <div class="feature-icon mb-3" style="background: linear-gradient(135deg, #ffc107, #fd7e14);">
                                <i class="bi bi-graph-up"></i>
                            </div>
                            <h4 class="h5 mb-3">Analytics & Rapports</h4>
                            <p class="text-muted mb-3">
                                Analysez vos performances avec des tableaux de bord détaillés et des rapports automatisés.
                            </p>
                            <ul class="list-unstyled small text-muted">
                                <li class="mb-1"><i class="bi bi-check-circle-fill text-success me-2"></i>Tableaux de bord interactifs</li>
                                <li class="mb-1"><i class="bi bi-check-circle-fill text-success me-2"></i>Métriques de productivité</li>
                                <li><i class="bi bi-check-circle-fill text-success me-2"></i>Rapports exportables</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card border-0 shadow-sm h-100 hover-lift">
                        <div class="card-body p-4">
                            <div class="feature-icon mb-3" style="background: linear-gradient(135deg, #6f42c1, #e83e8c);">
                                <i class="bi bi-shield-check"></i>
                            </div>
                            <h4 class="h5 mb-3">Sécurité Avancée</h4>
                            <p class="text-muted mb-3">
                                Vos données sont protégées par des protocoles de sécurité de niveau entreprise.
                            </p>
                            <ul class="list-unstyled small text-muted">
                                <li class="mb-1"><i class="bi bi-check-circle-fill text-success me-2"></i>Chiffrement end-to-end</li>
                                <li class="mb-1"><i class="bi bi-check-circle-fill text-success me-2"></i>Authentification 2FA</li>
                                <li><i class="bi bi-check-circle-fill text-success me-2"></i>Backup automatique</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card border-0 shadow-sm h-100 hover-lift">
                        <div class="card-body p-4">
                            <div class="feature-icon mb-3" style="background: linear-gradient(135deg, #17a2b8, #6610f2);">
                                <i class="bi bi-phone"></i>
                            </div>
                            <h4 class="h5 mb-3">Mobile First</h4>
                            <p class="text-muted mb-3">
                                Accédez à vos projets partout, tout le temps, avec notre interface mobile optimisée.
                            </p>
                            <ul class="list-unstyled small text-muted">
                                <li class="mb-1"><i class="bi bi-check-circle-fill text-success me-2"></i>App mobile native</li>
                                <li class="mb-1"><i class="bi bi-check-circle-fill text-success me-2"></i>Synchronisation temps réel</li>
                                <li><i class="bi bi-check-circle-fill text-success me-2"></i>Mode hors ligne</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card border-0 shadow-sm h-100 hover-lift">
                        <div class="card-body p-4">
                            <div class="feature-icon mb-3" style="background: linear-gradient(135deg, #dc3545, #fd7e14);">
                                <i class="bi bi-puzzle"></i>
                            </div>
                            <h4 class="h5 mb-3">Intégrations</h4>
                            <p class="text-muted mb-3">
                                Connectez vos outils favoris pour un workflow fluide et automatisé.
                            </p>
                            <ul class="list-unstyled small text-muted">
                                <li class="mb-1"><i class="bi bi-check-circle-fill text-success me-2"></i>API Rest complète</li>
                                <li class="mb-1"><i class="bi bi-check-circle-fill text-success me-2"></i>Webhooks automatiques</li>
                                <li><i class="bi bi-check-circle-fill text-success me-2"></i>+50 intégrations</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-5 py-lg-6" style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);">
        <div class="container-fluid px-3 px-sm-4 px-lg-5">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="display-5 fw-bold mb-4">
                        Prêt à transformer votre productivité ?
                    </h2>
                    <p class="lead text-muted mb-5">
                        Rejoignez des milliers d'équipes qui ont choisi TaskFlow Pro pour optimiser leur workflow.
                    </p>
                    <div class="d-flex flex-column flex-sm-row justify-content-center gap-3">
                        <a href="{{ route('register') }}" class="btn btn-gradient btn-lg px-5 py-3 text-white rounded-3 cta-register-btn">
                            <i class="bi bi-rocket-takeoff me-2"></i>
                            Commencer gratuitement
                        </a>
                        <a href="#demo" class="btn btn-outline-dark btn-lg px-5 py-3 rounded-3 demo-btn">
                            <i class="bi bi-play-circle me-2"></i>
                            Voir la démo
                        </a>
                    </div>
                    <p class="small text-muted mt-3">
                        <i class="bi bi-shield-check text-success me-1"></i>
                        Aucune carte de crédit requise • Accès gratuit pendant 30 jours
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Additional Features Section -->
    <section class="py-5 py-lg-6 bg-white">
        <div class="container-fluid px-3 px-sm-4 px-lg-5">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 text-center">
                    <div class="badge bg-success bg-opacity-10 text-success mb-3 px-3 py-2 rounded-pill">
                        <i class="bi bi-plus-circle me-1"></i>
                        Fonctionnalités avancées
                    </div>
                    <h2 class="display-6 fw-bold mb-4 text-dark">
                        Des outils qui s'adaptent à vos besoins
                    </h2>
                    <p class="lead text-muted">
                        Découvrez comment nos fonctionnalités avancées peuvent transformer votre workflow quotidien.
                    </p>
                </div>
            </div>

            <div class="row g-4">
                <!-- Collaboration Teams -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="card border-0 shadow-lg h-100 hover-lift" style="transition: all 0.3s ease;">
                        <div class="card-body d-flex flex-column p-4">
                            <div class="mb-4">
                                <div class="feature-icon-modern mb-3" style="background: linear-gradient(135deg, #28a745, #20c997); width: 60px; height: 60px; border-radius: 16px; display: flex; align-items: center; justify-content: center;">
                                    <i class="bi bi-people-fill text-white fs-4"></i>
                                </div>
                            </div>
                            <h4 class="card-title h5 mb-3 text-dark fw-bold">Collaboration d'équipe</h4>
                            <p class="card-text flex-grow-1 text-muted">
                                Attribuez des tâches et travaillez efficacement avec votre équipe grâce à nos outils de collaboration en temps réel.
                            </p>
                            <div class="mt-3">
                                <ul class="list-unstyled small text-muted">
                                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Attribution intelligente des tâches</li>
                                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Chat intégré par projet</li>
                                    <li><i class="bi bi-check-circle-fill text-success me-2"></i>Partage de fichiers sécurisé</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Advanced Statistics -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="card border-0 shadow-lg h-100 hover-lift" style="transition: all 0.3s ease;">
                        <div class="card-body d-flex flex-column p-4">
                            <div class="mb-4">
                                <div class="feature-icon-modern mb-3" style="background: linear-gradient(135deg, #17a2b8, #6610f2); width: 60px; height: 60px; border-radius: 16px; display: flex; align-items: center; justify-content: center;">
                                    <i class="bi bi-graph-up-arrow text-white fs-4"></i>
                                </div>
                            </div>
                            <h4 class="card-title h5 mb-3 text-dark fw-bold">Statistiques avancées</h4>
                            <p class="card-text flex-grow-1 text-muted">
                                Suivez vos progrès avec des tableaux de bord interactifs et des statistiques détaillées en temps réel.
                            </p>
                            <div class="mt-3">
                                <ul class="list-unstyled small text-muted">
                                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Rapports personnalisables</li>
                                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Métriques de performance</li>
                                    <li><i class="bi bi-check-circle-fill text-success me-2"></i>Prédictions IA</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Time Management -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="card border-0 shadow-lg h-100 hover-lift" style="transition: all 0.3s ease;">
                        <div class="card-body d-flex flex-column p-4">
                            <div class="mb-4">
                                <div class="feature-icon-modern mb-3" style="background: linear-gradient(135deg, #ffc107, #fd7e14); width: 60px; height: 60px; border-radius: 16px; display: flex; align-items: center; justify-content: center;">
                                    <i class="bi bi-clock-history text-white fs-4"></i>
                                </div>
                            </div>
                            <h4 class="card-title h5 mb-3 text-dark fw-bold">Gestion du temps</h4>
                            <p class="card-text flex-grow-1 text-muted">
                                Optimisez votre temps avec des outils de planification intelligents et des rappels automatiques.
                            </p>
                            <div class="mt-3">
                                <ul class="list-unstyled small text-muted">
                                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Time tracking automatique</li>
                                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Calendrier intégré</li>
                                    <li><i class="bi bi-check-circle-fill text-success me-2"></i>Alertes intelligentes</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- Footer -->
    @include('footer')

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Counter Animation Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const observerOptions = {
                threshold: 0.5,
                rootMargin: '0px 0px -100px 0px'
            };

            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const counters = entry.target.querySelectorAll('[data-count]');
                        counters.forEach(counter => {
                            animateCounter(counter);
                        });
                        observer.unobserve(entry.target);
                    }
                });
            }, observerOptions);

            const statsSection = document.querySelector('.stats-counter').closest('section');
            if (statsSection) {
                observer.observe(statsSection);
            }

            function animateCounter(element) {
                const target = parseInt(element.getAttribute('data-count'));
                const duration = 2000;
                const step = target / (duration / 16);
                let current = 0;

                const timer = setInterval(() => {
                    current += step;
                    if (current >= target) {
                        current = target;
                        clearInterval(timer);
                    }

                    if (target >= 1000000) {
                        element.textContent = (current / 1000000).toFixed(1) + 'M';
                    } else if (target >= 1000) {
                        element.textContent = (current / 1000).toFixed(0) + 'K';
                    } else {
                        element.textContent = Math.floor(current);
                    }
                }, 16);
            }
        });

        // Ensure all buttons are clickable
        document.addEventListener('DOMContentLoaded', function() {
            // Force clickable state for all buttons
            const buttons = document.querySelectorAll('.btn, .hero-cta-btn, .hero-login-btn, .cta-register-btn, .demo-btn, .auth-btn-login, .auth-btn-register');

            buttons.forEach(button => {
                button.style.pointerEvents = 'auto';
                button.style.cursor = 'pointer';
                button.style.position = 'relative';
                button.style.zIndex = '10';

                // Add click event listener as backup
                button.addEventListener('click', function(e) {
                    // Don't prevent default if it has a proper href
                    if (this.href && this.href !== '#' && this.href !== '#demo') {
                        return true;
                    }

                    // Handle demo button or other special cases
                    if (this.href === '#demo') {
                        e.preventDefault();
                        alert('Fonctionnalité de démo à venir !');
                    }
                });
            });

            // Specific handling for main CTA buttons
            const registerButtons = document.querySelectorAll('a[href*="register"]');
            const loginButtons = document.querySelectorAll('a[href*="login"]');

            registerButtons.forEach(btn => {
                btn.addEventListener('click', function(e) {
                    console.log('Register button clicked');
                    // Allow default behavior to proceed
                });
            });

            loginButtons.forEach(btn => {
                btn.addEventListener('click', function(e) {
                    console.log('Login button clicked');
                    // Force navigation if needed
                    if (this.href && !e.defaultPrevented) {
                        window.location.href = this.href;
                    }
                });
            });

            // Additional fallback for any missed buttons
            document.addEventListener('click', function(e) {
                const target = e.target.closest('a[href*="login"], a[href*="register"]');
                if (target && target.href) {
                    console.log('Fallback navigation for:', target.href);
                    // Small delay to ensure any animations complete
                    setTimeout(() => {
                        if (!e.defaultPrevented) {
                            window.location.href = target.href;
                        }
                    }, 100);
                }
            });
        });
    </script>


</body>
</html>
