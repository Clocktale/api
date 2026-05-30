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
}
