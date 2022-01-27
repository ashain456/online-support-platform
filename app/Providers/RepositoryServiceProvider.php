<?php

namespace App\Providers;

use App\Repository\Contracts\LoginRepositoryInterface;
use App\Repository\Contracts\OnlineSupportPlatformRepositoryInterface;
use App\Repository\Mysql\LoginRepository;
use App\Repository\Mysql\OnlineSupportPlatformRepository;
use Illuminate\Support\ServiceProvider;


class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(LoginRepositoryInterface::class, LoginRepository::class);
        $this->app->bind(OnlineSupportPlatformRepositoryInterface::class, OnlineSupportPlatformRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }

}
