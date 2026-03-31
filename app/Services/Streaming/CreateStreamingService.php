<?php

namespace App\Services\Streaming;

use App\Http\RequestsValidations\StreamingRequest;
use App\Models\Streamings;
use App\Repositories\Contracts\IStreamingRepository;

class CreateStreamingService
{
    public function __construct(private IStreamingRepository $streamingRepository) {}

    public function execute(StreamingRequest $request): Streamings
    {
        $streaming = $request->validated();
        $data = new Streamings($streaming);

        return $this->streamingRepository->createStreaming($data);
    }
}
