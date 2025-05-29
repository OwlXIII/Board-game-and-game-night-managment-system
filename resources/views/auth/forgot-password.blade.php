<x-guest-layout>
    <div class="mb-4 text-sm text-green-400">
        {{ __('app.forgotPasswordDescription') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->

        <x-auth.text-field type="email" autocomplete="username" class="mt-4"/>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('app.passwordResetLink') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
