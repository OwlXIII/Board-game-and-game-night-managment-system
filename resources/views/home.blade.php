<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('app.welcome') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 space-y-4">
                    @auth
                        <p class="text-xl">Hello, {{ auth()->user()->name }}! 👋</p>
                        <p>You can browse, rate, and suggest board games for upcoming game nights.</p>

                        <a href="{{ route('boardgames.index') }}"
                           class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                            Explore Board Games
                        </a>
                    @else
                        <p class="text-xl">Welcome, guest! 🎲</p>
                        <p>You can browse board games and see upcoming events, but you’ll need an account to participate.</p>

                        <div class="flex space-x-4">
                            <a href="{{ route('login') }}"
                               class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                                Log in
                            </a>
                            <a href="{{ route('register') }}"
                               class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">
                                Register
                            </a>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
