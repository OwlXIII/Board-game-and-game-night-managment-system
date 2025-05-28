<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">
            {{ $gameNight->title }}
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto py-6 space-y-4">
        <div class="bg-white p-6 rounded shadow">
            <p class="text-gray-700">{{ $gameNight->description }}</p>

            <p class="mt-4"><strong>{{ __('app.dateTime') }}:</strong>
                {{ \Carbon\Carbon::parse($gameNight->event_time)->format('Y-m-d, H:i') }}</p>

            <p><strong>{{ __('app.location') }}:</strong>
                {{ $gameNight->street }} {{ $gameNight->street_number }}, {{ $gameNight->city }}, {{ $gameNight->country }}</p>

            <p class="text-sm text-gray-500 mt-2">
                <strong>{{ __('app.createdBy') }}:</strong> {{ $gameNight->creator->name ?? '-' }}
            </p>
        </div>

        @auth
            @php
                $isCreator = $gameNight->created_by === auth()->id();
                $isRegistered = $gameNight->participants->contains('user_id', auth()->id());
            @endphp

            @if ($isCreator)
                <p class="text-gray-500">{{ __('app.youAreTheCreator') }}</p>
            @elseif (!$isRegistered)
                <form action="{{ route('gamenights.register', $gameNight) }}" method="POST" class="mt-4">
                    @csrf
                    <x-primary-button>{{ __('app.register') }}</x-primary-button>
                </form>
            @else
                <form action="{{ route('gamenights.unregister', $gameNight) }}" method="POST" class="mt-4">
                    @csrf
                    @method('DELETE')
                    <x-danger-button>{{ __('app.unregister') }}</x-danger-button>
                </form>
            @endif
        @endauth

        @auth
            @if ($isRegistered || $isCreator)
            @php
                $alreadySuggested = $gameNight->suggestions->contains('suggested_by', auth()->id());
            @endphp

            <div class="mt-6 bg-white p-4 shadow rounded-lg">
                <h3 class="text-lg font-semibold mb-2">{{ __('app.suggestBoardGame') }}</h3>

                @if ($alreadySuggested)
                    <p class="text-gray-500">{{ __('app.alreadySuggested') }}</p>
                @elseif ($boardGames->isEmpty())
                    <p class="text-gray-500">{{ __('app.noBoardGamesToSuggest') }}</p>
                @else
                    <form action="{{ route('gamenights.suggest', $gameNight) }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <x-input-label for="board_game_id" :value="__('app.boardgames')" />
                            <select name="board_game_id" id="board_game_id" class="w-full border rounded p-2" required>
                                <option value="">{{ __('app.selectGame') }}</option>
                                @foreach ($boardGames as $game)
                                    <option value="{{ $game->id }}">{{ $game->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <x-primary-button>{{ __('app.suggestBoardGame') }}</x-primary-button>
                    </form>
                @endif
            </div>
            @endif
        @endauth

        @if ($gameNight->suggestions->count())
            <div class="mt-6">
                <h3 class="text-lg font-semibold">{{ __('app.suggestedBoardGames') }}</h3>
                <ul class="list-disc list-inside space-y-2">
                    @foreach ($gameNight->suggestions as $suggestion)
                        <li class="flex items-center justify-between">
            <span>
                <a href="{{ route('boardgames.show', $suggestion->boardGame) }}"
                   class="text-blue-600 hover:underline">
                    {{ optional($suggestion->boardGame)->title ?? __('app.unknownGame') }}
                </a>
                – {{ optional($suggestion->user)->name ?? __('app.unknownUser') }}
                ({{ $suggestion->votes }} {{ __('app.votes') }})
            </span>

                            @auth
                                @php
                                    $hasVoted = $suggestion->voters->contains('id', auth()->id());
                                @endphp

                                @if (($isRegistered || $isCreator) && !$hasVoted)
                                    <form action="{{ route('gamenights.vote', [$gameNight, $suggestion]) }}" method="POST" class="ml-4">
                                        @csrf
                                        <x-primary-button type="submit" class="text-sm">{{ __('app.vote') }}</x-primary-button>
                                    </form>
                                @elseif ($hasVoted)
                                    <span class="text-sm text-green-600 ml-4">{{ __('app.alreadyVoted') }}</span>
                                @endif
                            @endauth
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        <a href="{{ route('gamenights.index') }}" class="text-sm text-blue-600 hover:underline">
            ← {{ __('app.backToGameNights') }}
        </a>
    </div>
</x-app-layout>
