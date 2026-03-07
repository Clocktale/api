<?php

namespace App\Services\Author;

use App\Http\RequestsValidations\AuthorRequest;
use App\Repositories\Contracts\IAuthorRepository;
use App\Models\Creators;

class UpdateAuthorService
{

    public function __construct(private IAuthorRepository $authorRepository)
    {
    }

    public function execute(Creators $author, AuthorRequest $request): Creators
    {
        $data = $request->validated();
        $author->fill($data);

        return $this->authorRepository->updateAuthor($author);
    }
}