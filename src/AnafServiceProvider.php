<?php

namespace Andali\Anaf;

use Illuminate\Support\ServiceProvider;

class AnafServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton('anaf', fn ($app) => new Anaf);
    }
}
