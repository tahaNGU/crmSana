<?php

namespace App\Providers;

use App\Repositories\Storage\MainStorageRepository;
use App\Repositories\Storage\StorageRepositoryInterface;
use App\Service\DelayedStorage;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind('delayed-storage', DelayedStorage::class);
        $this->app->bind(StorageRepositoryInterface::class,MainStorageRepository::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
