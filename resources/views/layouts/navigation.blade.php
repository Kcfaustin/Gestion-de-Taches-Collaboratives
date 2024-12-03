<nav x-data="{ open: false }" class="bg-gray-800 text-white border-b border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Left Navigation -->
            <div class="flex space-x-4 items-center">

                <!-- Navigation Links -->
                <div class="flex space-x-4">
                    @if(auth()->user()->isAdmin())
                        <a href="{{ route('admin.dashboard') }}" :active="request()->routeIs('admin.dashboard')" class="ajax-link text-white-500 hover:text-white-700">Statistiques</a>
                        <a href="{{ route('admin.users.index') }}" :active="request()->routeIs('admin.users.index')" class="ajax-link text-white-600 hover:text-white-900">Gérer les utilisateurs</a>
                        <a href="{{ route('admin.projects.index') }}" :active="request()->routeIs('admin.projects.index')" class="ajax-link text-white-600 hover:text-white-900">Gérer les projets</a>
                    @else
                        <a href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')" class="ajax-link text-white-500 hover:text-white-700">Statistiques</a>
                        <a href="{{ route('dashboard.projects') }}" :active="request()->routeIs('dashboard.projects')" class="ajax-link text-white-500 hover:text-white-700">Vos Projets</a>
                        <a href="{{ route('dashboard.tasks') }}" :active="request()->routeIs('dashboard.tasks')" class="ajax-link text-white-500 hover:text-white-700">Vos Tâches</a>
                    @endif
                </div>

            </div>



            <!-- Right Navigation -->
            <div class="hidden sm:flex sm:items-center sm:space-x-4">
                <!-- Settings Dropdown -->
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-gray-800 hover:bg-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <span>{{ Auth::user()->name }}</span>
                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Se Déconnecter') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Mobile Hamburger -->
            <div class="sm:hidden flex items-center">
                <button @click="open = ! open" class="p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none transition duration-150">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{ 'block': open, 'hidden': !open }" class="sm:hidden bg-gray-800 text-white">
        <div class="pt-2 pb-3 space-y-1">
            @if(auth()->user()->isAdmin())
                <!-- Admin Navigation -->
                <x-responsive-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')" class="ajax-link text-white-500 hover:text-white-700">
                    {{ __('Statistiques') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('admin.users.index')" :active="request()->routeIs('admin.users.index')" class="ajax-link text-white-500 hover:text-white-700">
                    {{ __('Gérer les Utilisateurs') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('admin.projects.index')" :active="request()->routeIs('admin.projects.index')" class="ajax-link text-white-500 hover:text-white-700">
                    {{ __('Gérer les Projets') }}
                </x-responsive-nav-link>
            @else
                <!-- User Navigation -->
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="ajax-link text-white-500 hover:text-white-700">
                    {{ __('Statistiques') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('dashboard.projects')" :active="request()->routeIs('dashboard.projects')" class="ajax-link text-white-500 hover:text-white-700">
                    {{ __('Vos Projets') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('dashboard.tasks')" :active="request()->routeIs('dashboard.tasks')" class="ajax-link text-white-500 hover:text-white-700">
                    {{ __('Vos Tâches') }}
                </x-responsive-nav-link>
            @endif
        </div>

        <!-- Responsive User Options -->
        <div class="pt-4 pb-1 border-t border-gray-600">
            <div class="px-4">
                <div class="text-base font-medium">{{ Auth::user()->name }}</div>
                <div class="text-sm font-light text-gray-300">{{ Auth::user()->email }}</div>
            </div>
            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Se Déconnecter') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
