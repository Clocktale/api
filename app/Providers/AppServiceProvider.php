<?php

namespace App\Providers;

use App\Models\User;
use App\Policies\UserPolicy;
use App\Repositories\Contracts\IAnimeRepository;
use App\Repositories\Contracts\IAuthorRepository;
use App\Repositories\Contracts\IStreamingRepository;
use App\Repositories\Contracts\IStudioRepository;
use App\Repositories\Contracts\IUserRepository;
use App\Repositories\Eloquent\AnimeRepository;
use App\Repositories\Eloquent\AuthorRepository;
use App\Repositories\Eloquent\StreamingRepository;
use App\Repositories\Eloquent\StudioRepository;
use App\Repositories\Eloquent\UserRepository;
use AzureOss\Storage\Blob\BlobServiceClient;
use AzureOss\Storage\BlobFlysystem\AzureBlobStorageAdapter;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Filesystem\FilesystemAdapter;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;
use League\Flysystem\Filesystem as Flysystem;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(IUserRepository::class, UserRepository::class);
        $this->app->bind(IStudioRepository::class, StudioRepository::class);
        $this->app->bind(IAuthorRepository::class, AuthorRepository::class);
        $this->app->bind(IStreamingRepository::class, StreamingRepository::class);
        $this->app->bind(IAnimeRepository::class, AnimeRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::policy(User::class, UserPolicy::class);

        Storage::extend('azure', function (Application $app, array $config) {
            $connectionString = $config['connection_string'] ?? null;

            if (empty($connectionString)) {
                $connectionString = sprintf(
                    'DefaultEndpointsProtocol=https;AccountName=%s;AccountKey=%s;EndpointSuffix=%s',
                    $config['name'] ?? '',
                    $config['key'] ?? '',
                    $config['endpoint_suffix'] ?? 'core.windows.net',
                );
            }

            $service = BlobServiceClient::fromConnectionString($connectionString);
            $containerClient = $service->getContainerClient($config['container']);

            $adapter = new AzureBlobStorageAdapter(
                $containerClient,
                $config['adapter_prefix'] ?? '',
                null,
                AzureBlobStorageAdapter::ON_VISIBILITY_THROW_ERROR,
                (bool) ($config['public'] ?? false),
            );

            $flysystem = new Flysystem($adapter, Arr::only($config, [
                'directory_visibility',
                'disable_asserts',
                'retain_visibility',
                'temporary_url',
                'url',
                'visibility',
            ]));

            return new FilesystemAdapter($flysystem, $adapter, $config);
        });
    }
}
