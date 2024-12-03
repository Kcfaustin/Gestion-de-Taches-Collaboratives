<!DOCTYPE html>
<html lang="en">
<body>
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
    </body>
    </html>

</body>
</html>
