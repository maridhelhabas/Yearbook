<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateContentRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'fullname' => 'required|string',
            'birthdate' => 'required|string',
            'address' => 'required|string',
            'parents_name' => 'required|string',
            'department_name' => 'required|string',
            'class_year' => 'required|string',
            'motto' => 'required|string',
        ];
    }
}
