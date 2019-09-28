<?php

namespace App\Nova\Providers;

use App\Nova\Dashboards\SplitTesing;
use App\Nova\Filters\TestCategory;
use App\Nova\Metrics\ClientProductsByCategory;
use Laravel\Nova\Nova;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\NovaApplicationServiceProvider;

final class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Register the Nova routes.
     *
     * @return void
     */
    protected function routes()
    {
        Nova::routes()
            ->withAuthenticationRoutes()
            ->withPasswordResetRoutes()
            ->register();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewNova', function ($user) {
            return in_array($user->email, [
                'admin@admin.ru'
            ]);
        });
    }

    public function cards()
    {
        return [
        ];
    }

    public function tools()
    {
        return [
            \ChrisWare\NovaBreadcrumbs\NovaBreadcrumbs::make(),
        ];
    }

    protected function dashboards()
    {
        return [
            (new SplitTesing())
        ];
    }
}
