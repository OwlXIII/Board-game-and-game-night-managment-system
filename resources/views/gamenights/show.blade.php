<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">
            {{ $gameNight->title }}
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto py-6 space-y-4">
        <div class="bg-white p-6 rounded shadow">
            <p class="text-gray-700">{{ $gameNight->description }}</p>

            <p class="mt-4"><strong>{{ __('app.dateTime') }}:</strong>
                {{ \Carbon\Carbon::parse($gameNight->event_time)->format('Y-m-d, H:i') }}</p>

            <p><strong>{{ __('app.location') }}:</strong>
                {{ $gameNight->street }} {{ $gameNight->street_number }}, {{ $gameNight->city }}, {{ $gameNight->country }}</p>

            <p class="text-sm text-gray-500 mt-2">
                <strong>{{ __('app.createdBy') }}:</strong> {{ $gameNight->creator->name ?? '-' }}
            </p>
        </div>

        <a href="{{ route('gamenights.index') }}" class="text-sm text-blue-600 hover:underline">
            ← {{ __('app.backToGameNights') }}
        </a>
    </div>
</x-app-layout>
