<?php

namespace App\Services\Author;

use App\Http\RequestsValidations\ListAuthorsRequest;
use App\Repositories\Contracts\IAuthorRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class ListAuthorService
{
    public function __construct(private IAuthorRepository $authorRepository) {}

    public function execute(ListAuthorsRequest $request): LengthAwarePaginator|Collection
    {
        $validated = $request->validated();

        $name = $request->input('name');
        $name = is_string($name) ? (trim($name) ?: null) : null;

        $page = isset($validated['page']) ? (int) $validated['page'] : null;
        $perPage = isset($validated['per_page']) ? (int) $validated['per_page'] : 10;

        return $this->authorRepository->listAuthor($name, $page, $perPage);
    }
}
