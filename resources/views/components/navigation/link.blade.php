<div class="hidden space-x-4 sm:flex">
    <x-menu.nav-link :href="route('boardgames.index')" :active="request()->routeIs('boardgames.*')" class="text-slate-100 hover:slate-900">
        {{ __('app.boardgames') }}
    </x-menu.nav-link>
    <x-menu.nav-link :href="url('/gamenights')" :active="request()->is('gamenights*')" class="text-slate-100 hover:slate-900">
        {{ __('app.gamenights') }}
    </x-menu.nav-link>

    @auth
        @if(auth()->user()->role === 'admin')
            <x-menu.nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')" class="text-slate-100 hover:slate-900">
                {{ __('app.dashboard') }}
            </x-menu.nav-link>
            <x-menu.nav-link :href="route('admin.boardgames.pendingGames')" :active="request()->routeIs('admin.boardgames.pendingGames')" class="text-slate-100 hover:slate-900">
                {{ __('app.suggestedBoardGames') }}
            </x-menu.nav-link>
        @endif
    @endauth
</div>
