<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\BlogRepositoryInterface;
use App\Repositories\Eloquent\OtpCodeRepository;
use App\Repositories\OtpCodeRepositoryInterface;
use App\Repositories\QueryBuilder\BlogRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(BlogRepositoryInterface::class , BlogRepository::class);
        $this->app->bind(OtpCodeRepositoryInterface::class , OtpCodeRepository::class);
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
