<nav x-data="{ open: false }" class="bg-green-600 border-b border-green-700 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">


            {{-- Logo and Nav Links --}}
            <div class="flex items-center space-x-6">
                <a href="{{ url('/') }}">
                    <x-application-logo class="h-9 w-auto text-green-400" />
                </a>
                <x-navigation.link />
            </div>

            {{-- Language Switcher --}}
            <x-navigation.language-switcher class="hidden sm:flex items-center gap-3" />

            {{-- Auth Menu --}}
            <x-navigation.auth-menu />

            {{-- Mobile Hamburger --}}
            <div class="sm:hidden flex items-center">
                <button @click="open = ! open"
                        class="p-2 rounded-md text-slate-300 hover:text-slate-800 focus:outline-none">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    {{-- Mobile Menu — scoped inside Alpine --}}
    <div :class="{ 'block': open, 'hidden': !open }" class="sm:hidden hidden bg-slate-800">
        <x-navigation.mobile />
    </div>
</nav>
