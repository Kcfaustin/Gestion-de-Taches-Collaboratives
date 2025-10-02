<nav x-data="{ open: false }" class="bg-gray-800 text-white border-b border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-3 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Left Navigation -->
            <div class="flex items-center space-x-2 sm:space-x-4">
                <!-- Logo/Brand -->
                <div class="flex-shrink-0">
                    <span class="text-white font-bold text-lg sm:text-xl">GDT</span>
                </div>

                <!-- Navigation Links - Hidden on mobile -->
                <div class="hidden lg:flex lg:space-x-3">
                    @if(auth()->user()->isAdmin())
                        <a href="{{ route('admin.dashboard') }}" class="text-gray-300 hover:text-white px-2 py-1 rounded text-sm {{ request()->routeIs('admin.dashboard') ? 'bg-gray-700' : '' }}">
                            <span class="hidden xl:inline">Statistiques</span>
                            <span class="inline xl:hidden">Stats</span>
                        </a>
                        <a href="{{ route('admin.users.index') }}" class="text-gray-300 hover:text-white px-2 py-1 rounded text-sm {{ request()->routeIs('admin.users.index') ? 'bg-gray-700' : '' }}">
                            <span class="hidden xl:inline">Gérer les utilisateurs</span>
                            <span class="inline xl:hidden">Utilisateurs</span>
                        </a>
                        <a href="{{ route('admin.projects.index') }}" class="text-gray-300 hover:text-white px-2 py-1 rounded text-sm {{ request()->routeIs('admin.projects.index') ? 'bg-gray-700' : '' }}">
                            <span class="hidden xl:inline">Gérer les projets</span>
                            <span class="inline xl:hidden">Projets</span>
                        </a>
                    @else
                        <a href="{{ route('dashboard') }}" class="text-gray-300 hover:text-white px-2 py-1 rounded text-sm {{ request()->routeIs('dashboard') ? 'bg-gray-700' : '' }}">
                            <span class="hidden xl:inline">Statistiques</span>
                            <span class="inline xl:hidden">Stats</span>
                        </a>
                        <a href="{{ route('dashboard.projects') }}" class="text-gray-300 hover:text-white px-2 py-1 rounded text-sm {{ request()->routeIs('dashboard.projects') ? 'bg-gray-700' : '' }}">
                            <span class="hidden xl:inline">Vos Projets</span>
                            <span class="inline xl:hidden">Projets</span>
                        </a>
                        <a href="{{ route('dashboard.tasks') }}" class="text-gray-300 hover:text-white px-2 py-1 rounded text-sm {{ request()->routeIs('dashboard.tasks') ? 'bg-gray-700' : '' }}">
                            <span class="hidden xl:inline">Vos Tâches</span>
                            <span class="inline xl:hidden">Tâches</span>
                        </a>
                    @endif
                </div>

            </div>



            <!-- Right Navigation -->
            <div class="flex items-center space-x-2 sm:space-x-4">
                <!-- Settings Dropdown - Always visible -->
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-2 sm:px-4 py-2 border border-transparent text-xs sm:text-sm leading-5 font-medium rounded-md text-white bg-gray-700 hover:bg-gray-600 focus:outline-none transition ease-in-out duration-150">
                            <span class="truncate max-w-24 sm:max-w-none">{{ Auth::user()->name }}</span>
                            <svg class="ml-1 sm:ml-2 -mr-0.5 h-3 w-3 sm:h-4 sm:w-4" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
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

                <!-- Hamburger -->
                <div class="lg:hidden">
                    <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:bg-gray-700 focus:text-white transition duration-150 ease-in-out">
                        <svg class="h-5 w-5" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="lg:hidden">
        <div class="px-3 pt-2 pb-3 space-y-1 bg-gray-700">
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
