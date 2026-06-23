<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class AzureStorageService
{

    public function uploadFile(UploadedFile $file, string $folder)
    {
        $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();

        $path = "{$folder}/{$filename}";

        $file->storeAs($folder, $filename, 'azure');

        return $path;
    }
}