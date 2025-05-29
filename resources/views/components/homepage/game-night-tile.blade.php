<a href="{{ route('gamenights.show', $gameNight) }}"
   class="block bg-slate-700 rounded-xl p-5 shadow-lg transform transition-all duration-300 ease-out hover:scale-105 hover:-translate-y-1 hover:shadow-xl hover:ring-2 hover:ring-green-400 focus:outline-none">
    <div>
        <h4 class="text-lg font-semibold text-white truncate" title="{{ $gameNight->title }}">
            {{ Str::limit($gameNight->title, 40) }}
        </h4>

        @if($gameNight->description)
            <p class="text-slate-300 mt-2 text-sm line-clamp-3" title="{{ $gameNight->description }}">
                {{ Str::limit($gameNight->description, 100) }}
            </p>
        @endif
    </div>

    <p class="text-sm text-slate-400 mt-4">
        {{ $gameNight->event_time->format('F j, Y • H:i') }}<br>
        {{ $gameNight->participants_count }} {{__('app.participants')}}
    </p>
</a>
