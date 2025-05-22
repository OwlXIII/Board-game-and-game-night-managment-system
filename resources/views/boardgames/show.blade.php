<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $boardGame->title }}
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto py-6 space-y-4">
        <div class="bg-white shadow rounded-lg p-6">
            <p class="text-gray-700">{{ $boardGame->description }}</p>
            <p><strong>{{ __('app.category') }}:</strong> {{ $boardGame->category }}</p>
            <p><strong>{{ __('app.players') }}:</strong> {{ $boardGame->min_players }} – {{ $boardGame->max_players }}</p>
            <p><strong>{{ __('app.duration') }}:</strong> {{ $boardGame->duration }} {{ __('app.minutes') }}</p>
            <p><strong>{{ __('app.complexity') }}:</strong> {{ __('app.gamecomplexity.' . $boardGame->complexity) }}</p>
        </div>

        <!-- Comments and Ratings -->

        @auth
            <div class="mt-6 bg-white p-4 shadow rounded-lg">
                <h3 class="text-lg font-semibold mb-2">{{ __('app.leaveReview') }}</h3>

                <form action="{{ route('boardgames.reviews.store', $boardGame) }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <x-input-label for="rating" :value="__('app.rating')" />
                        <select name="rating" id="rating" class="border rounded p-2" required>
                            <option value="">{{ __('app.selectRating') }}</option>
                            @for ($i = 1; $i <= 5; $i++)
                                <option value="{{ $i }}" @selected(old('rating') == $i)>{{ $i }}</option>
                            @endfor
                        </select>
                    </div>

                    <div class="mb-3">
                        <x-input-label for="comment" :value="__('app.comment')" />
                        <textarea name="comment" id="comment" rows="3" class="w-full border rounded p-2">{{ old('comment') }}</textarea>
                    </div>

                    <x-primary-button>{{ __('app.submit') }}</x-primary-button>
                </form>
            </div>
        @endauth
    </div>
</x-app-layout>
