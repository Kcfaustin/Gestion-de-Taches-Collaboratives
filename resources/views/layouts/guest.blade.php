

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="font-sans text-gray-900 antialiased">
        <nav class="bg-gray-800">
            <div class="container mx-auto px-4 flex items-center justify-between h-16">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a href="{{ url('/') }}" class="text-white text-xl font-bold no-underline">
                        Gestion Des Tâches
                    </a>
                </div>

                <!-- Hamburger Menu Button (visible on small screens) -->
                <div class="md:hidden">
                    <button id="nav-toggle" class="text-gray-300 hover:text-white focus:outline-none focus:ring-2 focus:ring-white">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>

                <!-- Navigation Links -->
                <div id="nav-menu" class="hidden md:flex md:space-x-4">
                    <a href="{{ url('/') }}" class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                        Accueil
                    </a>
                    <a href="{{ url('/about') }}" class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                        À propos
                    </a>
                    <a href="{{ url('/contact') }}" class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                        Contact
                    </a>
                </div>

                <!-- Login & Register Buttons -->
                <div class="hidden md:flex space-x-4">
                    <a href="{{ route('login') }}" class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                        Connexion
                    </a>
                    <a href="{{ route('register') }}" class="bg-blue-500 hover:bg-blue-700 text-white px-3 py-2 rounded-md text-sm font-medium">
                        Inscription
                    </a>
                </div>
            </div>

            <!-- Mobile Menu (hidden by default) -->
            <div id="mobile-menu" class="hidden md:hidden bg-gray-800">
                <a href="{{ url('/') }}" class="block text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                    Accueil
                </a>
                <a href="{{ url('/about') }}" class="block text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                    À propos
                </a>
                <a href="{{ url('/contact') }}" class="block text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                    Contact
                </a>
                <a href="{{ route('login') }}" class="block text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                    Connexion
                </a>
                <a href="{{ route('register') }}" class="block bg-blue-500 hover:bg-blue-700 text-white px-3 py-2 rounded-md text-sm font-medium">
                    Inscription
                </a>
            </div>

        </nav>
        <script>
            document.getElementById('nav-toggle').addEventListener('click', function () {
                const mobileMenu = document.getElementById('mobile-menu');
                mobileMenu.classList.toggle('hidden');
            });
        </script>
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>

        <footer class="bg-gray-800 text-white py-4 mt-8">
            <div class="container mx-auto text-center">
                <p class="text-sm">&copy; {{ date('Y') }} Gestion Des Tâches. Tous droits réservés.</p>
                <p class="text-sm">Développé avec ❤️ par [Faustin et Elisée].</p>
            </div>
        </footer>
    </body>
</html>
