<?php

namespace App\Repositories\Storage;

use Illuminate\Support\Facades\Storage;

class MainStorageRepository implements StorageRepositoryInterface
{
    public function uploadBase64(string $base64File, string $name, string $path, string $disk = 's3'): string
    {
        $path = "$path/$name";
        $fileData = base64_decode($base64File);
        Storage::disk($disk)->put($path, $fileData);
        return $path;
    }

    public function upload(string $path, $file, string $disk = 's3'): string
    {
        Storage::disk($disk)->put($path, file_get_contents($file));
        return $path;
    }

    public function getContent(string $path, string $disk = 's3'): array
    {
        return [
            'mime' => Storage::disk($disk)->mimeType($path),
            'content' => Storage::disk($disk)->get($path)
        ];
    }

    public function delete(string $path, string $disk = 's3')
    {
        Storage::disk($disk)->get($path);
    }

    public function exists(string $path, string $disk = 's3'): bool
    {
        return Storage::disk($disk)->exists($path);
    }

    public function get(string $path, string $disk = 's3')
    {
        return Storage::disk($disk)->get($path);
    }

    public function stream(string $path, string $disk = "s3")
    {
        return Storage::disk($disk)->readStream($path);
    }


    public function mime(string $path, string $disk = "s3"): string
    {
        return Storage::disk($disk)->mimeType($path);
    }
}
