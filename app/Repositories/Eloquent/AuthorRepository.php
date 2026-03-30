<?php

namespace App\Repositories\Eloquent;

use App\Models\Creators;
use App\Repositories\Contracts\IAuthorRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class AuthorRepository implements IAuthorRepository
{
    use Concerns\PaginatesWithOptionalNameLike;

    public function listAuthor(?string $name, ?int $page = null, int $perPage = 10): LengthAwarePaginator|Collection
    {
        return $this->paginateWithOptionalNameLike(Creators::query(), $name, $page, $perPage);
    }

    public function createAuthor(Creators $author): Creators
    {
        $author->save();

        return $author;
    }

    public function updateAuthor(Creators $author): Creators
    {
        $author->save();

        return $author;
    }

    public function deleteAuthor(Creators $author): bool
    {
        return $author->delete();
    }
}
