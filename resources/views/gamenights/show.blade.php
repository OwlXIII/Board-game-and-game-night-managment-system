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

    @auth
        @php
            $isCreator = $gameNight->created_by === auth()->id();
            $isRegistered = $gameNight->participants->contains('user_id', auth()->id());
        @endphp

        @if ($isCreator)
            <p class="text-gray-500">{{ __('app.youAreTheCreator') }}</p>

        @elseif (!$isRegistered)
            <form action="{{ route('gamenights.register', $gameNight) }}" method="POST" class="mt-4">
                @csrf
                <x-primary-button>{{ __('app.register') }}</x-primary-button>
            </form>

        @else
            <form action="{{ route('gamenights.unregister', $gameNight) }}" method="POST" class="mt-4">
                @csrf
                @method('DELETE')
                <x-danger-button>{{ __('app.unregister') }}</x-danger-button>
            </form>
        @endif
    @endauth
</x-app-layout>
