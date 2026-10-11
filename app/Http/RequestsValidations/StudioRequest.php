<?php

namespace App\Http\RequestsValidations;

use Illuminate\Foundation\Http\FormRequest;

class StudioRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; 
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
        ];
    }
}
