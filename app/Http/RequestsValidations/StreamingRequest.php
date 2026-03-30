<?php

namespace App\Http\RequestsValidations;

use Illuminate\Foundation\Http\FormRequest;

class StreamingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'url' => 'required|string|max:255',
            'logo_url' => 'required|string|max:255',
        ];
    }
}
