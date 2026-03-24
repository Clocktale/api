<?php

namespace App\Http\Controllers;

use App\Http\RequestsValidations\AuthorRequest;
use App\Models\Creators;
use Illuminate\Http\JsonResponse;
use App\Repositories\Contracts\IAuthorRepository;
use App\Services\Author\CreateAuthorService;
use App\Services\Author\DeleteAuthorService;
use App\Services\Author\UpdateAuthorService;


class AuthorController extends Controller
{

    public function __construct(
        private IAuthorRepository $authorRepository,
        private CreateAuthorService $createaAuthorService,
        private UpdateAuthorService $updateAuthorService,
        private DeleteAuthorService $deleteAuthorService
    ) {
    }


    public function index()
    {

    }

    public function store(AuthorRequest $request): JsonResponse
    {
        $author = $this->createaAuthorService->execute($request);

        return $this->success($author, 'Author created successfully.', 201);
    }

    public function update(AuthorRequest $request, Creators $author): JsonResponse
    {
        $author = $this->updateAuthorService->execute($author, $request);

        return $this->success($author, 'Author updated successfully.', 200);
    }

    public function destroy(Creators $author): JsonResponse
    {
        $deleted = $this->deleteAuthorService->execute($author);

        if ($deleted) {
            return $this->success(null, 'Author deleted successfully.', 200);
        }

        return $this->error('Author not found.', 404);
    }
}
