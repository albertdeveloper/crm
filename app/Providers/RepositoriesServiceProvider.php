<?php

namespace App\Providers;

use App\Repositories\ContactRepository;
use App\Repositories\ContactRepositoryContract;
use App\Repositories\LeadRepository;
use App\Repositories\LeadRepositoryContract;
use App\Repositories\PermissionRepository;
use App\Repositories\PermissionRepositoryContract;
use App\Repositories\RoleRepository;
use App\Repositories\RoleRepositoryContract;
use App\Repositories\UserRepository;
use App\Repositories\UserRepositoryContract;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
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
        $this->app->bind(UserRepositoryContract::class,UserRepository::class);
        $this->app->bind(PermissionRepositoryContract::class,PermissionRepository::class);
        $this->app->bind(RoleRepositoryContract::class,RoleRepository::class);
        $this->app->bind(LeadRepositoryContract::class,LeadRepository::class);
        $this->app->bind(ContactRepositoryContract::class,ContactRepository::class);
    }
}
