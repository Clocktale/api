<?php

namespace App\Services\Streaming;

use App\Http\RequestsValidations\ListingPaginateRequest;
use App\Repositories\Contracts\IStreamingRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class ListeningStreamingService
{
    public function __construct(private IStreamingRepository $streamingRepository) {}
    
    public function execute(ListingPaginateRequest $request): LengthAwarePaginator|Collection
    {
        $p = $request->listingPaginationParams();

        return $this->streamingRepository->listStreaming($p['name'], $p['page'], $p['perPage']);
    }
}
