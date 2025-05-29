@props(['boardGame'])

<form method="POST" action="{{ route('admin.boardgames.deny', $boardGame) }}">
    @csrf
    @method('PATCH')
    <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 text-sm">
        {{ __('app.deny') }}
    </button>
</form>
