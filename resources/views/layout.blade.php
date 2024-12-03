<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite('resources/css/app.css') {{-- Inclure votre CSS --}}
    @vite('resources/js/app.js')   {{-- Inclure votre JavaScript --}}
</head>

<body class="bg-gray-100 text-gray-900">
     <!-- Navbar -->


    <main class="min-h-screen">
        @yield('content') <!-- Zone de contenu modifiable -->
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
