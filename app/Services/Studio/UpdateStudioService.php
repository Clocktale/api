<?php

namespace App\Services\Studio;

use App\Http\RequestsValidations\UpdateStudioRequest;
use App\Models\Studio;
use App\Repositories\Contracts\IStudioRepository;

class UpdateStudioService
{
    public function __construct(
        private IStudioRepository $studioRepository
    ) {   
    }

    public function execute(Studio $studio, UpdateStudioRequest $request): Studio
    {
        // Pega apenas os dados validados ('name')
        $data = $request->validated();

        // Atualiza e retorna o estúdio (Critério 3)
        return $this->studioRepository->updateStudio($data);
    }
}