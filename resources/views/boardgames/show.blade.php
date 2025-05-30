<x-app-layout>
    <div data-aos="fade-up" data-aos-delay="100">
        <x-slot name="header">
            <x-homepage.header :title="$boardGame->title" />
        </x-slot>

        <div class="max-w-4xl mx-auto py-6 space-y-4">
            <x-boardgames.info-card :boardGame="$boardGame" />

            @auth
                <x-boardgames.review-form :boardGame="$boardGame" :userReview="$userReview" />
            @endauth

            @php
                $avgRating = $boardGame->reviews->avg('rating');
            @endphp

            @if ($avgRating)
                <p class="text-xl text-green-400 font-semibold">
                    {{ __('app.averageRating') }}: {{ number_format($avgRating, 1) }} / {{ \App\Enumerations\RatingLimit::MAX->value }}
                </p>
            @endif

            <x-boardgames.review-list :reviews="$reviews" />
        </div>
    </div>
</x-app-layout>
