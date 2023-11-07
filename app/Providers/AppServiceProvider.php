<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;

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
        $ExistCategories = Schema::hasTable('categories');
        if ($ExistCategories) {
            $ExternalCategory = Category::orderBy('name', 'asc')->where('status', 1)->where('deleted_at', 1)->get();
        }
        view()->share('Externalcategory', $ExternalCategory);
    }
}
