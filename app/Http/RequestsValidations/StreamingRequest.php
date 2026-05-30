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
        $logoRules = $this->isMethod('POST')
            ? 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            : 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048';

        return [
            'name' => 'required|string|max:255',
            'url' => 'required|string|max:255',
            'logo' => $logoRules,
        ];
    }
}
