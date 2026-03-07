<?php

namespace App\Services\Studio;

use App\Models\Studio;
use App\Http\RequestsValidations\StoreStudioRequest;
use App\Repositories\Contracts\IStudioRepository;

class CreateStudioService
{
    public function __construct(private IStudioRepository $studioRepository) 
    {
    }

    public function execute(StoreStudioRequest $request)
    {
        // Pega apenas os dados validados do request
        $studio = $request->validated();
        $data = new Studio($studio);
        
        return $this->studioRepository->createStudio($data);
    }
}