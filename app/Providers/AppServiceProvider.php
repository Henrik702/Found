<?php

namespace App\Providers;

use App\Contracts\BaseInterface;
use App\Contracts\CarInterface;
use App\Contracts\CarUserInterface;
use App\Contracts\UserInterface;
use App\Repositories\BaseRepository;
use App\Repositories\CarRepository;
use App\Repositories\CarUserRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(
            BaseInterface::class,
            BaseRepository::class
        );
        $this->app->bind(
            UserInterface::class,
            UserRepository::class
        );
        $this->app->bind(
            CarInterface::class,
            CarRepository::class
        );
        $this->app->bind(
            CarUserInterface::class,
            CarUserRepository::class
        );
    }
}
