<?php

namespace App\Facades;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Facade;

class DelayedStorage extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'delayed-storage';
    }

    public static function create(string|UploadedFile $file, string $directory)
    {
        $instance = app(static::getFacadeAccessor());
        return $instance->create($file, $directory);
    }
}
