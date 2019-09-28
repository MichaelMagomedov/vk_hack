<?php

namespace App\Test\Providers;

use App\Test\Repositories\TestRepository;
use Illuminate\Support\ServiceProvider;

final class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->bind(TestRepository::class);
    }
}
