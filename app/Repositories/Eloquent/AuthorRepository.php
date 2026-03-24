<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\IAuthorRepository;
use App\Models\Creators;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;


class AuthorRepository implements IAuthorRepository
{
    // public function list(string $name, ?int $page = null, int $perPage = 10):LengthAwarePaginator|Collection{
        
    // }  

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