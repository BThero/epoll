<?php

namespace App\Http\Requests;

use App\Models\VerificationCode;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class VerifyPhoneRequest extends FormRequest
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
            'phone_number' => 'required|min:1|max:255',
            'code' => 'required|digits:4',
        ];
    }

    public function after(): array
    {
        return [
            function (Validator $validator) {
                $code = $this->input('code');
                $phone_number = $this->input('phone_number');
                if (!VerificationCode::query()->where(
                    ['code' => $code, 'phone_number' => $phone_number]
                )->exists()) {
                    $validator->errors()->add(
                        'code',
                        'Code is incorrect'
                    );
                }
            },
        ];
    }
}
