<x-app-layout>
    <div data-aos="fade-up" data-aos-delay="100">
        <x-slot name="header">
            <x-homepage.header :title="__('app.suggestBoardGame')" />
        </x-slot>

        <div class="py-8 max-w-3xl mx-auto">
            <div class="bg-slate-800 text-slate-100 p-6 rounded-xl shadow space-y-6">
                <form action="{{ route('boardgames.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <x-form.labeled-input id="title" name="title" required />
                    <x-form.labeled-textarea id="description" rows="4" name="description" required />
                    <x-form.labeled-input id="category" name="category" />

                    <div class="flex flex-col sm:flex-row sm:space-x-4 gap-4 sm:gap-0 justify-center">
                        <x-form.labeled-input id="min_players" type="number" min="1" name="minPlayers" required />
                        <x-form.labeled-input id="max_players" type="number" min="1" name="maxPlayers" required />
                    </div>

                    <x-form.labeled-input id="duration" type="number" min="5" name="duration" required />

                    <x-form.labeled-select
                        id="complexity"
                        :options="[
                            'low' => __('app.gamecomplexity.low'),
                            'medium' => __('app.gamecomplexity.medium'),
                            'high' => __('app.gamecomplexity.high'),
                        ]"
                        required
                    />

                    <x-form.labeled-textarea id="rules" rows="3" />

                    <div class="flex justify-center mb-4 gap-4">
                        <x-primary-button>
                            {{ __('app.submit') }}
                        </x-primary-button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
