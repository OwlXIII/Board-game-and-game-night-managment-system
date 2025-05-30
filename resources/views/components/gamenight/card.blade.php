@props(['gameNight'])

<div class="bg-slate-700 rounded-xl p-5 shadow-lg transition transform hover:scale-105 hover:shadow-xl hover:ring-2 hover:ring-green-400 focus:outline-none">
    <h3 class="text-xl font-bold text-green-400">
        <a href="{{ route('gamenights.show', $gameNight) }}" class="hover:underline">
            {{ $gameNight->title }}
        </a>
    </h3>

    <x-gamenight.paragraph label="dateTime" variable="{{ $gameNight->event_time->format('Y-m-d, H:i') }}"/>
    <x-gamenight.paragraph label="location" variable="{{ $gameNight->street }} {{ $gameNight->street_number }}, {{ $gameNight->city }}, {{ $gameNight->country }}"/>
    <x-gamenight.paragraph label="participants" variable="{{ $gameNight->participants->count() + 1 }}"/>
    <x-gamenight.paragraph label="suggestionsCount" variable="{{ $gameNight->suggestions_count }}" class="text-sm text-slate-400 mt-2"/>

</div>
