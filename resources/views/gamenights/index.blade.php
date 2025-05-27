<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">{{ __('app.gameNights') }}</h2>
    </x-slot>

    <div class="max-w-6xl mx-auto py-6 space-y-6">
        @forelse ($gameNights as $gameNight)
            <div class="p-4 border rounded shadow bg-white">
                <h3 class="text-xl font-bold">
                    <a href="{{ route('gamenights.show', $gameNight) }}" class="text-blue-600 hover:underline">
                        {{ $gameNight->title }}
                    </a>
                </h3>

                <p class="text-sm text-gray-600 mt-2">
                    <strong>{{ __('app.dateTime') }}:</strong>
                    {{ Carbon::parse($gameNight->event_time)->format('Y-m-d, H:i') }}
                </p>

                <p class="text-sm text-gray-600">
                    <strong>{{ __('app.location') }}:</strong>
                    {{ $gameNight->street }} {{ $gameNight->street_number }}, {{ $gameNight->city }}, {{ $gameNight->country }}
                </p>
            </div>
        @empty
            <p class="text-center text-gray-500">{{ __('app.noGameNights') }}</p>
        @endforelse
    </div>
</x-app-layout>
