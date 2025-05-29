@props(['nights'])

@if($nights->count())
    <div class="bg-slate-800 shadow-lg rounded-2xl p-8">
        <h3 class="text-2xl font-bold text-green-400 mb-6 text-center">
            {{ __('app.upcomingGameNights') }}
        </h3>

        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            @foreach($nights as $i => $night)
                <x-homepage.game-night-tile :night="$night" :delay="$i * 100" />
            @endforeach
        </div>

        <div class="mt-8 text-center">
            <a href="{{ route('gamenights.index') }}"
               class="inline-block bg-green-500 text-white px-6 py-3 rounded-lg text-lg font-semibold hover:bg-green-600 transition">
                {{ __('app.seeAllGameNights') }}
            </a>
        </div>
    </div>
@endif
