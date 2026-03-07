<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\RequestsValidations\StoreStudioRequest;
use App\Http\RequestsValidations\UpdateStudioRequest;
use App\Models\Studio;
use App\Services\Studio\CreateStudioService;
use App\Services\Studio\UpdateStudioService;
use Illuminate\Http\JsonResponse;

class StudioController extends Controller
{
    public function __construct(
        private CreateStudioService $createStudioService,
        private UpdateStudioService $updateStudioService
    ) {
    }

    public function store(StoreStudioRequest $request): JsonResponse
    {
        $studio = $this->createStudioService->execute($request);
        return response()->json(['message' => 'Studio created successfully', 'studio' => $studio], 201);
    }
    public function update(Studio $studio, UpdateStudioRequest $request): JsonResponse
    {
        $updatedStudio = $this->updateStudioService->execute($studio, $request);
        return response()->json($updatedStudio, 200);
    }
}
