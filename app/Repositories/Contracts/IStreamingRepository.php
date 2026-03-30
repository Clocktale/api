<?php

namespace App\Repositories\Contracts;

use App\Models\Streamings;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface IStreamingRepository
{
    public function listStreaming(?string $name, ?int $page = null, int $perPage = 10): LengthAwarePaginator|Collection;

    public function createStreaming(Streamings $streaming): Streamings;

    public function updateStreaming(Streamings $streaming): Streamings;

    public function deleteStreaming(Streamings $streaming): bool;
}
