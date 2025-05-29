<x-app-layout>
    <x-slot name="header">
        <x-homepage.header :title="__('app.welcome')" />
    </x-slot>

    <div class="py-16 bg-slate-900 text-slate-100">
        <div class="max-w-4xl mx-auto px-6 space-y-12">

            <div data-aos="fade-up" data-aos-delay="100">
                <x-homepage.welcome-panel />
            </div>

            <div data-aos="fade-up" data-aos-delay="300">
                <x-homepage.upcoming-game-nights :nights="$upcomingGameNights" />
            </div>

        </div>
    </div>
</x-app-layout>
