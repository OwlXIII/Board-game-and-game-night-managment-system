<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">{{ __('app.createGameNight') }}</h2>
    </x-slot>

    <div class="max-w-3xl mx-auto py-8">
        <form method="POST" action="{{ route('gamenights.store') }}">
            @csrf

            <div class="mb-4">
                <x-input-label for="title" :value="__('app.title')" />
                <x-text-input id="title" name="title" type="text" class="w-full" required />
            </div>

            <div class="mb-4">
                <x-input-label for="description" :value="__('app.description')" />
                <textarea id="description" name="description" class="w-full border rounded p-2"></textarea>
            </div>

            <div class="mb-4">
                <x-input-label for="event_time" :value="__('app.dateTime')" />
                <x-text-input id="event_time" name="event_time" type="datetime-local" class="w-full" required />
            </div>

            <div class="mb-4">
                <x-input-label for="country" :value="__('app.country')" />
                <x-text-input id="country" name="country" type="text" class="w-full" required />
            </div>

            <div class="mb-4">
                <x-input-label for="city" :value="__('app.city')" />
                <x-text-input id="city" name="city" type="text" class="w-full" required />
            </div>

            <div class="mb-4">
                <x-input-label for="street" :value="__('app.street')" />
                <x-text-input id="street" name="street" type="text" class="w-full" required />
            </div>

            <div class="mb-4">
                <x-input-label for="street_number" :value="__('app.streetNumber')" />
                <x-text-input id="street_number" name="street_number" type="text" class="w-full" required />
            </div>

            <x-primary-button>{{ __('app.create') }}</x-primary-button>
        </form>
    </div>
</x-app-layout>
