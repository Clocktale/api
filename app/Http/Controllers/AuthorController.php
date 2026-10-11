<?php

namespace App\Http\Controllers;

use App\Http\RequestsValidations\AuthorRequest;
use App\Http\RequestsValidations\ListingPaginateRequest;
use App\Models\Author;
use App\Services\Author\AuthorService;
use Illuminate\Http\JsonResponse;

class AuthorController extends Controller
{
    public function __construct(
        private AuthorService $authorService
    ) {}

    public function index(ListingPaginateRequest $request): JsonResponse
    {
        $authors = $this->authorService->list($request);


        return $this->success($authors, 'Authors listed successfully.', 200);
    }

    public function store(AuthorRequest $request): JsonResponse
    {
        $author = $this->authorService->create($request);

        return $this->success($author, 'Author created successfully.', 201);
    }

    public function update(AuthorRequest $request, Author $author): JsonResponse
    {
        $author = $this->authorService->update($author, $request);

        return $this->success($author, 'Author updated successfully.', 200);
    }

    public function destroy(Author $author): JsonResponse
    {
        $deleted = $this->authorService->delete($author);

        if ($deleted) {
            return $this->success(null, 'Author deleted successfully.', 200);
        }

        return $this->error('Author not found.', 404);
    }
}
