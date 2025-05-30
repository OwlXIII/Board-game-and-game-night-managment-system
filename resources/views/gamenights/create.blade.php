<x-app-layout>
    <div data-aos="fade-up" data-aos-delay="100">
        <x-slot name="header">
            <x-homepage.header :title="__('app.createGameNight')" />
        </x-slot>

        <div class="mt-4 max-w-3xl mx-auto py-8 bg-slate-800 p-6 rounded-lg shadow text-slate-100">

            <form method="POST" action="{{ route('gamenights.store') }}">
                @csrf

                <x-form.labeled-input id="title" required />
                <x-form.labeled-textarea id="description" />
                <x-form.labeled-input id="dateTime" type="datetime-local" required />
                <x-form.labeled-input id="country" required />
                <x-form.labeled-input id="city" required />
                <x-form.labeled-input id="street" required />
                <x-form.labeled-input id="streetNumber" required />

                <div class="mt-6 mb-4 flex justify-center gap-4">
                    <x-primary-button>
                        {{ __('app.create') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
