@php
    use App\Enumerations\RatingLimit;
    use App\Enumerations\CommentSize;
@endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $boardGame->title }}
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto py-6 space-y-4">
        <div class="bg-white shadow rounded-lg p-6">
            <p class="text-gray-700">{{ $boardGame->description }}</p>
            <p><strong>{{ __('app.category') }}:</strong> {{ $boardGame->category }}</p>
            <p><strong>{{ __('app.players') }}:</strong> {{ $boardGame->min_players }} – {{ $boardGame->max_players }}</p>
            <p><strong>{{ __('app.duration') }}:</strong> {{ $boardGame->duration }} {{ __('app.minutes') }}</p>
            <p><strong>{{ __('app.complexity') }}:</strong> {{ __('app.gamecomplexity.' . $boardGame->complexity) }}</p>
        </div>

        <!-- Comments and Ratings -->

        @auth
            <div class="mt-6 bg-white p-4 shadow rounded-lg">
                <h3 class="text-lg font-semibold mb-2">
                    {{ $userReview ? __('app.editReview') : __('app.leaveReview') }}
                </h3>

                <form action="{{ route('boardgames.reviews.store', $boardGame) }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <x-input-label for="rating" :value="__('app.rating')" />
                        <select name="rating" id="rating" class="border rounded p-2" style="min-width: 50px;" required>
                            @for ($i = RatingLimit::MIN->value; $i <= RatingLimit::MAX->value; $i++)
                                <option value="{{ $i }}"
                                    @selected((old('rating') ?? $userReview?->rating ?? RatingLimit::MIN->value) == $i)>
                                    {{ $i }}
                                </option>
                            @endfor
                        </select>
                    </div>

                    <div class="mb-3">
                        <x-input-label for="comment" :value="__('app.comment')" />
                        <textarea name="comment"
                                  id="comment"
                                  rows="3"
                                  maxlength="{{ CommentSize::MAX->value }}"
                                  class="w-full border rounded p-2">{{ old('comment') ?? $userReview?->comment }}</textarea>
                    </div>

                    <x-primary-button>
                        {{ $userReview ? __('app.updateReview') : __('app.submit') }}
                    </x-primary-button>
                </form>

                <!-- Delete Rating -->

                    @if ($userReview)
                        <form action="{{ route('boardgames.reviews.destroy', $boardGame) }}" method="POST" onsubmit="return confirm('{{ __('app.deleteReviewConfirm') }}');" class="mt-4">
                            @csrf
                            @method('DELETE')

                            <x-danger-button>
                                {{ __('app.deleteReview') }}
                            </x-danger-button>
                        </form>
                    @endif
            </div>
        @endauth

        <!-- Average Rating -->

        @php
            $avgRating = $boardGame->reviews->avg('rating');
        @endphp

            <!-- All reviews -->

        @if ($avgRating)
            <p class="text-xl text-gray-800 font-semibold">
                {{ __('app.averageRating') }}: {{ number_format($avgRating, 1) }} / {{ RatingLimit::MAX->value }}
            </p>
        @endif

        <div class="mt-10">
            <h3 class="text-2xl font-semibold mb-4">{{ __('app.reviews') }}</h3>

            @forelse ($reviews as $review)
                <div class="mt-6">
                    {{ $reviews->links() }}
                </div>
                <div class="mb-4 border rounded p-4 bg-gray-50">
                    <div class="flex justify-between items-center">
                        <strong>{{ $review->user->name }}</strong>
                        <span class="text-yellow-500 font-semibold">
                    {{ $review->rating }} / {{ RatingLimit::MAX->value }}
                </span>
                    </div>
                    @if ($review->comment)
                        <p class="mt-2 text-gray-700">{{ $review->comment }}</p>
                    @endif
                    <small class="text-gray-500">{{ $review->created_at->diffForHumans() }}</small>
                </div>
            @empty
                <p class="text-gray-500">{{ __('app.noReviews') }}</p>
            @endforelse
        </div>
    </div>
</x-app-layout>
