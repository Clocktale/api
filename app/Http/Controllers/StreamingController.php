<?php

namespace App\Http\Controllers;

use App\Services\Streaming\StreamingService;
use App\Models\Streamings;
use App\Http\RequestsValidations\ListingPaginateRequest;
use App\Http\RequestsValidations\StreamingRequest;
use Illuminate\Http\JsonResponse;

class StreamingController extends Controller
{
    public function __construct(
        private StreamingService $streamingService
    ){
    }

    public function index(ListingPaginateRequest $request): JsonResponse
    {
        $streaming = $this->streamingService->list($request);

        return $this->success($streaming, "Streamings listed successfully.", 200);
    }

    public function store(StreamingRequest $request): JsonResponse
    {
        $streaming = $this->streamingService->create($request);

        return $this->success($streaming, 'Streaming created successfully.', 201);
    }

    public function update(StreamingRequest $request, Streamings $streaming): JsonResponse
    {
        $streaming = $this->streamingService->update($request, $streaming);
        return $this->success($streaming, 'Streaming updated successfully.', 200);
    }

    public function destroy(Streamings $streaming): JsonResponse
    {
        $this->streamingService->delete($streaming);

        return $this->success(null, 'Streaming deleted successfully.', 200);
    }
}
