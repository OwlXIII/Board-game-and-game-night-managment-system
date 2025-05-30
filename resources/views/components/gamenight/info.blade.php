@props(['gameNight'])

<div class="bg-slate-800 p-6 rounded shadow">
    <div class="bg-slate-600 p-6 rounded shadow">
        <p class="text-white">{{ $gameNight->description }}</p>

        <x-gamenight.paragraph label="dateTime" variable="{{ \Carbon\Carbon::parse($gameNight->event_time)->format('Y-m-d, H:i') }}" class="mt-4 text-green-400"/>
        <x-gamenight.paragraph label="location" variable="{{ $gameNight->street }} {{ $gameNight->street_number }}, {{ $gameNight->city }}, {{ $gameNight->country }}" class="text-green-400"/>
        <x-gamenight.paragraph label="createdBy" variable="{{ $gameNight->creator->name ?? '-' }}" class="text-sm text-green-600 mt-2"/>

    </div>
</div>
