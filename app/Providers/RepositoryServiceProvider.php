<?php

namespace App\Providers;

use App\Repositories\CommentRepository;
use App\Repositories\CompanyRepository;
use App\Repositories\Interfaces\RepositoryInterface;
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
    $this->app->bind(RepositoryInterface::class, CompanyRepository::class);
    $this->app->bind(RepositoryInterface::class, CommentRepository::class);
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
