<nav class="w-full bg-gradient-to-r from-orange-600 to-blue-700 text-white shadow-md relative z-[9999]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ route('home') }}">
                    <x-application-logo class="block h-9 w-auto fill-current text-white" />
                </a>
            </div>

            <!-- Liens -->
            <div class="flex items-center space-x-6">

                <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                    Accueil
                </x-nav-link>

                <x-nav-link :href="route('chansons.index')" :active="request()->routeIs('chansons.index')">
                    Chansons
                </x-nav-link>

                @auth
                    @if(auth()->user()->is_admin)
                        <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
                            Admin
                        </x-nav-link>
                    @endif

                    @if(!auth()->user()->is_admin)
                        <x-nav-link :href="route('compositeur.chansons.create')" :active="request()->routeIs('compositeur.chansons.create')">
                            Ajouter une chanson
                        </x-nav-link>
                    @endif

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="text-sm text-white hover:text-gray-200">
                            Déconnexion
                        </button>
                    </form>
                @endauth

            </div>
        </div>
    </div>
</nav>
