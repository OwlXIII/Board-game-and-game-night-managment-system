<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBoardGameRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return auth()->check() && auth()->user()->role === 'admin';
    }

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
            'category' => 'nullable|string|max:50',
            'player_count_min' => 'required|integer|min:1',
            'player_count_max' => 'required|integer|min:1',
            'duration_minutes' => 'required|integer|min:5',
            'complexity' => 'required|in:low,medium,high',
            'rules' => 'nullable|string',
        ];
    }
}
