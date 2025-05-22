@props(['boardGame'])

<form method="POST" action="{{ route('admin.boardgames.approve', $boardGame) }}">
    @csrf
    @method('PATCH')
    <button type="submit" class="px-3 py-1 bg-black-600 text-white rounded hover:bg-black-700 text-sm">
        {{ __('app.approve') }}
    </button>
</form>
