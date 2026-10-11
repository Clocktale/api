<?php

namespace App\Repositories\Eloquent;

use App\Models\Category;
use App\Repositories\Contracts\ICategoryRepository;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class CategoryRepository implements ICategoryRepository
{
    public function listCategory(string $name, int $page, int $perPage): LengthAwarePaginator|Collection
    {
        return Category::where('name', 'like', "%$name%")->paginate($perPage, ['*'], 'page', $page);
    }
    public function createCategory(Category $category): Category
    {
        $category->save();

        return $category;
    }


    public function updateCategory(Category $category): Category
    {
        $category->save();
        return $category;
    }

    public function deleteCategory(Category $category): bool
    {
        return $category->delete();
    }
}
