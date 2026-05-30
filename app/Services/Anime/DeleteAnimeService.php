<?php

namespace App\Services\Anime;

use App\Models\Anime;
use App\Repositories\Contracts\IAnimeRepository;

class DeleteAnimeService
{
    public function __construct(private IAnimeRepository $animeRepository) {}

    public function execute(Anime $anime): bool
    {
        return $this->animeRepository->deleteAnime($anime);
    }
}
