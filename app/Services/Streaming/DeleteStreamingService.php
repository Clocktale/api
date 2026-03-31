<?php

namespace App\Services\Streaming;

use App\Models\Streamings;
use App\Repositories\Contracts\IStreamingRepository;

class DeleteStreamingService
{
    public function __construct(private IStreamingRepository $streamingRepository) {}

    public function execute(Streamings $streaming): bool
    {
        return $this->streamingRepository->deleteStreaming($streaming);
    }
}
