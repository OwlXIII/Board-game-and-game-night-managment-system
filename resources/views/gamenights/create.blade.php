<x-app-layout>
    <div data-aos="fade-up" data-aos-delay="100">
        <x-slot name="header">
            <x-homepage.header :title="__('app.createGameNight')" />
        </x-slot>

        <div class="mt-8 max-w-3xl mx-auto py-8 bg-slate-800 p-6 rounded-lg shadow text-slate-100">

            <form method="POST" action="{{ route('gamenights.store') }}">
                @csrf

                <div class="mb-4">
                    <x-input-label for="title" :value="__('app.title')" class="text-green-400" />
                    <x-text-input id="title" name="title" type="text" class="w-full" required />
                </div>

                <div class="mb-4">
                    <x-input-label for="description" :value="__('app.description')" class="text-green-400"  />
                    <textarea id="description" name="description" class="w-full border rounded p-2 border-green-600 focus:border-green-600 focus:ring-green-600 bg-slate-600"></textarea>
                </div>

                <div class="mb-4">
                    <x-input-label for="event_time" :value="__('app.dateTime')" class="text-green-400" />
                    <x-text-input id="event_time" name="event_time" type="datetime-local" class="w-full" required />
                </div>

                <div class="mb-4">
                    <x-input-label for="country" :value="__('app.country')" class="text-green-400" />
                    <x-text-input id="country" name="country" type="text" class="w-full" required />
                </div>

                <div class="mb-4">
                    <x-input-label for="city" :value="__('app.city')" class="text-green-400" />
                    <x-text-input id="city" name="city" type="text" class="w-full" required />
                </div>

                <div class="mb-4">
                    <x-input-label for="street" :value="__('app.street')" class="text-green-400" />
                    <x-text-input id="street" name="street" type="text" class="w-full" required />
                </div>

                <div class="mb-4">
                    <x-input-label for="street_number" :value="__('app.streetNumber')" class="text-green-400" />
                    <x-text-input id="street_number" name="street_number" type="text" class="w-full" required />
                </div>

                <div class="mt-6 mb-4 flex justify-center gap-4">
                    <x-primary-button>{{ __('app.create') }}</x-primary-button>
                </div>
            </form>

        </div>
    </div>
</x-app-layout>
