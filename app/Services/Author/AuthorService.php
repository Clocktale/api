<?php

namespace App\Services\Author;

use App\Http\RequestsValidations\AuthorRequest;
use App\Http\RequestsValidations\ListingPaginateRequest;
use App\Models\Author;
use App\Repositories\Contracts\IAuthorRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class AuthorService
{
    public function __construct(private IAuthorRepository $authorRepository)
    {

    }

    public function list(ListingPaginateRequest $request): LengthAwarePaginator|Collection
    {
        $p = $request->listingPaginationParams();

        return $this->authorRepository->listAuthor($p['name'], $p['page'], $p['perPage']);
    }

    public function create(AuthorRequest $request): Author
    {
        $author = $request->validated();
        $data = new Author($author);

        return $this->authorRepository->createAuthor($data);
    }

    public function update(Author $author, AuthorRequest $request): Author
    {
        $author->fill($request->validated());

        return $this->authorRepository->updateAuthor($author);
    }

    public function delete(Author $author): bool
    {
        return $this->authorRepository->deleteAuthor($author);
    }
}
