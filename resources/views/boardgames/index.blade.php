<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('app.boardgames') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-6xl mx-auto space-y-6">
            @foreach ($boardGames as $game)
                <div class="bg-white shadow rounded-lg p-6">
                    <h3 class="text-xl font-semibold">{{ $game->title }}</h3>
                    <p class="text-gray-700 mb-2">{{ $game->description }}</p>
                    <p><strong>{{ __('app.category') }}:</strong> {{ $game->category ?? '-' }}</p>
                    <p><strong>{{ __('app.players') }}:</strong> {{ $game->min_players }} – {{ $game->max_players }}</p>
                    <p><strong>{{ __('app.duration') }}:</strong> {{ $game->duration }} min</p>
                    <p><strong>{{ __('app.complexity') }}:</strong> {{ __('app.gamecomplexity.' . $game->complexity) }}</p>
                </div>
            @endforeach

            {{ $boardGames->links() }}
        </div>
    </div>
</x-app-layout>
