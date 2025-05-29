<a href="{{ route('gamenights.show', $night) }}"
   class="block bg-slate-700 rounded-xl p-5 shadow-lg transition transform hover:scale-105 hover:ring-2 hover:ring-green-400 focus:outline-none">
    <div>
        <h4 class="text-lg font-semibold text-white truncate" title="{{ $night->title }}">
            {{ Str::limit($night->title, 40) }}
        </h4>

        @if($night->description)
            <p class="text-slate-300 mt-2 text-sm line-clamp-3" title="{{ $night->description }}">
                {{ Str::limit($night->description, 100) }}
            </p>
        @endif
    </div>

    <p class="text-sm text-slate-400 mt-4">
        {{ $night->event_time->format('F j, Y • H:i') }}<br>
        {{ $night->participants_count }} {{ __('app.participants') }}
    </p>
</a>
