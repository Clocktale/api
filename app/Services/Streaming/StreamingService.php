<?php

namespace App\Services\Streaming;

use App\Http\RequestsValidations\ListingPaginateRequest;
use App\Http\RequestsValidations\StreamingRequest;
use App\Models\Streamings;
use App\Repositories\Contracts\IStreamingRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class StreamingService
{
    public function __construct(private IStreamingRepository $streamingRepository) {}

    public function list(ListingPaginateRequest $request): LengthAwarePaginator|Collection
    {
        $p = $request->listingPaginationParams();

        return $this->streamingRepository->listStreaming($p['name'], $p['page'], $p['perPage']);
    }

    public function create(StreamingRequest $request): Streamings
    {
        $data = $request->validated();

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $fileName = time().'.'.$file->getClientOriginalExtension();

            $path = 'streamings/'.$fileName;

            $file->storeAs('streamings', $fileName, 'azure');
            $data['logo_url'] = $path;
        }

        $streaming = new Streamings($data);

        return $this->streamingRepository->createStreaming($streaming);
    }

    public function update(StreamingRequest $request, Streamings $streaming): Streamings
    {
        $streaming->fill($request->validated());

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $fileName = time().'.'.$file->getClientOriginalExtension();

            $path = 'streamings/'.$fileName;

            $file->storeAs('images/streamings', $fileName, 'azure');
            $streaming->logo_url = $path;

            return $this->streamingRepository->updateStreaming($streaming);
        }

        return $this->streamingRepository->updateStreaming($streaming);
    }

    public function delete(Streamings $streaming): bool
    {
        return $this->streamingRepository->deleteStreaming($streaming);
    }
}
