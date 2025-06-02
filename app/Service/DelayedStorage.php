<?php

namespace App\Service;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DelayedStorage
{
    private string|UploadedFile $file;
    private string $directory;
    private string $name;
    private string $extension;

    public function create(string|UploadedFile $file, string $directory, string $extension = 'png'): static
    {
        $this->extension = gettype($file) === "object"
            ? $file->getClientOriginalExtension() : $extension;
        $this->name = Str::random(50) . ".$this->extension";
        $this->file = $file;
        $this->directory = $directory;
        return $this;
    }

    public function path(): string
    {
        return "$this->directory/$this->name";
    }

    public function store(): bool|string
    {
        if (gettype($this->file) === "object")
            return $this->file->storeAs($this->directory, $this->name);
        return Storage::put($this->path(), base64_decode($this->file));
    }

    public function asBase64(): string
    {
        $content = gettype($this->file) === 'string' ? $this->file : base64_encode(file_get_contents($this->file));
        return "data:image/$this->extension;base64," . $content . "==";
    }

    /**
     * @return UploadedFile|string
     */
    public function getFile(): string|UploadedFile
    {
        return $this->file;
    }

    /**
     * @return ?string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return ?string
     */
    public function getDirectory(): ?string
    {
        return $this->directory;
    }

}
