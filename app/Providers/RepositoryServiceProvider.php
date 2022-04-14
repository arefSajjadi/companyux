<?php

namespace App\Providers;

use App\Repositories\CommentRepository;
use App\Repositories\CompanyRepository;
use App\Repositories\IndustryRepository;
use App\Repositories\JobRepository;
use App\Repositories\UserRepository;
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
        $this->app->singleton('comment', CommentRepository::class);
        $this->app->bind('company', CompanyRepository::class);
        $this->app->bind('job', JobRepository::class);
        $this->app->bind('user', UserRepository::class);
        $this->app->bind('industry', IndustryRepository::class);
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
