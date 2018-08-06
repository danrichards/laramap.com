<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Seo\Meta as MetaService;

class SeoServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(MetaService::class);
    }
}
