<?php

namespace App\Http\RequestsValidations;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ListingPaginateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'name' => $this->filled('name')
                ? trim($this->input('name'))
                : null,
        ]);
    }

    protected function failedValidation(Validator $validator): void
    {
        throw new HttpResponseException(
            response()->json([
                'message' => 'Erro de validação',
                'errors' => $validator->errors(),
            ], 422)
        );
    }

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => 'nullable|string|max:255',
            'page' => ['nullable', 'integer', 'min:1'],
            'perPage' => ['nullable', 'integer', 'between:1,100'],
        ];
    }

    /**
     * Parâmetros normalizados para listagens paginadas com filtro opcional por nome.
     *
     * @return array{name: ?string, page: ?int, perPage: int}
     */
    
    public function listingPaginationParams(): array
    {
        $validated = $this->validated();

        return [
            'name' => $validated['name'] ?? null,
            'page' => isset($validated['page']) ? (int) $validated['page'] : 1,
            'perPage' => isset($validated['per_page']) ? (int) $validated['per_page'] : 10,
        ];
    }
}
