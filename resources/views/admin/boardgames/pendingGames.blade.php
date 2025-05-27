<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">{{ __('app.suggestedBoardGames') }}</h2>
    </x-slot>

    <div class="py-8 max-w-5xl mx-auto">

        @if (session('success'))
            <div class="mb-4 bg-green-100 text-green-800 p-3 rounded">
                {{ session('success') }}
            </div>
        @endif

        @forelse($pendingGames as $boardGame)
            <div class="p-4 border mb-4 rounded shadow">
                <h3 class="text-lg font-semibold">
                    <a href="{{ route('admin.boardgames.show', $boardGame) }}" class="text-blue-600 hover:underline">
                        {{ $boardGame->title }}
                    </a>
                </h3>
                <p class="text-gray-700">{{ $boardGame->description }}</p>
            </div>
        @empty
            <p class="text-center text-gray-500">{{ __('app.noPendingGames') }}</p>
        @endforelse

    </div>
</x-app-layout>
