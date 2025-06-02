<x-app-layout>
        <x-slot name="header">
            <x-homepage.header :title="__('app.adminDashboard')" />
        </x-slot>

        <div class="py-8">
            <div class="max-w-5xl mx-auto">

                @if (session('success'))
                    <x-dashboard.alert :message="session('success')" />
                @endif

                    <div data-aos="fade-up" data-aos-delay="100" class="bg-slate-800 rounded-lg p-6 shadow">
                        <x-table class="table-auto w-full border-separate border-spacing-0">
                            <thead>
                            <tr class="bg-green-800 text-white">
                                <x-table.heading class="w-1/4">{{ __('app.name') }}</x-table.heading>
                                <x-table.heading class="w-1/4">{{ __('app.email') }}</x-table.heading>
                                <x-table.heading class="w-1/4">{{ __('app.role') }}</x-table.heading>
                                <x-table.heading class="w-1/4">{{ __('app.action') }}</x-table.heading>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($users as $user)
                                <x-dashboard.user-row :user="$user" :delay="$loop->index * 200"/>
                            @endforeach
                            </tbody>
                        </x-table>
                    </div>

            </div>
        </div>
</x-app-layout>
