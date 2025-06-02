<?php

namespace App\Service;

use App\Repositories\Storage\StorageRepositoryInterface;

class StorageService
{
    public function __construct(
        private StorageRepositoryInterface $storageRepository
    )
    {
    }

    /**
     * @param string $path
     * @return array
     */
    public function download(string $path): array
    {
        return $this->storageRepository->getContent($path);
    }

    /**
     * @param $base64
     * @param string $path
     * @param string $name
     * @param string $disk
     * @return void
     */
    public function uploadBase64($base64, string $path, string $name, string $disk = "s3"): void
    {
        $this->storageRepository->uploadBase64(base64File: $base64, path: $path, name: $name, disk: $disk);
    }

    /**
     * @param string $path
     * @param $file
     * @param string $disk
     * @return void
     */
    public function upload(string $path, $file, string $disk = "s3"): void
    {
        $this->storageRepository->upload(path: $path, file: $file, disk: $disk);
    }

    public function exists(string $path){
        return $this->storageRepository->exists(
            path:$path,
        );
    }

    /**
     * @param string $path
     * @return mixed
     */
    public function get(string $path){
        return $this->storageRepository->get(
            path:$path,
        );
    }
}
