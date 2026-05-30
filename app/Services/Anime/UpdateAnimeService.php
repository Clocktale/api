<?php

namespace App\Services\Anime;

use App\Http\RequestsValidations\AnimeRequest;
use App\Models\Anime;
use App\Repositories\Contracts\IAnimeRepository;

class UpdateAnimeService
{
    public function __construct(private IAnimeRepository $animeRepository) {}

    public function execute(Anime $anime, AnimeRequest $request): Anime
    {
        $anime->fill($request->validated());

        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            $fileName = time().'_'.uniqid('', true).'.'.$file->getClientOriginalExtension();
            $path = 'animes/'.$fileName;
            $file->storeAs('animes', $fileName, 'azure');
            $anime->cover_image_url = $path;
        }

        return $this->animeRepository->updateAnime($anime);
    }
}
