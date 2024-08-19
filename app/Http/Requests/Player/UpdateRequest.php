<?php

namespace App\Http\Requests\Player;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id' => ['required', 'exists:players,id'],
            'name' => ['required', 'string'],
            'age' => ['required', 'integer', 'min:13'],
            'country_id' => ['required', 'exists:countries,id'],
            'football_club_id' => ['required', Rule::exists('football_clubs', 'id')],
            'profile_pic' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'appearances' => ['required', 'integer', 'min:0'],
            'goals' => ['required', 'integer', 'min:0'],
            'assists' => ['required', 'integer', 'min:0'],
            'yellow_cards' => ['required', 'integer', 'min:0'],
            'red_cards' => ['required', 'integer', 'min:0'],
        ];
    }
}
