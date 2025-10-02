<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('css/modern-theme.css') }}" rel="stylesheet">
    @vite('resources/css/app.css') {{-- Inclure votre CSS --}}
    @vite('resources/js/app.js')   {{-- Inclure votre JavaScript --}}
</head>

<body class="bg-gray-100 text-gray-900">
    @auth
        @include('layouts.navigation')
    @endauth

    <main class="min-h-screen">
        <div class="container-fluid px-3 px-sm-4 px-lg-5">
            @yield('content') <!-- Zone de contenu modifiable -->
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <footer class="bg-gray-800 text-white py-4 mt-8">
        <div class="container mx-auto text-center">
            <p class="text-sm">&copy; {{ date('Y') }} Gestion Des Tâches. Tous droits réservés.</p>
            <p class="text-sm">Développé avec ❤️ par [Faustin et Elisée].</p>
        </div>
    </footer>

</body>
</html>
