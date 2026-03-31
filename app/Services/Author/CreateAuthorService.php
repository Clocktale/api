<?php

namespace App\Services\Author;

use App\Http\RequestsValidations\AuthorRequest;
use App\Models\Author;
use App\Repositories\Contracts\IAuthorRepository;


class CreateAuthorService
{


    public function __construct(private IAuthorRepository $authorRepository)
    {

    }
    public function execute(AuthorRequest $request): Author
    {
        $author = $request->validated();
        $data = new Author($author);

        return $this->authorRepository->createAuthor($data);
    }
}

