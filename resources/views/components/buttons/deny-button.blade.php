@props(['boardGame'])

<form method="POST" action="{{ route('admin.boardgames.deny', $boardGame) }}">
    @csrf
    @method('PATCH')
    <x-danger-button>{{ __('app.deny') }}</x-danger-button>
</form>
