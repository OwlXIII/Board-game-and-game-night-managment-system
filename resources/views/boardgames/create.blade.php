<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">
            {{ __('app.suggestBoardGame') }}
        </h2>
    </x-slot>

    <div class="py-8 max-w-3xl mx-auto">
            <form action="{{ route('boardgames.store') }}" method="POST" class="space-y-6">
            @csrf

            <x-input-label for="title" :value="__('app.title')" />
            <x-text-input id="title" name="title" type="text" class="w-full" required autofocus />

            <x-input-label for="description" :value="__('app.description')" />
            <textarea id="description" name="description" class="w-full border rounded p-2" rows="4" required></textarea>

            <x-input-label for="category" :value="__('app.category')" />
            <x-text-input id="category" name="category" type="text" class="w-full" />

            <div class="flex space-x-4">
                <div>
                    <x-input-label for="min_players" :value="__('app.minPlayers')" />
                    <x-text-input id="min_players" name="min_players" type="number" min="1" class="w-full" required />
                </div>
                <div>
                    <x-input-label for="max_players" :value="__('app.maxPlayers')" />
                    <x-text-input id="max_players" name="max_players" type="number" min="1" class="w-full" required />
                </div>
            </div>

            <x-input-label for="duration" :value="__('app.duration')" />
            <x-text-input id="duration" name="duration" type="number" min="5" class="w-full" required />

            <x-input-label for="complexity" :value="__('app.complexity')" />
            <select name="complexity" id="complexity" class="w-full border rounded p-2" required>
                <option value="low">{{ __('app.gamecomplexity.low') }}</option>
                <option value="medium">{{ __('app.gamecomplexity.medium') }}</option>
                <option value="high">{{ __('app.gamecomplexity.high') }}</option>
            </select>

            <x-input-label for="rules" :value="__('app.rules')" />
            <textarea id="rules" name="rules" class="w-full border rounded p-2" rows="3"></textarea>

            <x-primary-button>
                {{ __('app.submit') }}
            </x-primary-button>
        </form>
    </div>
</x-app-layout>
