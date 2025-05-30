@props(['game'])

@php
    use App\Enumerations\RatingLimit;
@endphp

<a href="{{ route('boardgames.show', $game) }}"
   class="block bg-slate-700 rounded-xl p-5 shadow-lg transition transform hover:scale-105 hover:ring-2 hover:ring-green-400 focus:outline-none text-slate-100">
    <h3 class="text-xl font-semibold text-green-400">
        {{ $game->title }}
    </h3>

    <p class="text-slate-300 mt-2">{{ Str::limit($game->description, 100) }}</p>
    <p><strong>{{ __('app.category') }}:</strong> {{ $game->category }}</p>
    <p><strong>{{ __('app.players') }}:</strong> {{ $game->min_players }} – {{ $game->max_players }}</p>
    <p><strong>{{ __('app.duration') }}:</strong> {{ $game->duration }} {{ __('app.minutes') }}</p>
    <p><strong>{{ __('app.complexity') }}:</strong> {{ __('app.gamecomplexity.' . $game->complexity) }}</p>
    <p><strong>{{ __('app.averageRating') }}:</strong>
        @if ($game->reviews_avg_rating)
            {{ number_format($game->reviews_avg_rating, 1) }} / {{ RatingLimit::MAX->value }}
        @else
            {{ __('app.noReviews') }}
        @endif
    </p>
</a>
