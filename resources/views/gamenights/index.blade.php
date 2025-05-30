<x-app-layout>
    <div data-aos="fade-up" data-aos-delay="100">
        <x-slot name="header">
            <x-homepage.header :title="__('app.gameNights')" />
        </x-slot>

        @auth
            <div class="mt-6 mb-4 flex justify-center gap-4">
                <x-buttons.create-button>
                    {{ __('app.createGameNight') }}
                </x-buttons.create-button>
            </div>
        @endauth


        <div class="max-w-6xl mx-auto py-6 space-y-6">
            @forelse ($gameNights as $gameNight)
                <x-gamenight.card :gameNight="$gameNight" />
            @empty
                <p class="text-center text-slate-400">{{ __('app.noGameNights') }}</p>
            @endforelse
        </div>
    </div>
</x-app-layout>
