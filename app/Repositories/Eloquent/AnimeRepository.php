<?php

namespace App\Repositories\Eloquent;

use App\Models\Anime;
use App\Repositories\Contracts\IAnimeRepository;

class AnimeRepository implements IAnimeRepository
{
    public function findAnimeByName(string $title): ?Anime
    {
        return Anime::query()->where('title', $title)->first();
    }

    public function createAnime(Anime $anime): Anime
    {
        $anime->save();

        return $anime;
    }

    public function updateAnime(Anime $anime): Anime
    {
        $anime->save();

        return $anime;
    }

    public function deleteAnime(Anime $anime): bool
    {
        return $anime->delete();
    }
}
