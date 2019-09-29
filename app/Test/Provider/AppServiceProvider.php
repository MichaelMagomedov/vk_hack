<?php

namespace App\Test\Providers;

use App\Test\Repositories\AnswerRepository;
use App\Test\Repositories\TestRepository;
use App\Test\Repositories\TestResultRepository;
use App\Test\Services\AnswerService;
use Illuminate\Support\ServiceProvider;

final class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->bind(TestRepository::class);
        $this->app->bind(TestResultRepository::class);
        $this->app->bind(AnswerRepository::class);
        $this->app->bind(AnswerService::class);
    }
}
