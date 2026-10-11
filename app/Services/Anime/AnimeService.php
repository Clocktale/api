<?php

namespace App\Services\Anime;

use App\Http\RequestsValidations\AnimeRequest;
use App\Models\Anime;
use App\Models\Author;
use App\Models\Studio;
use App\Repositories\Contracts\IAnimeRepository;

class AnimeService
{
    public function __construct(private IAnimeRepository $animeRepository)
    {
    }

    public function create(AnimeRequest $request): Anime
    {
        $data = $request->validated();

        $author = Author::find($request->author_id);
        $studio = Studio::find($request->studio_id);

        $data['author_id'] = $author->id;
        $data['studio_id'] = $studio->id;

        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $path = 'animes/cover/'.$fileName;
            $file->storeAs('animes/cover/', $fileName, 'azure');
            $data['cover_image_url'] = $path;
        }

        if ($request->hasFile('banner_image')) {
            $file = $request->file('banner_image');

            $fileName = time() . '_' . uniqid('', true) . '.' . $file->getClientOriginalExtension();
            $path = 'animes/banner/' . $fileName;

            $file->storeAs('animes/banner/', $fileName, 'azure');
            $data['banner_image_url'] = $path;
        }

        $anime = new Anime($data);

        return $this->animeRepository->createAnime($anime);
    }

    public function update(Anime $anime, AnimeRequest $request): Anime
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

    public function delete(Anime $anime): bool
    {
        return $this->animeRepository->deleteAnime($anime);
    }
}
