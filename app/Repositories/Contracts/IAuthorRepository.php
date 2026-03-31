<?php

namespace App\Repositories\Contracts;

use App\Models\Author;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface IAuthorRepository
{
    public function listAuthor(?string $name, ?int $page = null, int $perPage = 10): LengthAwarePaginator|Collection;

    public function createAuthor(Author $author): Author;

    public function updateAuthor(Author $author): Author;

    public function deleteAuthor(Author $author): bool;
}
