<x-app-layout>
        <x-slot name="header">
            <x-homepage.header :title="__('app.gameNights')" />
        </x-slot>

        @auth
            <div data-aos="fade-up" data-aos-delay="100" class="mt-6 mb-4 flex justify-center gap-4">
                <x-buttons.create-button>
                    {{ __('app.createGameNight') }}
                    {{ __('app.createGameNight') }}
                </x-buttons.create-button>
            </div>
        @endauth


        <div class="max-w-6xl mx-auto py-6 space-y-6">
            @forelse ($gameNights as $gameNight)
                <div data-aos="fade-up" data-aos-delay="{{ $loop->index * 250 }}" class="mb-4">
                    <x-gamenight.card :gameNight="$gameNight" />
                </div>
            @empty
                <p class="text-center text-slate-400">{{ __('app.noGameNights') }}</p>
            @endforelse
        </div>
</x-app-layout>
