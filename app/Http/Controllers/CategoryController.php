<?php

namespace App\Http\Controllers;

use App\Http\RequestsValidations\CategoryRequest;
use App\Services\Category\CategoryService;
use Illuminate\Http\JsonResponse;
use App\Models\Category;
class CategoryController extends Controller
{
    public function __construct(private CategoryService $categoryService) {}

    public function store(CategoryRequest $request): JsonResponse
    {
        $category = $this->categoryService->create($request);

        return $this->success($category, 'Category created successfully.', 201);
    }

    public function destroy(Category $category): JsonResponse
    {
        $this->categoryService->delete($category);

        return $this->success($category, 'Category deleted successfully.', 200);
    }

}
