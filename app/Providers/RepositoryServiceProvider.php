<?php

namespace App\Providers;

use App\Interfaces\Admin as AdminInterfacesPath;
use App\Repositories\Admin as AdminRepositoryPath;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register() 
    {
        $this->app->bind(AdminInterfacesPath\DashboardRepositoryInterface::class, AdminRepositoryPath\DashboardRepository::class);
        $this->app->bind(AdminInterfacesPath\DokumenRepositoryInterface::class, AdminRepositoryPath\DokumenRepository::class);
        $this->app->bind(AdminInterfacesPath\GuruPembimbingRepositoryInterface::class, AdminRepositoryPath\GuruPembimbingRepository::class);
        $this->app->bind(AdminInterfacesPath\JenisSuratRepositoryInterface::class, AdminRepositoryPath\JenisSuratRepository::class);
    }
  
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
