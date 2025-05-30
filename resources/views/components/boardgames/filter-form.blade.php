@props(['categories'])

@php
    use App\Enumerations\PlayerLimit;
    use App\Enumerations\DurationLimit;
@endphp

<div class="max-w-6xl mx-auto mb-6 bg-slate-800 p-6 rounded-xl shadow gap-8">
    <form method="GET" action="{{ route('boardgames.index') }}" class="flex flex-wrap gap-4 items-end text-slate-100">

        {{-- Title --}}
        <div class="flex flex-col w-[180px]">
            <x-input-label for="search" :value="__('app.title')" class="text-green-400" />
            <x-text-input id="search" name="search" type="text"
                          class="bg-slate-600 text-white border-green-400 w-full"
                          value="{{ request('search') }}" />
        </div>

        {{-- Category --}}
        <div class="flex flex-col w-[180px]">
            <x-input-label for="category" :value="__('app.category')" class="text-green-400" />
            <select name="category" id="category"
                    class="bg-slate-600 text-white border border-green-400 rounded p-2 w-full">
                <option value="">{{ __('app.all') }}</option>
                @foreach ($categories as $category)
                    <option value="{{ $category }}" @selected(request('category') === $category)>
                        {{ $category }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Complexity --}}
        <div class="flex flex-col w-[180px]">
            <x-input-label for="complexity" :value="__('app.complexity')" class="text-green-400" />
            <select name="complexity" id="complexity"
                    class="bg-slate-600 text-white border border-green-400 rounded p-2 w-full">
                <option value="">{{ __('app.all') }}</option>
                @foreach (['low', 'medium', 'high'] as $level)
                    <option value="{{ $level }}" @selected(request('complexity') === $level)>
                        {{ __('app.gamecomplexity.' . $level) }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="flex gap-12">
            {{-- Players --}}
            <x-boardgames.min-max-filter
                type="number"
                minName="min_players"
                maxName="max_players"
                min="{{ PlayerLimit::MIN->value }}"
                max="{{ PlayerLimit::MAX->value }}"
                label="{{ __('app.players') }}"
            />

            {{-- Duration --}}
            <x-boardgames.min-max-filter
                type="number"
                minName="min_duration"
                maxName="max_duration"
                min="{{ DurationLimit::MIN->value }}"
                max="{{ DurationLimit::MAX->value }}"
                label="{{ __('app.duration') . ' ' . __('app.minutes') }}"
            />
        </div>

        {{-- Buttons --}}
        <div class="flex justify-center mb-4 gap-4">
            <x-primary-button>{{ __('app.filter') }}</x-primary-button>
            <a href="{{ route('boardgames.index') }}">
                <x-secondary-button>{{ __('app.reset') }}</x-secondary-button>
            </a>
        </div>
    </form>
</div>
