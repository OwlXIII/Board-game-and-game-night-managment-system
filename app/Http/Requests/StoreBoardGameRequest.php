<?php

namespace App\Http\Requests;

use App\Support\Constants;
use Illuminate\Foundation\Http\FormRequest;

class StoreBoardGameRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:100',
            'description' => 'required|string',
            'category' => 'required|string|max:50',
            'min_players' => 'required|integer|min:' . Constants::MIN_PLAYERS,
            'max_players' => 'required|integer|min:' . Constants::MIN_PLAYERS . '|max:' . Constants::MAX_PLAYERS,
            'duration' => 'required|integer|min:' . Constants::MIN_DURATION . '|max:' . Constants::MAX_DURATION,
            'complexity' => 'required|in:low,medium,high',
            'rules' => 'nullable|string',
        ];
    }
}
