
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

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main id="main-content" class="container mx-auto mt-6">
                {{ $slot }}
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
                                .then((response) => response.text())
                                .then((html) => {
                                    const parser = new DOMParser();
                                    const newDocument = parser.parseFromString(html, "text/html");
                                    const newContent = newDocument.querySelector("#main-content").innerHTML;

                                    document.querySelector("#main-content").innerHTML = newContent;
                                    history.pushState(null, "", url); // Met à jour l'URL dans la barre d'adresse
                                })
                                .catch((err) => console.error("Erreur de chargement :", err));
                        });
                    });
                });

            </script>
            @stack('scripts')
        </div>


    </body>
</html>
