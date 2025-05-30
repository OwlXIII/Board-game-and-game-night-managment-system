@props(['reviews'])

@php
    use App\Enumerations\RatingLimit;
@endphp

<div class="mt-10">
    <h3 class="text-2xl font-semibold mb-4">{{ __('app.reviews') }}</h3>

    @forelse ($reviews as $review)
        <div class="mb-4 rounded p-4 bg-slate-800">
            <div class="flex justify-between items-center">
                <strong class="text-green-400">{{ $review->user->name }}</strong>
                <span class="text-green-600 font-semibold">
                    {{ $review->rating }} / {{ RatingLimit::MAX->value }}
                </span>
            </div>
            @if ($review->comment)
                <p class="mt-2 text-white bg-slate-600 rounded p-4">{{ $review->comment }}</p>
            @endif
            <small class="text-green-600">{{ $review->created_at->diffForHumans() }}</small>
        </div>
    @empty
        <p class="text-green-400">{{ __('app.noReviews') }}</p>
    @endforelse

    <div class="mt-6">
        {{ $reviews->links() }}
    </div>
</div>
