<?php

namespace App\Providers;

use App\Domain\Core\Controllers\Projects\ProjectRepository;
use App\Domain\Core\Controllers\Projects\ProjectRepositoryInterface;
use App\Domain\Core\Controllers\Projects\ProjectService;
use App\Domain\Core\Controllers\Projects\ProjectServiceInterface;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //

        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(ProjectServiceInterface::class,ProjectService::class);
        $this->app->bind(ProjectRepositoryInterface::class,ProjectRepository::class);

    }
}
