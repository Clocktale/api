<?php

namespace App\Repositories\Eloquent;

use App\Models\Studio;
use App\Repositories\Contracts\IStudioRepository;

class StudioRepository implements IStudioRepository
{
    public function createStudio(Studio $studio):Studio
    {
        $studio->save();
        return $studio;
    }
    public function updateStudio(Studio $studio):Studio
    {
        $studio->update();
        return $studio;
    }
    public function deleteStudio(Studio $studio): bool
    {
        return $studio->delete(); 
    }
}
