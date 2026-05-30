<?php

namespace App\Services\Anime;

use App\Repositories\Contracts\IAnimeRepository;

class ListAnimeService
{
    public function __construct(private IAnimeRepository $animeRepository) {}
}
