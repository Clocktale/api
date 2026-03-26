<?php

namespace App\Repositories\Eloquent;

use App\Models\Creators;
use App\Repositories\Contracts\IAuthorRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class AuthorRepository implements IAuthorRepository
{
    public function listAuthor(?string $name, ?int $page = null, int $perPage = 10): LengthAwarePaginator|Collection
    {
        $query = Creators::query();

        if ($name !== null && $name !== '') {
            $needle = mb_strtolower($this->escapeLikePattern($name), 'UTF-8');
            $pattern = '%'.$needle.'%';
            // Case-insensitive (collation binária ou diferença Maiúsc/minúsc na busca)
            $query->whereRaw('LOWER(`name`) LIKE ?', [$pattern]);
        }

        return $query->paginate($perPage, ['*'], 'page', $page);
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

    private function escapeLikePattern(string $value): string
    {
        return str_replace(['\\', '%', '_'], ['\\\\', '\\%', '\\_'], $value);
    }
}
