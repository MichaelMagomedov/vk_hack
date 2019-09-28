<?php

namespace App\Cients\Providers;

use App\Clients\Repositories\ClientRepository;
use App\Clients\Services\ClientService;
use Illuminate\Support\ServiceProvider;

final class ClientServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->app->bind(ClientService::class);
        $this->app->bind(ClientRepository::class);
    }
}
