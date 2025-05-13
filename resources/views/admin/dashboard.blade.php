<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Admin Dashboard – User Management
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-5xl mx-auto">
            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <table class="w-full table-auto border-collapse">
                <thead>
                <tr class="bg-gray-200">
                    <th class="p-2 text-left">Name</th>
                    <th class="p-2 text-left">Email</th>
                    <th class="p-2 text-left">Role</th>
                    <th class="p-2 text-left">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                    <tr class="border-t">
                        <td class="p-2">{{ $user->name }}</td>
                        <td class="p-2">{{ $user->email }}</td>
                        <td class="p-2">{{ ucfirst($user->role) }}</td>
                        <td class="p-2">
                            <form method="POST" action="{{ route('admin.updateRole', $user) }}">
                                @csrf
                                @method('PATCH')

                                <select name="role" class="border rounded p-1 text-sm">
                                    <option value="user" @selected($user->role === 'user')>User</option>
                                    <option value="admin" @selected($user->role === 'admin')>Admin</option>
                                </select>

                                <button type="submit" class="ml-2 px-2 py-1 bg-blue-600 text-black text-sm rounded hover:bg-blue-700">
                                    Save
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
