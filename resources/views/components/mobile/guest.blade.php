<div class="pt-4 pb-1 border-t border-slate-700">

    <div class="mt-3 space-y-1">
        <x-menu.responsive-nav-link :href="route('login')">
            {{ __('app.login') }}
        </x-menu.responsive-nav-link>
        <x-menu.responsive-nav-link :href="route('register')">
            {{ __('app.register') }}
        </x-menu.responsive-nav-link>
    </div>
</div>
