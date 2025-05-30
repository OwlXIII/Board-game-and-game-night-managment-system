@props(['gameNight'])

@php
    $maxVotes = $gameNight->suggestions->max('votes') ?: 1;
@endphp

@if ($gameNight->suggestions->count())
    <div class="mt-6">
        <h3 class="text-lg text-white font-semibold">{{ __('app.suggestedBoardGames') }}</h3>

        <div class="space-y-4">
            @foreach ($gameNight->suggestions as $suggestion)
                @php
                    $percentage = round(($suggestion->votes / $maxVotes) * 100);
                    $hasVoted = auth()->check() && $suggestion->voters->contains('id', auth()->id());
                    $isCreator = auth()->check() && $gameNight->created_by === auth()->id();
                    $isRegistered = auth()->check() && $gameNight->participants->contains('user_id', auth()->id());
                @endphp

                <div class="relative bg-slate-700 rounded overflow-hidden shadow h-14 flex items-center">

                    <div class="absolute inset-0 bg-green-700 transition-[width] duration-700 ease-out"
                         data-vote-bar="{{ $percentage }}"></div>

                    <div class="relative z-10 w-full px-4 flex justify-between items-center text-white">
                        <div class="text-sm font-semibold truncate">
                            <a href="{{ route('boardgames.show', $suggestion->boardGame) }}"
                               class="hover:underline text-green-400">
                                {{ optional($suggestion->boardGame)->title ?? __('app.unknownGame') }}
                            </a>
                        </div>

                        <div class="flex items-center gap-2">
                            @auth
                                @if (($isRegistered || $isCreator) && !$hasVoted)
                                    <form action="{{ route('gamenights.vote', [$gameNight, $suggestion]) }}"
                                          method="POST">
                                        @csrf
                                        <x-primary-button type="submit" class="text-xs px-3 py-1">
                                            {{ __('app.vote') }}
                                        </x-primary-button>
                                    </form>
                                @elseif ($hasVoted)
                                    <span class="text-sm text-green-400">{{ __('app.alreadyVoted') }}</span>
                                @endif
                            @endauth

                            <span class="text-sm text-white">
                                {{ $suggestion->votes }} {{ __('app.votes') }}
                            </span>
                        </div>
                    </div>
                </div>

            @endforeach
        </div>
    </div>
@endif
