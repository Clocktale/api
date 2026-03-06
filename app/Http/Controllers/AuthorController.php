<?php

namespace App\Http\Controllers;

use App\Http\RequestsValidations\AuthorRequest;
use App\Models\Creators;
use App\Repositories\Contracts\IAuthorRepository;
use App\Services\Author\CreateAuthorService;
use App\Services\Author\DeleteAuthorService;
use App\Services\Author\UpdateAuthorService;


class AuthorController extends Controller
{

    public function __construct(
        private IAuthorRepository $authorRepository,
        private CreateAuthorService $createauthorService,
        private UpdateAuthorService $updateauthorservice,
        private DeleteAuthorService $deleteAuthorService)
    {
    }


    public function index()
    {

    }

    public function store(AuthorRequest $request)
    {
        $author = $this->createauthorService->execute($request);

        return response()->json(
            [
                'message' => 'Author Created Successfully',
                'author' => $author
            ],
            201
        );
    }

    public function update(AuthorRequest $request, Creators $author)
    {
        $author = $this->updateauthorservice->execute($author, $request);

        return response()->json(
            [
                'message' => 'Author Updated Successfully',
                'author' => $author
            ],
            200
        );
    }

    public function destroy(Creators $author)
    {
        $deleted = $this->deleteAuthorService->execute($author);

        if ($deleted)
            return response()->json(['message' => 'Author deleted Successfully'], 200);
        else
            return response()->json(['message' => 'author not found'], 404);
    }
}
