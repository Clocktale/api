<?php

namespace App\Services\Studio;

use App\Models\Studio;
use App\Http\RequestsValidations\StoreStudioRequest;
use App\Http\RequestsValidations\UpdateStudioRequest;
use App\Repositories\Contracts\IStudioRepository;
use App\Services\AzureStorageService;

class StudioService
{
    public function __construct(private IStudioRepository $studioRepository, private AzureStorageService $azureStorageService) 
    {
        $this->azureStorageService = new AzureStorageService();
    }

    public function create(StoreStudioRequest $request)
    {
        // Pega apenas os dados validados do request
        $studio = $request->validated();

        $logoUrl = $this->azureStorageService->uploadFile($request->file('logo'), 'studios');
        $studio['logo_url'] = $logoUrl;

        $data = new Studio($studio);
        
        return $this->studioRepository->createStudio($data);
    }

    public function update(Studio $studio, UpdateStudioRequest $request): Studio
    {
        // Pega apenas os dados validados ('name')
        $data = $request->validated();

        $studio->fill($data);

        // Atualiza e retorna o estúdio (Critério 3)
        return $this->studioRepository->updateStudio($studio);
    }

    public function delete(Studio $studio): bool
    {
        return $this->studioRepository->deleteStudio($studio);
    }
}
