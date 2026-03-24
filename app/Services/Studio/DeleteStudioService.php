<?php

namespace App\Services\Studio;

use App\Models\Studio;
use App\Repositories\Contracts\IStudioRepository;

class DeleteStudioService
{
    public function __construct(
        private IStudioRepository $studioRepository
    ) {
    }

    public function execute(Studio $studio): bool
    {
        return $this->studioRepository->deleteStudio($studio);
    }
}