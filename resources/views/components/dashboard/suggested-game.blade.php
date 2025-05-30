@props(['boardGame'])

<div class="block bg-slate-700 rounded-xl p-5 shadow-lg transition transform hover:scale-105 hover:ring-2 hover:ring-green-400 focus:outline-none">
    <h3 class="text-lg font-semibold">
        <a href="{{ route('admin.boardgames.show', $boardGame) }}" class="text-green-400 hover:underline">
            {{ $boardGame->title }}
        </a>
    </h3>
    <p class="text-slate-300">{{ $boardGame->description }}</p>
</div>
