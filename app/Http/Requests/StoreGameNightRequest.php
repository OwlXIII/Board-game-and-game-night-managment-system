<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGameNightRequest extends FormRequest
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
            'event_time' => 'required|date|after:now',
            'street' => 'required|string|max:255',
            'street_number' => 'required|string|max:20',
            'city' => 'required|string|max:100',
            'country' => 'required|string|max:100',
        ];
    }
}

