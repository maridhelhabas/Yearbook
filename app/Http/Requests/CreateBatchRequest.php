<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBatchRequest extends FormRequest
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
    public function rules()
    {
        return [
            'batch_year' => 'required|integer|unique:batches,batch_year',
        ];
    }

        public function messages()
        {
            return [
                'batch_year.unique' => 'A batch with the same year already exists.',
            ];
        }
    
}
