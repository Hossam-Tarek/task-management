<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;

class AdminsProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('admins', function () {
            return Cache::remember('admins', now()->addDay(), function () {
                return User::select(['id', 'name', 'email'])->admin()->get();
            });
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array<int, string>
     */
    public function provides(): array
    {
        return [
            'admins'
        ];
    }
}
