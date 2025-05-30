<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-green-400">
            {{ __('app.deleteAccount') }}
        </h2>

        <p class="mt-1 text-sm text-white">
            {{ __('app.deleteAccountDescription') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >{{ __('app.deleteAccount') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-green-400">
                {{ __('app.deleteAccountWarning') }}
            </h2>

            <p class="mt-1 text-sm text-white">
                {{ __('app.deleteAccountWarningDescription') }}
            </p>

            <x-auth.password type="password" autocomplete="current-password" id="password" label="password"/>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('app.cancel') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('app.deleteAccount') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
