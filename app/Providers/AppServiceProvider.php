<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

        $services = ['Dashboard'];
        foreach ($services as$value) {
            $inter = "App\\Services\\{$value}\\{$value}Interface";
            $service = "App\\Services\\{$value}\\{$value}Service";
            $this->app->bind($inter, $service);
        }

        $repo = ['Dashboard'];
        foreach ($repo as $r) {
            $contract = "App\\Repositories\\{$r}\\{$r}Contract";
            $eloquent = "App\\Repositories\\{$r}\\{$r}Eloquent";
            $this->app->bind($contract, $eloquent);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void {}
}
