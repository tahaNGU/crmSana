<?php

namespace App\Repositories\Storage;

interface StorageRepositoryInterface
{
    public function uploadBase64(string $base64File, string $name, string $path, string $disk = 's3'): string;

    public function upload(string $path, $file, string $disk = 's3'): string;

    public function getContent(string $path, string $disk = 's3'): array;

    public function delete(string $path, string $disk = 's3');

    public function exists(string $path, string $disk='s3'):bool;

    public function get(string $path, string $disk='s3');
}
