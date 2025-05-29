<x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->

        <x-auth.text-field type="email" autocomplete="username" class="mt-4"/>

        <!-- Password -->

        <x-auth.password type="password" autocomplete="new-password" id="password" label="password"/>

        <!-- Confirm Password -->

        <x-auth.password type="password" autocomplete="new-password" id="password_confirmation" label="confirmPassword"/>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('app.resetPassword') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
