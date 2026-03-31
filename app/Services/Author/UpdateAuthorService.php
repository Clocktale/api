<?php

namespace App\Services\Author;

use App\Http\RequestsValidations\AuthorRequest;
use App\Repositories\Contracts\IAuthorRepository;
use App\Models\Author;

class UpdateAuthorService
{

    public function __construct(private IAuthorRepository $authorRepository)
    {
    }

    public function execute(Author $author, AuthorRequest $request): Author
    {
        $author->fill($request->validated());

        return $this->authorRepository->updateAuthor($author);
    }
}