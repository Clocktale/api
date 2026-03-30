<?php

namespace App\Services\Streaming;

use App\Http\RequestsValidations\StreamingRequest;
use App\Models\Streamings;
use App\Repositories\Contracts\IStreamingRepository;

class UpdateStreamingService
{
    public function __construct(private IStreamingRepository $streamingRepository) {}

    public function execute(StreamingRequest $request, Streamings $streaming): Streamings
    {
        $streaming->fill($request->validated());

        return $this->streamingRepository->updateStreaming($streaming);
    }
}
