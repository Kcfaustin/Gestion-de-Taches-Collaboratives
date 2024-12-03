<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>À propos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite('resources/css/app.css') {{-- Inclure votre CSS --}}
    @vite('resources/js/app.js')   {{-- Inclure votre JavaScript --}}
</head>

<body>
    <!-- resources/views/navbar.blade.php -->
    @include('navbar')

    <header class="bg-blue-500 text-white py-16">
        <div class="container mx-auto text-center">
            <h1 class="text-4xl font-bold">À propos de Gestion Des Tâches</h1>
            <p class="mt-4 text-lg">Découvrez notre mission, nos valeurs et notre vision.</p>
        </div>
    </header>

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
