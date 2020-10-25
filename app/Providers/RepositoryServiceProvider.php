<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\Contracts\{
    IUser, 
    ICompany, 
    IJob
};

use App\Repositories\Eloquent\{
    UserRepository,
    CompanyRepository,
    JobRepository
};

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(IUser::class, UserRepository::class);
        $this->app->bind(ICompany::class, CompanyRepository::class);
        $this->app->bind(IJob::class, JobRepository::class);

    }
}
