<?php

namespace App\Http\RequestsValidations;

use Illuminate\Foundation\Http\FormRequest;

class AnimeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'original_title' => 'nullable|string|max:255',
            'description' => 'required|string|max:255',
            'release_date' => 'required|date',
            'content_lenght' => 'required|integer',
            'author_id' => 'required|integer|exists:authors,id',
            'studio_id' => 'required|integer|exists:studios,id',
            'cover_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'cover_image_url' => 'sometimes|nullable|string|max:255',
            'banner_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'banner_image_url' => 'sometimes|nullable|string|max:255',
            'status' => 'required|string|max:255',
            'story_lenght' => 'required|string|max:255',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
