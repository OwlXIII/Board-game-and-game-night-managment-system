<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->

        <x-auth.text-field id="name" autocomplete="name" type="text" class="mt-4"/>

        <!-- Email Address -->

        <x-auth.text-field id="email" autocomplete="username" type="email" class="mt-4"/>

        <!-- Password -->

        <x-auth.password type="password" autocomplete="new-password" id="password" label="password"/>

        <!-- Confirm Password -->

        <x-auth.password type="password" autocomplete="new-password" id="password_confirmation" label="confirmPassword"/>


        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-green-500 hover:text-green-600 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('app.alreadyRegistered') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('app.register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
