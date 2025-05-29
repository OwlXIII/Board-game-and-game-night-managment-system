<div class="hidden sm:flex sm:items-center space-x-4">
    @auth
        <x-menu.dropdown align="right" width="48">
            <x-slot name="trigger">
                <button class="inline-flex items-center px-3 py-2 text-sm font-medium text-slate-100 hover:text-slate-900 focus:outline-none transition">
                    <div>{{ Auth::user()->name }}</div>
                    <svg class="ml-1 h-4 w-4 fill-current" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.3 7.3a1 1 0 011.4 0L10 10.6l3.3-3.3a1 1 0 111.4 1.4l-4 4a1 1 0 01-1.4 0l-4-4a1 1 0 010-1.4z" clip-rule="evenodd" />
                    </svg>
                </button>
            </x-slot>

            <x-slot name="content">
                <x-menu.dropdown-link :href="route('profile.edit')">{{ __('app.profile') }}</x-menu.dropdown-link>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-menu.dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('app.logout') }}
                    </x-menu.dropdown-link>
                </form>
            </x-slot>
        </x-menu.dropdown>
    @endauth

    @guest
        <a href="{{ route('login') }}" class="text-sm hover:text-slate-900">{{ __('app.login') }}</a>
        <a href="{{ route('register') }}" class="text-sm hover:text-slate-900">{{ __('app.register') }}</a>
    @endguest
</div>
