<x-app-layout>
    <div data-aos="fade-up" data-aos-delay="100">
        <x-slot name="header">
            <x-homepage.header :title="$boardGame->title" />
        </x-slot>

        <div class="py-8 max-w-5xl mx-auto space-y-4">
            <x-dashboard.boardgame-card :boardGame="$boardGame" />

            <div class="flex gap-3">
                <x-buttons.approve-button :boardGame="$boardGame" />
                <x-buttons.deny-button :boardGame="$boardGame" />
            </div>

            <a href="{{ route('admin.boardgames.pendingGames') }}" class="text-sm text-green-600 hover:underline">
                ← {{ __('app.backToPendingList') }}
            </a>
        </div>
    </div>
</x-app-layout>
