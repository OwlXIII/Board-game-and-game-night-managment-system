@props(['boardGame'])

<div class="bg-slate-800 shadow rounded-lg p-6">
    <p class="text-green-400 size-xl font-bold">{{ $boardGame->description }}</p>
    <p><strong>{{ __('app.category') }}:</strong> {{ $boardGame->category }}</p>
    <p><strong>{{ __('app.players') }}:</strong> {{ $boardGame->min_players }} – {{ $boardGame->max_players }}</p>
    <p><strong>{{ __('app.duration') }}:</strong> {{ $boardGame->duration }} {{ __('app.minutes') }}</p>
    <p><strong>{{ __('app.complexity') }}:</strong> {{ __('app.gamecomplexity.' . $boardGame->complexity) }}</p>
</div>
