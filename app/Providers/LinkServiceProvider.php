<?php

namespace App\Providers;

use App\Domains\Links\Repositories\LinkRepository as LinkRepositoryInterface;
use App\Repositories\LinkRepository;
use Illuminate\Support\ServiceProvider;

class LinkServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(LinkRepositoryInterface::class, LinkRepository::class);
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
