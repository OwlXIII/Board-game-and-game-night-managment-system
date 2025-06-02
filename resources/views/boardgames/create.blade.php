@php
    use App\Enumerations\PlayerLimit;
    use App\Enumerations\DurationLimit;
@endphp

<x-app-layout>
    <div data-aos="fade-up" data-aos-delay="100">
        <x-slot name="header">
            <x-homepage.header :title="__('app.suggestBoardGame')" />
        </x-slot>

        <div class="mt-8 max-w-3xl mx-auto py-8 bg-slate-800 p-6 rounded-lg shadow text-slate-100">
            <form action="{{ route('boardgames.store') }}" method="POST" class="space-y-6">
                @csrf

                <x-input-label class="text-green-400" for="title" :value="__('app.title')" />
                <x-text-input id="title" name="title" type="text" class="w-full" required autofocus />

                <x-input-label class="text-green-400" for="description" :value="__('app.description')" />
                <textarea id="description" name="description" class="w-full border rounded p-2 bg-slate-600 border-green-400" rows="4" required></textarea>

                <x-input-label class="text-green-400" for="category" :value="__('app.category')" />
                <x-text-input id="category" name="category" type="text" class="w-full" />

                <div class="flex space-x-4 justify-center">
                    <div>
                        <x-input-label class="text-green-400" for="min_players" :value="__('app.minPlayers')" />
                        <x-text-input id="min_players" name="min_players" type="number" min="{{PlayerLimit::MIN->value}}" class="w-full" required />
                    </div>
                    <div>
                        <x-input-label class="text-green-400" for="max_players" :value="__('app.maxPlayers')" />
                        <x-text-input id="max_players" name="max_players" type="number" min="{{PlayerLimit::MIN->value}}" class="w-full" required />
                    </div>
                </div>

                <x-input-label class="text-green-400" for="duration" :value="__('app.duration')" />
                <x-text-input id="duration" name="duration" type="number" min="{{DurationLimit::MIN->value}}" class="w-full" required />

                <x-input-label class="text-green-400" for="complexity" :value="__('app.complexity')" />
                <select name="complexity" id="complexity" class="w-full border rounded p-2 bg-slate-600 border-green-400" required>
                    <option value="low">{{ __('app.gamecomplexity.low') }}</option>
                    <option value="medium">{{ __('app.gamecomplexity.medium') }}</option>
                    <option value="high">{{ __('app.gamecomplexity.high') }}</option>
                </select>

                <x-input-label class="text-green-400" for="rules" :value="__('app.rules')" />
                <textarea id="rules" name="rules" class="w-full border rounded p-2 bg-slate-600 border-green-400" rows="3"></textarea>

                <div class="mt-6 mb-4 flex justify-center gap-4">
                    <x-primary-button>
                        {{ __('app.submit') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
