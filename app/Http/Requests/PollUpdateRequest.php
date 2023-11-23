<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class PollUpdateRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'question' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'closed' => 'nullable|string|in:on',
        ];
    }

    public function after(): array
    {
        return [
            function (Validator $validator) {
                $options = collect($this->keys())->filter(function ($key) {
                    return str_starts_with($key, 'option-');
                })->toArray();
                if (count($options) < 2) {
                    $validator->errors()->add(
                        'options',
                        'You must provide at least two options!'
                    );
                }
            },
        ];
    }
}
