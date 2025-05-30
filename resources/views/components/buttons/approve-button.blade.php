@props(['boardGame'])

<form method="POST" action="{{ route('admin.boardgames.approve', $boardGame) }}">
    @csrf
    @method('PATCH')
    <x-primary-button>{{ __('app.approve') }}</x-primary-button>
</form>
