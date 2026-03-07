<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class testimonialsUpdateRequest extends FormRequest
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
            'name'       => 'required|string|max:255',
            'occupation' => 'required|string|max:255',
            'email'      => 'required|string|max:255|unique:testimonials,email,'.$this->id,
            'mobile'     => 'required|string|max:20',
            'message'    => 'required|string|max:500',
        ];
    }
}
