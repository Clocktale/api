<?php

namespace App\Http\Controllers;

use App\Http\RequestsValidations\AuthorRequest;
use App\Models\Creators;
use illuminate\Http\JsonResponse;
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

        return response()->json(
            [
                'message' => 'Author Created Successfully',
                'author' => $author
            ],
            201
        );
    }

    public function update(AuthorRequest $request, Creators $author): JsonResponse
    {
        $author = $this->updateAuthorService->execute($author, $request);

        return response()->json(
            [
                'message' => 'Author Updated Successfully',
                'author' => $author
            ],
            200
        );
    }

    public function destroy(Creators $author): JsonResponse
    {
        $deleted = $this->deleteAuthorService->execute($author);

        if ($deleted)
            return response()->json(['message' => 'Author deleted Successfully'], 200);
        else
            return response()->json(['message' => 'author not found'], 404);
    }
}
