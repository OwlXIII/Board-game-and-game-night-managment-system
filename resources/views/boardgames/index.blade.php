<x-app-layout>
    <div data-aos="fade-up" data-aos-delay="100">
        <x-slot name="header">
            <x-homepage.header :title="__('app.boardgames')" />
        </x-slot>

        <div class="flex justify-end mb-4 flex justify-center gap-4">
        </div>

        <div class="flex justify-end mb-4 flex justify-center gap-4">
            @auth
                <x-buttons.suggest-button />
            @endauth
        </div>

        <x-boardgames.filter-form :categories="$categories" />



        <div class="py-8">
            <div class="max-w-6xl mx-auto space-y-6">
                @foreach ($boardGames as $boardGame)
                    <x-boardgames.tile :game="$boardGame" />
                @endforeach

                <div class="mt-6">
                    {{ $boardGames->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
