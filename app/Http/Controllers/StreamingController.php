<?php

namespace App\Http\Controllers;

use App\Services\Streaming\CreateStreamingService;
use App\Services\Streaming\DeleteStreamingService;
use App\Services\Streaming\ListeningStreamingService;
use App\Services\Streaming\UpdateStreamingService;
use App\Models\Streamings;
use App\Http\RequestsValidations\ListingPaginateRequest;
use App\Http\RequestsValidations\StreamingRequest;
use Illuminate\Http\JsonResponse;

class StreamingController extends Controller
{
    public function __construct(
        private CreateStreamingService $createStreamingService,
        private UpdateStreamingService $updateStreamingService,
        private ListeningStreamingService $listeningStreamingService,
        private DeleteStreamingService $deleteStreamingService
    ){
    }

    public function index(ListingPaginateRequest $request): JsonResponse
    {
        $streaming = $this->listeningStreamingService->execute($request);

        if ($streaming->isEmpty()) {
            return $this->error("No streamings found.", 404);
        }

        return $this->success($streaming, "Streamings listed successfully.", 200);
    }

    public function store(StreamingRequest $request): JsonResponse
    {
        $streaming = $this->createStreamingService->execute($request);

        return $this->success($streaming, 'Streaming created successfully.', 201);
    }

    public function update(StreamingRequest $request, Streamings $streaming): JsonResponse
    {
        $streaming = $this->updateStreamingService->execute($request, $streaming);
        return $this->success($streaming, 'Streaming updated successfully.', 200);
    }

    public function destroy(Streamings $streaming): JsonResponse
    {
        $this->deleteStreamingService->execute($streaming);

        return $this->success(null, 'Streaming deleted successfully.', 200);
    }
}
