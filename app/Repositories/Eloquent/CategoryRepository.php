<?php

namespace App\Repositories\Eloquent;

use App\Models\Category;
use App\Repositories\Contracts\ICategoryRepository;

class CategoryRepository implements ICategoryRepository
{
    public function createCategory(Category $category): Category
    {
        $category->save();

        return $category;
    }
}
