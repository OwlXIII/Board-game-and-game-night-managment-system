@props(['gameNight', 'boardGames'])

@php
    $isCreator = $gameNight->created_by === auth()->id();
    $isRegistered = $gameNight->participants->contains('user_id', auth()->id());
    $alreadySuggested = $gameNight->suggestions->contains('suggested_by', auth()->id());
@endphp

@if ($isRegistered || $isCreator)
    <div class="mt-6 bg-slate-600 p-4 shadow rounded-lg">
        <h3 class="text-lg font-semibold mb-2">{{ __('app.suggestBoardGame') }}</h3>

        @if ($alreadySuggested)
            <p class="text-green-400">{{ __('app.alreadySuggested') }}</p>
        @elseif ($boardGames->isEmpty())
            <p class="text-green-400">{{ __('app.noBoardGamesToSuggest') }}</p>
        @else
            <form action="{{ route('gamenights.suggest', $gameNight) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <x-input-label class="text-green-400" for="board_game_id" :value="__('app.boardgames')" />
                    <select name="board_game_id" id="board_game_id" class="w-full border rounded p-2 bg-slate-800" required>
                        <option class="bg-slate-800" value="">{{ __('app.selectGame') }}</option>
                        @foreach ($boardGames as $game)
                            <option class="bg-slate-800" value="{{ $game->id }}">{{ $game->title }}</option>
                        @endforeach
                    </select>
                </div>
                <x-primary-button>{{ __('app.suggestBoardGame') }}</x-primary-button>
            </form>
        @endif
    </div>
@endif
