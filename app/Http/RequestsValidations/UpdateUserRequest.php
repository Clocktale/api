<?php

namespace App\Http\RequestsValidations;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\User;
class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Adjust authorization logic as needed
    }

    public function rules()
    {
        return [
            "nickname" => "sometimes|required|string|max:255",
            "email" => [
                "sometimes",
                "required",
                "email",
                Rule::unique('users', 'email')->ignore($this->user->id),
            ],
            "password" => [
                "sometimes",
                "required",
                "string",
                "min:12",             // mínimo de 12 caracteres
                "regex:/[A-Z]/",      // pelo menos uma letra maiúscula
                "regex:/[a-z]/",      // pelo menos uma letra minúscula
                "regex:/[@$!%*?&]/"   // pelo menos um caractere especial
            ],
        ];
    }
}