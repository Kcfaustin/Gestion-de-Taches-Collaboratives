<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>À propos - TaskFlow Pro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/modern-theme.css') }}" rel="stylesheet">
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
</head>

<body>
    @include('navbar')

    <!-- Hero Section -->
    <section class="position-relative overflow-hidden" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); min-height: 60vh; display: flex; align-items: center;">
        <div class="container-fluid px-3 px-sm-4 px-lg-5">
            <div class="row justify-content-center text-center text-white">
                <div class="col-lg-8">
                    <div class="badge bg-white bg-opacity-20 text-white mb-3 px-3 py-2 rounded-pill">
                        <i class="bi bi-people-fill me-1"></i>
                        Notre histoire
                    </div>
                    <h1 class="display-4 fw-bold mb-4">
                        Repenser la collaboration d'équipe
                    </h1>
                    <p class="lead mb-0 text-white-50">
                        TaskFlow Pro est né de la vision de deux développeurs passionnés qui voulaient révolutionner
                        la façon dont les équipes collaborent et gèrent leurs projets.
                    </p>
                </div>
            </div>
        </div>

        <!-- Decorative Elements -->
        <div class="position-absolute bottom-0 start-0 w-100">
            <svg viewBox="0 0 1200 120" preserveAspectRatio="none" style="height: 120px; width: 100%;">
                <path d="M1200 120L0 16.48V0h1200v120z" fill="white"></path>
            </svg>
        </div>
    </section>

    <!-- Mission & Vision -->
    <section class="py-5 py-lg-6">
        <div class="container-fluid px-3 px-sm-4 px-lg-5">
            <div class="row g-5">
                <div class="col-12 col-lg-6">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4 p-lg-5">
                            <div class="d-flex align-items-center mb-4">
                                <div class="bg-primary bg-gradient rounded-3 p-3 me-3">
                                    <i class="bi bi-bullseye text-white fs-4"></i>
                                </div>
                                <h2 class="h3 mb-0 fw-bold">Notre Mission</h2>
                            </div>
                            <p class="text-muted mb-4">
                                Simplifier la gestion de projets pour les équipes de toutes tailles. Nous croyons que la productivité
                                ne devrait jamais être compromise par des outils complexes ou des processus inefficaces.
                            </p>
                            <ul class="list-unstyled">
                                <li class="mb-2">
                                    <i class="bi bi-check-circle-fill text-success me-2"></i>
                                    Interfaces intuitives et accessibles
                                </li>
                                <li class="mb-2">
                                    <i class="bi bi-check-circle-fill text-success me-2"></i>
                                    Collaboration en temps réel
                                </li>
                                <li class="mb-2">
                                    <i class="bi bi-check-circle-fill text-success me-2"></i>
                                    Analytics et insights avancés
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4 p-lg-5">
                            <div class="d-flex align-items-center mb-4">
                                <div class="bg-success bg-gradient rounded-3 p-3 me-3">
                                    <i class="bi bi-eye text-white fs-4"></i>
                                </div>
                                <h2 class="h3 mb-0 fw-bold">Notre Vision</h2>
                            </div>
                            <p class="text-muted mb-4">
                                Devenir la plateforme de référence pour la gestion collaborative de projets, en permettant
                                à chaque équipe d'atteindre son plein potentiel grâce à des outils innovants.
                            </p>
                            <div class="row g-3">
                                <div class="col-6">
                                    <div class="text-center">
                                        <div class="h2 fw-bold text-success">98%</div>
                                        <small class="text-muted">Satisfaction client</small>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-center">
                                        <div class="h2 fw-bold text-primary">1000+</div>
                                        <small class="text-muted">Équipes actives</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <main class="py-8">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl font-bold text-center mb-6">Notre Mission</h2>
            <p class="text-lg text-gray-700 text-center mb-8">
                Faciliter la gestion de projets et de tâches pour les équipes et les individus en offrant une plateforme simple et efficace.
            </p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="p-6 bg-white shadow-md rounded-md">
                    <h3 class="text-xl font-bold mb-4">Simplicité</h3>
                    <p class="text-gray-600">Nous mettons l'accent sur une interface intuitive pour une utilisation optimale.</p>
                </div>
                <div class="p-6 bg-white shadow-md rounded-md">
                    <h3 class="text-xl font-bold mb-4">Collaboration</h3>
                    <p class="text-gray-600">Nous permettons aux équipes de collaborer efficacement, où qu'elles soient.</p>
                </div>
                <div class="p-6 bg-white shadow-md rounded-md">
                    <h3 class="text-xl font-bold mb-4">Innovation</h3>
                    <p class="text-gray-600">Nous innovons constamment pour répondre aux besoins en constante évolution.</p>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    @include('footer')
</body>
</html>
