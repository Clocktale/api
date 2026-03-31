<?php

namespace App\Http\Controllers;

use App\Http\RequestsValidations\AuthorRequest;
use App\Http\RequestsValidations\ListingPaginateRequest;
use App\Models\Author;
use App\Services\Author\CreateAuthorService;
use App\Services\Author\DeleteAuthorService;
use App\Services\Author\ListAuthorService;
use App\Services\Author\UpdateAuthorService;
use Illuminate\Http\JsonResponse;

class AuthorController extends Controller
{
    public function __construct(
        private CreateAuthorService $createAuthorService,
        private UpdateAuthorService $updateAuthorService,
        private ListAuthorService $listAuthorService,
        private DeleteAuthorService $deleteAuthorService
    ) {}

    public function index(ListingPaginateRequest $request): JsonResponse
    {
        $authors = $this->listAuthorService->execute($request);

        if ($authors->isEmpty()) {
            return $this->error('No authors found.', 404);
        }

        return $this->success($authors, 'Authors listed successfully.', 200);
    }

    public function store(AuthorRequest $request): JsonResponse
    {
        $author = $this->createAuthorService->execute($request);

        return $this->success($author, 'Author created successfully.', 201);
    }

    public function update(AuthorRequest $request, Author $author): JsonResponse
    {
        $author = $this->updateAuthorService->execute($author, $request);

        return $this->success($author, 'Author updated successfully.', 200);
    }

    public function destroy(Author $author): JsonResponse
    {
        $deleted = $this->deleteAuthorService->execute($author);

        if ($deleted) {
            return $this->success(null, 'Author deleted successfully.', 200);
        }

        return $this->error('Author not found.', 404);
    }
}
