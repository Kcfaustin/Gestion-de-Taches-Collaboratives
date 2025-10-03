
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $pageTitle ?? config('app.name') }}</title>


        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Bootstrap Icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        
        <!-- Scripts -->
        @if(app()->environment('production'))
            <link rel="stylesheet" href="{{ \App\Helpers\AssetHelper::getCssPath() }}">
            <script type="module" src="{{ \App\Helpers\AssetHelper::getJsPath() }}"></script>
        @else
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif

        <!-- Meta tags for better mobile experience -->
        <meta name="theme-color" content="#0d6efd">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="default">
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main id="main-content" class="container-fluid px-0">
                <div class="container-responsive py-3 py-sm-4">
                    {{ $slot }}
                </div>
            </main>
            <script>
                document.addEventListener("DOMContentLoaded", function () {
                    console.log("Script chargé."); // Log de confirmation
                    document.querySelectorAll(".ajax-link").forEach((link) => {
                        link.addEventListener("click", function (e) {
                            e.preventDefault(); // Empêche le comportement par défaut
                            const url = this.getAttribute("href");

                            console.log("Chargement de :", url); // Vérifier le lien intercepté
                            fetch(url)
                                .then((response) => {
                                    if (!response.ok) {
                                        throw new Error('Network response was not ok');
                                    }
                                    return response.text();
                                })
                                .then((html) => {
                                    const parser = new DOMParser();
                                    const newDocument = parser.parseFromString(html, "text/html");
                                    const newContent = newDocument.querySelector("#main-content");
                                    const mainContent = document.querySelector("#main-content");

                                    if (newContent && mainContent) {
                                        mainContent.innerHTML = newContent.innerHTML;
                                        history.pushState(null, "", url); // Met à jour l'URL dans la barre d'adresse
                                    } else {
                                        console.warn("Element #main-content not found, redirecting normally");
                                        window.location.href = url;
                                    }
                                })
                                .catch((err) => {
                                    console.error("Erreur de chargement :", err);
                                    // En cas d'erreur, redirige normalement
                                    window.location.href = url;
                                });
                        });
                    });
                });
            </script>
        </div>

        <!-- jQuery (loaded BEFORE stack scripts) -->
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

        <!-- Scripts pushed by pages (DataTables, etc.) -->
        @stack('scripts')
    </body>
</html>
