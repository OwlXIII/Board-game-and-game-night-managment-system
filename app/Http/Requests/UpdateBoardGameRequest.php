<?php

namespace App\Http\Requests;

use App\Enumerations\DurationLimit;
use App\Enumerations\PlayerLimit;
use Illuminate\Foundation\Http\FormRequest;

class UpdateBoardGameRequest extends FormRequest
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
            'min_players' => 'required|integer|min:' . PlayerLimit::MIN->value,
            'max_players' => 'required|integer|min:' . PlayerLimit::MIN->value . '|max:' . PlayerLimit::MAX->value,
            'duration' => 'required|integer|min:' . DurationLimit::MIN->value . '|max:' . DurationLimit::MIN->value,
            'complexity' => 'required|in:low,medium,high',
            'rules' => 'nullable|string',
        ];
    }
}
