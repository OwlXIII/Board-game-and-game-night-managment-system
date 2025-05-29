<div class="pt-4 pb-3 space-y-1">
    <x-menu.responsive-nav-link :href="route('boardgames.index')" :active="request()->routeIs('boardgames.*')">
        {{ __('app.boardgames') }}
    </x-menu.responsive-nav-link>
    <x-menu.responsive-nav-link :href="url('/gamenights')" :active="request()->is('gamenights*')">
        {{ __('app.gamenights') }}
    </x-menu.responsive-nav-link>

    @auth
        @if(auth()->user()->role === 'admin')
            <x-menu.responsive-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
                {{ __('app.dashboard') }}
            </x-menu.responsive-nav-link>
            <x-menu.responsive-nav-link :href="route('admin.boardgames.pendingGames')" :active="request()->routeIs('admin.boardgames.pendingGames')">
                {{ __('app.suggestedBoardGames') }}
            </x-menu.responsive-nav-link>
        @endif
    @endauth
</div>
