<?php

namespace App\Http\Controllers;

use App\Http\RequestsValidations\AnimeRequest;
use App\Models\Anime;
use App\Services\Anime\AnimeService;
use Illuminate\Http\JsonResponse;

class AnimeController extends Controller
{
    public function __construct(
        private AnimeService $animeService
    ) {}

    public function store(AnimeRequest $request): JsonResponse
    {
        $anime = $this->animeService->create($request);

        return $this->success($anime, 'Anime created successfully.', 201);
    }

    public function update(AnimeRequest $request, Anime $anime): JsonResponse
    {
        $anime = $this->animeService->update($anime, $request);

        return $this->success($anime, 'Anime updated successfully.', 200);
    }

    public function delete(Anime $anime): JsonResponse
    {
        $this->animeService->delete($anime);

        return $this->success(null, 'Anime deleted successfully.', 200);
    }
}
