@php
    use App\Enumerations\PlayerLimit;
    use App\Enumerations\DurationLimit;
    use App\Enumerations\RatingLimit;
@endphp
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('app.boardgames') }}
        </h2>
    </x-slot>

    <div class="flex justify-end mb-4">
        @auth
            <x-buttons.suggest-button />
        @endauth
    </div>

    <div class="max-w-6xl mx-auto mb-6">
        <form method="GET" action="{{ route('boardgames.index') }}" class="flex flex-wrap gap-4 items-end">

            <div>
                <x-input-label for="search" :value="__('app.title')" />
                <x-text-input id="search" name="search" type="text" value="{{ request('search') }}" />
            </div>

            <div>
                <x-input-label for="category" :value="__('app.category')" />
                <select name="category" id="category" class="border rounded p-2">
                    <option value="">{{ __('app.all') }}</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category }}" @selected(request('category') === $category)>
                            {{ $category }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <x-input-label for="complexity" :value="__('app.complexity')" />
                <select name="complexity" id="complexity" class="border rounded p-2">
                    <option value="">{{ __('app.all') }}</option>
                    @foreach (['low', 'medium', 'high'] as $level)
                        <option value="{{ $level }}" @selected(request('complexity') === $level)>
                            {{ __('app.gamecomplexity.' . $level) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <x-input-label for="players" :value="__('app.players')" />
                <div class="flex items-center gap-2">
                    <input type="number" name="min_players" min="{{ PlayerLimit::MIN->value }}" max="{{ PlayerLimit::MAX->value }}" value="{{ request('min_players') }}" class="w-20 border rounded p-1">
                    <span>–</span>
                    <input type="number" name="max_players" min="{{ PlayerLimit::MIN->value }}" max="{{ PlayerLimit::MAX->value }}" value="{{ request('max_players') }}" class="w-20 border rounded p-1">
                </div>
            </div>

            <div>
                <x-input-label for="duration" :value="__('app.duration') . ' ' . __('app.minutes')" />
                <div class="flex items-center gap-2">
                    <input type="number" name="min_duration" min="{{ DurationLimit::MIN->value }}" max="{{ DurationLimit::MAX->value }}" value="{{ request('min_duration') }}" class="w-24 border rounded p-1">
                    <span>–</span>
                    <input type="number" name="max_duration" min="{{ DurationLimit::MIN->value }}" max="{{ DurationLimit::MAX->value }}" value="{{ request('max_duration') }}" class="w-24 border rounded p-1">
                </div>
            </div>

            <div class="flex items-end gap-2">
                <x-primary-button>{{ __('app.filter') }}</x-primary-button>
                <a href="{{ route('boardgames.index') }}" class="text-sm text-gray-500 hover:underline">
                    {{ __('app.reset') }}
                </a>
            </div>
        </form>
    </div>

    <div class="py-8">
        <div class="max-w-6xl mx-auto space-y-6">
            @foreach ($boardGames as $boardGame)
                <div class="bg-white shadow rounded-lg p-6">
                    <h3 class="text-xl font-semibold">
                        <a href="{{ route('boardgames.show', $boardGame) }}" class="text-blue-600 hover:underline">
                            {{ $boardGame->title }}
                        </a>
                    </h3>
                    <p class="text-gray-700">{{ Str::limit($boardGame->description, 100) }}</p>
                    <p><strong>{{ __('app.category') }}:</strong> {{ $boardGame->category }}</p>
                    <p><strong>{{ __('app.players') }}:</strong> {{ $boardGame->min_players }} – {{ $boardGame->max_players }}</p>
                    <p><strong>{{ __('app.duration') }}:</strong> {{ $boardGame->duration }} {{ __('app.minutes') }}</p>
                    <p><strong>{{ __('app.complexity') }}:</strong> {{ __('app.gamecomplexity.' . $boardGame->complexity) }}</p>
                    <p><strong>{{ __('app.averageRating') }}:</strong>
                        @if ($boardGame->reviews_avg_rating)
                            {{ number_format($boardGame->reviews_avg_rating, 1) }} / {{ RatingLimit::MAX->value }}
                        @else
                            {{ __('app.noReviews') }}
                        @endif
                    </p>
                </div>


            @endforeach


            <div class="mt-6">
                {{ $boardGames->withQueryString()->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
