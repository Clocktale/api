<?php

namespace App\Providers;

use App\Repositories\Contracts\IStudioRepository;
use App\Repositories\Contracts\IUserRepository;
use App\Repositories\Contracts\IAuthorRepository;
use App\Repositories\Eloquent\UserRepository;
use App\Repositories\Eloquent\StudioRepository;
use App\Repositories\Eloquent\AuthorRepository;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Policies\UserPolicy;

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
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::policy(User::class, UserPolicy::class);
    }
}
