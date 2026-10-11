<?php

namespace App\Http\RequestsValidations;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
        if (isset($this->server) && ($this->isMethod('PUT') || $this->isMethod('PATCH'))) {
            return [
                'nickname' => 'sometimes|required|string|max:255',
                'email' => [
                    'sometimes',
                    'required',
                    'email',
                    Rule::unique('users', 'email')->ignore($this->user->id),
                ],
                'password' => [
                    'sometimes',
                    'required',
                    'string',
                    'min:8',             // mínimo de 12 caracteres
                    'regex:/[A-Z]/',      // pelo menos uma letra maiúscula
                    'regex:/[a-z]/',      // pelo menos uma letra minúscula
                    'regex:/[@$!%*?&]/',   // pelo menos um caractere especial
                ],
            ];
        }

        return [
            'nickname' => 'required|string|max:255',
            'username' => '|required|string|max:255|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => [
                'required',
                'string',
                'min:8',             // mínimo de 8 caracteres
                'regex:/[A-Z]/',      // pelo menos uma letra maiúscula
                'regex:/[a-z]/',      // pelo menos uma letra minúscula
                'regex:/[@$!%*?&]/',   // pelo menos um caractere especial
            ],
            'role' => 'in:user,admin',
        ];
    }
}
