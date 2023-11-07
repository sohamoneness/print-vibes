<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\AdminContract;
use App\Repositories\AdminRepository;
use App\Contracts\ArtistContract;
use App\Repositories\ArtistRepository;
use App\Contracts\DesignContract;
use App\Repositories\DesignRepository;
use App\Contracts\CategoryContract;
use App\Repositories\CategoryRepository;
use App\Contracts\ProductContract;
use App\Repositories\ProductRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    protected $repositories = [
        AdminContract::class      =>      AdminRepository::class,
        ProductContract::class     =>      ProductRepository::class,
        CategoryContract::class     =>      CategoryRepository::class,
        DesignContract::class     =>      DesignRepository::class,
        ArtistContract::class     =>      ArtistRepository::class,
        
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->repositories as $interface => $implementation)
        {
            $this->app->bind($interface, $implementation);
        }
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
