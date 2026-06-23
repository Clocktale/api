<?php

namespace App\Services\Studio;

use App\Models\Studio;
use App\Http\RequestsValidations\StoreStudioRequest;
use App\Repositories\Contracts\IStudioRepository;
use App\Services\AzureStorageService;

class CreateStudioService
{
    public function __construct(private IStudioRepository $studioRepository, private AzureStorageService $azureStorageService) 
    {
        $this->azureStorageService = new AzureStorageService();
    }

    public function execute(StoreStudioRequest $request)
    {
        // Pega apenas os dados validados do request
        $studio = $request->validated();

        $logoUrl = $this->azureStorageService->uploadFile($request->file('logo'), 'studios');
        $studio['logo_url'] = $logoUrl;

        $data = new Studio($studio);
        
        return $this->studioRepository->createStudio($data);
    }
}