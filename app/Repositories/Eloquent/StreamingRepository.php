<?php

namespace App\Repositories\Eloquent;

use App\Models\Streamings;
use App\Repositories\Contracts\IStreamingRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class StreamingRepository implements IStreamingRepository
{
    use Concerns\PaginatesWithOptionalNameLike;

    public function listStreaming(?string $name, ?int $page = null, int $perPage = 10): LengthAwarePaginator|Collection
    {
        return $this->paginateWithOptionalNameLike(Streamings::query(), $name, $page, $perPage);
    }

    public function createStreaming(Streamings $streaming): Streamings
    {
        $streaming->save();
        return $streaming;
    }

    public function updateStreaming(Streamings $streaming): Streamings
    {
        $streaming->save();
        return $streaming;
    }

    public function deleteStreaming(Streamings $streaming): bool
    {
        return $streaming->delete();
    }
}
