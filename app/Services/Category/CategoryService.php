<?php

namespace App\Services\Category;

use App\Http\RequestsValidations\CategoryRequest;
use App\Models\Category;
use App\Repositories\Contracts\ICategoryRepository;

class CategoryService
{
    public function __construct(private ICategoryRepository $categoryRepository) {}

    public function create(CategoryRequest $request): Category
    {
        $category = new Category($request->validated());

        return $this->categoryRepository->createCategory($category);
    }

    public function update(Category $category, CategoryRequest $request): Category
    {
        $category->update($request->validated());

        return $category;
    }

    public function delete(Category $category): bool
    {
        return $this->categoryRepository->deleteCategory($category);
    }
}
