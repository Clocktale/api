<?php

namespace App\Repositories\Eloquent;

use App\Models\Author;
use App\Repositories\Contracts\IAuthorRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class AuthorRepository implements IAuthorRepository
{
    use Concerns\PaginatesWithOptionalNameLike;

    public function listAuthor(?string $name, ?int $page = null, int $perPage = 10): LengthAwarePaginator|Collection
    {
        return $this->paginateWithOptionalNameLike(Author::query(), $name, $page, $perPage);
    }

    public function createAuthor(Author $author): Author
    {
        $author->save();

        return $author;
    }

    public function updateAuthor(Author $author): Author
    {
        $author->save();

        return $author;
    }

    public function deleteAuthor(Author $author): bool
    {
        return $author->delete();
    }
}
