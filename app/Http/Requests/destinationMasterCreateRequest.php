<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class destinationMasterCreateRequest extends FormRequest
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
            'country_id' => 'required|integer|exists:countries,id',
            'state_id' => 'required|integer|exists:states,id',
            'district_id' => 'required|integer|exists:districts,id',
            'city_id' => 'required|integer|exists:cities,id',
            'category_id' => 'required|integer|exists:categories,id',
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'required|string',
            'rating' => 'required|numeric|min:0|max:5',
            'review' => 'required|string',
            'ranking' => 'required|integer|min:0',
            'history' => 'nullable|string',
            'foods' => 'nullable|string',
            'map_links' => 'nullable|url',
        ];
    }
}
