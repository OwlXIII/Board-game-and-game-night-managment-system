<div class="bg-slate-800 shadow-lg rounded-2xl p-8 space-y-6 text-center">
    @auth
        <p class="text-2xl font-bold">{{ __('app.hello') }}, {{ auth()->user()->name }}!</p>
        <p class="text-lg">{{ __('app.dashboardDescription') }}</p>

        <a href="{{ route('boardgames.index') }}"
           class="inline-block bg-green-500 text-white px-6 py-3 rounded-lg text-lg font-semibold hover:bg-green-600 transition">
            {{ __('app.exploreBoardGames') }}
        </a>
    @else
        <p class="text-2xl font-bold">{{ __('app.hello') }}</p>
        <p class="text-lg">{{ __('app.dashboardGuestDecription') }}</p>

        <div class="flex justify-center gap-4 pt-4">
            <a href="{{ route('login') }}"
               class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700 transition">
                {{ __('app.login') }}
            </a>
            <a href="{{ route('register') }}"
               class="bg-green-500 text-white px-5 py-2 rounded-lg hover:bg-green-600 transition">
                {{ __('app.register') }}
            </a>
        </div>
    @endauth
</div>
