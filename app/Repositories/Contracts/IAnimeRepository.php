<?php

namespace App\Repositories\Contracts;

use App\Models\Anime;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface IAnimeRepository
{
    // public function listAnime(?string $title, ?int $page = null, int $perPage = 10): LengthAwarePaginator|Collection;

    public function findAnimeByName(string $title): ?Anime;

    public function createAnime(Anime $anime): Anime;

    public function updateAnime(Anime $anime): Anime;

    public function deleteAnime(Anime $anime): bool;
}
