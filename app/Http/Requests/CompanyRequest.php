<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required','string','max:48'],
            'email' => ['nullable','string','max:48'],
            'logo' => ['nullable','image','mimes:png,jpg,jpeg','dimensions:min_width=100,min_height=100'],
            'website' => ['nullable','string','max:48'],

        ];
    }
}
