@props(['label'])

<a href="{{ route('gamenights.create') }}">
    <x-primary-button class="ms-3">
        {{ __('app.createGameNight') }}
    </x-primary-button>
</a>
