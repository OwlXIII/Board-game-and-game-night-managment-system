<?php

namespace App\Http\Requests;

use App\Enumerations\CommentSize;
use App\Enumerations\RatingLimit;
use Illuminate\Foundation\Http\FormRequest;

class UpdateGameReviewsRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'rating' => 'required|integer|min:' . RatingLimit::MIN->value . '|max:' . RatingLimit::MAX->value,
            'comment' => 'nullable|string|min:' . CommentSize::MIN->value . '|max:' . CommentSize::MAX->value,
        ];
    }
}
