<?php

namespace App\Repositories\Eloquent;

use App\Models\Studio;
use App\Repositories\Contracts\IStudioRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class StudioRepository implements IStudioRepository
{
    public function listStudio(string $name, int $page, int $perPage): LengthAwarePaginator|Collection
    {
        return Studio::where('name', 'like', "%$name%")->paginate($perPage, ['*'], 'page', $page);
    }
    public function createStudio(Studio $studio):Studio
    {
        $studio->save();
        return $studio;
    }
    public function updateStudio(Studio $studio):Studio
    {
        $studio->save();
        return $studio;
    }
    public function deleteStudio(Studio $studio): bool
    {
        return $studio->delete(); 
    }
}
