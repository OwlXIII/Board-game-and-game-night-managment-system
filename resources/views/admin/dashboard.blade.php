<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('app.adminDashboard') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-5xl mx-auto">

            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <x-table>
                <thead>
                <tr class="bg-gray-200">
                    <x-table.heading>{{ __('app.name') }}</x-table.heading>
                    <x-table.heading>{{ __('app.email') }}</x-table.heading>
                    <x-table.heading>{{ __('app.role') }}</x-table.heading>
                    <x-table.heading>{{ __('app.action') }}</x-table.heading>
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                    <x-table.row>
                        <x-table.cell>{{ $user->name }}</x-table.cell>
                        <x-table.cell>{{ $user->email }}</x-table.cell>
                        <x-table.cell>{{ __('app.roles.' . $user->role) }}</x-table.cell>
                        <x-table.cell>
                            <form method="POST" action="{{ route('admin.updateRole', $user) }}" class="flex items-center space-x-2">
                                @csrf
                                @method('PATCH')

                                <x-role-selector :role="$user->role" />

                                <x-table.cell><button type="submit" class="px-2 py-1 bg-blue-600 text-black text-sm rounded hover:bg-blue-700">
                                    {{ __('app.save') }}
                                </button></x-table.cell>
                            </form>

                        </x-table.cell>
                    </x-table.row>
                @endforeach
                </tbody>
            </x-table>
        </div>
    </div>
</x-app-layout>
