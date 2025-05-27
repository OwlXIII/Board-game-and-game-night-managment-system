<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">{{ $boardGame->title }}</h2>
    </x-slot>

    <div class="py-8 max-w-5xl mx-auto space-y-4">

        <div class="bg-white p-6 rounded shadow">
            <h3 class="text-xl font-bold mb-2">{{ $boardGame->title }}</h3>
            <p class="text-gray-700 mb-2">{{ $boardGame->description }}</p>
            <p><strong>{{ __('app.category') }}:</strong> {{ $boardGame->category }}</p>
            <p><strong>{{ __('app.players') }}:</strong> {{ $boardGame->min_players }}–{{ $boardGame->max_players }}</p>
            <p><strong>{{ __('app.duration') }}:</strong> {{ $boardGame->duration }} {{ __('app.minutes') }}</p>
            <p><strong>{{ __('app.complexity') }}:</strong> {{ __('app.gamecomplexity.' . $boardGame->complexity) }}</p>
        </div>

        <div class="flex gap-3">
            <x-approve-button :boardGame="$boardGame" />
            <x-deny-button :boardGame="$boardGame" />
        </div>

        <a href="{{ route('admin.boardgames.pendingGames') }}" class="text-sm text-gray-600 hover:underline">
            ← {{ __('app.backToPendingList') }}
        </a>
    </div>
</x-app-layout>
