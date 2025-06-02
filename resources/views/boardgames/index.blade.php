<x-app-layout>
    <div data-aos="fade-up" data-aos-delay="100">
        <x-slot name="header">
            <x-homepage.header :title="__('app.boardgames')" />
        </x-slot>

        <div data-aos="fade-up" data-aos-delay="100" class="flex mt-4 mb-4 justify-center gap-4">
            @auth
                <x-buttons.suggest-button />
            @endauth
        </div>

        <div data-aos="fade-up" data-aos-delay="100">
            <x-boardgames.filter-form :categories="$categories" />
        </div>



        <div class="py-8">
            <div class="max-w-6xl mx-auto space-y-6">
                @foreach ($boardGames as $boardGame)
                    <div data-aos="fade-up" data-aos-delay="{{ $loop->index * 250 }}" class="mb-4">
                        <x-boardgames.tile :game="$boardGame" />
                    </div>
                @endforeach

                <div class="mt-6">
                    {{ $boardGames->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
