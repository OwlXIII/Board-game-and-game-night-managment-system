<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->

        <x-auth.text-field id="email" type="email" autocomplete="username" class="mt-4"/>

        <!-- Password -->

        <x-auth.password type="password" autocomplete="current-password" id="password" label="password"/>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-green-500 text-green-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-green-500">{{ __('app.rememberMe') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-green-500 hover:text-green-600 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('app.forgotPassword') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('app.login') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
