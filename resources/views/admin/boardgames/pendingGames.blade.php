<x-app-layout>
    <x-slot name="header">
        <x-homepage.header :title="__('app.suggestedBoardGames')" />
    </x-slot>

    <div class="py-8 max-w-5xl mx-auto">

        @forelse($pendingGames as $boardGame)
            <div data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}" class="mb-4">
                <x-dashboard.suggested-game :boardGame="$boardGame" />
            </div>
        @empty
            <p class="text-center text-slate-400">{{ __('app.noPendingGames') }}</p>
        @endforelse

    </div>
</x-app-layout>
