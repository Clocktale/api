<?php

namespace App\Repositories\Contracts;


use App\Models\Studio;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface IStudioRepository
{
    public function listStudio(string $name, int $page, int $perPage): LengthAwarePaginator|Collection;
    public function createStudio(Studio $studio);
    public function updateStudio(Studio $studio);
    public function deleteStudio(Studio $studio);
}