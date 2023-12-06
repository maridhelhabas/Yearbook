<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateMessageRequest extends FormRequest
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
            'message_content' => 'required|string',
            'message_writer' => 'required|string',
            'message_role' => 'required|string',
            'writer_image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ];
    }
}