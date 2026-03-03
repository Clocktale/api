<?php

namespace App\Http\RequestsValidations;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'nickname' => 'required|string|max:255',
            'username' => '|required|string|max:255|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => [
                'required',
                'string',
                'min:12',             // mínimo de 12 caracteres
                'regex:/[A-Z]/',      // pelo menos uma letra maiúscula
                'regex:/[a-z]/',      // pelo menos uma letra minúscula
                'regex:/[@$!%*?&]/'   // pelo menos um caractere especial
            ],
            'role' => 'in:user,admin',
        ];
    }
}