<?php

namespace App\Services\Anime;

use App\Http\RequestsValidations\AnimeRequest;
use App\Models\Anime;
use App\Models\Author;
use App\Models\Studio;
use App\Repositories\Contracts\IAnimeRepository;

class CreateAnimeService
{
    public function __construct(private IAnimeRepository $animeRepository)
    {
    }

    public function execute(AnimeRequest $request): Anime
    {
        $data = $request->validated();

        $author = Author::find($request->author_id);
        $studio = Studio::find($request->studio_id);

        $data['author_id'] = $author->id;
        $data['studio_id'] = $studio->id;

        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');

            $fileName = time() . '_' . uniqid('', true) . '.' . $file->getClientOriginalExtension();
            $path = 'animes/' . $fileName;

            $file->storeAs('animes/', $fileName, 'azure');
            $data['cover_image_url'] = $path;
        }

        $anime = new Anime($data);

        return $this->animeRepository->createAnime($anime);
    }
}
