@props(['boardGame', 'userReview'])

@php
    use App\Enumerations\RatingLimit;
    use App\Enumerations\CommentSize;
@endphp

<div class="mt-6 bg-slate-800 p-4 shadow rounded-lg">
    <h3 class="text-lg font-semibold mb-2">
        {{ $userReview ? __('app.editReview') : __('app.leaveReview') }}
    </h3>

    <form action="{{ route('boardgames.reviews.store', $boardGame) }}" method="POST">
        @csrf
        <div class="mb-3">
            <x-input-label for="rating" :value="__('app.rating')" />
            <select name="rating" id="rating" class="border rounded p-2 min-w-[50px] bg-slate-600" required>
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
                      class="w-full border rounded bg-slate-600 p-2">{{ old('comment') ?? $userReview?->comment }}</textarea>
        </div>
        <div class="flex justify-center mb-4 gap-4">
            <x-primary-button>
                {{ $userReview ? __('app.updateReview') : __('app.submit') }}
            </x-primary-button>
        </div>
    </form>

    @if ($userReview)
        <form action="{{ route('boardgames.reviews.destroy', $boardGame) }}" method="POST" onsubmit="return confirm('{{ __('app.deleteReviewConfirm') }}');" class="mt-4">
            @csrf
            @method('DELETE')
            <div class="flex justify-center mb-4 gap-4">
                <x-danger-button>
                    {{ __('app.deleteReview') }}
                </x-danger-button>
            </div>
        </form>
    @endif
</div>
