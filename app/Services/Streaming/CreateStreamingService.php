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
}
