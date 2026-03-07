<?php

namespace App\Repositories\Contracts;

use App\Models\Studio;

interface IStudioRepository
{
    public function createStudio(Studio $studio);
    public function updateStudio(Studio $studio);
}