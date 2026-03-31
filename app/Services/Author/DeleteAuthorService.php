<?php

namespace App\Services\Author;

use App\Models\Author;
use App\Repositories\Contracts\IAuthorRepository;

class DeleteAuthorService
{
    public function __construct(private IAuthorRepository $authorRepository)
    {
    }

    public function execute(Author $author): bool
    {
        return $this->authorRepository->deleteAuthor($author);
    }
}