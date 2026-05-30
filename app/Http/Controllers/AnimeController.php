<?php

namespace App\Http\Controllers;

use App\Http\RequestsValidations\AnimeRequest;
use App\Models\Anime;
use App\Services\Anime\CreateAnimeService;
use App\Services\Anime\DeleteAnimeService;
use App\Services\Anime\UpdateAnimeService;
use Illuminate\Http\JsonResponse;

class AnimeController extends Controller
{
    public function __construct(
        private CreateAnimeService $createAnimeService,
        private UpdateAnimeService $updateAnimeService,
        private DeleteAnimeService $deleteAnimeService
    ) {}

    public function store(AnimeRequest $request): JsonResponse
    {
        $anime = $this->createAnimeService->execute($request);

        return $this->success($anime, 'Anime created successfully.', 201);
    }

    public function update(AnimeRequest $request, Anime $anime): JsonResponse
    {
        $anime = $this->updateAnimeService->execute($anime, $request);

        return $this->success($anime, 'Anime updated successfully.', 200);
    }

    public function delete(Anime $anime): JsonResponse
    {
        $this->deleteAnimeService->execute($anime);

        return $this->success(null, 'Anime deleted successfully.', 200);
    }
}
