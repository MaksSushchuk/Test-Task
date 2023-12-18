<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
            'company_id' => ['required', 'integer', 'exists:companies,id'],
            'name' => ['required','string','max:48'],
            'surname' => ['required','string','max:48'],
            'email' => ['nullable','string','max:48'],
            'number' => ['nullable','string','max:24'],
        ];
    }
}
