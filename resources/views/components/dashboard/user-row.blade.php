@props(['user', 'delay' => 0])


<td colspan="100%" class="pb-1">
<x-table.row data-aos="fade-up" data-aos-delay="{{ $delay }}" class="bg-slate-600 text-white">
    <x-table.cell class="w-1/4 rounded-l-lg">{{ $user->name }}</x-table.cell>
    <x-table.cell class="w-1/4">{{ $user->email }}</x-table.cell>
    <x-table.cell class="w-1/4">{{ __('app.roles.' . $user->role) }}</x-table.cell>
    <x-table.cell class="w-1/4 rounded-r-lg">
        <form method="POST" action="{{ route('admin.updateRole', $user) }}" class="flex items-center justify-center gap-2">
            @csrf
            @method('PATCH')

            <x-role-selector :role="$user->role" />
            <button type="submit" class="px-2 py-1 bg-green-500 text-white text-sm rounded hover:bg-green-600 transition">
                {{ __('app.save') }}
            </button>
        </form>
    </x-table.cell>
</x-table.row>
</td>
