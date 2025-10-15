<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RestaurantRequest extends FormRequest
{
    public function authorize(): bool
    {
        // Authorization handled via middleware; return true here.
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'capacity' => 'nullable|integer|min:0',
            'location' => 'nullable|string|max:255',
        ];
    }
}
