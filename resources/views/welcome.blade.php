<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Des Tâches</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite('resources/css/app.css') {{-- Inclure votre CSS --}}
    @vite('resources/js/app.js')   {{-- Inclure votre JavaScript --}}
</head>
<body>
@include('navbar')


    <!-- En-tête -->
    <header class="bg-primary text-white text-center py-5">
        <div class="container">
            <h1 class="display-4 fw-bold">Bienvenue dans l'Application de Gestion des Tâches</h1>
            <p class="lead mt-3">Collaborez, suivez vos projets et organisez vos tâches en toute simplicité.</p>
            <div class="mt-4 d-flex flex-column flex-md-row justify-content-center gap-2">
                <a href="/login" class="btn btn-light btn-lg">Se connecter</a>
                <a href="/register" class="btn btn-outline-light btn-lg">Créer un compte</a>
            </div>
        </div>
    </header>



   <!-- Fonctionnalités principales -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5">Fonctionnalités principales</h2>
            <div class="row g-4 text-center">
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <h4 class="card-title">Gestion de Projets</h4>
                            <p class="card-text">Créez, organisez et suivez vos projets en quelques clics.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <h4 class="card-title">Collaboration</h4>
                            <p class="card-text">Attribuez des tâches et travaillez efficacement avec votre équipe.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <h4 class="card-title">Statistiques</h4>
                            <p class="card-text">Suivez vos progrès à l'aide de statistiques détaillées.</p>
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


</body>
</html>
