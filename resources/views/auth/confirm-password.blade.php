<x-guest-layout>
    <div class="mb-4 text-sm text-green-400">
        {{ __('app.passwordConfirmDescription') }}
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->

        <x-auth.password type="password" autocomplete="current-password" id="password" label="password"/>

        <div class="flex justify-end mt-4">
            <x-primary-button>
                {{ __('app.confirm') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
