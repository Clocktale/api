<?php

namespace App\Services\Studio;

use App\Models\Studio;
use App\Http\RequestsValidations\StudioRequest;
use App\Repositories\Contracts\IStudioRepository;
use App\Services\AzureStorageService;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class StudioService
{
    public function __construct(private IStudioRepository $studioRepository, private AzureStorageService $azureStorageService) 
    {
        $this->azureStorageService = new AzureStorageService();
    }

    public function create(StudioRequest $request)
    {
        // Pega apenas os dados validados do request
        $studio = $request->validated();

        $logoUrl = $this->azureStorageService->uploadFile($request->file('logo'), 'studios');
        $studio['logo_url'] = $logoUrl;

        $data = new Studio($studio);
        
        return $this->studioRepository->createStudio($data);
    }

    public function list(string $name, int $page, int $perPage): LengthAwarePaginator|Collection
    {
        return $this->studioRepository->listStudio($name, $page, $perPage);
    }

    public function update(Studio $studio, StudioRequest $request): Studio
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
