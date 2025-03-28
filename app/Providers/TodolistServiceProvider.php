<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\TodolistService;
use App\Services\Impl\TodolistServiceImpl;

class TodolistServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(TodolistService::class, TodolistServiceImpl::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
