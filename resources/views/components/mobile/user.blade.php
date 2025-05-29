<div class="pt-4 pb-1 border-t border-slate-700">
    <div class="px-4">
        <div class="font-medium text-base">{{ Auth::user()->name }}</div>
        <div class="font-medium text-sm text-slate-400">{{ Auth::user()->email }}</div>
    </div>

    <div class="mt-3 space-y-1">
        <x-menu.responsive-nav-link :href="route('profile.edit')">
            {{ __('app.profile') }}
        </x-menu.responsive-nav-link>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <x-menu.responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                {{ __('app.logout') }}
            </x-menu.responsive-nav-link>
        </form>
    </div>
</div>
