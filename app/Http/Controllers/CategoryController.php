<?php

namespace App\Http\Controllers;

use App\Http\RequestsValidations\CategoryRequest;
use App\Services\Category\CategoryService;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
    public function __construct(private CategoryService $categoryService) {}

    public function store(CategoryRequest $request): JsonResponse
    {
        $category = $this->categoryService->create($request);

        return $this->success($category, 'Category created successfully.', 201);
    }
}
