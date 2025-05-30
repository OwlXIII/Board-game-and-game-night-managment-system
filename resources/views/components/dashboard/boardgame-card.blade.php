@props(['boardGame'])

<div class="bg-slate-700 p-6 rounded-xl shadow text-slate-100">
    <h3 class="text-xl font-bold mb-2">{{ $boardGame->title }}</h3>
    <p class="text-slate-300 mb-2">{{ $boardGame->description }}</p>
    <p><strong>{{ __('app.category') }}:</strong> {{ $boardGame->category }}</p>
    <p><strong>{{ __('app.players') }}:</strong> {{ $boardGame->min_players }}–{{ $boardGame->max_players }}</p>
    <p><strong>{{ __('app.duration') }}:</strong> {{ $boardGame->duration }} {{ __('app.minutes') }}</p>
    <p><strong>{{ __('app.complexity') }}:</strong> {{ __('app.gamecomplexity.' . $boardGame->complexity) }}</p>
</div>
