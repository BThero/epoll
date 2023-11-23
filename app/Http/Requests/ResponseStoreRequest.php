<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResponseStoreRequest extends FormRequest
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
            'poll_id' => 'required|exists:polls,id',
            'option_id' => 'required|exists:options,id',
        ];
    }

    public function messages(): array
    {
        return [
            'poll_id.required' => 'Poll is required.',
            'poll_id.exists' => 'The selected poll is invalid.',
            'option_id.required' => 'You have to vote',
            'option_id.exists' => 'The selected option is invalid.',
        ];
    }
}
