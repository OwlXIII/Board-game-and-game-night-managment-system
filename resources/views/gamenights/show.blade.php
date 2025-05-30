<x-app-layout>
    <div data-aos="fade-up" data-aos-delay="100">
        <x-slot name="header">
            <x-homepage.header :title="$gameNight->title" />
        </x-slot>

        <div class="max-w-4xl mx-auto py-6 space-y-4">
            <x-gamenight.info :gameNight="$gameNight" />

            @auth
                <div class="flex justify-center mb-4">
                    <x-buttons.registration-button :gameNight="$gameNight" />
                </div>
                <x-gamenight.suggest-form :gameNight="$gameNight" :boardGames="$boardGames" />
            @endauth

            <x-gamenight.suggestion-list :gameNight="$gameNight" />

            <a href="{{ route('gamenights.index') }}" class="text-sm text-green-600 hover:underline">
                ← {{ __('app.backToGameNights') }}
            </a>
        </div>
    </div>
</x-app-layout>
