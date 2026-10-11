<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\RequestsValidations\StoreStudioRequest;
use App\Http\RequestsValidations\UpdateStudioRequest;
use App\Models\Studio;
use App\Services\Studio\StudioService;
use Illuminate\Http\JsonResponse;

class StudioController extends Controller
{
    public function __construct(
        private StudioService $studioService
    ) {
    }

    public function store(StoreStudioRequest $request): JsonResponse
    {
        $studio = $this->studioService->create($request);
        return response()->json(['message' => 'Studio created successfully', 'studio' => $studio], 201);
    }
    public function update(Studio $studio, UpdateStudioRequest $request): JsonResponse
    {
        $updatedStudio = $this->studioService->update($studio, $request);
        return response()->json(['message' => 'Studio updated successfully', 'studio' => $updatedStudio], 200);
    }
    public function destroy(Studio $studio)
    {
        $this->studioService->delete($studio);
        return response()->json(['message' => 'Deleted studio', 'studio' => $studio], 200); 
    }
}
