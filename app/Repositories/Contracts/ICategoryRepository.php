<?php

namespace App\Repositories\Contracts;

use App\Models\Category;
interface ICategoryRepository
{
    public function createCategory(Category $category): Category;
    public function updateCategory(Category $category): Category;
    public function deleteCategory(Category $category): bool;
}
