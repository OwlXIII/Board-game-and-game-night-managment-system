@props(['gameNight'])

@php
    $isCreator = $gameNight->created_by === auth()->id();
    $isRegistered = $gameNight->participants->contains('user_id', auth()->id());
@endphp

@if ($isCreator)
    <p class="text-green-400">{{ __('app.youAreTheCreator') }}</p>
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
