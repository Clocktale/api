<?php

namespace App\Services\Author;

use App\Http\RequestsValidations\AuthorRequest;
use App\Models\Creators;
use App\Repositories\Contracts\IAuthorRepository;


class CreateAuthorService
{


    public function __construct(private IAuthorRepository $authorRepository)
    {

    }
    public function execute(AuthorRequest $request): Creators
    {
        $author = $request->validated();
        $data = new Creators($author);

        return $this->authorRepository->createAuthor($data);
    }
}

