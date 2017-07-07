<?php

namespace App\Providers;

use App\Domain\Cultivations\CultivationRepository;
use App\Domain\Cultivations\CultivationRepositoryInterface;
use App\Domain\Cultivations\CultivationService;
use App\Domain\Cultivations\CultivationServiceInterface;
use App\Domain\Dashboard\DashboardService;
use App\Domain\Dashboard\DashboardServiceInterface;
use App\Domain\Projects\ProjectRepository;
use App\Domain\Projects\ProjectRepositoryInterface;
use App\Domain\Projects\ProjectService;
use App\Domain\Projects\ProjectServiceInterface;
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
        // Dashboard BINDING
        $this->app->bind(DashboardServiceInterface::class,DashboardService::class);
        // project BINDING
        $this->app->bind(ProjectServiceInterface::class,ProjectService::class);
        $this->app->bind(ProjectRepositoryInterface::class,ProjectRepository::class);
        $this->app->bind(CultivationRepositoryInterface::class,ProjectRepository::class);

        // BINDING CULTIVATION
        $this->app->bind(CultivationServiceInterface::class,CultivationService::class);
        $this->app->bind(CultivationRepositoryInterface::class,CultivationRepository::class);

    }
}
